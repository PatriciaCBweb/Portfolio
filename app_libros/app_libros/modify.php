<?php
    //Sesion
	session_start();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css"> 
        <title>Modificar</title>
    </head>
    <body>
        
    </body>
    </html>

<?php
    //Conexion
    include_once "conexion.php";

    //Variables
    $usuario = NULL;
    $libro = $coleccion = $n_autor =$ap_autor = $delete = $modify = $id = NULL;

    if(isset($_REQUEST['libro'])){
        $libro = $_REQUEST['libro'];
    }

    if(isset($_REQUEST['coleccion'])){
        $coleccion = $_REQUEST['coleccion'];
    }

    if(isset($_REQUEST['n_autor'])){
        $n_autor = $_REQUEST['n_autor'];
    }

    if(isset($_REQUEST['ap_autor'])){
        $ap_autor = $_REQUEST['ap_autor'];
    }

    if(isset($_REQUEST['book'])){
        $book = $_REQUEST['book'];
    }

    if(isset($_REQUEST['coll'])){
        $coll = $_REQUEST['coll'];
    }

    if(isset($_REQUEST['nau'])){
        $nau = $_REQUEST['nau'];
    }

    if(isset($_REQUEST['apau'])){
        $apau = $_REQUEST['apau'];
    }

    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
    }
      
    if(isset($_REQUEST['modify'])){
        $modify = $_REQUEST['modify'];
    }

?>

<div class="container-i">
    <div class="index_container newbook">

<?php

    $sql = "SELECT * FROM libros WHERE libro='$libro' AND coleccion='$coleccion' AND n_autor='$n_autor' AND ap_autor='$ap_autor'";

    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
  
        echo "<form method='post' action='modify.php'>";
            
            echo "<div class='input_search_index'><label class='label'>Libro: </label><input type='text' name='book' value='".$row['libro']."'></div>";
            echo "<div class='input_search_index'><label class='label'>Colección: </label><input type='text' name='coll' value='".$row['coleccion']."' class='input_search_index'></div>";
            echo "<div class='input_search_index'><label class='label'>Autor: </label><input type='text' name='nau' value='".$row['n_autor']."' class='input_search_index'>";
            echo "<input type='text' name='apau' value='".$row['ap_autor']."' class='input_search_index'></div>";
            echo "<input type='hidden' name='id' value='".$row['id']."'>";
            echo "<button name='modify' class='search_button'>Modificar</button>";
        echo "</form>";
        echo "<a href='book-list.php' class='index_button'><button>Volver</button></a>";



if(isset($modify)){

    $sql = "UPDATE libros SET libro='$book',n_autor='$nau',ap_autor='$apau',coleccion='$coll' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Entrada modificada";
        echo "<script> window.location='book-list.php'; </script>";
    } else {
    echo "Error updating record: " . $conn->error;
    }  

}

$conn->close();

?>

    </div>
</div>    