<?php

$conn = mysqli_init();
mysqli_real_connect($conn, 'hololiveth.mysql.database.azure.com', 'panithan@hololiveth', 'folk_zaza2020', 'ITFLab', 3306);
if (mysqli_connect_errno($conn)) {
  die('Failed to connect to MySQL: ' . mysqli_connect_error());
}


$product = $_POST['product'];
$price = $_POST['price'];
$discount = $_POST['discount'];
$total = $price*((100-$discount)/100);


$sql = "INSERT INTO labtest (Product , Price , Discount, Total) VALUES ('$product', '$price', '$discount', '$total')";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-5 text-center">
      <h3>
        <?php
        if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        ?>
      </h3>
      <a href="index.php" class="btn btn-primary mt-3">BACK</a>
    </div>
  </div>
</body>

</html>
