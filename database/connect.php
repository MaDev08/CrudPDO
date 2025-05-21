<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pdo_php";

try {
  $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
  //ALERTA O ERRO, CASO OCORRA
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connexão bem-sucedida!!!";
} catch(PDOException $e) {
  echo "Erro: " . $e->getMessage();
}
?>