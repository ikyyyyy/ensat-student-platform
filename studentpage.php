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
    <link rel="stylesheet" href="css/style6.css">
    <title>page</title>
</head>
<body>

<div class="main">
        <a href="logout.php">LOG OUT</a>
        
    <div class="image">
        <img src=<?php echo "uploads/".$_SESSION['picturePath']; ?> alt="student_picture">
    </div>

<div class="student-information">
    <span>CNE: <?php echo $_SESSION['cne'];?> </span>
    <span>First Name: <?php echo $_SESSION['firstName'];?></span>
    <span>Last Name: <?php echo $_SESSION['lastName'];?></span>
    <span>Email: <?php echo $_SESSION['email'];?></span>
</div>

<div class="services">
    <select class="round1">
        <option>EMPLOIE DU TEMPS</option>
        <option>xxxxxxxxxxxxxxx</option>
        <option>xxxxxxxxxxxxxxxx</option>
    </select>

    <select class="round2">
        <option>LISTE DE NOTES</option>
        <option>xxxxxxxxxxxxxxxxxxx</option>
        <option>xxxxxxxxxxxxxxxx</option>
    </select>

    <select class="round3">
        <option>ADMINISTRATION</option>
        <option>xxxxxxxxxxxxxxxxxxxxx</option>
        <option>xxxxxxxxxxxxxxxxxxx</option>
    </select>
</div>

</div>
    
</body>
</html>