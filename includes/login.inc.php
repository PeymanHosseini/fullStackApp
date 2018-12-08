<?php


if(isset($_POST["submit"]))
{
    //connect to database
    include 'db.inc.php';
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pwd = mysqli_real_escape_string($con, $_POST['password']);
    
    //error handeling
    if (empty($email) || empty($pwd))
    {
        header("Location: ../login.php?login=emptyyyy");
        exit();  
    }
   
    //Password must contain 6 characters of letters, numbers and at least one special character
    //elseif(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])(?=.*[!@#$%])[0-9A-Za-z!@#$%]{6,15}$/', $pwd))
    //{
    //    header("Location: ../login.php?login=character");
    //    exit();
    //}

    //check email format 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../login.php?login=invalidEmail");
        exit();
    }

    else
    {
        session_start();
        //staff
        $query1 = mysqli_query($con, "SELECT * FROM staff_table WHERE staff_email='$email' AND password='$pwd'");
        if(mysqli_num_rows($query1) == 0)
        {
                        $query2 = mysqli_query($con, "SELECT * FROM student_table WHERE std_email='$email'");
                        if(mysqli_num_rows($query2) == 1)
                        {
                            $row1 = mysqli_fetch_assoc($query2);
                            $hashchek = password_verify($pwd, $row1['password']);
                            if($hashchek == false)
                            {
                                header("Location: ../login.php?login=passwordIsWrong");
                                exit();
                            } 
                            else
                            {
                                
                                $_SESSION['email']=$row1['std_email'];
                                $_SESSION['level'] = $row1['level'];
                                header("Location: ../student.php");
                                                            
                            }
                        }
                        else
                        {
                            header("Location: ../login.php?login=emailNotFoundInDataBase");
                            
                        }
            
        }
        else
        {
            $row1 = mysqli_fetch_assoc($query1);

            if($row1['level'] == 'admin')
            {
                $_SESSION['email']=$row1['staff_email'];
                $_SESSION['level'] =$row1['level'] ;
                header("Location: ../admin.php");
            }
            elseif($row1['level'] == 'advisor')
            {
                $_SESSION['email']=$row1['staff_email'];
                $_SESSION['level'] = $row1['level'];
                header("Location: ../advisor.php");
            }
            elseif($row1['level'] == 'committee')
            {
                $_SESSION['email']=$row1['staff_email'];
                $_SESSION['level'] = $row1['level'];
                header("Location: ../commitee.php");
            }
            else
            {
                header("Location: ../login.php?login=ERROOrUserNotValid");
            }
        }

    }
}

