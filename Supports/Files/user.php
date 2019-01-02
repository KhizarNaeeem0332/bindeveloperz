<?php
function _user() {
    $project = getTnsSetting();
    return auth($project['prefix'] . "-user")->user();
}