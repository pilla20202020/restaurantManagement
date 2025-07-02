<?php

namespace App\Repositories;
use App\Models\Order;

class OrderRepository {
    public function all() {
        return Order::with(['customer', 'table', 'menus'])->get();
    }
    public function find($id) {
        return Order::with(['customer', 'table', 'menus'])->findOrFail($id);
    }
    public function create(array $data) {
        return Order::create($data);
    }
    public function delete($id) {
        $order = $this->find($id);
        return $order->delete();
    }
}
