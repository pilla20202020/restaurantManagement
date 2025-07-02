<?php

// app/Services/OrderService.php
namespace App\Services;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\DB;

class OrderService {
    protected $repo;
    public function __construct(OrderRepository $repo) {
        $this->repo = $repo;
    }
    public function listOrders() {
        return $this->repo->all();
    }
    public function createOrder(array $data, array $menuIds) {
        return DB::transaction(function() use ($data, $menuIds) {
            // Create order record
            $order = $this->repo->create([
                'table_id' => $data['table_id'],
                'customer_id' => $data['customer_id'],
                'credit_amount' => $data['credit_amount'] ?? 0,
            ]);
            // Attach menu items (many-to-many)
            $order->menus()->attach($menuIds);
            return $order;
        });
    }
    public function getOrder($id) {
        return $this->repo->find($id);
    }
    public function deleteOrder($id) {
        return $this->repo->delete($id);
    }
}
