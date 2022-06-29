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
         if(isset($_REQUEST["nurseName"]) && isset($_REQUEST["wardName"]))
         {
            $wardName = $_REQUEST["wardName"];
            $nurseName = $_REQUEST["nurseName"];
             try
             {
                 include('connect.php');

                 $sql = $dbh->prepare("SELECT id_nurse from nurse WHERE `name` = :nurseName");
                 $sql->execute(array(':nurseName' => $nurseName));
                 $sql=$sql->fetch(PDO::FETCH_BOTH);
                 $nurse_id = $sql[0];

                 $sql = $dbh->prepare("SELECT id_ward from ward WHERE `name` = :wardName");
                 $sql->execute(array(':wardName' => $wardName));
                 $sql=$sql->fetch(PDO::FETCH_BOTH);
                 $id_ward = $sql[0];

                 $sql = "INSERT INTO `nurse_ward` (`fid_nurse`, `fid_ward`) values ( ?, ?)";
                 $stmt= $dbh->prepare($sql);
                 $stmt->execute([$nurse_id, $id_ward]);
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