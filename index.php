<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Work-Flow System</title>
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
    <h1>Customer Information</h1>

    <div class="user-details">
        <!--form for user information and file upload -->
        <form action="process.php" method="post" enctype="multipart/form-data">
            <label for="firstName">Enter your first name:
                <input id="firstName" type="text" name="firstName" placeholder="First Name" required />
            </label>
            <br />

            <label for="lastName">Enter Your Last Name:
                <input id="lastName" type="text" name="lastName" placeholder="Last Name" required />
            </label>
            <br />

            <label for="dateOfBirth">Enter Your Date of Birth:
                <input type="text" name="dateOfBirth" id="dateOfBirth" required />
            </label>
            <br />

            <label for="excel-document">Upload Excel document:
                <input id="excel-document" type="file" name="file" required />
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
