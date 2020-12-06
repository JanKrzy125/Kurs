<html>
<head>
<title>Add Student</title>
</head>
<body>

<b>Add a Client</b>
<p>First Name:
    <input type="text" name="first_name" size="30" value="" />
</p>

<p>Last Name:
    <input type="text" name="surname" size="30" value="" />
</p>

<p>Email:
    <input type="text" name="email" size="30" value="" />
</p>

<p>Description:
    <input type="text" name="description" size="30"value="" />
</p>

<p>
    <input type="submit" name="submit" value="Send" />
</p>
<p>
    <input type="submit" name="showUser" value="Send" />
</p>

<?php

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'baza');
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' . mysqli_connect_error());

if(isset($_POST['submit'])) {

    echo '<p>Hello World</p>';
    $f_name = trim($_POST['first_name']);
    $l_name = trim($_POST['surname']);
    $email = trim($_POST['email']);
    $descr = trim($_POST['description']);

    $result =$dbc->query($query  = "INSERT INTO users (firstname, surname, email,
       description, id_user) VALUES (?, ?, ?, ?, NOW())");

    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $f_name,
        $l_name, $email, $descr);

    mysqli_stmt_execute($stmt);
    $affected_rows = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($dbc);

}
?>


</body>
</html>
