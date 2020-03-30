<?php
session_start();
// Test that the authentication session variable exists
if ( !isset ($_SESSION["gatekeeper"]))
{
    echo "You're not logged in. Go away!";
}
else
{
    $i = $_GET["songID"];
    $un = $_SESSION["gatekeeper"];

    if ($_GET["token"] = $_SESSION["keymaster"])
    {
        try
        {
            $conn = new PDO ("mysql:host=localhost;dbname=ephp059;", "ephp059", "xohsupha");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $dao = new SongDAO($conn, "wadsongs");

            $song = $dao->findSongById($i);

            $song->download();

            $dao->updateSong($song);

            // $updatew = $conn->prepare("UPDATE wadsongs SET downloads=downloads+1 WHERE id=?");
            // $updatew->execute([$i]);
            // $resultsw = $conn->prepare("SELECT * FROM wadsongs WHERE id=?");
            // $results->execute([$i]);
            // $roww = $resultsw->fetch();

            // $p = $roww["price"];

            $resultsu = $conn->prepare("SELECT balance FROM ht_users WHERE username=?");
            $resultsu->execute([$un]);
            $rowu = $resultsu->fetch();

            if ($p < $rowu["balance"])
            {
                $updateu = $conn->prepare("UPDATE ht_users SET balance=balance-? WHERE username=?");
                $updateu->execute([$p,$un]);
                $resultsu = $conn->prepare("SELECT balance FROM ht_users WHERE username=?");
                $results->execute([$un]);

                $rowu = $resultsu->fetch();

                echo "Download complete!</br>";
                echo $roww["title"] ." by " .$roww["artist"] ." has been downloaded " .$roww["downloads"] ." times.</br>";
                echo $un .", your new balance is £" .$rowu["balance"];
            }
            else
            {
                echo "You can't afford this song!";
            }
        }

        // Catch any exceptions (errors) thrown from the 'try' block
        catch(PDOException $e) 
        {
            echo "Error: $e";
        }
    }
}
?>
