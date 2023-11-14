<?php

$conn2 = mysqli_connect("localhost","root","","Personell_LTD");

$sql_select_data = "SELECT AVG (external_call_score) as external_call_score FROM CSV_test WHERE duration >10 GROUP BY user";

$result_table = mysqli_query($conn2, $sql_select_data);

$row = mysqli_fetch_array($result_table);


$sql_select_data1 = "SELECT * FROM CSV_test WHERE duration >10 GROUP BY user ORDER BY date ASC LIMIT 5";

$result_table1 = mysqli_query($conn2, $sql_select_data1);



$user = $_POST['user'];



// echo '<pre>';
// var_dump($user);
// echo '<pre>';

// echo '<pre>';
// var_dump(@$user);
// echo '<pre>';

// echo '<pre>';
// var_dump($row);
// echo '<pre>';

// echo '<pre>';
// var_dump($row1);
// echo '<pre>';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>USERS Summary</title>
  </head>
    <body>   
    <h1>USERS Summary</h1> 
    <hr>
    <a href="users.php"class="btn btn-primary">Back to the USERS Preview</a>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name and Surname</th>
                <th scope="col">Average user score</th>
            </tr>
        </thead>
        <tbody>
            <tr>            
                <td ><?php echo $user ?></td>
                <td ><?php echo $row['external_call_score'];?></td>
            </tr>
        </tbody>
    </table>





    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">User</th>
            <th scope="col">Client</th>
            <th scope="col">Client Type</th>
            <th scope="col">Date</th>
            <th scope="col">Duration</th>
            <th scope="col">Type Of Call</th>
            <th scope="col">External Call Score</th>
            </tr>
        </thead>

        
        <?php
        if (mysqli_num_rows($result_table1) > 0)
        {           
        ?>

        <tbody class="table table-striped">
            

            <?php
            while($row1 = mysqli_fetch_assoc($result_table1)) 
            {
            ?>    
            <tr>

                <td><?php echo $row1['user'];?></td>
                <td><?php echo $row1['client'];?></td>
                <td><?php echo $row1['client_type'];?></td>
                <td><?php echo $row1['date'];?></td>
                <td><?php echo $row1['duration'];?></td>
                <td><?php echo $row1['type_of_call'];?></td>
                <td><?php echo $row1['external_call_score'];?></td>
            </tr>
            <?php
            }
            ?>  

            
        </tbody>
    </table>

        <?php
        }
        mysqli_close($conn1);
        ?>

    </body>
</html>