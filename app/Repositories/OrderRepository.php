<?php

namespace App\Repositories;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderRepository {
    public function all() {
        return Order::with(['customer', 'table', 'details'])->get();
    }
    public function find($id) {
        return Order::with(['customer', 'table', 'details'])->findOrFail($id);
    }
    public function create(array $data)
    {
        return Order::create($data);
    }

    public function createDetail(int $orderId, array $item)
    {
        return OrderDetail::create([
            'order_id'     => $orderId,
            'food_menu_id' => $item['food_menu_id'],
            'quantity'     => $item['quantity'],
            'rate'         => $item['rate'],
            'amount'       => $item['amount'],
        ]);
    }
    public function delete($id) {
        $order = $this->find($id);
        return $order->delete();
    }
}
