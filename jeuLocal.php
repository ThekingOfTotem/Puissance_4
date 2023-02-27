<?php

session_start();

$grid = array(
    array(0, 0, 0, 0, 0, 0, 0), // ligne 1
    array(0, 0, 0, 0, 0, 0, 0), // ligne 2
    array(0, 0, 0, 0, 0, 0, 0), // ligne 3
    array(0, 0, 0, 0, 0, 0, 0), // ligne 4
    array(0, 0, 0, 0, 0, 0, 0), // ligne 5
    array(0, 0, 0, 0, 0, 0, 0) // ligne 6
);

//echo json_encode($grid);
function displayGrid($grid) {
    for ($i = 0; $i < count($grid); $i++) {
        for ($j = 0; $j < count($grid[$i]); $j++) {
            echo "| " . $grid[$i][$j] . " ";
        }
        echo "|\n";
    }
    echo "---------------\n";
}
displayGrid($grid);