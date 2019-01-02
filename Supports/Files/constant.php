<?php

use App\Supports\Helpers\Constant;
use Illuminate\Support\HtmlString;

if (!function_exists('flagList')) {
    function flagList() {
        return Constant::flagList();
    }
}
if (!function_exists('flagText')) {
    function flagText($str) {
        return Constant::flagText($str);
    }
}

if (!function_exists('genderList')) {
    function genderList() {
        return Constant::genderList();
    }
}
if (!function_exists('genderTitle')) {
    function genderTitle($title) {
        return Constant::genderTitle($title);
    }
}
if (!function_exists('martialStatus')) {
    function martialStatus() {
        return Constant::martialStatus();
    }
}
if (!function_exists('bloodGroupList')) {
    function bloodGroupList() {
        return Constant::bloodGroupList();
    }
}
if (!function_exists('gradesList')) {
    function gradesList() {
        return Constant::gradesList();
    }
}
if (!function_exists('languageList')) {
    function languageList() {
        return Constant::languageList();
    }
}
if (!function_exists('religionsList')) {
    function religionsList() {
        return Constant::religionsList();
    }
}
if (!function_exists('currenyList')) {
    function currenyList() {
        return Constant::currenyList();
    }
}
if (!function_exists('LanguageAbilities')) {
    function LanguageAbilities() {
        return Constant::LanguageAbilities();
    }
}
if (!function_exists('dataTypeList')) {
    function dataTypeList() {
        return Constant::dataTypeList();

    }
}
if (!function_exists('adminImg')) {
    function adminImg($img) {
        return Constant::adminImg($img);
    }
}
if (!function_exists('userImg')) {
    function userImg($img) {
        return Constant::userImg($img);
    }
}
if (!function_exists('loadImg')) {
    function loadImg($img, $path) {
        return Constant::loadImg($img, $path);
    }
}
//Just Functions Not In Class
if (!function_exists('showInvalidErrorPage')) {
    function showInvalidErrorPage($msg = '') {
        return redirect(route('a.invalid.page.show', ['msg' => $msg]))->send();
    }
}
if (!function_exists('hasErrorClass')) {
    function hasErrorClass($errors, $name, $extra = '', $class = "border-danger") {
        if ($errors->has($name) or $errors->has($extra)) {
            return $class;
        }
        return "";
    }
}
if (!function_exists('hasErrorInlineMsg')) {
    function hasErrorInlineMsg($errors, $name, $extra = '') {

        if ($errors->has($name) || $errors->has($extra)) {
            return new HtmlString(' <small class="text-danger">' . $errors->first($name) . " " . $errors->first($extra) . '</small>');
        }
        return "";
    }
}
if (!function_exists('isCurrentUrl')) {
    function isCurrentUrl($routeName) {
        if (is_array($routeName)) {
            return in_array(Route::currentRouteName(), $routeName) ? "active" : "";
        }
        return Route::currentRouteName() == $routeName ? "active" : "";
    }
}
if (!function_exists('actionTitle')) {
    function actionTitle($action) {
        return $action == "create" ? "Save" : "Update";
    }
}