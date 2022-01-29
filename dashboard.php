<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PANEL</title>
    <link rel="stylesheet" href="css/style5.css">
</head>
<body>

    <div id="main">

        <h1>welcome admin <?php echo strtoupper($_SESSION['fName'])." ". strtoupper($_SESSION['lName'])." !";?></h1>
        <div class="A">
            <a href="logout.php">LOG OUT</a>
            <a href="html/addStudent.html">ADD STUDENT</a>
        </div>

    </div>
    <table border="1">

        <th>id</th>
        <th>first name</th>
        <th>last name</th>
        <th>city</th>
        <th>picture</th>

        <?php
            include "dbConnection.php";

            $sql = "SELECT * FROM student";
            $result = mysqli_query($connection, $sql);
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                    echo "<td> <img src='uploads/".$row['picture']."'></td>";
                    echo "<td>".$row['cne']."</td>";
                    echo "<td>".$row['firstName']."</td>";
                    echo "<td>".$row['lastName']."</td>";
                    echo "<td>".$row['city']."</td>";                    
                echo "</tr>";
            }
        ?>
    </table>
    
    
</body>
</html>