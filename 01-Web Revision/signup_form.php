<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="simple.css">
    <title>Sign Up</title>
</head>
<body>
    <h1>SignUp!</h1>
    <form method="post" action="signup.php">
    <fieldset>
        <label>Username:</label>
        <input name="Username" /><br />
        <label>Name:</label>
        <input name="Name" /><br />
        <label>Day of birth:</label>
        <?php
            echo "<select name='DayOfBirth'>";
            for($i=1; $i<=31; $i++)
            {
                echo "<option>$i</option>";
            }
            echo "</select>";
        ?>
        <label>Month of birth:</label>
        <?php
            $monthName = [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            echo "<select name='MonthOfBirth'>";
            for($x=0; $x<=11; $x++)
            {
                echo "<option value=" . ($x+1) . ">". $monthName[$x]. "</option>";
            }
            echo "</select>";
        ?>
        <label>Year of birth:</label>
        <?php
            $d = getdate();
            echo "<select name='YearOfBirth'>";
            for ($l=($d["year"]-18); $l>=1890; $l--)
            {
                echo "<option>$l</option>";
            }
            echo "</select>";
        ?>
        <input type="submit" value="Submit Details!" />
    </fieldset>
    </form>
    <p>Main Page <a href="index.html">Here!</a></p>    
</body>
</html>