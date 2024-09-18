<!DOCTYPE HTML>
<html>
<head>
  <title>Add a Project</title>
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
            margin: 2% 20%;
            padding: 10px;
            background-color: rgb(164, 187, 187);
        }
        h2{
            text-align: center;
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
        th, td
        {
            padding:0 15px;
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
        table, th, td{
            border: 2px solid black;
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

            margin: 8% 8% 2% 8%;
            display: flex;
            justify-content: center;
        }
        button {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
     
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

    </style>
</head>
<body>

<div class="topnav">
    <a href="index.html" style="padding:0;">
    <img src="logo.png" height="45px" width="45px" alt="logo">
    </a>

<a  href="adminpage.php">DataEntry</a>
<a href="update.php">UpdateData</a>
<a href="complains.php">Complains</a>
<a href="ProjectDetails.php">Projects</a>
<a class="active" href="AddProject.php">AddProjects</a>


<span style="float:right;margin-right: 10px;">
  <a href="reset.php">ResetPassword</a>
  <a href="index.html">Logout</a>
</span>
</div>
    
<!-- "<?php echo $_SERVER['PHP_SELF'];?>" -->
 <form id="form1"  method="post" action="">
    <label><b> Project Number:</b></label>
    <input type="text" name="number" required><br>
     <label><b> Project Name:</b></label>
    <input type="text" name="name" required><br>
    <label><b>  Department Number:</b></label>
    <input type="text" name="depart" required><br>
    <label><b> Budget: </b></label>
    <input type="text" name="budget" required><br>
    <label><b>  Project Company:</b></label>
     <input type="text" name="company" required><br>
    <label><b>Project Location: </b></label>
    <input type="text" name="location" required><br>
    <label><b>  Start Date:</b></label>
    <input type="date" name="start" required>
    <span style="float:right;">
        <label><b> End Date:</b></label>
     <input type="date" name="end" required>
    </span>
    <br>
    <button type="submit" name="submit"> Submit</button>
</form>
<?php
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbanme="municipality";
    $conn=mysqli_connect($host, $dbusername, $dbpassword, $dbanme);

    if(isset($_POST["submit"])){
        //echo "i am done";
        $budget = $_POST["budget"];
        $name = $_POST["name"];
        $number = $_POST["number"];
        $company = $_POST["company"];
        $location = $_POST["location"];
        $start = $_POST["start"];
        $end = $_POST["end"];
        $depart = $_POST["depart"]; 
        $sqlquery = "INSERT INTO projects(Budget, P_Name, P_No, P_Company, P_Location,Start_Date, End_Date, D_No) VALUES( $budget, '$name' , $number , '$company' , '$location' , '$start' , '$end' , $depart)";
       // echo "INSERT INTO projects(Budget, P_Name, P_No, P_Company, P_Location,Start_Date, End_Date, D_No) VALUES( $budget, '$name' , $number , '$company' , '$location' , '$start' , '$end' , $depart)";
        $data=mysqli_query($conn, $sqlquery);
        if($data){
            echo "<script type='text/javascript'>alert('Data Entered Successfully');</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Failed to Enter Data');</script>";
        }
    }
    
?>

</body>
</html>

<script>
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
</script>