<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../edoc-doctor-appointment-system-main/css/animations.css">
    <link rel="stylesheet" href="../../edoc-doctor-appointment-system-main/css/main.css">
    <link rel="stylesheet" href="../../edoc-doctor-appointment-system-main/css/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <title>Doctors</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }


    </style>
</head>
<body>
    <?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["username"])){
        if(($_SESSION["username"])=="" or $_SESSION['category']!=2){
            header("location: ../login.php");
        }else{
            $username=$_SESSION["username"];
        }

    }else{
        header("location: ../login.php");
    }


    //import database
    include("../connect.php");
    $userrow = $database->query("select * from tbl_peer where username='$username'");
    $userfetch=$userrow->fetch_assoc();
    $peerod= $userfetch["peerid"];
    $email=$userfetch["email"];
    $fname=$userfetch["fname"];
    $mname=$userfetch["mname"];
    $lname=$userfetch["lname"];

    ?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px" >
                                    <img src="../../edoc-doctor-appointment-system-main/img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo substr($fname . ' ' . $lname,0,13)  ?>..</p>
                                    <p class="profile-subtitle"><?php echo substr($email,0,22)  ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <a href="../logout.php" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-home " >
                        <a href="index.php" class="non-style-link-menu "><div><p class="menu-text">Home</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor menu-active menu-icon-doctor-active">
                        <a href="doctors.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">All Doctors</p></a></div>
                    </td>
                </tr>
                
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-session">
                        <a href="schedule.php" class="non-style-link-menu"><div><p class="menu-text">Scheduled Sessions</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">My Bookings</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings">
                        <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text">Settings</p></a></div>
                    </td>
                </tr>
                
            </table>
        </div>
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                    <td width="13%">
                        <a href="doctors.php" ><button class="login-btn btn-primary-soft btn btn-icon-back" style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                    </td>
                    <td>
                        
                        <form action="" method="post" class="header-search">

                            <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Doctor name or Email" list="doctors">&nbsp;&nbsp;
                            
                            <?php
                                echo '<datalist id="doctors">';
                                $list11 = $database->query("select  fname, email from  tbl_peer where category=1;");

                                for ($y=0;$y<$list11->num_rows;$y++){
                                    $row00=$list11->fetch_assoc();
                                    $d=$row00["fname"];
                                    $c=$row00["email"];
                                    echo "<option value='$f'><br/>";
                                    echo "<option value='$e'><br/>";
                                };

                            echo ' </datalist>';
?>
                            
                       
                            <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                        
                        </form>
                        
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            <?php 
                        date_default_timezone_set('Asia/Manila');

                        $date = date('Y-m-d');
                        echo $date;
                        ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../../edoc-doctor-appointment-system-main/img/calendar.svg" width="100%"></button>
                    </td>


                </tr>
               
                
                <tr>
                    <td colspan="4" style="padding-top:10px;">
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">All Tutors (<?php echo $list11->num_rows; ?>)</p>
                    </td>
                    
                </tr>
                <?php
//                    if($_POST){
//                        $keyword=$_POST["search"];
//
//                        $sqlmain= "select * from doctor where docemail='$keyword' or docname='$keyword' or docname like '$keyword%' or docname like '%$keyword' or docname like '%$keyword%'";
//                    }else{
//                        $sqlmain= "select * from doctor order by docid desc";
//
//                    }



                ?>
                  
                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="93%" class="sub-table scrolldown" border="0">
                        <thead>
                        <tr>
                                <th class="table-headin">
                                    
                                
                                Tutor Name
                                
                                </th>
                                <th class="table-headin">
                                    Email
                                </th>
                                <th class="table-headin">
                                    
                                    Phone
                                    
                                </th>
                                <th class="table-headin">
                                    
                                    Action
                                    
                                </tr>
                        </thead>
                        <tbody style="text-align: center">
                        <?php
                        $result = $database->query("select * from tbl_peer where category=1;");



                        while($row = $result->fetch_assoc())
                        {
                            $peerid = $row['peerid'];

                            echo "<tr class=''>";
                            echo "<td class='table-data'>".$row['fname']."</td>";
                            echo "<td class='table-data'>".$row['email']."</td>";
                            echo "<td class='table-data'>".$row['sex']."</td>";
                            echo "<td class='table-data'><a href='?action=view&peerid=$peerid' class='login-btn btn-primary-soft btn'>View<a class='btn-view'> </a></a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";


                        ?>

                        </tbody>

                        </table>
                        </div>
                        </center>
                   </td> 
                </tr>
                       
                        
                        
            </table>
        </div>
    <!-- Tutor Modal -->
    <?php
    if($_GET) {

        $peerid= $_GET['peerid'];
        $action= $_GET['action'];
        if($action=='view') {
            // get all data from the database
            $result = $database->query("select * from tbl_peer where peerid='$peerid';");
            $row = $result->fetch_assoc();

            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $sex = $row['sex'];
            $email = $row['email'];
            $bday = $row['bday'];
            $course = $row['course'];
            $year = $row['year'];


            echo '
                <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2></h2>
                        <a class="close" href="doctors.php">&times;</a>
                        <div class="content">
                            Request a Schedule!<br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                  <p style="padding: 0;margin: 0;text-align: center;font-size: 25px;font-weight: 500;">Tutor Name: '.$fname. ' ' .$lname.'</p><br><br>
                                </td>
                            </tr>
                            <form method="post">
                                <tr>
                                  <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 20px;font-weight: 500;">Date:</p>
                                    <input type="date" name="date" class="input-text" style="width: 100%;padding: 10px;">
                                  
                                  </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="padding: 0;margin: 0;text-align: left;font-size: 20px;font-weight: 500;">Time:</p>
                                        <input type="time" name="time" class="input-text" style="width: 100%;padding: 10px;">              
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="padding: 0;margin: 0;text-align: left;font-size: 20px;font-weight: 500;">Topic:</p>
                                        <input type="text" name="subject" class="input-text" style="width: 100%;padding: 10px;">              
                                    </td>
                                </tr>
                                <tr>
                                <td>
                                    <button type="submit" name="submit" class="login-btn btn-primary-soft btn" style="width: 100%;margin-top: 20px;">Request</button>        
                                </td>
</td>
                                
                                </tr>
                            
                            </form>
                           

                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            
            ';
            // get the post
            if(isset($_POST['submit'])) {
                $date = $_POST['date'];
                $time = $_POST['time'];
                $topic = $_POST['subject'];

                $sql = "INSERT INTO tbl_request(tuteeid, tutorid, topic, timereq, status) VALUES ('$peerod', '$peerid', '$topic', '$date $time', 0)";
                $result = $database->query($sql);
                if($result) {
                    echo "<script>alert('Request Sent!')</script>";
                    echo "<script>window.location.href='doctors.php'</script>";
                } else {
                    echo "<script>alert('Request Failed!')</script>";
                    echo "<script>window.location.href='doctors.php'</script>";
                }

            }

        }
    }
    ?>


</body>
</html>