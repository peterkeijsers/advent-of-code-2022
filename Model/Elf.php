<?php

class Elf
{
    protected array $foods = [];

    public function __construct()
    {

    }

    public function addFood(Food $food)
    {
        $this->foods[] = $food;

        return $this;
    }

    /**
     * @return Food[]
     */
    public function getFoods(): array
    {
        return $this->foods;
    }

    public function getTotalCalloriesCarried(): int
    {
        $totalCallories = 0;
        foreach ($this->getFoods() as $food){
            $totalCallories += $food->getCalories();
        }

        return $totalCallories;
    }
}
