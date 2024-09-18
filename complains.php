<?php
//include("simple_html_dom.php");
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
    header('location: login.php');
}
?>
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
    <a href="index.html" style="padding:0;">
    <img src="logo.png" height="45px" width="45px" alt="logo">
    </a>
        <a href="adminpage.php">DataEntry</a>
        <a href="update.php">UpdateData</a>
        <a class="active" href="complains.php">Complains</a>
        <a href="ProjectDetails.php">Projects</a>
        <a href="AddProject.php">AddProjects</a>

        <span style="float:right;margin-right: 10px;">
            <a href="reset.php">ResetPassword</a>
            <a href="index.html">Logout</a>
        </span>
    </div>

    
        <form id="citizen" action="?" method="post">
            <button type="submit" name="seen">SeenComplains</button>
            <button type="submit" name="unseen">UnseenConplains</button>
        </form>
<div class="show">
        
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


if(isset($_POST["unseen"]))
{  
  
$sql="SELECT * from complaints where C_Status='pending' ";
$data=mysqli_query($conn,$sql);
$num=mysqli_num_rows($data);

if($num==0)
{
echo "<b>No new complain</b>";
}

$i=0;
while($result=mysqli_fetch_assoc($data))
{

$i=$i+1;
echo  $i.")  ".$result["C_Description"]."<br>"; 
$sql2="UPDATE complaints set C_Status='solved'";
$b=mysqli_query($conn,$sql2);
if($b){
    echo "sucess";
}
}
}


if(isset($_POST["seen"]))
        {  

$sql2="SELECT * from complaints  where C_Status='solved'";
$data2=mysqli_query($conn,$sql2);
$num2=mysqli_num_rows($data2);
if($num2==0)
{
  echo "<center>No  complain till now</center>";
}

$i=0;

while($result2=mysqli_fetch_assoc($data2))
{
  $i=$i+1;
  echo  $i.")  ".$result2["C_Description"]."<br>"; 
  
}
}

?>
</div>

</body>


</html>