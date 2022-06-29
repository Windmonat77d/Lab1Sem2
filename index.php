<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab5</title>
</head>
<body>
    <h4>Получить перечень палат, в которых дежурит выбранная медсестра:</h4>
    <form action="lab1_1.php" method = "GET">
        <select name="name">
            <?php
            include('connect.php');
            $sql = 'SELECT DISTINCT `name` FROM nurse';
            foreach($dbh->query($sql) as $row)
            {
                print "<option> $row[name] </option>";
            }
            ?>
        </select>
        <input type="submit" value="Получить">
    </form>  

    <h4>Получить перечень медсёстр, выбранного отделения:</h4>
    <form action="lab1_2.php" method = "GET">
        <select name="department">
            <?php
            $sql = 'SELECT DISTINCT department FROM nurse';
            foreach($dbh->query($sql) as $row)
            {
                print "<option> $row[department] </option>";
            }
            ?>
        </select>
        <input type="submit" value="Получить">
    </form>  

    <h4>Получить перечень палат в указанную смену:</h4>
    <form action="lab1_3.php" method = "GET">
        <select name="shift">
            <?php
            include('connect.php');
            $sql = 'SELECT DISTINCT shift FROM nurse';
            foreach($dbh->query($sql) as $row)
            {
                print "<option> $row[shift] </option>";
            }
            ?>
        </select>
        <input type="submit" value="Получить">
    </form>  

    <br>
    <h4>Добавление медсестры</h4>
    <form action="lab1_4.php" method="GET">
        <p>Введите имя медсестры</p>
        <input required type="text" name = "nurseName">
        <p>Выберите дату дежурства</p>
        <input required type="date" name="date"/>
        <p>Выберите отделение</p>
        <select name = "department">
         <?php $sql = 'SELECT DISTINCT department FROM nurse';
        foreach($dbh->query($sql) as $row)
        {   
             print "<option> $row[department] </option>";
        }?>
        </select>
        <p>Выберите смену</p>
        <select name = "shift">
        <?php $sql = 'SELECT DISTINCT shift FROM nurse';
        foreach($dbh->query($sql) as $row)
        {   
             print "<option> $row[shift] </option>";
        }?>
        </select>
    <br><br>
    <input type="submit" value="Добавить">
    </form>  

    <br>
    <h4>Добавление палаты</h4>
    <form action="lab1_5.php" method="GET">
    <p>Введите название палаты</p>
    <input required type="text" name = "wardName">
    <br><br>
    <input type="submit" value ="Добавить">
    </form>

    <br>
    <h4>Назначить выбранной медсестре указанную палату</h4>
    <form action="lab1_6.php" method="GET">
    <p>Выберите медсестру</p>
    <select name = "nurseName">
        <?php $sql = 'SELECT `name` FROM nurse';
            foreach($dbh->query($sql) as $row)
            {
                print "<option> $row[name] </option>";
            }
        ?>
    </select>
    <p>Выберите палату</p>
    <select name = "wardName">
        <?php $sql = 'SELECT `name` FROM ward';
        foreach($dbh->query($sql) as $row)
        {   
             print "<option> $row[name] </option>";
        }?>
    </select>
    <br><br>
    <input type="submit" value ="Назначить">
    </form>

</body>
</html>