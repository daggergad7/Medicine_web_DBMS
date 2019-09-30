<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="login.css">

</head>


<body>

<div id="container">
  <form method='post'>
    <h1>Login</h1>
    <input type="text" placeholder="Username" name="username" required><br>
    <input type="password" placeholder="Password" name="password" required><br>
    <input type="Submit" name="submit" value="SIGN IN"><br>

  </form>
</div>
</body>


</html>



<?php

$db_handle=mysqli_connect("localhost","root","") or die("<script type='text/javascript'>alert('Unable to connect to MySQL');</script>");
$selected=mysqli_select_db($db_handle,'simplelogin') or die("<script type='text/javascript'>alert('Could not select examples');</script>"); 

if(isset($_POST['submit'])){
    $un=$_POST['username'];
    $pw=$_POST['password'];
    $sql=mysqli_query($db_handle,"SELECT * FROM user WHERE username='$un'");

    if($row=mysqli_fetch_array($sql)){
        if($pw==$row['password']){
            if($row['type']=='admin'){
                header("location:adminpage.html");
                exit();
            }else if($row['type']=='seller'){
                header("location:sellerpage.html");
                exit();
            }else{
                header("location:userpage.html");
                exit();               
            }

    }
    else
    echo "<script type='text/javascript'>alert('Invalid Password');</script>";

}
else
echo "<script type='text/javascript'>alert('Invalid Username');</script>";


}

?>

