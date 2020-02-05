<?php
$name = $_POST["Name"];
$user = $_POST["Username"];
$day = $_POST["DayOfBirth"];
$month = $_POST["MonthOfBirth"];
$year = $_POST["YearOfBirth"];

if ($year < 1890)
{ echo "Please enter a valid year of birth";}
else
try
{
    $conn = new PDO ("mysql:host=localhost;dbname=ephp059;", "ephp059", "xohsupha");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p>insert into ht_users (username, name, dayofbirth, monthofbirth, yearofbirth) values ('$user', '$name', '$day', '$month', '$year')</p>";
    $conn->query("insert into ht_users (username, name, dayofbirth, monthofbirth, yearofbirth) values ('$user', '$name', $day, '$month', $year)");
}
// Catch any exceptions (errors) thrown from the 'try' block
catch(PDOException $e) 
{
    echo "Error: $e";
}
{
echo "<p>You have signed up with</p>
    <p>Name: $name</p>
    <p>Username: $user</p>
    <p>Date of Birth: $day $month $year</p>";
}
?>