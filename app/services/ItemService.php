<?php
require __DIR__ . '/../repositories/ItemRepository.php'; 


class ItemService {
    public function getAllItems() {
        // retrieve data
        $repository = new ItemRepository();
        $items = $repository->getAll();
        return $items;
    }

   
}
