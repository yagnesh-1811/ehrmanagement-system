<?php 
session_start();

include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $patientid = $_POST['patientid'];
    $op_id = $_POST['op_id'];
    $doctor_id=$_POST['doctor_id'];
    $dateandtime=$_POST['dateandtime'];
   

    if(!empty($patientid) && !empty($doctor_id) )
    {

        //save to database
        $user_id = random_num(20);
        $query = "insert into appointment (OP_ID,PATIENT_ID,DOCTOR_ID,BOOKED_DATE) values 
        ('$op_id','$patientid','$doctor_id','$dateandtime')";

        mysqli_query($con, $query);

        header("Location: success.php");
        die;
    }else
    {
        echo "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>regpatient</title>
    <style>
        Body {
             font-family: Calibri, Helvetica, sans-serif;
             background-color:teal;
}
form { 
        border: 0px solid #f1f1f1; 
    } 
 .container { 
        padding: 30px; 
    } 
 .button {
display: inline-block;
padding: 10px 20px;
text-align: center;
text-decoration: none;
color: #ffffff;
background-color:blue;
border-radius: 6px;
outline: none;
}
input[type=text]{ 
        width: 300px; 
        margin: 2px 0;
        padding: 8px 14px; 
        display: inline-block; 
        border: 2px whitesmoke; 
        box-sizing: border-box; 
        background-color:white;
        color:black;
    }
.inputlable{
    font-weight: bold;
    margin: 0 0 0;
    color:blue;
}
.hero{
          
          background-repeat : repeat-y;
          background-attachment :fixed;
          background-position: center center;
            margin:auto;
            width: 1000px;
          height : 1000px;
          }

    </style>
</head>
<body class="hero" background="images/regpatient.jpg">
   
       <center><h1>BOOK APPOINTMENT</h1></center>
        <form  method="post">
            <div class="container"> 
                <div class="row">
                 <div class="col-sm-4"></div>
                <div class="col-sm-4">
                <label class="inputlable">PATIENT ID : </label>
                
                <input type="text" placeholder="Enter patientId" name="patientid" required>
                
                <label class="inputlable">OP ID : </label> 
                <input type="text" placeholder="Enter op_id"  name="op_id" >
               
                <label class="inputlable">DOCTOR ID : </label> 
                <input type="text" placeholder="Enter doctor_id"  name="doctor_id" required>
                
                <label class="inputlable">DATE AND TIME : </label>
                <input type="datetime-local" placeholder="DATEANDTIME"  name="dateandtime" required>
               
                <input class="button" type="submit"  style="margin: 7px 0 0;" name="CONFIRM">
                 
                </div>
            </div>
                
                
            </div> 
        </form>
    
    
</body>
</html>