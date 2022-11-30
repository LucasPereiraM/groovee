<?php
include('conexao.php');

$email = $senha = $nome = "";
$emailErr = $senhaErr = $nomeErr = "";
$test = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["nome"])) {
    $nomeErr = "Campo NOME é obrigatório!";
  } else {
    if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["nome"])) {
      $nomeErr = "Apenas letras e espaços em brancos permitidos!";
    } else{
      $nome = test_input($_POST["nome"]);
      $test=true;
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Campo EMAIL é obrigatório!";
  } else {
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Formato de email inválido";
    } else{
      $email = test_input($_POST["email"]);
      $test=true;
    }
  }

  if(empty($_POST["senha"])){
    $senhaErr = "Campo SENHA é obrigatório!";
  } else{
    $uppercase = preg_match('@[A-Z]@', $_POST["senha"]);
    $lowercase = preg_match('@[a-z]@', $_POST["senha"]);
    $number = preg_match('@[0-9]@', $_POST["senha"]);
    $specialChars = preg_match('@[^\w]@', $_POST["senha"]);
    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST["senha"]) < 8) {
      $senhaErr = "Senha deve ter: 8 caracteres, incluir pelo menos uma letra maiúscula, um número, e um caractere especial.";
    } else {
      $senha = test_input($_POST["senha"]);
      $test = true;
    }
  }
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>