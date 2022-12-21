<?php
include("conexao.php");
session_start();

if (isset($_SESSION['usuario']) && isset($_SESSION['nome'])) {
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
                <a class="nav-link active" href="index.php">
                    <img class="logo" src="logo.jpg">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Faça Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cadastro.php">Cadastrar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Músicas</a>
            </li>
        </ul>
    </header>

    <body>
        <div class="container">

            <div class="row">
                <br><br>
            </div>

            <div class="row">
                <div class="col">
                    <div class="userInfo">
                        <h1> <?php echo $_SESSION['usuario'] ?> </h1>
                        <h2> <?php echo $_SESSION['nome'] ?> </h2>
                        <a href="logout.php">Fazer logout</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <br>
            </div>

            <div class="row">
                <div class="col">
                    <div class="musicInfo">
                        <h1>Músicas Favoritas</h1>
                    </div>
                </div>

                <div class="col">
                    <div class="musicInfo">
                        <form action="">
                            <input name="busca" value="<?php if (isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Digite os termos de pesquisa" type="text">
                            <button type="submit">Pesquisar</button>
                        </form>

                        <table class="table" width="600px" border="1">

                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Artista</th>
                                    <th>Album</th>
                                    <th>Genero</th>
                                    <th>Ano</th>
                                    <th>Id</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if (!isset($_GET['busca'])) {
                                ?>
                                    <tr>
                                        <td colspan="6">Digite algo para pesquisar...</td>
                                    </tr>
                                    <?php
                                } else {
                                    $pesquisa = $connMusic->real_escape_string($_GET['busca']);
                                    $sql_code = "SELECT * 
                                FROM listamusicas 
                                WHERE nome LIKE '%$pesquisa%' 
                                OR artista LIKE '%$pesquisa%'
                                OR album LIKE '%$pesquisa%'
                                OR genero LIKE '%$pesquisa%'
                                OR ano LIKE '%$pesquisa%'";
                                    $sql_query = $connMusic->query($sql_code) or die("ERRO ao consultar! " . $connMusic->error);

                                    if ($sql_query->num_rows == 0) {
                                    ?>
                                        <tr>
                                            <td colspan="6">Nenhum resultado encontrado...</td>
                                        </tr>
                                        <?php
                                    } else {
                                        while ($dados = $sql_query->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $dados['nome']; ?></td>
                                                <td><?php echo $dados['artista']; ?></td>
                                                <td><?php echo $dados['album']; ?></td>
                                                <td><?php echo $dados['genero']; ?></td>
                                                <td><?php echo $dados['ano']; ?></td>
                                                <td><?php echo $dados['id']; ?></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                <?php
                                } ?>

                            </tbody>
                            
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </body>
    <footer>

    </footer>

    </html>

<?php
} else {
    header("Location:login.php");
    exit();
}
?>