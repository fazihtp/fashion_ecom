<?php defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\IOFactory;

if (!function_exists('get_excel_row_count')) {
    function get_excel_row_count($filePath)
    {
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        
        return $worksheet->getHighestDataRow();
    }
}
if (!function_exists('get_excel_value')) {
    function get_excel_value($filePath)
    {
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        
        return $worksheet->getCellByColumnAndRow(1, 2)->getValue();
    }
}
if (!function_exists('get_last_row_value')) {
    function get_last_row_value($filePath)
    {
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        $lastRow = $worksheet->getHighestDataRow();
        
        return $worksheet->getCellByColumnAndRow(1, $lastRow)->getValue();
    }
}