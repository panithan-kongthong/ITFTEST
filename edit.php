<?php
    $conn = mysqli_connect('hololiveth.mysql.database.azure.com', 'panithan@hololiveth', 'folk_zaza2020', 'ITFLab', 3306);

    $id = $_GET['ID'];

    $sql = 'SELECT * FROM labtest WHERE ID = ' . $id . '';
    $query = mysqli_query($conn, $sql);
    if (!$query) {
        header('Location: index.php');
    } else {
        $data = mysqli_fetch_assoc($query);
    }
    ?>
  <!DOCTYPE html>
  <html>

  <head>
      <title>Comment Form</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>

  <body>
      <div class="container">
          <div class="card-header bg-warning text-white d-flex justify-content-between">
           <h3>EDIT</h3>
           <a href="index.php" class="btn btn-light">BACK</a>
          </div>
          <form action="update.php" method="post" id="CommentForm">
              <div class="form-group mt-5">
                  <input type="text" name="id" value="<?php echo $data['ID']; ?>" class="form-control d-none" required>
                  <label class="m-3" for="product">Product</label>
                  <input type="text" class="form-control" name="product" id="idProduct" value="<?php echo $data['Product'];?>">
                  <label class="m-3" for="price">Price</label>
                  <input type="text" class="form-control" name="Price" id="idPrice" value="<?php echo $data['Price'];?>">
                  <label class="m-3" for="discount">Discount</label>
                  <input type="text" class="form-control" name="discount" id="idDiscount" value="<?php echo $data['Discount'];?>">
                  <input class="btn btn-primary mt-5" type="submit" id="commentBtn">
              </div>
          </form>
      </div>
  </body>

  </html>
