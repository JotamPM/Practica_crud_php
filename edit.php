<?php
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT *FROM task WHERE id=$id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            $title = $row['titulo'];
            $description = $row['descripcion'];
        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "UPDATE task SET titulo='$title', descripcion='$description' WHERE  id=$id";
        mysqli_query($conn, $query);
        $_SESSION['message'] = 'La tarea se ha actualizado';
        $_SESSION['message_type'] =  'info';
        header("Location: index.php");
    }
?>
<?php include("includes/header.php") ?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" value="<?php echo $title;?>" class="form-control" placeholder="Actualiza el título">
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="4" class="form-control" placeholder="Actualiza la descripción"><?php echo $description; ?></textarea>
                        </div>
                        <button class=" btn btn-success" name="update">
                            Actualizar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include("includes/footer.php") ?>