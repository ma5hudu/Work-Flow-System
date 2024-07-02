<?php
/** Handles the information the user input into a form and the uploading of the excel file, read
 *  it's contents and insert data into SQl database table called customer_finiance and customer_details.
 */


//include a composer autolond which load the PhpSpreadsheet library and other dependencies
require_once 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


/**connect to database
 * checks if the database connection failed, and print error message if it failed
 */
$conn = mysqli_connect("localhost", "root", "", "work_flow_system");
if(mysqli_connect_errno()){
    echo "MySQL database connection failed: " . mysqli_connect_error();
}


/**check if the form with post method was submitted after clicking a submitBtn button
 * get values from the form fields(firstname, lastname and data of birth) from the post 
 * request and store them in corresponding variables 
 * Insert values from the form into customer_details table in the database
 * $file_mimes defines an array of allowed MIME types for the uploaded file
 */
if (isset($_POST['submitBtn'])) {
    $first_name = $_POST["firstName"];
    $last_name = $_POST["lastName"];
    $date_of_birth = $_POST["dateOfBirth"];

     $sql_customer = "INSERT INTO customer_details (first_name, last_name, date_of_birth) VALUES ('$first_name', '$last_name', '$date_of_birth')";
    if (mysqli_query($conn, $sql_customer)) {
        $customer_id = mysqli_insert_id($conn); // Get the last inserted customer ID
    } else {
        echo "Error: " . $sql_customer . "<br>" . mysqli_error($conn);
        exit;
    }


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

                $sql_finance = "INSERT INTO customer_finance (customer_id, month, income, expenses) VALUES ('$customer_id', '$month', '$income', '$expenses')";
               
                //execute the sql statement, if successful print a success message, 
                //if not print an error messsgae with the sql statment  and the error  description.
                if (!mysqli_query($conn, $sql_finance)) {
                    echo "Error: " . $sql_finance . "<br>" . mysqli_error($conn);
                    exit;
                }
            }
            echo "<script>alert('Customer information and financial data uploaded successfully');</script>";
        }
        else{
             echo "<script>alert('Invalid file format. Please upload an Excel file.');</script>";
        }
    }
}
//close database connection
mysqli_close($conn);
