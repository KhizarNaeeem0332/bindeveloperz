<?php
function _admin() {
    $project = getTnsSetting();
    return auth($project['prefix'] . "-admin")->user();
}