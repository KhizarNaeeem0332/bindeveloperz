<?php

use App\Supports\Helpers\Number;

if (!function_exists('numberFormat')) {
    function numberFormat($num) {
        return Number::numberFormat($num);
    }
}
if (!function_exists('roundHalfFive')) {
    function roundHalfFive($num) {
        return Number::roundHalfFive($num);
    }
}
if (!function_exists('numberShortFormat')) {
    function numberShortFormat($str) {
        return Number::numberShortFormat($str);
    }
}
if (!function_exists('formatPhoneNumber')) {
    function formatPhoneNumber($str) {
        return Number::formatPhoneNumber($str);
    }
}
if (!function_exists('recordPerPage')) {
    function recordPerPage() {
        return Number::recordPerPage();
    }
}

