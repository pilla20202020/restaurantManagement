<?php

namespace App\Repositories;
use App\Models\FoodMenu;

class FoodMenuRepository {
    public function all() { return FoodMenu::all(); }
    public function find($id) { return FoodMenu::findOrFail($id); }
    public function create(array $data) { return FoodMenu::create($data); }
    public function update($id, array $data) {
        $menu = $this->find($id);
        $menu->update($data);
        return $menu;
    }
    public function delete($id) {
        $menu = $this->find($id);
        return $menu->delete();
    }
}
