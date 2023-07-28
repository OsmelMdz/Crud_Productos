<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $nombre = $_POST['nombre'];
  $description = $_POST['description'];
  $stock = $_POST['stock'];
  $id_categoria = $_POST['id_categoria'];
  $id_usuario = $_POST['id_usuario'];
  $query = "INSERT INTO task(nombre, description,stock,id_categoria,id_usuario) VALUES ('$nombre', '$description','$stock','$id_categoria','$id_usuario')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
