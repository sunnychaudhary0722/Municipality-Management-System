<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        form {
            border: 3px solid #f1f1f1;
            margin: 5% 10%;
            padding: 10px;
            background-color: rgb(164, 187, 187);
        }
        .show{
            border: 3px solid #f1f1f1;
            margin: 5% 10%;
            padding: 10px;
            background-color: rgb(164, 187, 187);
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(315deg, rgb(55, 73, 112) 60%, rgb(51, 102, 96) 100%);
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }

        button {
            padding: 6px;
            margin: 4px;
            background-color: #04AA6D;
            color: white;
        }

        button:hover {
            background-color: #ddd;
            color: black;

        }
    </style>
</head>

<body>

    <div class="topnav">

        <a href="adminpage.html">DataEntry</a>
        <a href="update.html">UpdateData</a>
        <a class="active" href="complains.php">Complains</a>
        <a href="ProjectDetails.html">Projects</a>


        <span style="float:right;margin-right: 10px;">
            <a href="reset.html">ResetPassword</a>
            <a href="index.html">Logout</a>
        </span>
    </div>

<div>
    <form action="?" method="post">
    <label for="userid">
        Employee ID:
        </label>
        <input id="userid" type="text" placeholder="Enter Employee ID" name="userid"><br>

        <label for="prev_pass">
        Previous Password:
        </label>
        <input id="prev_pass" type="password" placeholder="Enter Previous password" name="prev_pass"><br>

        <label for="new_pass">
        New Password:
        </label>
        <input id="new_pass" type="password" placeholder="Enter New Password" name="new_pass"><br>

        <label for="new_pass1">
        Conform New Password:
        </label>
        <input id="new_pass1" type="password" placeholder="Confirm New Password" name="new_pass1"><br><br>

        <button type="submit" name="submit">Change Password</button>
    </form>    
</div>
<h3 style="text-align: center">
<?php

        $np=@$_POST["new_pass"];
        $rp=@$_POST["new_pass1"];

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
$userid=$_POST["userid"];
$pass=$_POST["prev_pass"];
//echo "$pass";
$sql="SELECT E_ID,Password from  employees where E_ID='$userid'";
 $data=mysqli_query($conn, $sql);
 $result=mysqli_fetch_assoc($data);
 $total=mysqli_num_rows($data);
 if($total>0)
{  
  
if(password_verify($pass,$result["Password"]))
{
    $b=strcmp($np,$rp);
    if($b==0)
    {
        $hashed=password_hash($np,PASSWORD_DEFAULT);
        $sql2="UPDATE employees set Password='$hashed' where E_ID='$userid'";
        $res=mysqli_query($conn,$sql2);
        if($res){
            echo "New password is set";
        }
        else{
            echo "Error occured";
        }
    }
    else
    {
        echo "rewrite again newpassword";
    }
}
else{
    echo "your Previous password doesnot match";
}

}
else{
    echo "Employee id doesnot exist";
}
}
?>
</h2>

</body>


</html>