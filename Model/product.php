<?php


declare(strict_types=1);


class product {

    // Properties
    private $id;
    private $name;
    private $description;
    private $price;


    // Methods
    public function __construct(int $id, string $name, string $description, float $price) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;

    }

    public function getId() : int {
        return $this->id;
    }
    public function getName() : string {
        return $this->name;
    }
    public function getDescription() : string {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
