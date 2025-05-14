<?php
session_start();
include 'conexao.php';
include 'url.php';

$dados = $_POST;

//modificações de banco
if (!empty($dados)) {
    print_r($dados);
  
 //criar contatos
 if($dados['type'] === 'criar'){

 }
 
//seleção de dados
} else {

    $id;

    if (!empty($_GET)) {
        $id = $_GET['id'];
    }
    //retorna os dados de um contato
    if (!empty($id)) {
        $query = 'SELECT * FROM pacientes WHERE id = :id';

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $paciente = $stmt->fetch();

    } else {
        //retorna todos os pacientes salvos 
        $pacientes = [];
        $query = 'SELECT * FROM pacientes';

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $pacientes = $stmt->fetchAll();
    }
}

//fechar conexão
$conn = null;

?>
