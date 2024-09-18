<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;
background-color: aquamarine;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(315deg, rgb(55, 73, 112) 60%, rgb(51, 102, 96) 100%);
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
.form{
    margin: auto;
    height: 70%;
    width: 50%;
}

button {
  background-color: #04AA6D;
  /* background: linear-gradient(90deg, rgba(9, 112, 9, 0.473),green); */
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: auto;
}

img.avatar {
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2 style="text-align: center;">Registration Form</h2>
<div class="form">
    
<form action="?" method="post">
  <div class="imgcontainer">
    <img src="img_avatar2.png" height="150px" width="150px" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Employee ID</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw"><b>Confirm Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw2" required>
        
    <button type="submit" name="submit">Login</button>
  </div>

  <div class="container" style="background-color: aquamarine;">
    <button type="button" class="cancelbtn" onclick="document.location='index.html'">Cancel</button>
  </div>


  <?php

$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="municipality";
$conn=mysqli_connect($host,$dbusername,$dbpassword,$dbname);


if(!$conn)
{
    echo "Server is not connected";

}

if(isset($_POST["submit"]))
{
  $username=$_POST['uname'];
  $password=$_POST['psw'];
  $confirm=$_POST['psw2'];


$sql="SELECT E_ID,Password from employees where E_ID=$username";
$data=mysqli_query($conn, $sql);
$result=mysqli_fetch_assoc($data);
$total=mysqli_num_rows($data);

if($total>0)
{
  if (!$result['Password']){
      if($password!=$confirm){
          echo "Password must be same";
      }
      else{
        $hashed=password_hash($password,PASSWORD_DEFAULT);
          $sql1="update employees set Password='$hashed' where E_ID='$username'";
          if(mysqli_query($conn,$sql1)){
              header("location: login.php");
          }
          else{
              echo "some error occured";
          }
      }
}
else{
    echo "employee is already registered";
}
  //$hashed=password_hash($password,PASSWORD_DEFAULT);
  // password_verify($password,$result["password"])

//if($result["E_ID"]==$username && password_verify($password,$result["password"]))
// if($result["E_ID"]==$username && $password==$result["Password"])
// {

// // header("refresh:0;url=index.html");
// header("location: adminpage.html");

// }
// else{
//     $message = "Username and/or Password incorrect.\\nTry again.";
//   echo "<script type='text/javascript'>alert($hashed');</script>";
//     header("refresh:0;url=login.php");
   

// }
}
else{
  echo "employee doesn't exist";
}
}

?>

</form>

</div>
</body>
</html>
