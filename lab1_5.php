<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab5</title>
</head>
<body>
        <?php
         if(isset($_REQUEST["wardName"]))
         {
            $wardName = $_REQUEST["wardName"];
             try
             {
                 include('connect.php');

                 $sql = "INSERT INTO ward (`name`) values ( ? )";
                 $stmt= $dbh->prepare($sql);
                 $stmt->execute([$wardName]);
             }
             catch(PDOException $e)
             {
                 print "Error!: ".$e->getMessage()."<br>";
                 die();
             }
         }
         header("Location:index.php");
        ?>
</body>   
</html>