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
         if(isset($_REQUEST["nurseName"]) && isset($_REQUEST["date"]) && isset($_REQUEST["department"]) && isset($_REQUEST["shift"]))
         {
            $nurseName = $_REQUEST["nurseName"];
            $date = $_REQUEST["date"];
            $department=$_REQUEST["department"];
            $shift = $_REQUEST["shift"];
             try
             {
                 include('connect.php');

                 $sql = "INSERT INTO nurse (`name`, `date`, `department`, `shift`) values ( ?, ?, ?, ?)";
                 $stmt= $dbh->prepare($sql);
                 $stmt->execute([$nurseName, $date, $department, $shift]);
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