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
         if(isset($_REQUEST["department"]))
         {
            $department=$_REQUEST["department"];
            echo "Перечень медсёстр отделения <b>".$department."</b>";
            echo "<table border ='1'>";
            echo "<tr> <th>NurseName</th> </tr>";
             $sql = "SELECT nurse.name FROM nurse WHERE nurse.department = :department";
             try
             {
                 include('connect.php');
                 $sth = $dbh->prepare($sql);
                 $sth->execute(array(':department' => $department));
                 
                 $timetable = $sth->fetchAll(PDO::FETCH_NUM);
                 foreach($timetable as $row)
                 {
                     $NurseName = $row[0];
                     print "<tr> <td>$NurseName</td> </tr>";
                 }
             }
             catch(PDOException $e)
             {
                 print "Error!: ".$e->getMessage()."<br>";
                 die();
             }
         }
        ?>
</body>   
</html>