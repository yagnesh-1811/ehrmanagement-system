
<?php 
session_start();

include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $op_id = $_POST['op_id'];
    $symptoms=$_POST['symptoms'];
    $weight=$_POST['weight'];
    $temperature=$_POST['temperature'];
    $bloodpressure=$_POST['bloodpressure'];
    $covid=$_POST['covid'];
    $dateandtime=$_POST['dateandtime'];
    $patient_id=$_POST['patientid'];
    $allergy=$_POST['allergy'];
    $history=$_POST['history'];
   

    if(!empty($op_id)  )
    {

        //save to database
        $user_id = random_num(20);
        $query = "insert into vitals(OP_ID,SYMPTOMS,WEIGHT,TEMPERATURE,BLOOD_PRESSURE,COVID,COVID_SCREEN_DATE) values 
        ('$op_id','$symptoms','$weight','$temperature','$bloodpressure','$covid','$dateandtime')";

       
    }else
    {
        echo "Please enter some valid information!";
    }
    if(!empty($patient_id)  )
    {

        //save to database
        $user_id = random_num(20);
        $query = "insert into history(PATIENT_ID,ALLERGY,HISTORY) values 
        ('$patient_id','$allergy','$history')";

       
    }else
    {
        echo "Please enter some valid information!";
    }
    mysqli_query($con, $query);

        header("Location: success.php");
        die;
}
?><!DOCTYPE html>
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
             background-color:pink;
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
    color:black;
}
.hero{
          
          background-repeat : repeat none;
          background-attachment :fixed;
          background-position: center center;
            margin:auto;
            width: 1000px;
          height : 1000px;
          }

    </style>
</head>
<body class="hero" background="images/login.jpeg">
       <center><h1 style="color:blue">VITALS AND HISTORY</h1></CENTER>
       
        <form  method="post">
            <div class="container"> 
                <div class="row">
                 <div class="col-sm-3"></div>
                <div class="col-sm-5">
                
                <table>
                <tr>
                <td>
                <label class="inputlable">OP ID : </label> 
                <input type="text" placeholder="Enter op_id"  name="op_id" >
                </td>
                <td>
                <label class="inputlable">PATIENT ID : </label>
                <input type="text" placeholder="Enter patientId" name="patientid" required>
                </td>
               
                </tr>
                <tr>
                <td>
                <label class="inputlable">Weight : </label>
                <input type="text" placeholder="Enter weight"  name="weight" required>
                </td>
                <td>
                <label class="inputlable">Temperature : </label>
                <input type="text" placeholder="Enter temperature"  name="temperature" required>
                </td>
                </tr>
                <tr>
                <td>
                <label class="inputlable">Blood pressure : </label>
                <input type="text" placeholder="Enter bloodpressure"  name="bloodpressure" required>
                </td>
                <td>
                <label class="inputlable">SYMPTOMS : </label> 
                <input type="text" placeholder="Enter symptoms"  name="symptoms" required>
                </td>
               
                </tr>
                <tr>
                <td>
                <label class="inputlable">Covid : </label>
                <input type="text" placeholder=""  name="covid" required>
                </td>
                <td>
                <label class="inputlable">covid screen date and time : </label>
                <input type="datetime-local" placeholder="Enter dateandtime"  name="dateandtime" required>
                </td>
                
                
                </tr>
                <tr>
                <td>
                <label class="inputlable">ALLERGY: </label> 
                <input type="text" placeholder=""  name="allergy" >
                </td>     
               <td> 
                <label class="inputlable">History : </label> 
                <input type="text" placeholder="Enter history"  name="history" required>
                 </td>
                </tr>
        </table>
               
                <input class="button" type="submit"  style="margin: 7px 0 0;" name="CONFIRM">
                </div>
            </div>
                
                
            </div> 
        </form>
        
    
    
</body>
</html>