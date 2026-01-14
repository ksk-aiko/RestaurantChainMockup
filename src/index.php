<?php
// create RestaurantChain and display its HTML representation
require_once 'classes/RestaurantChain.php';
$chain = new RestaurantChain();
echo $chain->toHTML();
