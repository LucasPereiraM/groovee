<?php
include ('conexao.php');

$email = $senha = $nome = "";
$emailErr = $senhaErr = $nomeErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["nome"])) {
      $nameErr = "Campo NOME é obrigatório!";
    } else {
      $nome = test_input($_POST["nome"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nomeErr = "Apenas letras e espaços em brancos permitidos!";
      }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Campo EMAIL é necessário";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Formato de email inválido";
        }
    }

    $senha = $_POST["senha"];
    $uppercase = preg_match('@[A-Z]@', $senha);
    $lowercase = preg_match('@[a-z]@', $senha);
    $number = preg_match('@[0-9]@', $senha);
    $specialChars = preg_match('@[^\w]@', $senha);
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($senha) < 8) {
        $senhaErr = "Senha deve ter: 8 caracteres, incluir pelo menos uma letra maiúscula, um número, e um caractere especial.";
    }else{
        $senha = test_input($senha);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>