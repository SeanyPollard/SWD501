<?php
    session_start();
    // Test that the authentication session variable exists
    if ( !isset ($_SESSION["gatekeeper"]))
    {
        echo "You're not logged in. Go away!";
    }
    else
    {
        $un = $_SESSION["gatekeeper"];

        try
        {
            $conn = new PDO ("mysql:host=localhost;dbname=ephp059;", "ephp059", "xohsupha");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $results = $conn->prepare("SELECT balance FROM ht_users WHERE username=?");
            $results->execute([$un]);

            $row = $results->fetch();
        }

        // Catch any exceptions (errors) thrown from the 'try' block
        catch(PDOException $e) 
        {
            echo "Error: $e";
        }
        
        ?>
        <!DOCTYPE html>
        <html>
        <head>
        <title>HitTastic!</title>
        </head>
        <body>
        <h1>HitTastic!</h1>
        <?php
            echo '<p>Hello ' .$_SESSION["gatekeeper"] .', your balance is £'. $row["balance"] .'</p>';
        ?>
        <p>Search and download your favorite 40 hits on
        HitTastic! Whether it's pop, rock, rap, or pure liquid
        cheese you're into, you can be sure to find it on
        HitTastic! With the full range of top 40 hits from the
        past 60 years on our database, you can guarantee you'll
        find what you're looking for. Plus with our Year Search
        (coming soon!) find out exactly what was in the chart in
        any year in the past 60 years. </p>
        <form method='get' action='searchresults.php'>
        <fieldset>
        <label>Please enter an artist:</label>
        <input name="theArtist" />
        <input type="submit" value="Go!" />
        </fieldset>
        </form>
        </body>
        </html>
        <?php
    }
?>
