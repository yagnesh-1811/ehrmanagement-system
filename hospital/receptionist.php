<?php
session_start();

include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $doctor_name = $_POST['docName'];
   
    if(!empty($doctor_name)  && !is_numeric($doctor_name))
    {

        //read from database
        $query = "select * from doctor where DOCTOR_NAME = '$doctor_name'  limit 1";
        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {

                $doc_data = mysqli_fetch_assoc($result);
              
            }

          
        }
        else{
            echo "Invalid  name";
        }
        
       
    }else
    {
        echo "Enter a name";
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
    <title>user</title>
    <style>
        .button {
                display: inline-block;
                padding: 10px 25px;
                width:150px;
                text-align: center;
                text-decoration: none;
                color:black;
                background-color:skyblue;
                border-radius: 2px;
                outline: none;
                font-weight: bolder;
            }

            .searchButton {
                display: inline-block;
            
                width:100px;
                text-align: center;
                text-decoration: none;
                color:black;
                background-color:skyblue;
                border-radius: 2px;
                outline: none;
                font-weight: bolder;
            }
            
            .hero{
                background-repeat :no-repeat;
                background-attachment :fixed;
                background-position:  center;
                    margin:auto;
                }
                .inputlable,td{
                    font-weight: bolder;
                    color:white;
                }

                .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }


        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
        }
        .container{
                color:orange;
        }
        .actualsearch{
            display: none;
        }

        
    </style>

</head>
<body class="hero" background="images/user.jpg">
        <div class="row">
            <div class="col-sm-2"></div>
                <!--<div class="col-sm-4"></div>-->
                <div class="col-sm-8">
                    <form method="post" >
                        <!--<button onclick="searchdb(event)"></button> -->
                        <input type="submit" class='searchButton' value="Search">
                        <input type="text" id="reqid" placeholder="Enter doctor's name" name="docName">
                    
                    </form>   
                </div> 
                <div class="col-sm-2" >
                    <a class="button" href="/hospital/login.php">LOGOUT</a> 
                </div>
            </div>
        </div>
        <div id="Profile" class="tabcontent" >
    
                <h3 class="inputlable" >Doctor's details:</h3>
                <table>
               
                    <tr>
                        <td> <label> DOCTOR'S ID </label></td>
                        <td><span><?php echo $doc_data['USER_ID']; ?></span></td>
                     </tr>
                     <tr>
                        <td> <label> DOCTOR'S Name </label></td><td><span><?php echo $doc_data['DOCTOR_NAME']; ?></span></td>
                     </tr>
                     <tr>
                        <td> <label>DOCTOR'S SPECIALIZATION  </label></td><td><span><?php echo $doc_data['DOCTOR_SPECIALIZATION']; ?></span></td>
                     </tr>
                     <tr>
                        <td> <label> EXPERIENCE </label><span></td><td><?php echo $doc_data['EXPERIENCE']; ?></span></td>
                     </tr>
                     <tr>
                        <td> <label>CONTACT NUMBER </label></td><td><span><?php echo $doc_data['MOBILE_NO']; ?></span></td>
                     </tr>
                     <tr>
                        <td> <label> ADDRESS </label></td><td><span><?php echo $doc_data['ADDRESS']; ?></span></td>
                     </tr>
                    
                </table>
              </div>
    <br/><br/><br/><br/>
    <div class="row"> 
        <div class="col-sm-5"></div>
        <div class="col-sm-4">
            <a class="button" href="/hospital/patient.php">NEW PATIENT</a>
            <a class="button" href="/hospital/regpatient.php">REGISTERED PATIENT</a>
        </div>
        <div class="col-sm-4"></div>
    </div>
    
</body>
</html>

<script>
       
        var data = <?php echo $doc_data['USER_ID']; ?>;
        if(data){
            document.getElementById("Profile").style.display = "block"
        }
        
</script>