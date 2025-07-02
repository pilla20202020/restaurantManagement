<?php

namespace App\Services;
use App\Repositories\FoodMenuRepository;

class FoodMenuService {
    protected $repo;
    public function __construct(FoodMenuRepository $repo) {
        $this->repo = $repo;
    }
    public function listMenus() {
        return $this->repo->all();
    }
    public function createMenu(array $data) {
        return $this->repo->create($data);
    }
    public function updateMenu($id, array $data) {
        return $this->repo->update($id, $data);
    }
    public function deleteMenu($id) {
        return $this->repo->delete($id);
    }
    public function getMenu($id) {
        return $this->repo->find($id);
    }
}
