<?php
include("db.php");
$nombre = '';
$description= '';
$stock= '';
$id_categoria= '';
$id_usuario= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $description = $row['description'];
    $stock = $row['stock'];
    $id_categoria = $row['id_categoria'];
    $id_usuario = $row['id_usuario'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $description = $_POST['description'];
  $stock = $_POST['stock'];
  $id_categoria = $_POST['id_categoria'];
  $id_usuario = $_POST['id_usuario'];

  $query = "UPDATE task set nombre = '$nombre', description = '$description', stock = $stock, id_categoria = $id_categoria, id_usuario = $id_usuario WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update Nombre">
        </div>
        <div class="form-group">
        <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $description;?></textarea>
        </div>
        <div class="form-group">
            <input name="stock" type="number" class="form-control" value="<?php echo $stock; ?>" placeholder="Update Stock">
          </div>
          <div class="form-group">
          <input name="id_categoria" type="number" class="form-control" value="<?php echo $id_categoria; ?>" placeholder="Update Categoria">
          </div>
          <div class="form-group">
          <input name="id_usuario" type="number" class="form-control" value="<?php echo $id_usuario; ?>" placeholder="Update Usuario">
          </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
