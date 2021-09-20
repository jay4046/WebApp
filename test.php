<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jay";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if($_SERVER["REQUEST_METHOD"] == "POST"){    
    $name = $email = "";
    // Validate name
    $input_name = trim($_POST["name"]);
    $name = $input_name;
    $input_email = trim($_POST["email"]);
    $email = $input_email;
    $sql = "INSERT INTO users (name, email) VALUES ('".$name."' , '".$email."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}


$conn->close();
 
?>
<html>
<body>
<h1>Hello</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
 <label>Name</label>
 <input type="text" name="name" >
  <label>Email</label>
  <input type="text" name="email" >
   <input type="submit" class="btn btn-primary" value="Submit">
</form>

</body>

</html>