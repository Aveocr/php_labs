<?php

require_once "city.php";

$cities = [
    new City("Moscow", 12958485),
    new City("New Yourk", 154954954),
    new City("London", 7594483),
    new City("Samara", 2948542),
    new City("Saratov", 1485483)
];
echo "<ul>";
foreach ($cities as $city){
    echo "<li> $city->name: $city->population </li>";
}
echo "</ul>";

?>