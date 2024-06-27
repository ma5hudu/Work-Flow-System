<?php

require_once 'vendor/autoload.php';

$conn = mysqli_connect("localhost", "root", "", "work_flow_system");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if(isset($_POST['submitBtn'])){
    $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
     
    if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)){
        $arr_file = explode('.', $_FILES['file']['name']);
        $extenson = end($arr_file);

        if('csv' == $extension) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet = $reader->load($_Files['file']['tmp_name']);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        if(!empty($sheetData)){
            for($i=1; $i<count($sheetData); $i++){
                $months = $sheetData[$i][0];
                $income = $shettData[$i][1];
                $expenses = $sheetDat[$i][2];
    $sql = "INSERT INTO (months, income, expenses) VALUES('months', 'income', 'expenses')";

    if (mysqli_query($conn, $sql)){
        echo "New records created succesfully";
    }else{
        echo "Error: " . $sql ."<br>" . mysqli_error($conn);
    }
            }
        }
    }
}