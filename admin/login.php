<?php
   include("includes/conn.php");
   
   
   if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      // username and password sent from form 
      $myusername = $_POST['name'];
      $mypassword = $_POST['password']; 
      
      $sql = "SELECT * FROM user_master WHERE name = '$myusername' and password = '$mypassword' ";
    
      $result = mysqli_query($conn,$sql);
                              
      //$active = $row['active'];
      
     // print_r($row);
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count > 0)
       {
        session_start(); 
        
        $row = mysqli_fetch_assoc($result);               
        
            //Starting the session for the user
            $_SESSION['stampuserid'] = $row['Id'];
   
            $_SESSION['stampusername'] = $row['Name'];
            $_SESSION['status'] = $row['Status'];;
            $_SESSION['role'] = $row['Role'];

            echo  $_SESSION['stampusername'];
            echo $_SESSION['status'];
            echo $_SESSION['role'];
            
            header('Location:dashboard.php');
        
      }
      else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-login</title>
    <style>
    body {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      background: #34495e;
    }

    .box {
      width: 300px;
      padding: 40px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: #191919;
      text-align: center;
    }

    .box h1 {
      color: white;
      text-transform: uppercase;
      font-weight: 500;
    }

    .box input[type="text"],
    .box input[type="password"] {
      border: 0;
      background: none;
      display: block;
      margin: 20px auto;
      text-align: center;
      border: 2px solid #3498db;
      padding: 14px 10px;
      width: 200px;
      outline: none;
      color: white;
      border-radius: 24px;
      transition: 0.25s;
    }

    .box input[type="text"]:focus,
    .box input[type="password"]:focus {
      width: 280px;
      border-color: #2ecc71;
    }

    .box input[type="submit"] {
      border: 0;
      background: none;
      display: block;
      margin: 20px auto;
      text-align: center;
      border: 2px solid #2ecc71;
      padding: 14px 40px;
      outline: none;
      color: white;
      border-radius: 24px;
      transition: 0.25s;
      cursor: pointer;
    }

    .box input[type="submit"]:hover {
      background: #2ecc71;
    }
  </style>


</head>
<body>
  <form class="box"  method="post">
    <h1>Admin Login</h1>
    <input type="text"  placeholder="Username" name="name" required>
    <input type="password"  placeholder="Password" name="password" required>
    <input type="submit" value ="login" name="Login">
    <?php if(isset($error)){ ?>
      <span style="color:red;font-size:18px;">
      <?php echo $error; } ?>
    </span>
  </form>


</form>
</body>
</html>