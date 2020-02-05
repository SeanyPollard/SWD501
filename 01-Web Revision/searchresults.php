<?php
$a = $_GET["theArtist"];
try
{
    $conn = new PDO ("mysql:host=localhost;dbname=ephp059;", "ephp059", "xohsupha");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $results = $conn->query("select * from wadsongs where artist='$a'");

    while($row=$results->fetch())
    {
        echo "<p>";
        echo " Song Title ". $row["title"] ."<br/> ";
        echo " Artist " . $row["artist"] . "<br/> " ; 
        echo " Year " .$row["year"]. "<br/>" ; 
        echo " Genre " .$row["genre"]. "<br/>" ; 
        echo "</p>";
    }
}
// Catch any exceptions (errors) thrown from the 'try' block
catch(PDOException $e) 
{
    echo "Error: $e";
}

echo "<p>You are searching for songs by $a.</p>";
?>