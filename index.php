<?php ini_set("display_errors", 1); error_reporting(E_ALL); ?>
<!DOCTYPE html>
<html lang="en">
<?php require 'header.php'; ?>
<body>
<style type="text/css">
  .btn{
    margin: 5px;
  }
</style>
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
                echo '<td width=250><a class="btn btn-info" href="read.php?id='.$row['id'].'">Read</a>';
                echo '<a class="btn btn-warning" href="update.php?id='.$row['id'].'">Update</a>';
                echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a></td>';
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