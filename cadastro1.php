<?php
   require_once('usuario.php');
   $u = new Usuario;
?>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title> Carrapicho </title>
	<link rel="stylesheet" href="estilo.css">
<head>
<body>
   <div class="container">

      <div id="corpo-form" action="#">
         <h1> Cadastrar </h1>
	   <form method="POST" >
            <input type="text"      placeholder="Nome Completo"  name="nome"       maxlength="30">
            <input type="telephone" placeholder="Telefone"       name="telefone"   maxlength="15">
            <input type="email"     placeholder="Email"          name="email"      maxlength="40">
            <input type="text"      placeholder="Endereço"       name="endereco"   maxlength="100">
            <input type="password"  placeholder="Senha"          name="senha"      maxlength="15">
            <input type="password"  placeholder="Confirmar Senha" name="confsenha"  maxlength="15">
            <select  placeholder="Você é:" name=" funcao" >
         <option value="Dono">Dono</option>
         <option value="Cuidador">Cuidador</option>
         <option value="Ambos">Ambos</option>
      </select>
      <input type="submit" value="CADASTRAR">	
	</form>
</div>
</div>
<?php
// verificar se clicou no botão 


if (isset($_POST['nome']))
{
   $nome = addslashes ($_POST['nome']);
   $telefone = addslashes ($_POST['telefone']);
   $email = addslashes ($_POST['email']);
   $endereco = addslashes ($_POST['endereco']);
   $senha = addslashes ($_POST['senha']);
   $confirmarSenha = addslashes ($_POST['confsenha']);
   $funcao = addslashes ($_POST['funcao']);
   //verificar se estar  preenchido
 
   
   if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($endereco) && !empty($senha) && !empty($confrmarSenha) && !empty($funcao))
   {
      var_dump($nome);
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
// echo "Preencha todos os campos!";
}
}

?>
</body> 
</html>