<?php

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'baza');
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' . mysqli_connect_error());

$query = "SELECT firstname, surname, email,description FROM users";
$response = @mysqli_query($dbc, $query);

if($response){
echo '<table align="left"
cellspacing="5" cellpadding="10">

<tr><td align="left"><b>FirstName</b></td>
<td align="left"><b>Surname</b></td>
<td align="left"><b>Email</b></td>
<td align="left"><b>Description</b></td>

while($row = mysqli_fetch_array($response)){

echo "<tr><td align="left">" . $row['firstname'] . "</td><td align="left">" . 
$row['surname'] . "</td><td align="left">".
$row['email'] . "</td><td align="left">" .
$row['description'] . "</td><td align="left">" .


echo "</tr>";


echo "</table>";

}
mysqli_close($dbc);

?>