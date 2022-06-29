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
         if(isset($_REQUEST["shift"]))
         {
            $shift=$_REQUEST["shift"];
            echo "Перечень палат в <b>".$shift."</b> смену";
            echo "<table border ='1'>";
            echo "<tr>
             <th>WardName</th> 
             <th>Date</th> 
             <th>NurseName</th> 
             </tr>";
             $sql = "SELECT c.name, a.date, a.name
                    FROM nurse AS a INNER JOIN nurse_ward AS b ON a.id_nurse = b.fid_nurse
                    INNER JOIN ward AS c ON b.fid_ward = c.id_ward
                    WHERE a.shift = :shift";
             try
             {
                 include('connect.php');
                 $sth = $dbh->prepare($sql);
                 $sth->execute(array(':shift' => $shift));
                 
                 $timetable = $sth->fetchAll(PDO::FETCH_NUM);
                 foreach($timetable as $row)
                 {
                     $WardName = $row[0];
                     $Date = $row[1];
                     $NurseName = $row[2];
                     print "<tr> <td>$WardName</td> <td>$Date</td> <td>$NurseName</td></tr>";
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