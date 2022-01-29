<?php
    session_start();

    if(isset($_POST['login']) && !empty($_POST['admin_id']) && !empty($_POST['password'])){
        $_SESSION['id'] = $_POST['admin_id'];
        $_SESSION['pwd'] = $_POST['password'];

        include 'dbConnection.php';

        $sql = "SELECT * FROM admin";
        $retval = mysqli_query($connection, $sql);
        if(! $retval){
            echo "the query failed ";
        }else{
            while($row = mysqli_fetch_assoc($retval)){
                if($row['id'] == $_SESSION['id'] && $row['pwd'] == $_SESSION['pwd']){
                    $_SESSION['fName'] = $row['firstName'];
                    $_SESSION['lName'] = $row['lastName'];
                    
                    include 'dashboard.php';
                }else{
                    echo "admin infos invalid!!!";
                }
            }   
        }
    

        }
?>