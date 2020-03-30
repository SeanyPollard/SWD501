<?php
session_start();
include("song_dao.php");
// Test that the authentication session variable exists
if ( !isset ($_SESSION["gatekeeper"]))
{
    echo "You're not logged in. Go away!";
}
else
{

    $a = $_GET["theArtist"];
    try
    {
        $conn = new PDO ("mysql:host=localhost;dbname=ephp059;", "ephp059", "xohsupha");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $dao = new SongDAO($conn, "wadsongs");

        $row = $dao->searchByArtist($a);

        foreach($rows as $row)
        {
            echo "<p>";
            echo " Song Title ". $row["title"] ."<br/> ";
            echo " Artist " . $row["artist"] . "<br/> " ; 
            echo " Year " .$row["year"]. "<br/>" ; 
            echo " Genre " .$row["genre"]. "<br/>" ;
            echo " <a href='download.php?songID=" .$row["ID"]. "&token=" .$_SESSION["keymaster"]."'> Download </a><br/>";  
            echo " <a href='https://www.youtube.com/results?search_query=" .$row["title"] ."+" .$row["artist"] ."'> Listen on YouTube </a></br>";
            echo " <a href='order1.php?songID=" .$row["ID"] ."'> Order Physcial Copy </a></br>";
            echo "</p>";
        }
    }
    // Catch any exceptions (errors) thrown from the 'try' block
    catch(PDOException $e) 
    {
        echo "Error: $e";
    }

    echo "<p>You are searching for songs by $a.</p>";
}
?>