<?php
//verificar se clicou no botão 
if (isset($_POST['nome']),($_POST['telefone']),($_POST[' email']),($_POST['endereco']),($_POST['senha ']),($_POST['confSenha']),($_POST['funcao']))
{
$nome = addslashes ($_POST['nome']);
$telefone = addslashes ($_POST['telefone']);
$email = addslashes ($_POST[' email']);
$endereco = addslashes ($_POST['endereco']);
$senha = addslashes ($_POST['senha ']);
$confirmarSenha = addslashes ($_POST['confSenha']);
$funcao = addslashes ($_POST['funcao']);
//verificar se estar  preenchido
if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($endereco) && !empty($senha) && !empty($confrmarSenha) && !empty($funcao))
{
 $u -> conectar("carrapicho","localhost","root","");
 if ($u -> msgErro == "") //ok
{ 
   if ($senha == $confirmarSenha)
{
 if($u->cadastrar($nome,$telefone,$email,$endereco,$senha,$funcao))
  {
     echo "Cadastrado com sucesso!Faça o login para entrar!";
  }
 else
 {
    echo "Email já está cadastrado!";
 }
}

  else
{
  echo "Senha e conrmar senha nao correspondem!";
}
}
else
{
   echo "Erro:".$u->msgErro;
}
}else 
{
echo "Preencha todos os campos!";
}
}

?>