`<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
<style>
.button {
        display: inline-block;
        padding: 10px 25px;
        width:100px;
        text-align: center;
        text-decoration: none;
        color:black;
        background-color:skyblue;
        border-radius: 2px;
        outline: none;
        font-weight: bolder;
      }
      .container{
          padding:300px;
      }
      .hero{
          background-repeat :no-repeat;
          background-attachment :fixed;
          background-position:  center;
            margin:auto;
            width: 1000px;
          height : 1000px;
          }
      
        .topnav-right {
        padding-left:1000px;
        }
      
</style>

</head>
<body class="hero" background="images/user.jpg">
    <div class="topnav-right" >
        <a class="button" href="/hospital/login.php">LOGOUT</a>
    </div>     
    
    <center>
        <div class="container" > 
     <a class="button" href="/hospital/patient.php">NEW PATIENT</a>
    <a class="button" href="/hospital/regpatient.php">REGISTERED PATIENT</a>
    </div>
     </center>
</body>
</html>