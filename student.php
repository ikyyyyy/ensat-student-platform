<?php
    //session_start();
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_POST['login'])){
        $cne = $_POST['student_id'];
        $pwd = $_POST['password'];

        include 'dbConnection.php';

        $sql ="SELECT * FROM account WHERE login = '$cne'";
        $result = mysqli_query($connection, $sql);
        
        if(! $row = mysqli_fetch_array($result)){
            echo "YOU DON'T HAVE AN ACCOUNT YET ";
        }else{
            if($row['pwd'] != $pwd){
                echo "the password is wrong try again";
            }else{
                $sql = "SELECT * FROM student WHERE cne = '$cne'";
                $result = mysqli_query($connection, $sql);
                if($row = mysqli_fetch_assoc($result)){
                    $_SESSION['cne'] = $row['cne'];
                    $_SESSION['firstName'] = $row['firstName'];
                    $_SESSION['lastName'] = $row['lastName'];
                    $_SESSION['city'] = $row['city'];
                    $_SESSION['picturePath'] = $row['picture'];
                    $_SESSION['email'] = $row['email'];
                    
                    include 'studentpage.php';
                }
            }
        }
    }
?>