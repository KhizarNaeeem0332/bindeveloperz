<?php

use App\Supports\Helpers\Date;

if (!function_exists('dateTime')) {
    function dateTime() {
        return Date::dateTime();
    }
}
if (!function_exists('todayDate')) {
    function todayDate() {
        return Date::todayDate();
    }
}
if (!function_exists('dateFormat')) {
    function dateFormat($date, $format) {
        return Date::dateFormat($date, $format);
    }
}
if (!function_exists('dateToSQL')) {
    function dateToSQL($date) {
        return Date::dateToSQL($date);
    }
}
if (!function_exists('sqlDateToInput')) {
    function sqlDateToInput($date) {
        return Date::sqlDateToInput($date);
    }
}
function getDateTime($date) {
    $date = date('Y-m-d', strtotime(str_replace('/', '-', $date)));
    $time = date('H:i:s', time());
    return $date . ' ' . $time;
}

function getYears($limit) {
    return Date::getYears($limit);
}