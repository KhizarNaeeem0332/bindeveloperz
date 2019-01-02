<?php

use App\Supports\Helpers\Theme;

if (!function_exists('backgroundColors')) {
    function backgroundColors() {
        return Theme::backgroundColors();
    }
}
if (!function_exists('textColors')) {
    function textColors() {
        return Theme::textColors();
    }
}
if (!function_exists('tableDesign')) {
    function tableDesign() {
        return Theme::tableDesign();
    }
}
if (!function_exists('tableHead')) {
    function tableHead() {
        return Theme::tableHead();
    }
}
if (!function_exists('reportHeadFooter')) {
    function reportHeadFooter() {
        return Theme::reportHeadFooter();
    }
}
if (!function_exists('buttonDesign')) {
    function buttonDesign() {
        return Theme::buttonDesign();
    }
}
if (!function_exists('buttonSize')) {
    function buttonSize() {
        return Theme::buttonSize();
    }
}
if (!function_exists('cardOutline')) {
    function cardOutline() {
        return Theme::cardOutline();
    }
}
if (!function_exists('animateCss')) {
    function animateCss($key) {
        return Theme::animateCss($key);
    }
}
if (!function_exists('flagBtn')) {
    function flagBtn($str) {
        return Theme::flagBtn($str);
    }
}

if (!function_exists('randomBgColor')) {
    function randomBgColor($str) {
        return Theme::randomBgColor($str);
    }
}
if (!function_exists('flagBadge')) {
    function flagBadge($str) {
        return Theme::flagBadge($str);
    }
}
if (!function_exists('perBtn')) {
    function perBtn($str) {
        return Theme::perBtn($str);
    }
}