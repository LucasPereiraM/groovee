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

        <link rel="stylesheet" href="barra_pesquisa.css">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src="https://open.spotify.com/embed-podcast/iframe-api/v1" async></script>

        <script>
            window.onSpotifyIframeApiReady = (IFrameAPI) => {
                let element = document.getElementById('embed-iframe');
                let options = {
                    uri: php_link
                };
                let callback = (EmbedController) => {};
                IFrameAPI.createController(element, options, callback);
            };
        </script>

        <script>
            $(document).ready(function() {
                $('.search-box input[type="text"]').on("keyup input", function() {
                    /* Get input value on change */
                    var inputVal = $(this).val();
                    var resultDropdown = $(this).siblings(".result");
                    if (inputVal.length) {
                        $.get("backend-search.php", {
                            term: inputVal
                        }).done(function(data) {
                            // Display the returned data in browser
                            resultDropdown.html(data);
                        });
                    } else {
                        resultDropdown.empty();
                    }
                });

                // Set search input value on click of result item
                $(document).on("click", ".result p", function() {
                    $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                    $(this).parent(".result").empty();
                });
            });
        </script>

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
                <a class="nav-link active" href="login.php">Faça Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="cadastro.php">Cadastrar</a>
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

            <div class="row-1">
                <form action="">
                    <div class="search-box">
                        <input type="text" autocomplete="off" placeholder="Pesquise músicas, artistas, albuns, gêneros..." name="busca"/>
                        <div class="result"></div>
                    </div>
                    <button type="submit">Pesquisar</button>
                </form>
            </div>

            <div class="row">
                <div class="col">
                    <table class="table table-striped table-dark" border="1">

                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Artista</th>
                                <th>Album</th>
                                <th>Genero</th>
                                <th>Ano</th>
                                <th>Prévia</th>
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
                                $pesquisa = $conn->real_escape_string($_GET['busca']);
                                $sql_code = "SELECT * 
                                FROM listamusicas 
                                WHERE nome LIKE '%$pesquisa%' 
                                OR artista LIKE '%$pesquisa%'
                                OR album LIKE '%$pesquisa%'
                                OR genero LIKE '%$pesquisa%'
                                OR ano LIKE '%$pesquisa%'";
                                $sql_query = $conn->query($sql_code) or die("ERRO ao consultar! " . $conn->error);

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
                                            <td> <a href="musica.php"> <?php echo $dados['nome']; ?> </a> </td>
                                            <td><?php echo $dados['artista']; ?></td>
                                            <td><?php echo $dados['album']; ?></td>
                                            <td><?php echo $dados['genero']; ?></td>
                                            <td><?php echo $dados['ano']; ?></td>

                                            <script>
                                                var php_link = "<?php echo $dados['link']; ?>";
                                            </script>
                                            <td>
                                                <div id="embed-iframe"></div>
                                            </td>
                                        </tr>

                                        <?php
                                        $_SESSION['nomeMusica'] = $dados['nome'];
                                        $_SESSION['artista'] = $dados['artista'];
                                        $_SESSION['album'] = $dados['album'];
                                        $_SESSION['genero'] = $dados['genero'];
                                        $_SESSION['ano'] = $dados['ano'];
                                        $_SESSION['link'] = $dados['link'];
                                        $_SESSION['descricao'] = $dados['descricao'];
                                        ?>
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