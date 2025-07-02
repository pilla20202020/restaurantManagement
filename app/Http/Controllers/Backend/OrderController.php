<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Models\Table;
use App\Models\Menu;
use App\Models\Customer;
use App\Models\FoodMenu;
use App\Models\Order;

class OrderController extends Controller {
    protected $service;
    public function __construct(OrderService $service) {
        $this->service = $service;
    }
    public function index() {
        $orders = $this->service->listOrders();
        $customers = Customer::all();
        return view('backend.order.index', compact('orders','customers'));
    }
    public function create() {
        $tables = Table::all();
        $customers = Customer::all();
        $foodmenus = FoodMenu::all();
        return view('backend.order.create', compact('tables', 'customers', 'foodmenus'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'table_id' => 'required|exists:tables,id',
            'foodmenu_ids' => 'required|array|min:1',
            'foodmenu_ids.*' => 'exists:food_menus,id',
            'rates' => 'required|array',
            'rates.*' => 'numeric|min:0',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
            'totals' => 'required|array',
            'totals.*' => 'numeric|min:0',
            'payment_type' => 'nullable|in:cash,credit',
        ]);

        $orderData = [
            'table_id'     => $request->table_id,
            'customer_id'  => $request->customer_id,
            'payment_type' => $request->payment_type ?? 'cash',
            'total_amount' => array_sum($request->totals),
        ];

        // Combine order item details
        $items = [];
        foreach ($request->foodmenu_ids as $index => $menuId) {
            $items[] = [
                'food_menu_id' => $menuId,
                'quantity'     => $request->quantities[$index],
                'rate'         => $request->rates[$index],
                'amount'       => $request->totals[$index],
            ];
        }

        // Call service to store order and order details
        $this->service->createOrder($orderData, $items);

        return redirect()->route('order.index')->with('success', 'Order created successfully.');
    }

    public function show($id)
    {
        $order = $this->service->getOrder($id); // Uses repository internally
        return view('backend.order.partials.view', compact('order'));
    }

    public function updatePayment(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $validated = $request->validate([
            'status' => 'required|in:paid,credit',
            'payment_type' => 'required|in:cash,online',
            'paid_amount' => 'required|numeric|min:0',
            'customer_id' => 'required_if:status,credit|nullable|exists:customers,id',
        ]);
        $paidAmount = $validated['paid_amount'];
        $paymentType = $validated['payment_type'];
        $order->status = $validated['status'];
        $order->total_amount = $order->total_amount ?? 0;
        $order->paid_amount = $paidAmount;
        $order->payment_type = $paymentType;
        if ($validated['status'] === 'credit') {
            $order->status = 'credit';
            $order->customer_id = $validated['customer_id'];
        }

        $order->save();

        return redirect()->back()->with('success', 'Payment status updated.');
    }
    public function destroy($id) {
        $this->service->deleteOrder($id);
        return redirect()->route('order.index');
    }
}

