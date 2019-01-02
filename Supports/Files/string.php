<?php

use App\Supports\Helpers\Str;

if (!function_exists('upperFirst')) {
    function upperFirst($str) {
        return Str::upperFirst($str);
    }
}
if (!function_exists('upper')) {
    function upper($str) {
        return Str::upper($str);
    }
}
if (!function_exists('lower')) {
    function lower($str) {
        return Str::lower($str);
    }
}
if (!function_exists('initCap')) {
    function initCap($str) {
        return Str::initCap($str);
    }
}

if (!function_exists('nvl')) {
    function nvl($value, $default) {
        return Str::nvl($value, $default);
    }
}
if (!function_exists('emailToLink')) {
    function emailToLink($str) {
        return Str::emailToLink($str);
    }
}
if (!function_exists('getGender')) {
    function getGender($str) {
        return Str::getGender($str);
    }
}
if (!function_exists('_selected')) {
    function _selected($key, $value) {
        return Str::selected($key, $value);
    }
}
if (!function_exists('_checked')) {
    function _checked($key, $value) {
        return Str::checked($key, $value);
    }
}

