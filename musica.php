<?php
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
        
        <script src="https://open.spotify.com/embed-podcast/iframe-api/v1" async></script>

    </head>
    <header>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">
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
                <a class="nav-link" href="cadastro.php">Cadastrar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="busca.php">Músicas</a>
            </li>
        </ul>
    </header>

    <body>
        <div class="container">

            <div>
                <br><br>
            </div>

            <div class="row">

                <div class="col"> 
                    <script> var php_link = "<?php echo $_SESSION['link']; ?>"; </script>
                    <div id="embed-iframe"></div>
                </div>

                <div class="col">
                    <div class="musicInfo">
                        <h1> Música: <?php echo $_SESSION['nomeMusica'] ?> </h1>
                        <h2> Artista: <?php echo $_SESSION['artista'] ?> </h2>
                        <h2> Álbum: <?php echo $_SESSION['album'] ?> </h2>
                        <h2> Gênero: <?php echo $_SESSION['genero'] ?> </h2>
                        <h2> Ano: <?php echo $_SESSION['ano'] ?> </h2>
                    </div>
                </div>

                <div class="row"> 
                    <div class="musicInfo">
                        <h1> Descrição: </h1>
                        <h2> <?php echo $_SESSION['descricao'] ?>  </h2>
                    </div>
                </div>
            </div>

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