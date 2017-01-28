
<?php
  require 'database.php';

  $id=null;
  if (!empty($_GET['id'])) {
    # code...
    $id=$_REQUEST['id'];
  }
  if (null==$id) {
    # code...
    header("Location: index.php");
  }else {
    # code...
    $pdo=Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="select * from customers where id = ?";
    $query= $pdo->prepare($sql);
    $query->execute(array($id));
    $data=$query->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
  }
 ?>

<!DOCTYPE html>
<html lang="en">
<?php require 'header.php'; ?>
 <body>
<style type="text/css">
  .controls{
    display: inline-block;
    margin-bottom: 5px;
  }
</style>
    <div class="container">

                <div class="span10 offset1" >
                    <div class="row">
                        <h3>Read a Customer</h3>
                    </div>

                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Name:</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['name'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Email Address:</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['email'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Mobile Number:</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['mobile'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn btn-primary" href="index.php">Back</a>
                       </div>


                    </div>
                </div>

    </div> <!-- /container -->
 </body>
 </html>