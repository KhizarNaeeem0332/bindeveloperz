<?php

namespace App\Supports\Helpers;
class Paginate {

    public static function countDetail($list) {
        $startFrom = ($list->currentPage() * $list->perPage()) - $list->perPage();
        $startFrom = $startFrom + 1;
        $endAt = $list->currentPage() * $list->perPage();
        return "Found ".numberFormat($list->total())." records, Displaying {$startFrom} to {$endAt}";
    }

    public static function counter($list) {
        $startFrom = ($list->currentPage() * $list->perPage()) - $list->perPage();
        return $startFrom;
    }

}