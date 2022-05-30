<?php

$array = array();

for ($i = 0; $i < 5; $i++) {
    $array[] = $i + 1;
}

print_r($array);

$array2 = array();
for ($i = 0; $i < 5; $i++) {
    array_push($array2, ($i + 1));
}

print_r($array2);


$array3 = array();

$greetings = 'greetings';
$name = 'name';
$salutation = 'salutation';

$array3[$greetings] = "Hello";
$array3[$name] = "I'm Salome";
$array3[$salutation] = "It's nice meeting you";

print_r($array3);

echo array_search("Hello", $array3);