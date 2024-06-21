<?php

function some_item_is_empty(array $items) {
    if( !is_array($items) ) return true;

    $emptyItems = array_filter($items, function($item) {
        return empty($item);
    });

    return count($emptyItems) > 0;
}

function dd() {
    $args = func_get_args();

    foreach ($args as $arg) {
        var_dump($arg);
    }

    die();
}