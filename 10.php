<?php 
include 'includes/header.php';

try {
    // Conectar a la BD con PDO
    $db = new PDO('mysql:host=localhost;dbname=bienes_raices', 'root', '123456789');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Creamos el query
    $query = "SELECT titulo, imagen FROM propiedades";

    // Lo preparamos
    $stmt = $db->prepare($query);

    // Lo ejecutamos
    $stmt->execute();

    // Obtener los resultados
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Iterar
    if($resultado) {
        foreach($resultado as $propiedad) {
            echo $propiedad['titulo'] . "<br>";
            echo $propiedad['imagen'] . "<br>";
        }
    } else {
        echo "No se encontraron propiedades.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

include 'includes/footer.php';
?>
