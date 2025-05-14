<?php
$servidor = "localhost";
$banco = "bancoemaus";
$usuario = "root";
$senha = "";

try {
    $conn = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8mb4", $usuario, $senha, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Lança exceções em erros
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Retorna arrays associativos por padrão
        PDO::ATTR_EMULATE_PREPARES => false, // Usa prepares nativos do MySQL (mais seguro)
    ]);
} catch (PDOException $e) {
   
    $error = $e ->getMessage();
    echo "Erro: $error";
   
    exit;
}
?>
