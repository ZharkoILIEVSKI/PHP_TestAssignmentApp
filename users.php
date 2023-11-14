<?php

$conn2 = mysqli_connect("localhost","root","","Personell_LTD");

$sql_select_data = "SELECT DISTINCT user FROM CSV_test";
$result_table = mysqli_query($conn2, $sql_select_data);

if (mysqli_num_rows($result_table) > 0)
{

?>
<h1>USERS Preview</h1>
<hr>
<table class="table table-striped">
    
<?php
    while($row = mysqli_fetch_assoc($result_table)) 
    {
?>

  <tbody class="table table-striped">
    <tr>
      <td><?php echo $row['user'];?></td>
      <td>
          <form action="users_summary.php" method="post">
            <input type="hidden" name="user" value="<?php echo $row['user'];?>">
            <button type="submit" class="btn btn-warning">View</button>
          </form>
        </td>
      
    </tr>
    
<?php
    }
?>  
  </tbody>
</table>

<?php
}
mysqli_close($conn2);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>USER Preview</title>
  </head>
  <body>
    <h1></h1>
  </body>
</html>


