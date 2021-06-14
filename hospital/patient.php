<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$patientid = $_POST['patientid'];
		$patientname = $_POST['patientName'];
        $fathername=$_POST['fathername'];
        $mothername=$_POST['mothername'];
        $age=$_POST['age'];
        $sex=$_POST['sex'];
        $occupation=$_POST['occupation'];
        $dob=$_POST['dob'];
        $contactno=$_POST['contactno'];
        $date=$_POST['date'];
        $address=$_POST['address'];
        $nationality=$_POST['nationality'];
        $address=$_POST['address'];
        $emailid=$_POST['emailid'];
        $parentmobno = $_POST['parentContactno'];

		if(!empty($patientid) && !empty($patientname) )
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into patient (PATIENT_ID,NAME,FATHER_NAME,MOTHER_NAME,PARENT_MOBILE_NO,EMAIL_ID,OCCUPATION,ADDRESS,
            SEX,AGE,PATIENT_MOBILE_NO,NATIONALITY,DOB,REGISTRATION_DATE) values ('$patientid','$patientname','$fathername',
            '$mothername','$parentmobno','$emailid',
            '$occupation','$address','$sex','$age','$contactno','$nationality','$dob','$date')";

			mysqli_query($con, $query);

			header("Location: regpatient.php");
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
    <title>new patient</title>
    <style>
  Body {
  font-family: Calibri, Helvetica, sans-serif;
  
       }
        .button {
   display: inline-block;
   padding: 10px 20px;
   text-align: center;
   text-decoration: none;
   color: #ffffff;
   background-color:black;
   border-radius: 6px;
   outline: none;
}
    form { 
        border: 0px solid; 
    } 
 input[type=text]{ 
        width: 300px; 
        margin: 8px 0;
        padding: 8px 14px; 
        display: inline-block; 
        border: 2px whitesmoke; 
        box-sizing: border-box; 
        border:1px solid black;
        color:black;
    }
 button:hover { 
        opacity: 0.7; 
    } 
    .container { 
        padding: 30px;  
        background-color: grey;
    } 
    .yag{
        font-size: 6mm;
        
    }
    .tr{
        padding:5px;
    }
    .hero{
          
          background-repeat : repeat-x;
          background-attachment :fixed;
          background-position: center center;
            margin:auto;
            width: 1000px;
          height : 1000px;
          }
  
    </style>
</head>
<body  class="hero" background="images/patient.jpg">
    <center>
        <h1 > NEW PATIENT</h1>
        <div>
        <h1 class="yag">ENTER THE DETAILS OF THE PATIENT</h1>
         <form method="post">
         <input type="text" placeholder="PATIENT_ID" name="patientid" required>
         <input type="text" placeholder="PATIENTS NAME" name="patientName" required>
         <br>
         <input type="text" placeholder="FATHERS NAME" name="fathername" required>
         <input type="text" placeholder="MOTHERS NAME" name="mothername" required>
         <br>
         <input type="text" placeholder="AGE" name="age" required>
         <input type="text" placeholder="SEX" name="sex" required>
         <br>
         <input type="text" placeholder="EMAILID" name="emailid" required>
         <input type="text" placeholder="CONTACT NUMBER" name="contactno" required>
         <br>
         <input type="text" placeholder="OCCUPATION" name="occupation" required>
         <input type="text" placeholder="PARENT CONTACT NUMBER" name="parentContactno" required>
         <br>
         <input type="text" placeholder="ADDRESS" name=" address" required>
         <input type="text" placeholder="NATIONALITY" name="nationality" required>
         <br>
         <label>Date of Birth : </label>
         <input type="date" placeholder="DOB" name="dob" required>
        
         <label>Registartion Date : </label>
         <input type="date" placeholder="REGISTRATION_DATE" name="date" required>
         <br><br>
         <input class="button" type=submit value="SUBMIT">
         <br>
         <br>
         </form>
         
        </div>
    </center>
    
</body>
</html>