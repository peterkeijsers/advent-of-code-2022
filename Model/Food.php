<?php

class Food
{
    protected int $calories = 0;

    public function __construct($calories)
    {
        $this->calories = $calories;
    }

    public function getCalories()
    {
        return $this->calories;
    }
}
