<?php


/////////////////CONEXAO 
try 
{
  $pdo = new PDO("mysql:dbname=vkgaming; host:localhost;", "root","");
} 
catch (PDOException $e)  
{
  echo "Erro com bando de dados: ".$e->getMessage();
}
catch (Exception $e)
{
  echo "Erro generico: ".$e->getMessage();
}


/////////////////INSERT

$nome =  $_POST['nomeCompleto'];
$nick =  $_POST['nick'];
$email =  $_POST['email'];
$linkSteam = $_POST['linkSteam'];
$mensagem =  $_POST['mensagem'];

$res = $pdo->prepare("INSERT INTO usuario(nome_completo, nick, email, link_steam, mensagem)
VALUES (:n, :ni, :e, :l, :m)");

$res->bindValue(":n","$nome");
$res->bindValue(":ni","$nick");
$res->bindValue(":e","$email");
$res->bindValue(":l","$linkSteam");
$res->bindValue(":m","$mensagem");
$res->execute();

echo "
  <script>  
      alert('Dados inseridos com sucesso');
      window.location.href='index.php';
  </script>"

?>



