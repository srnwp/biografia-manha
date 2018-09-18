<?php
include("Conexao.php");

$msg=false;
if(isset($_FILES['arquivo'])){
    "arquivo.jpg";
    $extensao=strtolower(substr($_FILES['arquivo']['name'], -4));
    $novo_nome=md5(time()).$extensao;
    $diretorio="upload/";
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
    $sql_code="INSERT INTO arquivo(codigo,arquivo,data) VALUES(null,$novo_nome, NOW())";
    if($mysqli->query($sql_code)){
        $msg="Arquivo enviado com sucesso!";
    }else{
        $msg ="Falha ao enviar arquivo";
        }
}
?>
<html>
  <head>
    <title></title>
    <meta content="utf-8">
    <style></style>
  </head>
  <body>
  <h1>Upload de Arquivos</h1>
  
    <form action="upload.php" method="POST" enctype="multipart/form-data"></form>
    <input type="file" name="arquivo" required >
    <input type="submit" value="Enviar">
    <?php if($msg is false) echo "<p> $msg </p>"; ?>
    </form>
    
  </body>
</html>
