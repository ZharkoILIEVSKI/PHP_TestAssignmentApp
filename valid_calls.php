<?php

// Creating a table which will display all valid calls
$conn1 = mysqli_connect("localhost","root","","Personell_LTD");

$sql_select_data = "SELECT * FROM CSV_test WHERE duration > 10";
$result_table = mysqli_query($conn1, $sql_select_data);

if (mysqli_num_rows($result_table) > 0)
{

?>
<h1>Valid Calls</h1>
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
    while($row = mysqli_fetch_assoc($result_table)) 
    {
?>

  <tbody class="table table-striped">
    <tr>
      <td><?php echo $row['user'];?></td>
      <td><?php echo $row['client'];?></td>
      <td><?php echo $row['client_type'];?></td>
      <td><?php echo $row['date'];?></td>
      <td><?php echo $row['duration'];?></td>
      <td><?php echo $row['type_of_call'];?></td>
      <td><?php echo $row['external_call_score'];?></td>
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

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Valid Calls - Personell LTD</title>
  </head>
  <body>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
