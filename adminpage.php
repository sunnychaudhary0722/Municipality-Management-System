<?php
//include("simple_html_dom.php");
// $randomtoken = md5(uniqid(rand(), true));
// $_SESSION['csrfToken']=$randomtoken;
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
      margin: 25px 15% 25px 15%;
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

    input[type=text],
    input[type=int] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    /* Set a style for all buttons */
    button {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
    
      width: 10%;
    }

    /* Add a hover effect for buttons */
    button:hover {
      opacity: 0.8;
    }

    /* Extra style for the cancel button (red) */
    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }

    /* Center the avatar image inside this container */
    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
    }

    /* Avatar image */
    img.avatar {
      width: 40%;
      border-radius: 50%;
    }

    /* Add padding to containers */
    .container {
      padding: 16px;
    }

    /* The "Forgot password" text */
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

  <div class="topnav">
  <a href="index.html" style="padding:0;">
    <img src="logo.png" height="45px" width="45px" alt="logo">
    </a>
    <a class="active" href="adminpage.php">DataEntry</a>
    <a href="update.php">UpdateData</a>
    <a href="complains.php">Complains</a>
    <a href="ProjectDetails.php">Projects</a>
    <a href="AddProject.php">AddProjects</a>


    <span style="float:right;margin-right: 10px;">
      <a href="reset.php">ResetPassword</a>
      <a href="logout.php">Logout</a>
    </span>
  </div>
  <main>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <!-- <input type='hidden' name='csrfToken' value='<?php echo($_SESSION['csrfToken']) ?>' /> -->

      <center>
        <h1>Enter the details of Citizen</h1>
      </center>

      <div class="container">
        <label for="firstname"><b>First name</b></label>
        <input type="text" placeholder="Enter your first name" name="firstname" required><br><br>


        <label for="middlename"><b>Middle Name</b></label>
        <input type="text" placeholder="Enter Middle Name" name="middlename"><br><br>

        <label for="lastname"><b>Last Name</b></label>
        <input type="text" placeholder="Enter Last Name" name="lastname" required><br><br>

        <label for="familyname"><b>Family Name</b></label>
        <input type="text" placeholder="Enter Family Name" name="familyname"><br><br>

        <label for="dob"><b>Date of birth</b></label>
        <input type="date" placeholder="Enter Date_of_birth" name="dob" required><br><br>

        <label for="citizen_id"><b>Enter Citizen ID</b></label>
        <input type="text" placeholder="Enter CITIZEN_ID" name="citizenid" required><br>

        

        <p><b> Gender</b></p>
        <select name="gender" type="text">
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">other</option>
        </select><br>
        <br>

        <label for="marriageid"><b>Enter Marriage ID (Leave Blank if Unmarried)</b></label>
        <input type="text" placeholder="Enter Marriage ID" name="marriageid"><br><br>


        <label for="phonenumber"><b>Phone Number</b></label>
        <input type="text" placeholder="Enter Phone Number" name="phonenumber" required><br><br>

        <label for="city"><b>City</b></label>
        <input type="text" placeholder="Enter City" name="city" required><br><br>

        <label for="zipcode"><b>Zip Code</b></label>
        <input type="text" placeholder="Enter Zip Code" name="zipcode" required><br><br>

        <label for="housenumber"><b>House Number</b></label>
        <input type="text" placeholder="Enter House Number" name="housenumber" required><br><br>

        <label for="streetname"><b>Street Name</b></label>
        <input type="text" placeholder="Enter Street Name" name="streetname" required><br><br>

        <label for="streetnumber"><b>Street Number</b></label>
        <input type="text" placeholder="Enter Street Number" name="streetnumber" required><br><br>

        <button type="submit" name="submit">Submit</button>

      </div>


    </form>

  </main>
</body>

</body>

</html>



<?php
$firstname=$middlename=$lastname=$familyname=$dob=$citizenid=$gender=$marriageid=$phonenumber="";
$city=$zipcode=$housenumber=$streetname=$streetnumber="";
//$housenumber=@$_POST['housenumber'];
//$wardnumber=@$_POST['wardnumber'];

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
$firstname=htmlspecialchars(trim(@$_POST['firstname']));
$middlename=htmlspecialchars(trim(@$_POST['middlename']));
$lastname=htmlspecialchars(trim(@$_POST['lastname']));
$familyname=htmlspecialchars(trim(@$_POST['familyname']));
$dob=@$_POST['dob'];
$citizenid=htmlspecialchars(trim(@$_POST['citizenid']));
$gender=@$_POST['gender'];
$marriageid=htmlspecialchars(trim(@$_POST['marriageid']));
$phonenumber=htmlspecialchars(trim(@$_POST['phonenumber']));
$city=htmlspecialchars(trim(@$_POST['city']));
$zipcode=htmlspecialchars(trim(@$_POST['zipcode']));
$housenumber=htmlspecialchars(trim(@$_POST['housenumber']));
$streetname=htmlspecialchars(trim(@$_POST['streetname']));
$streetnumber=htmlspecialchars(trim(@$_POST['streetnumber']));
echo "<p>$firstname</p>";
$c=0;

     if (!preg_match("/^[a-zA-Z]*$/",$firstname)) {
     
        echo "<p><font color=red> <b>Please,enter the valid first name</b></font></p>";
        $c=1;
        
    }
    
    if (!preg_match("/^[a-zA-Z]*$/",$middlename)) {
                                                 
        echo "<p><font color=red> <b>Please,enter the valid middle name</b></font></p>";
        $c=1;
        
    }
    if (!preg_match("/^[a-zA-Z]*$/",$lastname)) {
                                                 
        echo "<p><font color=red> <b>Please,enter the valid last name</b></font></p>";
        $c=1;
        
    }
    if (!preg_match("/^[a-zA-Z]*$/",$familyname)) {
                                                 
      echo "<p><font color=red> <b>Please,enter the valid family name</b></font></p>";
      $c=1;
      
  }
    if (!preg_match("/^[0-9]*$/",$citizenid)) {
                                               
        echo "<p><font color=red> <b>Please,enter the valid citizenid </b></font></p>";
        $c=1;
        
    }
    
    if (!preg_match("/^[0-9]*$/",$marriageid)) {
                                               
      echo "<p><font color=red> <b>Please,enter the valid marriageid </b></font></p>";
      $c=1;
      
  }

    
  if (date("Y-m-d") < $dob ) {
    echo "<p><font color=red> <b>Enter the valid Date of Birth</b></font></p>";
    $c=1;
       }

    if (!preg_match("/^[+]{0,1}[0-9]{0,13}$/",$phonenumber)) {
        echo "<p><font color=red> <b>Enter the valid phonenumber</b></font></p>";
       $c=1;
       
   }

   if (!preg_match("/^[a-zA-Z]*$/",$city)) {
     
    echo "<p><font color=red> <b>Please,enter the valid city</b></font></p>";
    $c=1;
    
}
   
if (!preg_match("/^[0-9]*$/",$zipcode)) {
                                               
  echo "<p><font color=red> <b>Please,enter the valid zip code </b></font></p>";
  $c=1;
  
}

if (!preg_match("/^[0-9]*$/",$housenumber)) {
                                               
  echo "<p><font color=red> <b>Please,enter the valid house number </b></font></p>";
  $c=1;
  
}

if (!preg_match("/^[a-zA-Z]*$/",$streetname)) {
     
  echo "<p><font color=red> <b>Please,enter the street name</b></font></p>";
  $c=1;
  
}

if (!preg_match("/^[0-9]*$/",$streetnumber)) {
                                               
  echo "<p><font color=red> <b>Please,enter the valid street number</b></font></p>";
  $c=1;
  
}

        
if($c==0)

$sql="INSERT INTO citizen (ID_No, Gender, B_Day, F_Name, M_Name, L_Name, Fm_Name, Marriage_ID_No) VALUES ('$citizenid', '$gender', '$dob', '$firstname', '$middlename', '$lastname', '$familyname', '$marriageid');";
//echo "INSERT INTO citizen (ID_No, Gender, B_Day, F_Name, M_Name, L_Name, Fm_Name, Marriage_ID_No) VALUES ($citizenid, '$gender', '$dob', '$firstname', '$middlename', '$lastname', '$familyname', $marriageid)";
$sql.="INSERT INTO citizen_ph_no (Ph_NO, ID_No) VALUES ('$phonenumber',$citizenid);";
$sql.="INSERT INTO address (City, ZipCode, House_No, Street_Name, Street_No, ID_No) VALUES ('$city', $zipcode, $housenumber, '$streetname', '$streetnumber', $citizenid)";
$data=mysqli_multi_query($conn,$sql);

if($data)
{
  $message = "DATA ENTERED SUCCESFULLY ";
  echo "<script type='text/javascript'>alert('$message');</script>";
  header("refresh:0; url:adminpage.php");
}
else{

    echo "Cant do query"."<br>";
    echo "Please, Enter the recognized value ";


}


}


?>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>