<?php
class Item implements \JsonSerializable{
    public int $itemId;
    public string $name;
    public string $description;
    public float $price;
    public string $posted_At;
    public string $status;
    public User $user;
    public Category $category;
    public string $features;

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}
?>