<html>

<head>
  <title>DATABASE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
  <?php
  $conn = mysqli_init();
  mysqli_real_connect($conn, 'hololiveth.mysql.database.azure.com', 'panithan@hololiveth', 'folk_zaza2020', 'ITFLab', 3306);
  if (mysqli_connect_errno($conn)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
  }
  $res = mysqli_query($conn, 'SELECT * FROM labtest');
  ?>
  <div class="container mt-5">
    <div class="card-header bg-warning text-white d-flex justify-content-between">
      <h3>HOME</h4>
       <a href="form.php" class="btn btn-primary">ADD</a>
    </div>
    <div class="table table-striped">
        <table class="table table-hover table-bordered table-sm">
          <thead class="thead-dark">
            <tr>
              <th width="300">
                <div align="center">ชื่อสินค้า</div>
              </th>
              <th width="300">
                <div align="center">ราคาต่อหน่วย </div>
              </th>
              <th width="300">
                <div align="center">ส่วนลด(%) </div>
              </th>
              <th width="300">
                <div align="center">ราคาหลังลด</div>
              </th>
              <th width="300">
                <div align="center">การจัดการ</div>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($Result = mysqli_fetch_array($res)) {
            ?>
              <tr>
                <td><?php echo $Result['Product']; ?></td>
                <td><?php echo $Result['Price']; ?></td>
                <td><?php echo $Result['Discount']; ?></td>
                <td><?php echo $Result['Total']; ?></td>
                <td>
                  <a class="btn btn-Primary" href="edit.php?ID=<?php echo $Result['ID']; ?>">EDIT</a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
          </div>
       </div>
      </table>


  <?php
  mysqli_close($conn);
  ?>
</body>

</html>