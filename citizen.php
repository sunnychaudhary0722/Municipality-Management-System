<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(315deg, rgb(55, 73, 112) 60%, rgb(51, 102, 96) 100%);
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        form {
            border: 3px solid #f1f1f1;
            margin: 5% 10%;
            padding: 10px;
            background-color: rgb(164, 187, 187);
        }

        #hide{
            position: fixed;
            top:20%;
            left:20%;
            width:60%;
            z-index: 1;
            opacity:1;
            background-color: antiquewhite;
            border:solid #ddd;
            display: none;
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

        button {
            margin: 0;
            padding: 14px 16px;
            background-color: rgb(245, 30, 30);
            color: white;
        }

        .btn:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }
        .main{
          
            margin: 10px auto;
            padding: 10px 20px;
            width: 60%;
            
           
            color: white;

        }
    
    </style>
</head>

<body>

    <div class="topnav">
        <!-- <span>
            <img src="logo.png" alt="">
        </span> -->
        
        <a href="index.html" style="padding:0;">
    <img src="logo.png" height="45px" width="45px" alt="logo">
    </a>

        <span style="float:right;margin-right: 10px;">
            <button class="btn" onclick=report()>Report</button>
        </span>
    </div>
    <div class="main">
    <?php
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbanme="municipality";
$conn=mysqli_connect($host, $dbusername, $dbpassword, $dbanme);


if (!$conn){
    echo "Server is not connected";
}

if(isset($_POST["submit1"])){

$citizenid=htmlspecialchars(trim(@$_POST["citizen"]));
if (preg_match("/^[0-9]*$/",$citizenid)){
$birthdate=@$_POST["birth_date"];
$err="";
$sqlquery="SELECT * FROM citizen where ID_No like $citizenid";
$data=mysqli_query($conn, $sqlquery);
$result=mysqli_num_rows($data);
$data=mysqli_fetch_object($data);
if ( $result == 0){
    $err="No citizen found. Please enter the correct Citizen ID";
}
elseif($data->B_Day != $birthdate){
    $err="Please enter the correct birth date";
}

$sqlquery2="SELECT Ph_NO FROM citizen join citizen_ph_no where citizen.ID_No=$citizenid";
$phno=mysqli_query($conn, $sqlquery2);

$sqlquery3="SELECT City, ZipCode, House_No, Street_Name, Street_No FROM citizen join address where citizen.ID_No=$citizenid";
$address=mysqli_query($conn, $sqlquery3);

if ($err == ""){
    //header("location: citizen.html");
    echo "<h2> CITIZEN DETAILS </h2><br><br>";
    echo "Name: $data->F_Name $data->M_Name $data->L_Name<br>";
    echo "Citizen ID: " .$data->ID_No. "<br>";
    echo "Gender: ".$data->Gender. "<br>";
    echo "Birth Date: " .$data->B_Day. "<br>";
    echo "Marriage ID: " .$data->Marriage_ID_No. "<br>";
    echo "Phone:<br>";
    while($ph=mysqli_fetch_object($phno)){
        echo "&emsp;" .$ph->Ph_NO. "<br>";
    }
    echo "Address:<br>";
    $i=1;
    while($add=mysqli_fetch_object($address)){
        echo "Address $i:";
        echo "City: " .$add->City. "<br>";
        echo "Zip Code: " .$add->ZipCode. "<br>";
        echo "House No: " .$add->House_No. "<br>";
        echo "Street Name: " .$add->Street_Name. "<br>";
        echo "Street No: " .$add->Street_No. "<br>";
        $i=$i+1;
    }
}
else{
    //header("location:index.html");
  echo "<script type='text/javascript'>alert('$err');</script>";
}
}
else{
  echo "<script type='text/javascript'>alert('Invalid Citizen ID');</script>";
}
}
?>
</div>


<div id="hide">
    <h2 style="text-align: center;"> Report your Complains here: </h2>
    <form id="report" action="?" method="post">
        <label for="citizen"><b>Citizen id:</b></label>
        <input type="text" name="citizen" id="citizen" required>
        <br><br>
        <label for="subject"><b>Complain:</b></label><br>
        <textarea id="subject" placeholder="Write your complain here" name="complain" rows="5" cols="80"
            style="height:200px" required></textarea><br>
        <button type="submit" name="submit2">Submit</button>
        


    </form>
   </div>
   <h1 style="text-align: center">
   <?php 
    if(!$conn){
       echo "Server not connected";
    }


       if(isset($_POST["submit2"]))
       {
           $citizenid=htmlspecialchars(trim($_POST['citizen']));
           if (preg_match("/^[0-9]*$/",$citizenid)){
           $sql="select * from citizen where ID_No like $citizenid";
           $data2=mysqli_query($conn,$sql);
           $row=mysqli_num_rows($data2);
           if($row!=0){
           $date=date("Y-m-d");
           $sql1="select * from complaints ";
           $data=mysqli_query($conn,$sql1);
           $num=mysqli_num_rows($data);
           $sql="insert into complaints values($num+1,'$date','$_POST[complain]','pending')";
           if(mysqli_query($conn,$sql)){
               echo "Complain was registered!!";
           }
           else
           echo "Error occured!!";
        }
           else
           echo "Invalid citizen Id";
       }
       else
           echo "Invalid citizen Id";
       
    }
 
   
   ?>
    </h1>
   

</body>



<script>
    function report() {
        console.log("clicked!!");
        var x=document.getElementById('hide');
        console.log(x.style.display);
        if (x.style.display == "none" || x.style.display == "")
            x.style.display='block';
        else
            x.style.display='none';
        
        //document.main.style.display="none";
    }
</script>

</html>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>