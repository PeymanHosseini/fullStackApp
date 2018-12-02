<?php
session_start();

if(isset($_POST["submit"]))
{

    //connect to database
        include 'db.inc.php';
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $pwd = mysqli_real_escape_string($con, $_POST['password']);
        
        //error handeling
        if (empty($email) || empty($pwd)){
            header("Location: ../signup.php?signup=empty");
                exit();
        }else{
            $sql = "SELECT * FROM student_table WHERE std_email = '$email'  AND password = '".md5(mysqli_real_escape_string($pwd)."' ";
            $result = mysqli_query ($con , $sql);
            $resultcheck = mysqli_num_rows($result);
            if($resultcheck < 0){
                header("Location: ../login.php?login=EmailNotFound");
                exit();
            }else {
                if($row = mysqli_fetch_assoc($result)){
                //de-hash pass
                $hashedpass = password_verify($pwd,$row['password']);
                    if($hashedpass == false){
                     header("Location: ../login.php?login=pwdNotM");
                     exit();
                    } elseif($hashedpass == true){
                    // log in user here
                    $_SESSION['student_id'] = $row['std_id'];
                    $_SESSION['student_name'] = $row['std_name'];
                    $_SESSION['student_fname'] = $row['std_fname'];
                    $_SESSION['student_email'] = $row['std_email'];
                    $_SESSION['student_cource'] = $row['std_course'];
                    header("Location: ../student.php?login=success");
                    exit();
                }
            }
        }
    }
}
        else {
            header("Location: ../login.php?login=error");
            exit();
            }




?>