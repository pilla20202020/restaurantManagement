<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FoodMenuService;

class FoodMenuController extends Controller {
    protected $service;
    public function __construct(FoodMenuService $service) {
        $this->service = $service;
    }
    public function index() {
        $foodmenus = $this->service->listMenus();
        return view('backend.foodmenu.index', compact('foodmenus'));
    }
    public function create() {
        return view('backend.foodmenu.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable'
        ]);
        $this->service->createMenu($data);
        return redirect()->route('foodmenu.index');
    }
    public function edit($id) {
        $menu = $this->service->getMenu($id);
        return view('backend.foodmenu.edit', compact('menu'));
    }
    public function update(Request $request, $id) {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable'
        ]);
        $this->service->updateMenu($id, $data);
        return redirect()->route('foodmenu.index');
    }
    public function destroy($id) {
        $this->service->deleteMenu($id);
        return redirect()->route('foodmenu.index');
    }
}

