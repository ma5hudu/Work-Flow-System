<?php
 
$dataPointsIncome = array();
$dataPointsExpenses = array();

// Best practice is to create a separate file for handling connection to database
try {
    // Creating a new connection.
    $link = new \PDO(
        'mysql:host=localhost;dbname=work_flow_system;charset=utf8mb4',
        'root',
        '',
        array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_PERSISTENT => false
        )
    );

    // Query to select data from the customer_finance table
    $handle = $link->prepare('SELECT month, income, expenses FROM customer_finance'); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);

    // Assuming you want to plot income and expenses over time (month)
    foreach ($result as $row) {
        array_push($dataPointsIncome, array("label" => $row->month, "y" => floatval(preg_replace('/[^\d.]/', '', $row->income))));
        array_push($dataPointsExpenses, array("label" => $row->month, "y" => floatval(preg_replace('/[^\d.]/', '', $row->expenses))));
    }
    $link = null;
} catch (\PDOException $ex) {
    print($ex->getMessage());
}
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Customers Income and Expenditure for the last 12 months"
    },
    axisY: {
        title: "Amount"
    },
    data: [
        {
            type: "column",
            name: "Income",
            showInLegend: true,
            dataPoints: <?php echo json_encode($dataPointsIncome, JSON_NUMERIC_CHECK); ?>
        },
        {
            type: "column",
            name: "Expenses",
            showInLegend: true,
            dataPoints: <?php echo json_encode($dataPointsExpenses, JSON_NUMERIC_CHECK); ?>
        }
    ]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>