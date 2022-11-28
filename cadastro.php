<?php
class User{
    public $nome;
    public $email;
    public $senha;
   
    function __construct($nome, $email, $senha){
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }
    function get_nome() {
        return $this->nome;
    }
    function get_email() {
        return $this->email;
    }
    function get_senha() {
        return $this->senha;
    }
}
$user = new User($_POST["nome"], $_POST["email"], $_POST["senha"]);
echo $user->get_nome();
echo $user->get_email();
echo $user->get_senha();
?>