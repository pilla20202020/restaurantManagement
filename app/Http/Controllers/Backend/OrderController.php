<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Models\Table;
use App\Models\Menu;
use App\Models\Customer;

class OrderController extends Controller {
    protected $service;
    public function __construct(OrderService $service) {
        $this->service = $service;
    }
    public function index() {
        $orders = $this->service->listOrders();
        return view('backend.order.index', compact('orders'));
    }
    public function create() {
        $tables = Table::all();
        $customers = Customer::all();
        $foodmenus = Menu::all();
        return view('backend.order.create', compact('tables', 'customers', 'foodmenus'));
    }
    public function store(Request $request) {
        $data = $request->validate([
            'table_id' => 'required|exists:tables,id',
            'customer_id' => 'required|exists:customers,id',
            'credit_amount' => 'nullable|numeric',
            'menu_ids' => 'required|array',
            'menu_ids.*' => 'exists:menus,id'
        ]);
        $this->service->createOrder($data, $data['menu_ids']);
        return redirect()->route('backend.order.index');
    }
    public function destroy($id) {
        $this->service->deleteOrder($id);
        return redirect()->route('backend.order.index');
    }
}

