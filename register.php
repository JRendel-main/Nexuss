<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
        
    <title>Sign Up</title>
    
</head>

<style>
    @media (max-width: 600px) {
  .form-label {
    font-size: 14px;
  }
}

@media (min-width: 601px) {
  .form-label {
    font-size: 18px;
  }
}
</style>

<body>
<?php

//learn from w3schools.com
//Unset all the server side variables

session_start();

$_SESSION["user"]="";
$_SESSION["usertype"]="";

// Set the new timezone
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');

$_SESSION["date"]=$date;



if($_POST){

    $_SESSION["personal"]=array(
        'fname'=>$_POST['fname'],
        'mname'=>$_POST['mname'],
        'lname'=>$_POST['lname'],
        'stunum'=>$_POST['stunum'],
        'sex'=>$_POST['sex'],
        'birthday'=>$_POST['birthday'],
        'email'=>$_POST['email'],
        'course'=>$_POST['course'],
        'year'=>$_POST['year'],
        'peercat'=>$_POST['peercat']
    );


    print_r($_SESSION["personal"]);
    header("location: register2.php");




}

?>


    <center>
    <div class="container">
        <table border="0">
            <tr>
                <td colspan="3">
                    <p class="header-text">Let's Get Started</p>
                    <p class="sub-text">Add Your Personal Details to Continue</p>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="name" class="form-label">Full Name: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <input type="text" name="fname" class="input-text" placeholder="First Name" required>
                </td>
                <td class="label-td">
                    <input type="text" name="mname" class="input-text" placeholder="Middle Name">
                </td>
                <td class="label-td">
                    <input type="text" name="lname" class="input-text" placeholder="Last Name" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="3">
                    <label for="stu_num" class="form-label">Student Number: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="3">
                    <input type="text" name="studentnum" class="input-text" placeholder="Student Number" required pattern="[0-9]{8}">
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="sex" class="form-label">Sex: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="1">
                    <select name="sex" id="sex" class="input-text">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </td>
            </tr>

            
            <tr>
                <td class="label-td" colspan="3">
                    <label for="dob" class="form-label">Date of Birth: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="3">
                    <input type="date" name="bday" class="input-text" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="3">
                    <label for="email" class="form-label">Email: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="3">
                    <input type="email" name="email" class="input-text" placeholder="Email" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="3">
                    <label for="course" class="form-label">Student Information: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="1">
                    <select name="course" id="course" class="input-text">
                        <option value="BSIT">BSIT</option>
                        <option value="BSBA">BSBA</option>
                        <option value="COE">COE</option>
                        <option value="BSED">BSED</option>
                        <option value="BSCS">BSCS</option>
                        <option value="BSHRM">BSHRM</option>
                        <option value="BSA">BSA</option>
                    </select>
                </td>
                <td>
                    <select name="year" id="year" class="input-text">
                        <option value="1st Year">1st Year</option>
                        <option value="2nd Year">2nd Year</option>
                        <option value="3rd Year">3rd Year</option>
                        <option value="4th Year">4th Year</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >
                </td>
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="Next" class="login-btn btn-primary btn">
                </td>

            </tr>
            <tr>
                <td colspan="3">
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63; </label>
                    
                    <a href="login.php" class="hover-link1 non-style-link">Login</a>
                    <br><br><br>
                </td>
            </tr>
                    </form>
            </tr>
        </table>

    </div>
</center>
</body>
</html>