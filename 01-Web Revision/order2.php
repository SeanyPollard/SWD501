<?php
$i = $_POST["songID"];
$q = $_POST["quantity"];

try
{
    $conn = new PDO ("mysql:host=localhost;dbname=ephp059;", "ephp059", "xohsupha");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $update = $conn->prepare("UPDATE wadsongs SET quantity=quantity-? WHERE id=?");
    $update->execute([$q,$i]);
    $results = $conn->prepare("SELECT * FROM wadsongs WHERE id=");
    $results->execute([$i]);

    $row = $results->fetch();

    echo "You have ordered " .$q ." copies of " .$row["title"] ." by " .$row["artist"] .". " .$row["quantity"] ." copies remain.";
}

// Catch any exceptions (errors) thrown from the 'try' block
catch(PDOException $e) 
{
    echo "Error: $e";
}

?>
