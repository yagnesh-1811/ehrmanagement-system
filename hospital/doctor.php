<?php
session_start();

include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "GET")
{
  //something was posted
 // $user_name = $_POST['username'];
  //$password = $_POST['password'];
      //$type = $_POST['type'];

   $user_id = $_SESSION['USER_ID'] ;

    //read from database
    $query = "select p.PATIENT_ID,BOOKED_DATE,NAME from appointment a,patient p 
    where p.PATIENT_ID=a.PATIENT_ID  and DOCTOR_ID = '$user_id' ";
    
    $docquery = "select USERNAME from users where USER_ID = '$user_id' limit 1";

    $result = mysqli_query($con, $query);

    $docresult = mysqli_query($con, $docquery);


    if($docresult)
    {
      if($docresult && mysqli_num_rows($docresult) > 0)
      {

        $doc_data = mysqli_fetch_assoc($docresult);
      
      }
    }
  
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
    <style>
       .docname {
        text-align : right;
        font-weight : bold;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
      }
      table,th, td{
      border: 1px  solid;
      padding : 10px 10px;
      }
     
    </style>
</head>

<body class="hero" background="images/.jpg">
  <center><h1>DOCTOR'S PAGE</h1></center>
  <h3 class="docname">DOCTOR'S NAME: <?php echo $doc_data['USERNAME']; ?></h3>
    <div class="container"> 
        <div class="row">  
            <div class="col-sm-10">
                <h1>Appointed Patients</h1>
                <table>
                <tr>
                <th>Patient ID</th>
                <th>Patient Name</th>

                <th>Appointment Date</th>
                <th>View Details</th>
                <form>
                <?php
                 while($user_data= mysqli_fetch_assoc($result)){
                   echo '
                   <tr>
                   <td> '.$user_data['PATIENT_ID'].' </td>
                   <td> '.$user_data['NAME'].' </td>
                   <td> '.$user_data['BOOKED_DATE'].' </td>
                   <td>
                   <a href="/hospital/details.php?patient='.$user_data['PATIENT_ID'].'" target="_blank">View Details</a>
                   </td>
                   <tr>
                   <br>
                  ';
                 }
                ?>
                </table>
              </form>
             </div>
            <div class="col-sm-10">
           
            
              
            </div>
         
        
        </div>
    </div>
</body>
</html>
