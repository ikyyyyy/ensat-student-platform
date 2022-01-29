<?php
    if( isset($_POST['signup']) && !empty($_FILES['picture'])) {

        include 'dbConnection.php';

        $cne = $_POST['cne'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $city = $_POST['city'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        
        
        $fileName = $_FILES['picture']['name'];
        $fileTmpName = $_FILES['picture']['tmp_name'];
        $fileSize = $_FILES['picture']['size'];
        $fileError = $_FILES['picture']['error'];
        $fileType = $_FILES['picture']['type'];

        $fileExtension = explode('.', $fileName);
        $fileActualExtension = strtolower(end($fileExtension));
        $allowedExtensions = array('jpeg', 'png', 'jpg', 'pdf');
        if(in_array($fileActualExtension, $allowedExtensions)) {
            if($fileError === 0){

                if($fileSize < 100000){

                    $fileNewName = uniqid('', true) . "." . $fileActualExtension;
                    $fileDestination = '../project/uploads/' . $fileNewName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    //insertion to db

                    //add student
                    $sql1 = "INSERT INTO student VALUES ('', '$cne', '$firstName', '$lastName', '$city','$email', '$fileNewName')";
                    $result = mysqli_query($connection, $sql1);
                    if(! $result){
                        echo "error of STUDENT insertion!";
                    }

                    //add account
                    $sql2 = "INSERT INTO account VALUES('', '$cne', '$pass')";
                    $result = mysqli_query($connection, $sql2);
                    if(! $result){
                        echo "error of ACCOUNT insertion!";
                    }else{
                    ?>

                    <center>
                        <h1>REGISTERED SUCCESSFULLY!!</h1>
                        <button onclick="history.go(-2)">Click here to go back</button>
                    </center>

                    <?php
                    }

                }else{
                    echo 'your file size is too big !';
                }

            }else{
                echo 'there was an error uploading your file !';
            }

        }else{
            echo 'files of this type can\'t be uploaded!';
        }

    }
?>

