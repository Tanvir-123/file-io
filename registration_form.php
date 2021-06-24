<!DOCTYPE html>
<html>
<body>

<?php

$firstname = $lastname = $gender = $birthday = $religion = $perAddress = $parAddress = $phone = $email = $homepage = $username = $pass ="";
$firstnameerr = $lastnameerr = $gendererr = $birthdayerr = $religionerr = $phoneerr = $emailerr = $homepageerr = $usernameerr = $passerr ="";

if($_SERVER['REQUEST_METHOD'] == "POST") {

    if(empty($_POST['fname'])) {
        $firstnameerr = "Please Fill up the firstname!";
    }

    else if(empty($_POST['lname'])) {                    
        $lastnameerr = "Please Fill up the lastname!";
        
    }

    else if(empty($_POST['gender'])) {                    
        $gendererr = "Please Fill up the gender!";
        
    }

    else if(empty($_POST['birthday'])) {                    
        $birthdayerr = "Please Fill up the birthday!";
        
    }

    else if(empty($_POST['phone'])) {                    
        $phoneerr = "Please Fill up the phone!";
    }

    else if(empty($_POST['email'])) {                    
        $emailerr = "Please Fill up the email!";
    }

    else if(empty($_POST['homepage'])) {                    
        $homepageerr = "Please Fill up the homepage";
    }

    else if(empty($_POST['username'])) {                    
        $usernameerr = "Please Fill up the username!";
    }

    else if(empty($_POST['password'])) {                    
        $passerr = "Please Fill up the password";
    }

    else {
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $religion = $_POST['religion'];
        $perAddress = $_POST['perAddress'];
        $parAddress = $_POST['parAddress'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $homepage = $_POST['homepage'];
        $username = $_POST['username'];
        $pass =$_POST['password'];

        $filepath = "Registration.txt";

        $reg_file = fopen($filepath, "a");

        $details = array('firstname' => $firstname, 'lastname' => $lastname, 'gender' => $gender, 'birthday' => $birthday, 'perAddress' => $perAddress, 'parAddress' => $parAddress, 'phone' => $phone, 'email' => $email, 'homepage' => $homepage, 'username' => $username, 'pass' => $pass);
        $details_encoded = json_encode($details);
        fwrite($reg_file, $details_encoded . "\n");	
        fclose($reg_file);

        header('location: login_form.php');

        }

}
?>

<h1>Registration form:</h1>
 
<form action="" method="post">
 <fieldset>
 <legend>Basic Information:</legend>
 <label for="fname">First Name:</label>
 <input type="text" id="fname" name="fname"><br><br>
 <?php echo $firstnameerr ?> <br>
 <label for="lname">Last Name:</label>
 <input type="text" id="lname" name="lname"><br><br>
 <?php echo $lastnameerr ?> <br>
 <label for="gender">Gender:</label>
 <input type="radio" id="male" name="gender" value="male">
 <label for="male">Male</label>
 <input type="radio" id="female" name="gender" value="female">
 <label for="female">Female</label><br><br>
 <?php echo $gendererr ?> <br>
 <label for="birthday">Birthday:</label>
 <input type="date" id="birthday" name="birthday"><br><br>
 <?php echo $birthdayerr ?> <br>
 <label for="religion">Religion:</label> 
<select name="religion" id="religion">
 <option value="select">Select</option>
 <option value="Islam">Islam</option>
 <option value="Hindu">Hindu</option>
 <option value="Christian">Christian</option>
 <br>
 <?php echo $religionerr ?> <br>
 
</select> 
 </fieldset>

 <fieldset>
 <legend>Contact Information:</legend>
 <label for="perAddress">Personal Address:</label>
 <input type="text" id="perAddress" name="perAddress"> 

 <br><br>
 <label for="parAddress">Parmanent Address:</label>
 <input type="text" id="parAddress" name="parAddress"> 
 <br><br>
 <label for="phone">Enter your phone number:</label>
<input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"> <br><br>
<?php echo $phoneerr ?> <br>
<label for="email">Email:</label>
 <input type="email" id="email" name="email"><br><br>
 <?php echo $emailerr ?> <br>
<label for="homepage">Personal Website Link:</label>
<input type="url" id="homepage" name="homepage"> 
<?php echo $homepageerr ?> <br>
 
 </fieldset>

 <fieldset>
 <legend>Login Information:</legend>
 <label for="username">Username:</label>
<input type="text" id="username" name="username"> <br><br>
<?php echo $usernameerr ?> <br>
<label for="password">Password:</label>
 <input type="password" id="password" name="password"><br><br>
 <?php echo $passerr ?> <br>
 
 </fieldset>
 <input type="submit" value="Submit">
</form>

 
</body>
</html>