<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>CRUD</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <h3>CRUD PHP MySQL Bootstrap</h3>
      <div class="row">
          <p><a href="create.php" class="btn btn-success">Create</a></p>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email Address</th>
              <th>Mobile</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include 'database.php';
              $pdo=Database::connect();
              $sql='select * from customers order by id desc';
              foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'.$row['name'] . '</td>';
                echo '<td>'.$row['email'] . '</td>';
                echo '<td>'.$row['mobile'] . '</td>';
                echo '<td><a class="btn" href="read.php?id='.$row['id'].'">Read</a></td>';
                echo '</tr>';

                # code...
              }
              Database::disconnect();
             ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php
echo "<footer><p class= text-center>" . date("Y") . " jose-torreblanca.com</p></footer>";
?>
</body>
</html>