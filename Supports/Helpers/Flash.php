<?php

namespace App\Supports\Helpers;

use Illuminate\Support\Facades\Session;

class Flash {

    public static function warning($messages = "") {
        Session::flash("error", 1);
        Session::flash("type", "warning");
        Session::flash("msg", $messages);
    }

    public static function success($messages = "") {
        Session::flash("error", 1);
        Session::flash("type", "success");
        Session::flash("msg", $messages);
    }

    public static function danger($messages = "") {
        Session::flash("error", 1);
        Session::flash("type", "danger");
        Session::flash("msg", $messages);
    }

    public static function info($messages = "") {
        Session::flash("error", 1);
        Session::flash("type", "info");
        Session::flash("msg", $messages);
    }

    public static function toastWarning($msg = "", $title = "Error Info") {
        Session::flash("toast-error", 1);
        Session::flash("toast-msg", $msg);
        Session::flash("toast-title", $title);
        Session::flash("toast-type", "warning");
    }

    public static function toastSuccess($msg = "", $title = "Success Info") {
        Session::flash("toast-error", 1);
        Session::flash("toast-msg", $msg);
        Session::flash("toast-title", $title);
        Session::flash("toast-type", "success");
    }

    public static function toastDanger($msg = "", $title = "Warning Info") {
        Session::flash("toast-error", 1);
        Session::flash("toast-msg", $msg);
        Session::flash("toast-title", $title);
        Session::flash("toast-type", "error");
    }

    public static function toastInfo($msg = "", $title = "Information") {
        Session::flash("toast-error", 1);
        Session::flash("toast-msg", $msg);
        Session::flash("toast-title", $title);
        Session::flash("toast-type", "info");
    }

}