<?php
Class Usuario
{
  private $pdo;
  public  $msgErro = "";

  public function conectar ($nome,$host ,$usuario, $senha)
  { 
     global $pdo;
     try
    {
      $pdo = new PDO ("mysql:bdname". $nome.";host".$usauario,$senha);
     } catch (PDOException  $e){
        $msgErro - $e->getMessage();
     }
 }
     public function cadastar ($nome, $telefone,$email,$endereco,$senha,$funcao)
   {
    global $pdo;
     //verificar se já é cadsstrado
    $sql = $pdo -> prepare ("SELECT id FROM usuarios WHERE email = :e");
    $sql -> bindValue(":e",$email);
    $sql -> execute();
     if ($sql ->eowCount() > 0)
      {
         return false; //ja esta cadastrado
      }
      else
 
     {
        //caso nao,cadastrar
      $sql = $pdo -> prepare ("INSERT INTO usuarios (nome,telefone,email,endereco,senha,funcao) VALUES (:n,:t,:e,:en,:s,:f)");
      $sql -> bindValue(":n",$nome);
      $sql -> bindValue(":t",$telefone);
      $sql -> bindValue(":e",$email);
      $sql -> bindValue(":en",$endereco);
      $sql -> bindValue(":s",md5 ($senha));
      $sql -> bindValue(":f",$funcao);
      $sql -> execute();
      return true;
      
   }   
// function logar (){
//       global $pdo;
//      //verificar se email e senha já são cadsstrados,se sim...
//     $sql = $pdo -> prepare ("SELECT id FROM usuarios WHERE email = :e AND senha =:s");
//     $sql -> bindValue(":e",$email);
//     $sql -> bindValue(":s",md5 ($senha));
//     $sql -> execute();
//     if ($sql -> rowCount() >0)
//     {
//      // entrar no sistema (sessao)
//      $dado = $sql-> fetch();
//      session_start();
//      $_SESSION´['id'] = $dado['id'];
//      return true; //cadastrado com sucesso
//     }
//     else
//     {
//      return false; //não foi possivel logar 
//     }
  }
}
?>