<?php

$conn2 = mysqli_connect("localhost","root","","Personell_LTD");

$sql_select_data = "SELECT DISTINCT user FROM CSV_test";
$result_table = mysqli_query($conn2, $sql_select_data);

$sql_select_data1 = "SELECT DISTINCT client FROM CSV_test";
$result_table1 = mysqli_query($conn2, $sql_select_data1);

$sql_select_data2 = "SELECT DISTINCT type_of_call FROM CSV_test";
$result_table2 = mysqli_query($conn2, $sql_select_data2);

$sql_select_data3 = "SELECT DISTINCT client_type FROM CSV_test";
$result_table3 = mysqli_query($conn2, $sql_select_data3);

// echo'<pre>';
// var_dump($result_table).'<br>';
// echo'<pre>';


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Create / Delete / Edit RECORDS</title>
  </head>
  <body>
    <h1>Create / Delete / Edit RECORDS</h1>
    <hr>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   
    <form action="" method="post">
      <!-- Example single danger button -->
      
      <input name="user1" list="users" type="text" placeholder="Please, enter a User">
       
       <datalist id="users">
       <?php
      if (mysqli_num_rows($result_table) > 0)
        {
            while($row = mysqli_fetch_assoc($result_table)) 
          {
        ?>
          <option value="<?php echo $row['user'];?>" ></option>
          <?php
          }
        }  
        ?>
      </datalist>

        <br>
        <br>

        <input  name="client1" list="clients" type="text" placeholder="Please, enter a Client" >
       
         <datalist id="clients">
         <?php
        if (mysqli_num_rows($result_table1) > 0)
          {
              while($row1 = mysqli_fetch_assoc($result_table1)) 
            {
          ?>
            <option value="<?php echo $row1['client'];?>"></option>
            <?php
            }
          }  
          ?>
        </datalist>

        <br>
        <br>

        <input name="client_type1" list="client_type" type="text" placeholder="Please, enter a Client Type">
        <datalist id="client_type">
        <?php
          if (mysqli_num_rows($result_table3) > 0)
          {
              while($row3 = mysqli_fetch_assoc($result_table3)) 
            {
          ?>
            <option value="<?php echo $row3['client_type'];?>" ></option>
            <?php
            }
          }  
          ?>
        </datalist>

        <br>
        <br>
        <input type="text" name="date1" placeholder=" Please, enter a date and time">
        <br>
        <br>

        <input type="text" name="duration1" placeholder=" Please, enter a Duration of Call">
        <br>
        <br>

        <input name="type_of_call1" list="type_of_call" type="text" placeholder="Please, enter a Type of Call">
        <datalist id="type_of_call">
        <?php
        if (mysqli_num_rows($result_table2) > 0)
          {
              while($row2 = mysqli_fetch_assoc($result_table2)) 
            {
          ?>
            <option value="<?php echo $row2['type_of_call'];?>"></option>
            <?php
            }
          }  
          ?>
        </datalist>  

        <br>
        <br>

        <input type="text" name="external_call_score1" placeholder=" Please, enter a Externall Call Score">
        <br>
        <hr>
       
        <button type="submit" class="btn btn-success">Create - RECORD</button>
        <a href="delete_edit.php" type="submit" class="btn btn-danger">Delete - RECORD</a>
        <button type="submit" class="btn btn-primary">Edit - RECORD</button>
        <br>
        <hr>
    </form>
  </body>
</html>

<?php


//Connection for the insertion of Create RECORD form

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Personell_LTD";


$conn3 = new mysqli($servername, $username, $password, $dbname);

if ($conn3->connect_error) {
  die("Connection failed: " . $conn3->connect_error);
}

$stat = $conn3->prepare("INSERT INTO CSV_test(user, client, client_type, date, duration, type_of_call, external_call_score) VALUES (?, ?, ?, ?, ?, ?, ?)");

$stat->bind_param("sssssss", $user, $client, $client_type, $date, $duration, $type_of_call, $external_call_score);


$user = $_POST['user1'];
$client = $_POST['client1'];
$client_type = $_POST['client_type1'];
$date = $_POST['date1'];
$duration = $_POST['duration1'];
$type_of_call = $_POST['type_of_call1'];
$external_call_score = $_POST['external_call_score1'];

$stat->execute();
$stat->close();
$conn3->close();

// echo'<pre>';
// var_dump($_POST).'<br>';
// echo'<pre>';

// $test = mysqli_query($conn3 ,$sql_select_data3 );

// echo '<pre>';
// var_dump($test);
// echo '<pre>';

// echo '<pre>';
// var_dump($_POST);
// echo '<pre>';

// echo '<pre>';
// var_dump($conn3);
// echo '<pre>';

// echo '<pre>';
// var_dump($sql_select_data3).'<br>';
// echo '<pre>';


?>
