<?php



include("connection.php");

if($_GET['patient']){
    $patient_id =  $_GET['patient'] ;
    
    $query = "select p.*,OP_ID from appointment a,patient p where p.PATIENT_ID=a.PATIENT_ID and  p.PATIENT_ID = '$patient_id' limit 1";
    $result = mysqli_query($con, $query);

    if($result)
    {
      if($result && mysqli_num_rows($result) > 0)
      {

        $user_data = mysqli_fetch_assoc($result);
      
      }
    }

    $query = "select v.* from appointment a,vitals v where a.OP_ID=v.OP_ID and  a.PATIENT_ID = '$patient_id' limit 1";
    $vitalsResult = mysqli_query($con, $query);

    if($vitalsResult)
    {
      if($vitalsResult && mysqli_num_rows($vitalsResult) > 0)
      {

        $vitals_data = mysqli_fetch_assoc($vitalsResult);
      
      }
    }
    $query = "select * from  history where PATIENT_ID = '$patient_id' limit 1";
    $historyResult = mysqli_query($con, $query);

    if($historyResult)
    {
      if($historyResult && mysqli_num_rows($historyResult) > 0)
      {

        $history_data = mysqli_fetch_assoc($historyResult);
      
      }
    }

}

if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        $op_id = $user_data['OP_ID'];
		$patientid = $patient_id;
		$medicines = $_POST['medicines'];
        $dosage=$_POST['dosage'];
        $tests=$_POST['tests'];
        
		if(!empty($medicines) || !empty($tests) )
		{

			//save to database
		
			$query = "insert into prescription (OP_ID,PATIENT_ID,MEDICINES,DOSAGE,TEST_NAME)
             values ('$op_id','$patientid','$medicines','$dosage','$tests')";

			mysqli_query($con, $query);

			header("Location: doctor.php");
			die;
		}else
		{
			echo "Please enter some valid inputs!";
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
       .tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}
.button {
display: inline-block;
padding: 10px 20px;
text-align: center;
text-decoration: none;
color: #ffffff;
background-color:orange;
border-radius: 6px;
outline: none;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontentprofile {
display: block;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}


.tabcontent {
display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

table,th, td{
     
      padding : 5px 5px;
      }
    </style>
    <script>
        function openTab(evt, functionName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(functionName).style.display = "block";
          evt.currentTarget.className += " active";
         
        }
    </script>
</head>
<body class="hero" background="images/.jpeg">
  
    <div class="container"> 
        <div class="row">  
           
             <div class="col-sm-10">
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'Profile')">Profile</button>
                <button class="tablinks" onclick="openTab(event, 'Vitals')">Vitals</button>
                <button class="tablinks" onclick="openTab(event, 'History')">History</button>
                <button class="tablinks" onclick="openTab(event, 'Prescription')">Prescription</button>
            </div>
            <div id="Profile" class="tabcontentprofile">
                <h3>Patient's details:</h3>
                <table>
               
                    <tr>
                        <td> <label> OP ID </label></td>
                        <td><span><?php echo $user_data['OP_ID']; ?></span></td>
                     </tr>
                     <tr>
                        <td> <label> PATIENT ID </label></td><td><span><?php echo $user_data['PATIENT_ID']; ?></span></td>
                     </tr>
                     <tr>
                        <td> <label>NAME  </label></td><td><span><?php echo $user_data['NAME']; ?></span></td>
                     </tr>
                     <tr>
                        <td> <label> AGE </label><span></td><td><?php echo $user_data['AGE']; ?></span></td>
                     </tr>
                     <tr>
                        <td> <label>CONTACT NUMBER </label></td><td><span><?php echo $user_data['PATIENT_MOBILE_NO']; ?></span></td>
                     </tr>
                     <tr>
                        <td> <label> ADDRESS </label></td><td><span><?php echo $user_data['ADDRESS']; ?></span></td>
                     </tr>
                    
                </table>
              </div>

              <div id="Vitals" class="tabcontent">
              <table>
               
               <tr>
                   <th> <h3>Vitals:</h3></th> 
                   
               </tr>
              
                     <tr>
                        <td> <label> SYMPTOMS </label></td><td><span><?php echo $vitals_data['SYMPTOMS']; ?></span></td>
                     </tr>
                     <tr>
                        <td> <label>WEIGHT </label></td><td><span><?php echo $vitals_data['WEIGHT']; ?></span></td>
                     </tr>
                     <tr>
                        <td> <label> TEMPERATURE </label><span></td><td><?php echo $vitals_data['TEMPERATURE']; ?></span></td>
                     </tr>
                     <tr>
                        <td> <label> BLOOD PRESSURE </label></td><td><span><?php echo $vitals_data['BLOOD_PRESSURE']; ?></span></td>
                     </tr>
                     <tr>
                        <td> <label> COVID </label></td><td><span><?php echo $vitals_data['COVID']; ?></span></td>
                     </tr>
                     <tr>
                        <td> <label> COVID SCREEN DATE </label></td><td><span><?php echo $vitals_data['COVID_SCREEN_DATE']; ?></span></td>
                     </tr>
           </table>
              </div>

              <div id="History" class="tabcontent">
              <table>
               
               <tr>
                   <th> <h3>History:</h3></th> 
                   
               </tr>
                     <tr>
                        <td> <label> ALLERGY </label></td><td><span><?php echo $history_data['ALLERGY']; ?></span></td>
                     </tr>
                     <tr>
                        <td> <label> HISTORY </label></td><td><span><?php echo $history_data['HISTORY']; ?></span></td>
                     </tr>
           </table>
              </div>
              
             
              
              <div id="Prescription" class="tabcontent">
                <form method=post>
                    
                
                    <table>
                    <tr>
                   <th> <h3>Prescription:</h3></th> 
                     </tr>
                    <tr>
                    <td><label class="inputlable">Medicines </label> </td>
                    <td><input type="text" placeholder="Enter prescribed medicines" name="medicines" ></td>
                    </tr>
                    
                    <tr>
                    <td><label class="inputlable">Dosage </label> </td>
                    <td><input type="text" placeholder="Enter dosage" name="dosage" ></td>
                    </tr>
                    
                    <tr>
                    <td><label  class="inputlable">Tests: </label> </td>
                    <td><input type="text" placeholder="Tests Suggested"  name="tests"></td>
                    </tr>
                    
                    </table>
                    <input class="button" type=submit value="SAVE">
                
                   

                </form>
              </div>

              
            </div>
         
        
        </div>
    </div>
</body>
</html>