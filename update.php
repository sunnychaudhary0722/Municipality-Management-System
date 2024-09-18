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
            width: 50%;
            border: 3px solid #f1f1f1;
            margin: 5% auto;
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
            margin: 10px 0;
            padding: 10px 12px;
            background-color: #04AA6D;
            color: white;
        }
        select {
        width: 160px;
        padding: 3px;
        
    }
    select:focus {
        min-width: 150px;
        width: auto;
    }
    </style>
</head>

<body>

    
<div class="topnav">
    <a href="index.html" style="padding:0;">
    <img src="logo.png" height="45px" width="45px" alt="logo">
    </a>

<a  href="adminpage.php">DataEntry</a>
<a class="active" href="update.php">UpdateData</a>
<a href="complains.php">Complains</a>
<a href="ProjectDetails.php">Projects</a>
<a  href="AddProject.php">AddProjects</a>


<span style="float:right;margin-right: 10px;">
  <a href="reset.php">ResetPassword</a>
  <a href="index.html">Logout</a>
</span>
</div>
    <h1 style="text-align: center;color: white"> Update the attribute you want</h1>
    
    <form action="" method="post">
        
        
        <h3> Input the Citizenid Present in Record</h3>
        <input type="text" name="citizenid"><br>

        
        <h3>Select the attribute you want to update</h3>

        <select name ="name" type="text">
                        
        <option value="ID_No" >Citizenid</option>
            <option value="F_Name">firstname</option>
            <option value="M_Name">middlename</option>
            <option value="L_Name">lastname</option>
            <option value="Fm_Name">familyname</option>
            <option value="Gender">Gender</option>
            <option value="City">City</option>
            <option value="Zip">zip</option>
            <option value="Street_Name">streetname</option>
            <option value="Street_No">street number</option>
            <option value="House_No">housenumber</option>
            <option value="B_Day">Date of birth</option>
            <option value="Ph_No">phonenumber</option>
            <option value="Marrige_ID_No">marriageid</option>
            
          </select>
          <h3>Enter the value to be kept in record</h3>
          <input type="text" name="value"><br>
          <button type="submit" name="submit" >submit</button>
      
    </form>

</html>
<?php
$citizenid=@$_POST['citizenid'];
$value=@$_POST['value'];
$update=@$_POST['name'];
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="municipality";
$conn=mysqli_connect($host,$dbusername,$dbpassword,$dbname);


if(!$conn)
{
    echo "Server is not connected";
}
    $sql="Update citizen set F_Name='$value' where ID_No=$citizenid;";
    // value=abhay', L_Name='rathi
    // Update citizen set F_Name='Krishna', L_Name='Raut' where ID_No=$citizenid;
    //krishna', L_Name='raut

    // if (!preg_match("/^[a-zA-Z]*$/",$value)) {
    //     echo "<p><font color=red> <b>Please,enter the valid first name</b></font></p>";
    //     $message = "Please enter valid first name";
    //     echo "<script type='text/javascript'>alert('$message');</script>";
    // }
    /*else*/
    if(mysqli_query($conn,$sql))
    {
        $message = "DATA UPDATED SUCCESFULLY ";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

// $c=0;
// $d=0;
// if(isset($_POST["submit"]))
// {
//     $c=0;
//     $d=0;
//     if($update=="F_Name")
//     {
//     //  if (!preg_match("/^[a-zA-Z]*$/",$value)) {
     
//     //     echo "<p><font color=red> <b>Please,enter the valid first name</b></font></p>";
//         $c=1;
//     }

// }
// if($update=="M_Name")
// {
//     if (!preg_match("/^[a-zA-Z]*$/",$value)) {
                                                 
//         echo "<p><font color=red> <b>Please,enter the valid middle name</b></font></p>";
//         $c=1;
        
//     }
// }
// if($update=="L_Name")
// {
//     if (!preg_match("/^[a-zA-Z]*$/",$value)) {
                                                 
//         echo "<p><font color=red> <b>Please,enter the valid last name</b></font></p>";
//         $c=1;
        
//     }
// }
// if($update=="Fm_Name")
// {
// if (!preg_match("/^[a-zA-Z]*$/",$value)) {
                                                 
//     echo "<p><font color=red> <b>Please,enter the valid family name</b></font></p>";
//     $c=1;
    
// }
// }

// if($update=="ID_No")
// {
//     if (!preg_match("/^[0-9]*$/",$value)) {
                                               
//         echo "<p><font color=red> <b>Please,enter the valid citizenid </b></font></p>";
//         $c=1;
        
//     }
// }
// if($update=="Ph_No")
// {
//     $d=1;
//     if (!preg_match("/^[+]{0,1}[0-9]{0,13}$/",$value)) {
//         echo "<p><font color=red> <b>Enter the valid phonenumber</b></font></p>";
//        $c=1;
       
       
//    }
// }

   

   
// if($update=="B_Day"){
//     if ((date("Y-m-d") < $value  ) || (date("Y-m-d") =='$value')) {
//         echo "<p><font color=red> <b>Enter the valid Date of Birth</b></font></p>";
//         $c=1;
//     }
// }
// if($update=="Gender"){
//     $value=strtolower($value);
//     if(!preg_match("/^female$/",$value) && !preg_match("/^male$/",$value) && !preg_match("/^other$/",$value))
//     {
//         echo "<p><font color=red> <b>Enter the valid Gender</b></font></p>";
//         $c=1;
//     }
// }
// if($update=="Marrige_ID_No"){
//     if (!preg_match("/^[0-9]*$/",$value)) {
//         echo "<p><font color=red> <b>Please,enter the valid marriageid </b></font></p>";
//         $c=1;
//     }
// }
//     if($update=="House_No")
//     {
//         $d=2;
//         if (!preg_match("/^[0-9]*$/",$value)) {
                                               
//             echo "<p><font color=red> <b>Please,enter the valid house number </b></font></p>";
//             $c=1;
            
//           }
//     }
//     if($update=="City")
//     {
//         $d=2;
//         if (!preg_match("/^[a-zA-Z]*$/",$value)) {
     
//             echo "<p><font color=red> <b>Please,enter the valid city</b></font></p>";
//             $c=1;
            
//         }
//     }

//     if($update=="ZipCode")
//     {
//         $d=2;
//         if (!preg_match("/^[0-9]*$/",$value)) {
                                               
//             echo "<p><font color=red> <b>Please,enter the valid zip code </b></font></p>";
//             $c=1;
            
//           }
//     }
//     if($update=="Street_Name")
//     {
//         $d=2;
//         if (!preg_match("/^[a-zA-Z]*$/",$value)) {
     
//             echo "<p><font color=red> <b>Please,enter the street name</b></font></p>";
//             $c=1;
            
//           }
//     }
//     if($update=="Street_No")
//     {
//         $d=2;
//         if (!preg_match("/^[0-9]*$/",$value)) {
                                                
//             echo "<p><font color=red> <b>Please,enter the valid street number</b></font></p>";
//             $c=1;
        
//         }
//     }

// if($c==1)
//     {
//         if($d==0){
//             echo "<script type='text/javascript'>alert('$value');</script>";
//     $sql="Update citizen set $update='$value' where ID_No=$citizenid;";
//         }
//         elseif($d=1){
//     $sql="Update citizen_ph_no set $update='$value' where ID_No=$citizenid;";
            
//         }
//         else{
//     $sql="Update address set $update='$value' where ID_No=$citizenid;";

//         }

//     if(mysqli_query($conn,$sql))
//     {
        
//         $message = "DATA UPDATED SUCCESFULLY ";
//         echo "<script type='text/javascript'>alert('$message');</script>";
//     }
//     else{
        
//         $message = "ERROR OCCURED";
//         echo "<script type='text/javascript'>alert('$message');</script>";
//     }
    
// }


?>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>