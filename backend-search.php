<?php
include('conexao.php');

if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * 
    FROM listamusicas 
    WHERE nome LIKE ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = $_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<p>" . $row["nome"] . "</p>";
                    echo "<p>" . $row["artista"] . "</p>";
                    echo "<p>" . $row["album"] . "</p>";
                    echo "<p>" . $row["genero"] . "</p>";
                    echo "<p>" . $row["ano"] . "</p>";
                }
            } else{
                echo "<p>Nenhum resultado encontrado</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);

?>