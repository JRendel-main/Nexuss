<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" crossorigin="anonymous" />
        
    <title>Request Schedules</title>
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
        if(($_SESSION["username"])=="" or $_SESSION['category']!=1){
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
       $userid= $userfetch["peerid"];
       $username=$userfetch["username"];
       $fname=$userfetch["fname"];
    //echo $userid;
    ?>
    <div class="container">
        <div class="menu">
        <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px" >
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo substr($fname,0,13)  ?>..</p>
                                    <p class="profile-subtitle"><?php echo substr($username,0,22)  ?></p>
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
                    <td class="menu-btn menu-icon-dashbord " >
                        <a href="index.php" class="non-style-link-menu "><div><p class="menu-text">Dashboard</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment  menu-active menu-icon-appoinment-active">
                        <a href="appointment.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">My Schedule</p></a></div>
                    </td>
                </tr>
                
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-session">
                        <a href="schedule.php" class="non-style-link-menu"><div><p class="menu-text">My Sessions</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-patient">
                        <a href="patient.php" class="non-style-link-menu"><div><p class="menu-text">My Patients</p></a></div>
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
                    <td width="13%" >
                    <a href="appointment.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                    </td>
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Request Manager</p>
                                           
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            <?php 

                        date_default_timezone_set('Asia/Manila');

                        $today = date('Y-m-d');
                        echo $today;

                        ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>


                </tr>
               
<!--                <tr>-->
<!--                    <td colspan="4" >-->
<!--                        <div style="display: flex;margin-top: 40px;">-->
<!--                        <div class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49);margin-top: 5px;">Schedule a Session</div>-->
<!--                        <a href="?action=add-session&id=none&error=0" class="non-style-link"><button  class="login-btn btn-primary btn button-icon"  style="margin-left:25px;background-image: url('../img/icons/add.svg');">Add a Session</font></button>-->
<!--                        </a>-->
<!--                        </div>-->
<!--                    </td>-->
<!--                </tr>-->
                <tr>
                    <td colspan="4" style="padding-top:10px;width: 100%;" >
                    
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">My Request List ()</p>
                    </td>
                    
                </tr>
<!--                <tr>-->
<!--                    <td colspan="4" style="padding-top:0px;width: 100%;" >-->
<!--                        <center>-->
<!--                        <table class="filter-container" border="0" >-->
<!--                        <tr>-->
<!--                           <td width="10%">-->
<!---->
<!--                           </td> -->
<!--                        <td width="5%" style="text-align: center;">-->
<!--                        Date:-->
<!--                        </td>-->
<!--                        <td width="30%">-->
<!--                        <form action="" method="post">-->
<!--                            -->
<!--                            <input type="date" name="sheduledate" id="date" class="input-text filter-container-items" style="margin: 0;width: 95%;">-->
<!---->
<!--                        </td>-->
<!--                        -->
<!--                    <td width="12%">-->
<!--                        <input type="submit"  name="filter" value=" Filter" class=" btn-primary-soft btn button-icon btn-filter"  style="padding: 15px; margin :0;width:100%">-->
<!--                        </form>-->
<!--                    </td>-->
<!---->
<!--                    </tr>-->
<!--                            </table>-->
<!---->
<!--                        </center>-->
<!--                    </td>-->
<!--                    -->
<!--                </tr>-->

                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="93%" class="sub-table scrolldown" border="0">



                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "scheduling";
                            $conn = mysqli_connect($servername, $username, $password, $dbname);

                            // Check connection
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }


                            $sql = "SELECT b.requestid, b.tutorid, b.tuteeid, a.fname, a.mname, a.lname, b.topic, b.timereq, b.status, a.course, a.year from tbl_peer a, tbl_request b where b.tutorid = '$userid' and b.status = 0 and a.peerid = b.tuteeid";

                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);

                            if (mysqli_num_rows($result) > 0) {
                                echo '<table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; text-align:center;">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th class="table-heading">';
                                echo 'Fullname';
                                echo '</th>';
                                echo '<th class="table-heading">';
                                echo 'Topic of Discussion';
                                echo '</th>';
                                echo '<th class="table-heading">';
                                echo 'Requested Date and Time';
                                echo '</th>';
                                echo '<th class="table-heading">';
                                echo 'Year Level';
                                echo '</th>';
                                echo '<th class="table-heading">';
                                echo 'Course';
                                echo '</th>';
                                echo '<th class="table-heading">';
                                echo 'Action';
                                echo '</th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';

                                while($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>';
                                    echo '<td class="table-data">';
                                    echo $row['fname'].' '.$row['mname'].' '.$row['lname'];
                                    echo '</td>';
                                    echo '<td class="table-data">';
                                    echo $row['topic'];
                                    echo '</td>';
                                    echo '<td class="table-data">';
                                    $date = date_create($row['timereq']);
                                    echo date_format($date, 'l, F jS Y \a\t g:i A');
                                    echo '</td>';
                                    echo '<td class="table-data">';
                                    echo $row['year'];
                                    echo '</td>';
                                    echo '<td class="table-data">';
                                    echo $row['course'];
                                    echo '</td>';
                                    echo '<td class="table-data">';
                                    echo '<a href="?action=accept&id='.$row['requestid'].'&error=0" class="non-style-link"><button class="login-btn btn-primary btn button-icon"><i class="fas fa-check-circle"></i> Accept</button></a>&nbsp;';
                                    echo '<a href="?action=reject&id='.$row['requestid'].'&error=0" class="non-style-link"><button class="login-btn btn-primary btn button-icon"><i class="fas fa-times-circle"></i> Reject</button></a>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                                echo '</table>';
                            } else {
//                                add bootstrap alert when no data found
                                echo '<div class="alert alert-danger" role="alert">
                                      No data found!
                                    </div>';
                            }

                            // Accept Request and Update Status to 1
                            if(isset($_GET['action']) && $_GET['action'] == 'accept'){
                                $id = $_GET['id'];
                                $sql = "UPDATE tbl_request SET status = 1 WHERE requestid = $id";
                                $result = mysqli_query($conn, $sql);
                                if($result){
                                    echo '<script type="text/javascript">alert("Request Accepted!");</script>';
                                    echo '<script type="text/javascript">window.location.href = "http://localhost/Nexus%20Link/tutor/";</script>';
                                }else{
                                    echo '<script type="text/javascript">alert("Error!");</script>';
                                    echo '<script type="text/javascript">window.location.href = "http://localhost/Nexus%20Link/tutor/";</script>';
                                }
                            }
                            // Reject Request and Update Status to 3
                            if(isset($_GET['action']) && $_GET['action'] == 'reject'){
                                $id = $_GET['id'];
                                $sql = "UPDATE tbl_request SET status = 3 WHERE requestid = $id";
                                $result = mysqli_query($conn, $sql);
                                if($result){
                                    echo '<script type="text/javascript">alert("Request Rejected!");</script>';
                                    echo '<script type="text/javascript">window.location.href = "http://localhost/Nexus%20Link/tutor/";</script>';
                                }else{
                                    echo '<script type="text/javascript">alert("Error!");</script>';
                                    echo '<script type="text/javascript">window.location.href = "http://localhost/Nexus%20Link/tutor/";</script>';
                                }
                            }



                            ?>



                        </div>
                        </center>
                   </td> 
                </tr>
            </table>
            </table>
        </div>
    </div>


</body>
</html>