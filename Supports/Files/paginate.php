<?php

use App\Supports\Helpers\Paginate;

if (!function_exists('paginateCount')) {
    function paginateCount($list) {
        return Paginate::countDetail($list);
    }
}
if (!function_exists('paginateCounter')) {
    function paginateCounter($list) {
        return Paginate::counter($list);
    }
}


