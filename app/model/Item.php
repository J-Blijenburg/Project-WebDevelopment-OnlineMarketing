<?php
class Item{
    public int $itemId;
    public string $name;
    public string $description;
    public float $price;
    public string $posted_At;
    public string $status;
    public User $user;
    public Category $category;
    public string $features;
}
?>