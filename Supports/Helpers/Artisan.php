<?php

namespace App\Supports\Helpers;

use Illuminate\Support\Facades\Route;

class Artisan {

    public static function getRouteNameList() {
        $routes = Route::getRoutes();
        $routeList = [];
        foreach ($routes->getRoutesByName() as $k => $item) {
            $routeList[] = $k;
        };
        return $routeList;
    }

}
