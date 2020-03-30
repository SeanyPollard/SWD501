<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="simple.css">
    <title>Order Form</title>
</head>
<body>
    <h1>Order Form</h1>
    <?php
        $i = $_GET["songID"];

        try
        {
            $conn = new PDO ("mysql:host=localhost;dbname=ephp059;", "ephp059", "xohsupha");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $results = $conn->prepare("SELECT * FROM wadsongs WHERE id=?");
            $results->execute([$i]);

            $row = $results->fetch();
            $q = $row["quantity"];

            if ($q <= 0)
                { echo "<p> " .$row["title"] ." by " .$row["artist"] ." is out of stock. Sorry for the inconvenience!";}
            else   
                {
                echo "<p> How many copies of " .$row["title"] ." by " .$row["artist"] ." would you like to purchase?</br>";
                
                echo "<form method='post' action='order2.php'>";
                if ($q > 10)
                    {$q = 10;}
                echo "<select name='quantity'>";
                for($qi=1; $qi<=$q; $qi++)
                {
                    echo "<option>$qi</option>";
                }
                echo "</select>";
                echo "<input type='hidden' name='songID' value=" .$row["ID"] ." />";
                echo "<input type='submit' value='Purchase' />";
                }


        }

        catch(PDOException $e) 
        {
            echo "Error: $e";
        }
    ?>


</body>
