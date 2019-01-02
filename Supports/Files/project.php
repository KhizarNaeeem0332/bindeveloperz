<?php

use App\Supports\Helpers\Project;

if (!function_exists('dcType')) {
    function dcType() {
        return Project::dcType();
    }
}
if (!function_exists('seatTypeList')) {
    function seatTypeList() {
        return Project::seatTypeList();

    }
}
if (!function_exists('seatByNick')) {
    function seatByNick($nick) {
        return Project::seatByNick($nick);

    }
}
if (!function_exists('dcTypeByNick')) {
    function dcTypeByNick($nick) {
        return Project::dcTypeByNick($nick);
    }
}