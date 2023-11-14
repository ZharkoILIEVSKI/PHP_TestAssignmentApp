<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="app.css" rel="stylesheet">

    <title>Personnel LTD</title>
  </head>
  <body>
    <h1 id="h1">Personnel LTD - PHP Test 2020</h1>
    <hr>
    <form action="" method="POST" enctype="multipart/form-data">
         
            <div>Please, upload a .CSV file</div>
            
            <div id="browser" ><input type="file" name="file" accept=".csv" class="btn btn-primary"></div>
            
            
            <div><button class="btn btn-primary" type="submit" name="upload">UPLOAD</button></div>
            
            <hr>
            <a href="new_record.php" ><button type="button" class="btn btn-success">Create / Delete Records</button></a>
            
            <a href="valid_calls.php" ><button type="button" class="btn btn-info">Valid Calls Preview</button></a>

            <a href="users.php" ><button type="button" class="btn btn-warning">USERS Preview</button></a>
            <br>
    </form>
    </body>
</html>  
   
<?php

$conn = mysqli_connect("localhost","root","","Personell_LTD");


if (isset($_POST["upload"])) {
    $filename = $_FILES["file"]["tmp_name"];
    
    
    if ($_FILES["file"]["size"]>0) {
      
        $file = fopen($filename,"r");
        $flag = true;
        while ($handling = fgetcsv($file)) 
        {
          if($flag) { $flag = false; continue; }
          $column[0] = mysqli_real_escape_string($conn,$handling[0]);
          $column[1] = mysqli_real_escape_string($conn,$handling[1]);
          $column[2] = mysqli_real_escape_string($conn,$handling[2]);
          $column[3] = mysqli_real_escape_string($conn,$handling[3]);
          $column[4] = mysqli_real_escape_string($conn,$handling[4]);
          $column[5] = mysqli_real_escape_string($conn,$handling[5]);
          $column[6] = mysqli_real_escape_string($conn,$handling[6]);

          // var_dump($column[3]).'<br>';
          
          $sqlinsert = "INSERT INTO CSV_test( user, client, client_type, date, duration, type_of_call, external_call_score) VALUES ('$column[0]', '$column[1]', '$column[2]', '$column[3]', '$column[4]', '$column[5]', '$column[6]')";
                
          $result = mysqli_query($conn, $sqlinsert);
    
        }
        fclose($file);
    }
}
mysqli_close($conn);
?>



