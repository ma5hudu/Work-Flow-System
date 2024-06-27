<?php
/** Handle the upload of the excel file, read it's contents and 
 * insert data into SQl database table called customer_finiance.
 */


//include a composer autolond which load the PhpSpreadsheet library and other dependencies
require_once 'vendor/autoload.php';

//connect to database
$conn = mysqli_connect("localhost", "root", "", "work_flow_system");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


/**check if the form with post method was submitted after clicking a submitBtn button
 * $file_mimes defines an of allowed MIME types for the uploaded file
 */
if (isset($_POST['submitBtn'])) {
    $file_mimes = array(
        'text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 
        'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 
        'application/excel', 'application/vnd.msexcel', 'text/plain', 
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    );

  /**checks if a file was uploaded and if its MIME type is in the list of allowed MIME types
   *splits the uploaded file's name by dots to get the fille extension
   * create a new reader object for Xlsx or Csv files based on the file extension 
   */  

    if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
        $arr_file = explode('.', $_FILES['file']['name']);
        $extension = end($arr_file);

        if ('csv' == $extension) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }


        
        $spreadsheet = $reader->load($_FILES['file']['tmp_name']); //Load the uploaded file into a PhpSpreadsheet object
        $sheetData = $spreadsheet->getActiveSheet()->toArray(); //convert the active sheet data to an array

        /**if the sheet data is not empty, iterate over each row
        to extract (Month, Income and expenses) vlaues
        
        * Use SQL INSERT statement to insert the extracted values from excel into 
         the custome_finance table
         */
        if (!empty($sheetData)) {
            for ($i = 1; $i < count($sheetData); $i++) {
                $month = $sheetData[$i][0];
                $income = $sheetData[$i][1];
                $expenses = $sheetData[$i][2];

                $sql = "INSERT INTO customer_finance (month, income, expenses) VALUES ('$month', '$income', '$expenses')";

                //execute the sql statement, if successful print a success message, 
                //if not print an error messsgae with the sql statment  and the error  description.
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Customer income and expenses uploaded successfully');</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }
    }
}
//close database connection
mysqli_close($conn);
