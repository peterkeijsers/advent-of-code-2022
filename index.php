<?php

require_once __DIR__ . "/Model/Elf.php";
require_once __DIR__ . "/Model/Food.php";

$inputData = array();
$inputData = file('./input.txt');
if (empty($inputData)) {
    echo "Error: no input data found.";
}

// Process Input data
$elves = array();
$elf = new Elf();
foreach ($inputData as $key => $value) {
    // Every empty line is a "new" elf
    if (empty(trim($value))) {
        // Store current elf;
        $elves[] = $elf;

        // Create new elf
        $elf = new Elf();
        continue;
    }

    $elf->addFood(new Food(intval($value)));
}

// Sort elves by their total calotries carried
usort($elves, fn($a, $b) => $b->getTotalCalloriesCarried() <=> $a->getTotalCalloriesCarried());

// Calculate total calories of all elves
$totalCalories = 0;
foreach ($elves as $elf) {
    $totalCalories += $elf->getTotalCalloriesCarried();
}

// Determine Elf with most calories carried
$elfWithMostCalloriesCarried = null;
foreach ($elves as $elf) {
    if(
        $elfWithMostCalloriesCarried === null ||
        $elf->getTotalCalloriesCarried() > $elfWithMostCalloriesCarried->getTotalCalloriesCarried()
    ) {
        $elfWithMostCalloriesCarried = $elf;
    }
}

// Get total calories carried by top 3 elves
$totalCaloriesTopThreeElves = 0;
foreach (array_slice($elves, 0, 3) as $elf) {
    $totalCaloriesTopThreeElves += $elf->getTotalCalloriesCarried();
}

echo "<pre>";
var_dump($totalCaloriesTopThreeElves);
echo "</pre>";
