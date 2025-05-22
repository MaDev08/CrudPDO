<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$database = "to_do_list";

try {
  $pdo = new PDO("mysql:host=$servername;dbname=to_do_list", $username, $password);
  //ALERTA O ERRO, CASO OCORRA
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connexão bem-sucedida!!!";
} catch(PDOException $e) {
  echo "Erro: " . $e->getMessage();
}
?>