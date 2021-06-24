<!DOCTYPE html>
<html>
<body>

<?php

$username = $pass = $loginmessage = "";
$usernameerr = $passerr = "";

if($_SERVER['REQUEST_METHOD'] == "POST") {

    if(empty($_POST['username'])) {
        $usernameerr = "Please Fill up the username!";
    }

    else if(empty($_POST['password'])) {                    
        $passerr = "Please Fill up the password!";
        
    }
    else { 
        $username = $_POST['username'];
        $pass = $_POST['password'];

        $log_file = fopen("Registration.txt", "r");
        
        $data = fread($log_file, filesize("Registration.txt"));
        
        fclose($log_file);
        
        $data_filter = explode("\n", $data);
        
        for($i = 0; $i< count($data_filter)-1; $i++) {

            $json_decode = json_decode($data_filter[$i], true);
            if($json_decode['username'] == $username && $json_decode['pass'] == $pass) 
            {                
                $loginmessage = "Login Successfull";
                break;
            }
            else{
                $loginmessage = "Login Failed";
            }
        }
    }

}
?>

<h1>Login form:</h1>
 

<form action="" method="post">
 <fieldset>
 <label for="username">Username:</label>
 <input type="text" id="username" name="username"> 
 <br>
 <?php echo $usernameerr ?> 
 <br>
 <label for="password">Password:</label>
 <input type="password" id="password" name="password">
 <br>
 <?php echo $passerr ?> 
 <br>  
 <input type="submit" value="Login">
 </fieldset>

 <br><br>
 <?php echo $loginmessage ?> 

</form>

 
</body>
</html>