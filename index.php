<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Work-Flow System</title>
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
    <h1>Customer information</h1>

    <div class="user-details">
        <!-- Form for the user information -->
        <form action="save.php" method="post">
            <label for="firstName">Enter your first name:
                <input id="firstName" type="text" name="firstName" placeholder="First Name" required />
            </label>
            <br />

            <label for="lastName">Enter Your Last Name:
                <input id="lastName" type="text" name="lastName" placeholder="Last Name" required />
            </label>
            <br />

            <label for="dateOfBirth">Enter Your Date of Birth:
                <input type="text" name="dateOfBirth" id="dateOfBirth" />
            </label>
            <br />

            <div class="save">
                <input type="submit" name="saveBtn" id="saveBtn" value="Save" />
            </div>
        </form>

        <!-- Form for the excel document -->
        <form class="fileForm" action="process.php" method="post" enctype="multipart/form-data">
            <label for="excel-document">Upload excel document:
                <input id="excel-document" type="file" name="file" />
            </label>
            <br />

            <input type="submit" name="submitBtn" id="submitBtn" value="Submit" />
        </form>

       <form class="graph-button" action="graph.php">
                <input type="submit" name="graphBtn" id="graphBtn" value="View graph">
            </form> 
       
    </div>
</body>
</html>
