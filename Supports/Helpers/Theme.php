<?php

namespace App\Supports\Helpers;

use Illuminate\Support\HtmlString;

class Theme {

    public static function backgroundColors() {

        return [
            /*BG B4*/
            "bg-primary" => "primary",
            "bg-secondary" => "secondary",
            "bg-success" => "success",
            "bg-danger" => "danger",
            "bg-warning" => "warning",
            "bg-info" => "info",
            "bg-light" => "light",
            "bg-dark" => "dark",
            "bg-white" => "white",
            "bg-gradient-primary" => "gradient-primary",
            "bg-gradient-secondary" => "gradient-secondary",
            "bg-gradient-success" => "gradient-success",
            "bg-gradient-danger" => "gradient-danger",
            "bg-gradient-warning" => "gradient-warning",
            "bg-gradient-info" => "gradient-info",
            "bg-gradient-light" => "gradient-light",
            "bg-gradient-dark" => "gradient-dark",
            /*App Custom*/
            "bg-red" => "red",
            "bg-yellow" => "yellow",
            "bg-aqua" => "aqua",
            "bg-blue" => "blue",
            "bg-light-blue" => "light-blue",
            "bg-green" => "green",
            "bg-navy" => "navy",
            "bg-teal" => "teal",
            "bg-olive" => "olive",
            "bg-lime" => "lime",
            "bg-orange" => "orange",
            "bg-fuchsia" => "fuchsia",
            "bg-purple" => "purple",
            "bg-maroon" => "maroon",
            "bg-black" => "black",
            "bg-red-active" => "red-active",
            "bg-yellow-active" => "yellow-active",
            "bg-aqua-active" => "aqua-active",
            "bg-blue-active" => "blue-active",
            "bg-light-blue-active" => "light-blue-active",
            "bg-green-active" => "green-active",
            "bg-navy-active" => "navy-active",
            "bg-teal-active" => "teal-active",
            "bg-olive-active" => "olive-active",
            "bg-lime-active" => "lime-active",
            "bg-orange-active" => "orange-active",
            "bg-fuchsia-active" => "fuchsia-active",
            "bg-purple-active" => "purple-active",
            "bg-maroon-active" => "maroon-active",
            "bg-muted-lighter" => "muted-lighter",
            "bg-muted" => "muted",
            "bg-muted-light" => "muted-light",
            "bg-muted-dark" => "muted-dark",
            "bg-muted-darker" => "muted-darker",
            "bg-primary-light" => "primary-light",
            "bg-primary-lighter" => "primary-lighter",
            "bg-primary-dark" => "primary-dark",
            "bg-primary-darker" => "primary-darker",
            "bg-success-light" => "success-light",
            "bg-success-lighter" => "success-lighter",
            "bg-success-dark" => "success-dark",
            "bg-success-darker" => "success-darker",
            "bg-info-light" => "info-light",
            "bg-info-lighter" => "info-lighter",
            "bg-info-dark" => "info-dark",
            "bg-info-darker" => "info-darker",
            "bg-warning-light" => "warning-light",
            "bg-warning-lighter" => "warning-lighter",
            "bg-warning-dark" => "warning-dark",
            "bg-warning-darker" => "warning-darker",
            "bg-danger-light" => "danger-light",
            "bg-danger-lighter" => "danger-lighter",
            "bg-danger-dark" => "danger-dark",
            "bg-danger-darker" => "danger-darker",
            "bg-alert" => "alert",
            "bg-alert-light" => "alert-light",
            "bg-alert-lighter" => "alert-lighter",
            "bg-alert-dark" => "alert-dark",
            "bg-alert-darker" => "alert-darker",
            "bg-system" => "system",
            "bg-system-light" => "system-light",
            "bg-system-lighter" => "system-lighter",
            "bg-system-dark" => "system-dark",
            "bg-system-darker" => "system-darker",
            "bg-dark-light" => "dark-light",
            "bg-dark-lighter" => "dark-lighter",
            "bg-dark-dark" => "dark-dark",
            "bg-dark-darker" => "dark-darker",
        ];
    }

    public static function textColors() {

        return [
            /*Text Classes B4*/
            "text-primary" => "text-primary",
            "text-second" => "text-second",
            "text-success" => " text-success",
            "text-danger" => "text-danger",
            "text-warning" => "text-warning",
            "text-info" => "text-info ",
            "text-red" => "red",
            "text-yellow" => "yellow",
            "text-aqua" => "aqua",
            "text-blue" => "blue",
            "text-light" => "text-light",
            "text-dark" => "text-dark",
            "text-muted" => "text-muted",
            "text-white" => "text-white",
            /*Text Classes Custom*/
            "text-light-blue" => "light-blue",
            "text-green" => "green",
            "text-navy" => "navy",
            "text-teal" => "teal",
            "text-olive" => "olive",
            "text-lime" => "lime",
            "text-orange" => "orange",
            "text-fuchsia" => "fuchsia",
            "text-purple" => "purple",
            "text-maroon" => "maroon",
            "text-black" => "black",
            "text-red-active" => "red-active",
            "text-yellow-active" => "yellow-active",
            "text-aqua-active" => "aqua-active",
            "text-blue-active" => "blue-active",
            "text-light-blue-active" => "light-blue-active",
            "text-green-active" => "green-active",
            "text-navy-active" => "navy-active",
            "text-teal-active" => "teal-active",
            "text-olive-active" => "olive-active",
            "text-lime-active" => "lime-active",
            "text-orange-active" => "orange-active",
            "text-fuchsia-active" => "fuchsia-active",
            "text-purple-active" => "purple-active",
            "text-maroon-active" => "maroon-active",
            "text-muted-lighter" => "muted-lighter",
            "text-muted-light" => "muted-light",
            "text-muted-dark" => "muted-dark",
            "text-muted-darker" => "muted-darker",
            "text-primary-light" => "primary-light",
            "text-primary-lighter" => "primary-lighter",
            "text-primary-dark" => "primary-dark",
            "text-primary-darker" => "primary-darker",
            "text-success-light" => "success-light",
            "text-success-lighter" => "success-lighter",
            "text-success-dark" => "success-dark",
            "text-success-darker" => "success-darker",
            "text-info-light" => "info-light",
            "text-info-lighter" => "info-lighter",
            "text-info-dark" => "info-dark",
            "text-info-darker" => "info-darker",
            "text-warning-light" => "warning-light",
            "text-warning-lighter" => "warning-lighter",
            "text-warning-dark" => "warning-dark",
            "text-warning-darker" => "warning-darker",
            "text-danger-light" => "danger-light",
            "text-danger-lighter" => "danger-lighter",
            "text-danger-dark" => "danger-dark",
            "text-danger-darker" => "danger-darker",
            "text-alert" => "alert",
            "text-alert-light" => "alert-light",
            "text-alert-lighter" => "alert-lighter",
            "text-alert-dark" => "alert-dark",
            "text-alert-darker" => "alert-darker",
            "text-system" => "system",
            "text-system-light" => "system-light",
            "text-system-lighter" => "system-lighter",
            "text-system-dark" => "system-dark",
            "text-system-darker" => "system-darker",
            "text-dark-light" => "dark-light",
            "text-dark-lighter" => "dark-lighter",
            "text-dark-dark" => "dark-dark",
            "text-dark-darker" => "dark-darker",
        ];
    }



    public static function buttonDesign() {

        return [
            'btn-primary' => 'Primary',
            'btn-secondary' => 'Secondary',
            'btn-success' => 'Success',
            'btn-info' => 'Info',
            'btn-warning' => 'Warning',
            'btn-danger' => 'Danger',
            'btn-dark' => 'Dark',
            'btn-outline-primary' => 'Primary Outline',
            'btn-outline-secondary' => 'Secondary Outline',
            'btn-outline-success' => 'Success Outline',
            'btn-outline-info' => 'Info Outline',
            'btn-outline-warning' => 'Warning Outline',
            'btn-outline-danger' => 'Danger Outline',
            'btn-outline-dark' => 'Dark Outline',
            'btn-link' => 'Link',
            'btn-primary btn-rounded btn-primary' => 'Primary Rounded',
            'btn-secondary btn-rounded btn-secondary' => 'Secondary Rounded',
            'btn-success btn-rounded btn-success' => 'Success Rounded',
            'btn-info btn-rounded btn-info' => 'Info Rounded',
            'btn-warning btn-rounded btn-warning' => 'Warning Rounded',
            'btn-danger btn-rounded btn-danger' => 'Danger Rounded',
            'btn-dark btn-rounded btn-dark' => 'Dark Rounded',
            'btn-rounded btn-outline-primary' => 'Primary Rounded Outline',
            'btn-rounded btn-outline-secondary' => 'Secondary Rounded Outline',
            'btn-rounded btn-outline-success' => 'Success Rounded Outline',
            'btn-rounded btn-outline-info' => 'Info Rounded Outline',
            'btn-rounded btn-outline-warning' => 'Warning Rounded Outline',
            'btn-rounded btn-outline-danger' => 'Danger Rounded Outline',
            'btn-rounded btn-outline-dark' => 'Dark Rounded Outline',
        ];
    }

    public static function buttonSize() {

        return [
            'btn-xs' => 'Tiny',
            'btn-sm' => 'Small',
            '' => 'Normal',
            'btn-lg' => 'Large',
        ];
    }

    public static function cardOutline() {

        return [
            'card' => 'Default',
            'card card-outline-primary' => 'Primary Outline',
            'card card-outline-info' => 'Info Outline',
            'card card-outline-success' => 'Success Outline',
            'card card-outline-warning' => 'Warning Outline',
            'card card-outline-danger' => 'Danger Outline',
            'card card-outline-inverse' => 'Dark Outline',
            'card card-inverse card-primary' => 'Invers Primary Outline',
            'card card-inverse card-info' => 'Invers Info Outline',
            'card card-inverse card-success' => 'Invers Success Outline',
            'card card-inverse card-warning' => 'Invers Warning Outline',
            'card card-inverse card-danger' => 'Invers Danger Outline',
        ];
    }

    public static function animateCss($key) {

        $animations = [
            "bounce" => "wow bounce",
            "flash" => "wow flash",
            "pulse" => "wow pulse",
            "rubberBand" => "wow rubberBand",
            "shake" => "wow shake",
            "headShake" => "wow headShake",
            "swing" => "wow swing",
            "tada" => "wow tada",
            "wobble" => "wow wobble",
            "jello" => "wow jello",
            "bounceIn" => "wow bounceIn",
            "bounceInDown" => "wow bounceInDown",
            "bounceInLeft" => "wow bounceInLeft",
            "bounceInRight" => "wow bounceInRight",
            "bounceInUp" => "wow bounceInUp",
            "bounceOut" => "wow bounceOut",
            "bounceOutDown" => "wow bounceOutDown",
            "bounceOutLeft" => "wow bounceOutLeft",
            "bounceOutRight" => "wow bounceOutRight",
            "bounceOutUp" => "wow bounceOutUp",
            "fadeIn" => "wow fadeIn",
            "fadeInDown" => "wow fadeInDown",
            "fadeInDownBig" => "wow fadeInDownBig",
            "fadeInLeft" => "wow fadeInLeft",
            "fadeInLeftBig" => "wow fadeInLeftBig",
            "fadeInRight" => "wow fadeInRight",
            "fadeInRightBig" => "wow fadeInRightBig",
            "fadeInUp" => "wow fadeInUp",
            "fadeInUpBig" => "wow fadeInUpBig",
            "fadeOut" => "wow fadeOut",
            "fadeOutDown" => "wow fadeOutDown",
            "fadeOutDownBig" => "wow fadeOutDownBig",
            "fadeOutLeft" => "wow fadeOutLeft",
            "fadeOutLeftBig" => "wow fadeOutLeftBig",
            "fadeOutRight" => "wow fadeOutRight",
            "fadeOutRightBig" => "wow fadeOutRightBig",
            "fadeOutUp" => "wow fadeOutUp",
            "fadeOutUpBig" => "wow fadeOutUpBig",
            "flipInX" => "wow flipInX",
            "flipInY" => "wow flipInY",
            "flipOutX" => "wow flipOutX",
            "flipOutY" => "wow flipOutY",
            "lightSpeedIn" => "wow lightSpeedIn",
            "lightSpeedOut" => "wow lightSpeedOut",
            "rotateIn" => "wow rotateIn",
            "rotateInDownLeft" => "wow rotateInDownLeft",
            "rotateInDownRight" => "wow rotateInDownRight",
            "rotateInUpLeft" => "wow rotateInUpLeft",
            "rotateInUpRight" => "wow rotateInUpRight",
            "rotateOut" => "wow rotateOut",
            "rotateOutDownLeft" => "wow rotateOutDownLeft",
            "rotateOutDownRight" => "wow rotateOutDownRight",
            "rotateOutUpLeft" => "wow rotateOutUpLeft",
            "rotateOutUpRight" => "wow rotateOutUpRight",
            "hinge" => "wow hinge",
            "rollIn" => "wow rollIn",
            "rollOut" => "wow rollOut",
            "zoomIn" => "wow zoomIn",
            "zoomInDown" => "wow zoomInDown",
            "zoomInLeft" => "wow zoomInLeft",
            "zoomInRight" => "wow zoomInRight",
            "zoomInUp" => "wow zoomInUp",
            "zoomOut" => "wow zoomOut",
            "zoomOutDown" => "wow zoomOutDown",
            "zoomOutLeft" => "wow zoomOutLeft",
            "zoomOutRight" => "wow zoomOutRight",
            "zoomOutUp" => "wow zoomOutUp",
            "slideInDown" => "wow slideInDown",
            "slideInLeft" => "wow slideInLeft",
            "slideInRight" => "wow slideInRight",
            "slideInUp" => "wow slideInUp",
            "slideOutDown" => "wow slideOutDown",
            "slideOutLeft" => "wow slideOutLeft",
            "slideOutRight" => "wow slideOutRight",
            "slideOutUp" => "wow slideOutUp",
        ];
        return $animations[$key];
    }

    public static function randomBgColor($countarray) {

        $bgcolorsarray = self::backgroundColors();
        shuffle($bgcolorsarray);
        $bgcolorsize = sizeof($bgcolorsarray);
        return $bgcolorsarray[rand(0, $bgcolorsize - 1) % count($countarray)];
    }

    public static function randomTextColor($countarray) {

        $textcolorsarray = self::textColors();
        shuffle($textcolorsarray);
        $textcolorsize = sizeof($textcolorsarray);
        return $textcolorsarray[rand(0, $textcolorsize - 1) % count($countarray)];
    }

    public static function flagBtn($val = '') {
        return (bool)$val ? 'btn-primary' : 'btn-danger';
    }

    public static function flagBadge($flag = '') {
        $class = (bool)$flag ? 'btn-outline-primary' : 'btn-outline-danger ';
        $text = (bool)$flag ? 'Active' : 'Inactive';
        return new HtmlString('<span class="btn btn-sm ' . $class . ' round">' . $text . '</span>');
    }

    public static function boolCheck($val) {

        return (bool)$val ? 'fa fa-check ' : 'fa fa-times ';
    }

    public static function boolCompleted($val) {

        return (bool)$val ? 'text-primary ' : 'text-warning ';
    }

    public static function boolShowHide($val) {
        return (bool)$val ? '' : 'd-none';
    }

    public static function onZeroHide($val) {
        return $val == 0 ? 'd-none' : '';
    }

    public static function onOneHide($val) {
        return $val == 1 ? 'd-none' : '';
    }

    public static function perBtn($value) {

        if ($value <= 30) {
            $type = 'btn btn-outline-danger';
        } elseif ($value <= 45) {
            $type = 'btn btn-outline-warning';
        } elseif ($value <= 60) {
            $type = 'btn btn-outline-info';
        } elseif ($value <= 80) {
            $type = 'btn btn-outline-primary';
        } else {
            $type = 'btn btn-outline-success';
        }
        return $type;

    }




    public static  function btnColorList()
    {
        return [
            "btn-secondary" => "Secondary",
            "btn-primary" => "Primary",
            "btn-success" => "Success",
            "btn-info" => "Info",
            "btn-warning" => "Warning",
            "btn-danger" => "Danger",
            "btn-light" => "Light",
            "btn-dark" => "Dark",
        ];
    }

    public  static function btnShapeList()
    {
        return [
            "square" => "Square",
            "round" => "Rounded",
        ];
    }

    public static function btnEffectList()
    {
        return [
            "btn-glow" => "Glow",
            "box-shadow-1" => "Shadow 1",
            "box-shadow-2" => "Shadow 2",
            "box-shadow-3" => "Shadow 3",
            "box-shadow-4" => "Shadow 4",
            "box-shadow-5" => "Shadow 5",
        ];
    }

    public static function table()
    {
        return [
            "color" => [
                "" => "Simple",
                "table-inverse" => "Table Inverse",
                "table-secondary" => "Table Secondary",
                "table-primary" => "Table Primary",
                "table-success" => "Table Success",
                "table-info" => "Table Info",
                "table-warning" => "Table Warning",
                "table-danger" => "Table Danger",
                "table-light" => "Table Light",
                "table-dark" => "Table Dark",

                "bg-secondary white" => "Background Secondary",
                "bg-primary white" => "Background Primary",
                "bg-success white" => "Background Success",
                "bg-info white" => "Background Info",
                "bg-warning white" => "Background Warning",
                "bg-danger white" => "Background Danger",
                "bg-light white" => "Background Light",
                "bg-dark white" => "Background Dark",
            ],
            "style" => [
                "table-bordered" => "Border",
                "table-hover" => "Hover",
                "table-borderless" => "BorderLess",
                "border-solid" => "Solid Border",
                "table-striped" => "Stripped"
            ],
            "size" => [
                "table-de" => "Default",
                "table-xl" => "Extra Large",
                "table-lg" => "Large",
                "table-sm" => "Small",
                "table-xs" => "Extra Small",
            ]
        ];
    }

    public static function tableHead() {

        return [
            "background" =>  [
                '' => 'Simple',
                /*BG B4*/
                "bg-primary" => "primary",
                "bg-secondary" => "secondary",
                "bg-success" => "success",
                "bg-danger" => "danger",
                "bg-warning" => "warning",
                "bg-info" => "info",
                "bg-light" => "light",
                "bg-dark" => "dark",
                "bg-white" => "white",
                "bg-gradient-primary bg-primary" => "gradient-primary",
                "bg-gradient-secondary bg-secondary" => "gradient-secondary",
                "bg-gradient-success bg-success" => "gradient-success",
                "bg-gradient-danger bg-danger" => "gradient-danger",
                "bg-gradient-warning bg-warning" => "gradient-warning",
                "bg-gradient-info bg-info" => "gradient-info",
                "bg-gradient-light bg-light" => "gradient-light",
                "bg-gradient-dark bg-dark" => "gradient-dark",
                /*Custom Colors*/
                "bg-red gradient-dark" => "red",
                "bg-yellow gradient-dark" => "yellow",
                "bg-aqua gradient-dark" => "aqua",
                "bg-blue gradient-dark" => "blue",
                "bg-light-blue gradient-dark" => "light-blue",
                "bg-green gradient-dark" => "green",
                "bg-navy gradient-dark" => "navy",
                "bg-teal gradient-dark" => "teal",
                "bg-olive gradient-dark" => "olive",
                "bg-lime gradient-dark" => "lime",
                "bg-orange gradient-dark" => "orange",
                "bg-fuchsia gradient-dark" => "fuchsia",
                "bg-purple gradient-dark" => "purple",
                "bg-maroon gradient-dark" => "maroon",
                "bg-black gradient-dark" => "black",
                "bg-red-active gradient-dark" => "red-active",
                "bg-yellow-active gradient-dark" => "yellow-active",
                "bg-aqua-active gradient-dark" => "aqua-active",
                "bg-blue-active gradient-dark" => "blue-active",
                "bg-light-blue-active gradient-dark" => "light-blue-active",
                "bg-green-active gradient-dark" => "green-active",
                "bg-navy-active gradient-dark" => "navy-active",
                "bg-teal-active gradient-dark" => "teal-active",
                "bg-olive-active gradient-dark" => "olive-active",
                "bg-lime-active gradient-dark" => "lime-active",
                "bg-orange-active gradient-dark" => "orange-active",
                "bg-fuchsia-active gradient-dark" => "fuchsia-active",
                "bg-purple-active gradient-dark" => "purple-active",
                "bg-maroon-active gradient-dark" => "maroon-active",
                "bg-muted-lighter gradient-dark" => "muted-lighter",
                "bg-white" => "white",
                "bg-white-light gradient-dark" => "white-light",
                "bg-white-lighter gradient-dark" => "white-lighter",
                "bg-white-dark gradient-dark" => "white-dark",
                "bg-white-darker gradient-dark" => "white-darker",
                "bg-muted gradient-dark" => "muted",
                "bg-muted-light gradient-dark" => "muted-light",
                "bg-muted-dark gradient-dark" => "muted-dark",
                "bg-muted-darker gradient-dark" => "muted-darker",
                "bg-primary gradient-dark" => "primary",
                "bg-primary-light gradient-dark" => "primary-light",
                "bg-primary-lighter gradient-dark" => "primary-lighter",
                "bg-primary-dark gradient-dark" => "primary-dark",
                "bg-primary-darker gradient-dark" => "primary-darker",
                "bg-success gradient-dark" => "success",
                "bg-success-light gradient-dark" => "success-light",
                "bg-success-lighter gradient-dark" => "success-lighter",
                "bg-success-dark gradient-dark" => "success-dark",
                "bg-success-darker gradient-dark" => "success-darker",
                "bg-info gradient-dark" => "info",
                "bg-info-light" => "info-light",
                "bg-info-lighter" => "info-lighter",
                "bg-info-dark" => "info-dark",
                "bg-info-darker" => "info-darker",
                "bg-warning-light" => "warning-light",
                "bg-warning-lighter" => "warning-lighter",
                "bg-warning-dark" => "warning-dark",
                "bg-warning-darker" => "warning-darker",
                "bg-danger-light" => "danger-light",
                "bg-danger-lighter" => "danger-lighter",
                "bg-danger-dark" => "danger-dark",
                "bg-danger-darker" => "danger-darker",
                "bg-alert" => "alert",
                "bg-alert-light" => "alert-light",
                "bg-alert-lighter" => "alert-lighter",
                "bg-alert-dark" => "alert-dark",
                "bg-alert-darker" => "alert-darker",
                "bg-system" => "system",
                "bg-system-light" => "system-light",
                "bg-system-lighter" => "system-lighter",
                "bg-system-dark" => "system-dark",
                "bg-system-darker" => "system-darker",
                "bg-dark-light" => "dark-light",
                "bg-dark-lighter" => "dark-lighter",
                "bg-dark-dark" => "dark-dark",
                "bg-dark-darker" => "dark-darker",
            ],
            "color" => [
                "text-secondary" => "Secondary",
                "text-primary" => "Primary",
                "text-success" => "Success",
                "text-info" => "Info",
                "text-warning" => "Warning",
                "text-danger" => "Danger",
                "text-white" => "White",
                "text-light" => "Light",
                "text-black" => "Dark",
            ]
        ];
    }

    public static function navbar()
    {
        return [
            "color" => [
                "" => "Simple",
                "navbar-light" => "Light",
                "navbar-light bg-amber bg-lighten-5" => "Amber",
                "navbar-light bg-blue bg-lighten-5" => "Light Blue",
                "navbar-light bg-red bg-lighten-5" => "Light Red",
                "navbar-dark" => "Dark",
                "navbar-semi-dark" => "Semi Dark",
                "bg-teal" => "Teal",
                "bg-blue-grey" => "Blue Grey",
                "bg-purple" => "Purple",
                "bg-darken-1" => "Darken 1",
                "bg-darken-2" => "Darken 2",
                "bg-darken-3" => "Darken 3",
                "bg-darken-4" => "Darken 4",
                "bg-darken-6" => "Darken 6",
                "bg-lighten-1" => "Lighten 1",
                "bg-lighten-2" => "Lighten 2",
                "bg-lighten-3" => "Lighten 3",
                "bg-lighten-4" => "Lighten 4",
                "bg-lighten-5" => "Lighten 5",
            ],
            "effect" => [
                "navbar-border" => "Border",
                "navbar-shadow" => "Shadow",
                "navbar-static-top" => "Static Top",
                "navbar-hide-on-scroll" => "Hide On Scroll",
            ],
            "border" => [
                "border-grey" => "Grey",
                "border-teal" => "Teal",
                "border-blue" => "Blue",
                "border-Red" => "Red",
                "border-amber" => "Amber",
                "bg-blue-grey" => "Blue Grey",
                "bg-purple" => "Purple",
                "border-darken-1" => "Darken 1",
                "border-darken-2" => "Darken 2",
                "border-darken-3" => "Darken 3",
                "border-darken-4" => "Darken 4",
                "border-darken-5" => "Darken 5",
                "border-lighten-1" => "Lighten 1",
                "border-lighten-2" => "Lighten 2",
                "border-lighten-3" => "Lighten 3",
                "border-lighten-4" => "Lighten 4",
                "border-lighten-5" => "Lighten 5",
            ]
        ];
    }

    public static function footer()
    {
        return [
            "color" => [
                "" => "Simple",
                "footer-light" => "Light",
                "footer-dark" => "Dark",
                "footer-transparent" => "Transparent",
            ],
            "effect" => [
                "fixed-bottom" => "Fixed Bottom",
                "footer-border" => "Border",
                "footer-shadow" => "Shadow",
                "footer-static" => "Static",
            ]
        ];
    }

    public static function sidebar()
    {
        return [
            "effect" => [
                "menu-static" => "Static",
                "menu-collapsible" => "Collapsible",
                "menu-Shadow" => "Shadow",
                "menu-native-scroll" => "Native Scroll",
                "menu-bordered" => "Border Menu",
            ],
            "color" => [
                "" => "Simple",
                "menu-light" => "Light",
                "menu-dark" => "Dark",
            ]
        ];
    }


    public static function reportHead() {

        return [
            "background" => [
                '' => 'Simple',
                /*BG B4*/
                "bg-primary" => "primary",
                "bg-secondary" => "secondary",
                "bg-success" => "success",
                "bg-danger" => "danger",
                "bg-warning" => "warning",
                "bg-info" => "info",
                "bg-light" => "light",
                "bg-dark" => "dark",
                "bg-white" => "white",
                "bg-gradient-primary" => "gradient-primary",
                "bg-gradient-secondary" => "gradient-secondary",
                "bg-gradient-success" => "gradient-success",
                "bg-gradient-danger" => "gradient-danger",
                "bg-gradient-warning" => "gradient-warning",
                "bg-gradient-info" => "gradient-info",
                "bg-gradient-light" => "gradient-light",
                "bg-gradient-dark" => "gradient-dark",
                /*Custom Colors*/
                "bg-red gradient-dark" => "red",
                "bg-yellow gradient-dark" => "yellow",
                "bg-aqua gradient-dark" => "aqua",
                "bg-blue gradient-dark" => "blue",
                "bg-light-blue gradient-dark" => "light-blue",
                "bg-green gradient-dark" => "green",
                "bg-navy gradient-dark" => "navy",
                "bg-teal gradient-dark" => "teal",
                "bg-olive gradient-dark" => "olive",
                "bg-lime gradient-dark" => "lime",
                "bg-orange gradient-dark" => "orange",
                "bg-fuchsia gradient-dark" => "fuchsia",
                "bg-purple gradient-dark" => "purple",
                "bg-maroon gradient-dark" => "maroon",
                "bg-black gradient-dark" => "black",
                "bg-red-active gradient-dark" => "red-active",
                "bg-yellow-active gradient-dark" => "yellow-active",
                "bg-aqua-active gradient-dark" => "aqua-active",
                "bg-blue-active gradient-dark" => "blue-active",
                "bg-light-blue-active gradient-dark" => "light-blue-active",
                "bg-green-active gradient-dark" => "green-active",
                "bg-navy-active gradient-dark" => "navy-active",
                "bg-teal-active gradient-dark" => "teal-active",
                "bg-olive-active gradient-dark" => "olive-active",
                "bg-lime-active gradient-dark" => "lime-active",
                "bg-orange-active gradient-dark" => "orange-active",
                "bg-fuchsia-active gradient-dark" => "fuchsia-active",
                "bg-purple-active gradient-dark" => "purple-active",
                "bg-maroon-active gradient-dark" => "maroon-active",
                "bg-muted-lighter gradient-dark" => "muted-lighter",
                "bg-white-light gradient-dark" => "white-light",
                "bg-white-lighter gradient-dark" => "white-lighter",
                "bg-white-dark gradient-dark" => "white-dark",
                "bg-white-darker gradient-dark" => "white-darker",
                "bg-muted gradient-dark" => "muted",
                "bg-muted-light gradient-dark" => "muted-light",
                "bg-muted-dark gradient-dark" => "muted-dark",
                "bg-muted-darker gradient-dark" => "muted-darker",
                "bg-primary gradient-dark" => "primary",
                "bg-primary-light gradient-dark" => "primary-light",
                "bg-primary-lighter gradient-dark" => "primary-lighter",
                "bg-primary-dark gradient-dark" => "primary-dark",
                "bg-primary-darker gradient-dark" => "primary-darker",
                "bg-success gradient-dark" => "success",
                "bg-success-light gradient-dark" => "success-light",
                "bg-success-lighter gradient-dark" => "success-lighter",
                "bg-success-dark gradient-dark" => "success-dark",
                "bg-success-darker gradient-dark" => "success-darker",
                "bg-info gradient-dark" => "info",
                "bg-info-light" => "info-light",
                "bg-info-lighter" => "info-lighter",
                "bg-info-dark" => "info-dark",
                "bg-info-darker" => "info-darker",
                "bg-warning-light" => "warning-light",
                "bg-warning-lighter" => "warning-lighter",
                "bg-warning-dark" => "warning-dark",
                "bg-warning-darker" => "warning-darker",
                "bg-danger-light" => "danger-light",
                "bg-danger-lighter" => "danger-lighter",
                "bg-danger-dark" => "danger-dark",
                "bg-danger-darker" => "danger-darker",
                "bg-alert" => "alert",
                "bg-alert-light" => "alert-light",
                "bg-alert-lighter" => "alert-lighter",
                "bg-alert-dark" => "alert-dark",
                "bg-alert-darker" => "alert-darker",
                "bg-system" => "system",
                "bg-system-light" => "system-light",
                "bg-system-lighter" => "system-lighter",
                "bg-system-dark" => "system-dark",
                "bg-system-darker" => "system-darker",
                "bg-dark-light" => "dark-light",
                "bg-dark-lighter" => "dark-lighter",
                "bg-dark-dark" => "dark-dark",
                "bg-dark-darker" => "dark-darker",
            ],
            "color" => [
                "text-white" => "White",
                "text-black" => "Black",
                "text-dark" => "Dark",
            ]
        ];
    }

    public static function reportFooter() {

        return [
            "background" => [
                '' => 'Simple',
                /*BG B4*/
                "bg-primary" => "primary",
                "bg-secondary" => "secondary",
                "bg-success" => "success",
                "bg-danger" => "danger",
                "bg-warning" => "warning",
                "bg-info" => "info",
                "bg-light" => "light",
                "bg-dark" => "dark",
                "bg-white" => "white",
                "bg-gradient-primary" => "gradient-primary",
                "bg-gradient-secondary" => "gradient-secondary",
                "bg-gradient-success" => "gradient-success",
                "bg-gradient-danger" => "gradient-danger",
                "bg-gradient-warning" => "gradient-warning",
                "bg-gradient-info" => "gradient-info",
                "bg-gradient-light" => "gradient-light",
                "bg-gradient-dark" => "gradient-dark",
                /*Custom Colors*/
                "bg-red gradient-dark" => "red",
                "bg-yellow gradient-dark" => "yellow",
                "bg-aqua gradient-dark" => "aqua",
                "bg-blue gradient-dark" => "blue",
                "bg-light-blue gradient-dark" => "light-blue",
                "bg-green gradient-dark" => "green",
                "bg-navy gradient-dark" => "navy",
                "bg-teal gradient-dark" => "teal",
                "bg-olive gradient-dark" => "olive",
                "bg-lime gradient-dark" => "lime",
                "bg-orange gradient-dark" => "orange",
                "bg-fuchsia gradient-dark" => "fuchsia",
                "bg-purple gradient-dark" => "purple",
                "bg-maroon gradient-dark" => "maroon",
                "bg-black gradient-dark" => "black",
                "bg-red-active gradient-dark" => "red-active",
                "bg-yellow-active gradient-dark" => "yellow-active",
                "bg-aqua-active gradient-dark" => "aqua-active",
                "bg-blue-active gradient-dark" => "blue-active",
                "bg-light-blue-active gradient-dark" => "light-blue-active",
                "bg-green-active gradient-dark" => "green-active",
                "bg-navy-active gradient-dark" => "navy-active",
                "bg-teal-active gradient-dark" => "teal-active",
                "bg-olive-active gradient-dark" => "olive-active",
                "bg-lime-active gradient-dark" => "lime-active",
                "bg-orange-active gradient-dark" => "orange-active",
                "bg-fuchsia-active gradient-dark" => "fuchsia-active",
                "bg-purple-active gradient-dark" => "purple-active",
                "bg-maroon-active gradient-dark" => "maroon-active",
                "bg-muted-lighter gradient-dark" => "muted-lighter",
                "bg-white-light gradient-dark" => "white-light",
                "bg-white-lighter gradient-dark" => "white-lighter",
                "bg-white-dark gradient-dark" => "white-dark",
                "bg-white-darker gradient-dark" => "white-darker",
                "bg-muted gradient-dark" => "muted",
                "bg-muted-light gradient-dark" => "muted-light",
                "bg-muted-dark gradient-dark" => "muted-dark",
                "bg-muted-darker gradient-dark" => "muted-darker",
                "bg-primary gradient-dark" => "primary",
                "bg-primary-light gradient-dark" => "primary-light",
                "bg-primary-lighter gradient-dark" => "primary-lighter",
                "bg-primary-dark gradient-dark" => "primary-dark",
                "bg-primary-darker gradient-dark" => "primary-darker",
                "bg-success gradient-dark" => "success",
                "bg-success-light gradient-dark" => "success-light",
                "bg-success-lighter gradient-dark" => "success-lighter",
                "bg-success-dark gradient-dark" => "success-dark",
                "bg-success-darker gradient-dark" => "success-darker",
                "bg-info gradient-dark" => "info",
                "bg-info-light" => "info-light",
                "bg-info-lighter" => "info-lighter",
                "bg-info-dark" => "info-dark",
                "bg-info-darker" => "info-darker",
                "bg-warning-light" => "warning-light",
                "bg-warning-lighter" => "warning-lighter",
                "bg-warning-dark" => "warning-dark",
                "bg-warning-darker" => "warning-darker",
                "bg-danger-light" => "danger-light",
                "bg-danger-lighter" => "danger-lighter",
                "bg-danger-dark" => "danger-dark",
                "bg-danger-darker" => "danger-darker",
                "bg-alert" => "alert",
                "bg-alert-light" => "alert-light",
                "bg-alert-lighter" => "alert-lighter",
                "bg-alert-dark" => "alert-dark",
                "bg-alert-darker" => "alert-darker",
                "bg-system" => "system",
                "bg-system-light" => "system-light",
                "bg-system-lighter" => "system-lighter",
                "bg-system-dark" => "system-dark",
                "bg-system-darker" => "system-darker",
                "bg-dark-light" => "dark-light",
                "bg-dark-lighter" => "dark-lighter",
                "bg-dark-dark" => "dark-dark",
                "bg-dark-darker" => "dark-darker",
            ],
            "color" => [
                "text-white" => "White",
                "text-black" => "Black",
                "text-dark" => "Dark",
            ]
        ];
    }



    //CARD

    public static function cardFooter()
    {
        return [
            "background" => [
                "" => "Simple",
                "bg-transparent" => "Transparent",
                "bg-secondary" => "Secondary",
                "bg-primary" => "Primary",
                "bg-success" => "Success",
                "bg-info" => "Info",
                "bg-warning" => "Warning",
                "bg-danger" => "Danger",
                "bg-light" => "Light",
                "bg-dark" => "Dark",
            ],
            "color" => [
                "text-secondary" => "Secondary",
                "text-primary" => "Primary",
                "text-success" => "Success",
                "text-info" => "Info",
                "text-warning" => "Warning",
                "text-danger" => "Danger",
                "text-light" => "Light",
                "text-black" => "Dark",
            ]
        ];
    }


    public static function card()
    {
        return [
            "background" => [
                "" => "Simple",
                "bg-transparent" => "Transparent",
                "bg-secondary" => "Secondary",
                "bg-primary" => "Primary",
                "bg-success" => "Success",
                "bg-info" => "Info",
                "bg-warning" => "Warning",
                "bg-danger" => "Danger",
                "bg-light" => "Light",
                "bg-dark" => "Dark",
            ],
            "color" => [
                "border-secondary" => "Secondary",
                "border-primary" => "Primary",
                "border-success" => "Success",
                "border-info" => "Info",
                "border-warning" => "Warning",
                "border-danger" => "Danger",
                "border-light" => "Light",
                "border-black" => "Dark",
            ],
            "effect" => [
                "box-shadow" => "Shadow",
                "border-1" => "Border 1",
                "border-2" => "Border 2",
                "border-3" => "Border 3",
                "border-4" => "Border 4",
                "border-5" => "Border 5",
            ],

        ];
    }

    public static function cardHead()
    {
        return [
            "background" => [
                "" => "Simple",
                "bg-transparent" => "Transparent",
                "bg-secondary" => "Secondary",
                "bg-primary" => "Primary",
                "bg-success" => "Success",
                "bg-info" => "Info",
                "bg-warning" => "Warning",
                "bg-danger" => "Danger",
                "bg-light" => "Light",
                "bg-dark" => "Dark",
            ],
            "color" => [
                "text-secondary" => "Secondary",
                "text-primary" => "Primary",
                "text-success" => "Success",
                "text-info" => "Info",
                "text-warning" => "Warning",
                "text-danger" => "Danger",
                "text-light" => "Light",
                "text-black" => "Dark",
            ]
        ];
    }






}