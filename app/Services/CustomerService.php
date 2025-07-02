<?php

namespace App\Services;
use App\Repositories\CustomerRepository;

class CustomerService {
    protected $repo;
    public function __construct(CustomerRepository $repo) {
        $this->repo = $repo;
    }
    public function listCustomers() {
        return $this->repo->all();
    }
    public function createCustomer(array $data) {
        // Example: could add extra logic here
        return $this->repo->create($data);
    }
    public function updateCustomer($id, array $data) {
        return $this->repo->update($id, $data);
    }
    public function deleteCustomer($id) {
        return $this->repo->delete($id);
    }
    public function getCustomer($id) {
        return $this->repo->find($id);
    }
}
