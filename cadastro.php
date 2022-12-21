<?php
include('conexao.php');
include('auth.php');

if (isset($_POST['cadastrobtn']) && !$empty) {
  
  $result = mysqli_query($conn, "INSERT INTO usuarios(nome, email, senha)
            VALUES ('$nome', '$email', '$senha')");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groovee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</head>
<header>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <img class="logo" src="logo.jpg">
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Faça Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="cadastro.php">Cadastrar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="busca.php">Músicas</a>
        </li>
      </ul>
</header>
<body>
    <div>
        <br><br><br>
    </div>

    <div class="form">
        <h1>Cadastro</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="nome"><b>Nome: </b></label>
            <input type="text" name="nome"><br>
            <?php echo $nomeErr . "<br>"?>

            <label for="email"><b>E-mail: </b></label>
            <input type="text" name="email"><br>
            <?php echo $emailErr . "<br>"?>

            <label for="senha"><b>Senha: </b></label>
            <input type="password" name="senha"><br>
            <?php echo $senhaErr . "<br>"?><br>

            <input type="submit" id="enviar" name="cadastrobtn"><br>
        </form>
    </div>
</body>
<footer>

</footer>
</html>