<?php
   $host="localhost";
   $dbusername="root";
   $dbpassword="";
   $dbanme="new1";
   $conn=mysqli_connect($host, $dbusername, $dbpassword, $dbanme);
   if(!$conn){
    echo "blalal";}

if(isset($_POST["submit2"]))
{
    $date=date("Y-m-d");
    $sql1="select * from complaints ";
    $data=mysqli_query($conn,$sql1);
    $num=mysqli_num_rows($data);
    $sql="insert into complaints values($num+1,'$date','$_POST[complain]','unseen')";
    if(mysqli_query($conn,$sql)){
        echo "Complain was registered!!";
    }
    else
    echo "Error occured!!";
}

      
   
   ?>