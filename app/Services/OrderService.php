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
    public function createOrder(array $orderData, array $items)
    {
        return DB::transaction(function () use ($orderData, $items) {
            $order = $this->repo->create($orderData);
            foreach ($items as $item) {
                $this->repo->createDetail($order->id, $item);
            }

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
