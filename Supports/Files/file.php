<?php

use App\Classes\Admin\Gen\ExcelExporter;
use Maatwebsite\Excel\Facades\Excel;

function exportToExcel($data, $columns, $title = '', $fileName = null, $fileType = "xlsx") {
    $excel = new ExcelExporter($data, $columns, $title);
    return Excel::download($excel, $fileName . "." . $fileType);
}