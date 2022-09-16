<?php
    if( $_FILES['archivo']['size'] > 1000000 ) {
        echo "No se pueden subir archivos con pesos mayores a 1MB";
    } 
    else {
        
        if (is_uploaded_file ($_FILES['archivo']['tmp_name'])){
            
            $nombreDirectorio = "archivos/";
            $nombrearchivo = $_FILES['archivo']['name'];
            $nombreCompleto = $nombreDirectorio . $nombrearchivo;
            $extencion = pathinfo($nombrearchivo, PATHINFO_EXTENSION);
            if($extencion=="jpg" || $extencion == "jpeg" || $extencion == "png" || $extencion == "gif"){
                if (is_file($nombreCompleto)){
                    $idUnico = time();
                    $nombrearchivo = $idUnico . "-" . $nombrearchivo;
                    echo "Archivo repetido, se cambiara el nombre a $nombrearchivo <br><br>";
                }
                move_uploaded_file ($_FILES['archivo']['tmp_name'],
                $nombreDirectorio . $nombrearchivo);
                echo "El archivo se ha subido satisfactoriamente al directorio $nombreDirectorio<br>";
            }else{
                echo "El archivo debe ser una imagen <br>";
            }
        }
        else{
        echo "No se ha podido subir el archivo <br>";
        }
    } 
?>