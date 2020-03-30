<?php
session_start();

$un = $_POST["username"];
$pw = $_POST["password"];

try
{
    $conn = new PDO ("mysql:host=localhost;dbname=ephp059;", "ephp059", "xohsupha");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $conn->prepare("SELECT username, password, balance FROM ht_users WHERE username=?");
    $statement->execute([$un]);
    $row = $statement->fetch();

}
// Catch any exceptions (errors) thrown from the 'try' block
catch(PDOException $e) 
{
    echo "Error: $e";
}

if ($pw == $row["password"]) 
{
    // Correct password : set up the authentication session variable
    // and store the username in it
    $_SESSION["gatekeeper"] = $row["username"];
    $_SESSION["keymaster"] = bin2hex(random_bytes(32));

    // Redirect to the main menu
    header ("Location: index.php");
}
else
{
   // The wrong password was supplied!
    echo "Incorrect password!";
}