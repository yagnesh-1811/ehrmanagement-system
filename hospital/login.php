<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['username'];
		$password = $_POST['password'];
        $type = $_POST['type'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where USERNAME = '$user_name' and TYPE='$type' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['PASSWORD'] === $password)
					{

						$_SESSION['USER_ID'] = $user_data['USER_ID'];
                        if($type !== 'doctor'){
                            header("Location: user.php");
                        }
						else{
                            header("Location: doctor.php");
                        }
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html> 
<html> 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Login Page </title>
<style> 
body {
  font-family: Calibri, Helvetica, sans-serif;
  background-color:teal;
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
 form { 
        border: 0px solid #f1f1f1; 
    } 
 input[type=text], input[type=password] { 
        width: 20%; 
        margin: 8px 0;
        padding: 12px 20px; 
        display: inline-block; 
        border: 2px black; 
        box-sizing: border-box; 
    }
select{ 
        width: 20%; 
        margin: 5px 0;
        padding: 10px 10px; 
        display: inline-block; 
        border: 2px black; 
        box-sizing: border-box; 
    }
 button:hover { 
        opacity: 0.7; 
    }  
 .container { 
        padding: 30px;  
        
    } 
    .inputlable{
    font-weight: bold;
    margin: 0 0 0;
}
.t{
    font-weight: bolder;
    font-size: 20mm;
    color:brown;
}
</style> 
</head>  
<body class="hero" background="images/login.jpeg">  

    <center>
    <h1> LOGIN PAGE </h1> 
    <form method="post">
        <div class="container"> 
            
            <input type="radio" name="type" value="doctor">Doctor
            <input type="radio" name="type" value="receptioni">Receptionist
            
            <br>
            <label class="inputlable">Username: </label> 
            <input type="text" placeholder="Enter Username" name="username"required>
            <br>
            <label  class="inputlable">Password: </label> 
            <input type="password" placeholder="Enter Password"  name="password" required>
            <br>
            <input class="button" type=submit value="LOGIN">
            <!--<a class="button" href="/user.html">Login</a> -->
            
        </div> 
    </form> 
    <br>
    <br>
    <br>
    
    </center>  
</body>   
</html>