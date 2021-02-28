<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>

    <?php 
    $passworde=$userNamee="";
$passwordErre=$userNameErre="";
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(empty($_POST['userNamee'])) {
        $userNameErre = "Please fill up the username";
    }
    else {
        $userNamee = $_POST['userNamee'];
    }

    if(empty($_POST['passworde'])) {
        $passwordErre = "Please fill up the password";
    }
    else {
        $passworde=$_POST['passworde'];
    }
    if($passwordErre == "" && $userNameErre == ""){
        $myfile = fopen("info.txt", "r") ;
        $information=fgets($myfile);
        
        
          $ifo= explode(" ",$information);

          $_SESSION["userid"] = $ifo[0];
           $_SESSION["pass"] = $ifo[3];
           $_SESSION["fname"] = $ifo[1];
           $_SESSION["lname"] = $ifo[2];
           if($userNamee==$ifo[0] && $passworde==$ifo[3]){
            echo "Successfully login";
           }
           else{
            $Erre="Unable login";
           }
    }
    

   else{
    $Erre="Unable login";
   }
}
    
	?>

    <h1>Login</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">



        <label for="userNamee">User Name</label>
        <input type="text" id="userNamee" name="userNamee" value="<?php echo $userNamee ?>">
        <p><?php echo $userNameErre; ?></p>

        <br>

        <label for="passworde">Password</label>
        <input type="password" id="passworde" name="passworde" value="<?php echo $passworde ?>">
        <p><?php echo $passwordErre; ?></p>

        <br>


        <br>
        <p><?php echo $Erre; ?></p>


        <input type="submit" value="Submit">

    </form>

</body>

</html>