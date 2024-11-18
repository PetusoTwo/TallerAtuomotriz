<!-- Conexion usando php con PDO -->
<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=TallerMecanico','root','root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}
?>