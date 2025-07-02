<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CustomerService;

class CustomerController extends Controller {
    protected $service;
    public function __construct(CustomerService $service) {
        $this->service = $service;
    }
    public function index() {
        $customers = $this->service->listCustomers();
        return view('backend.customer.index', compact('customers'));
    }
    public function create() {
        return view('backend.customer.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'phone' => 'nullable'
        ]);
        $this->service->createCustomer($data);
        return redirect()->route('customer.index');
    }
    public function edit($id) {
        $customer = $this->service->getCustomer($id);
        return view('backend.customer.edit', compact('customer'));
    }
    public function update(Request $request, $id) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone' => 'nullable'
        ]);
        $this->service->updateCustomer($id, $data);
        return redirect()->route('customer.index');
    }
    public function destroy($id) {
        $this->service->deleteCustomer($id);
        return redirect()->route('customer.index');
    }
}

