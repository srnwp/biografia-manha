<?php
include("Conexao.php");

$arquivos_permitidos=['jpg','jpeg','png'];
$arquivos=$_FILES['arquivos'];
$nomes=$arquivos['name'];
for($i=0;$i<count($nomes);$i++):
    $extensao=explode('-', $nomes($i));
    $extensao=end($extensao);
    if(in_array($extensao,$arquivos_permitidos)):
        $query=$con->query("insert into tb_arquivos values(default, '$nomes[$i]')")
            if(mysqli_affected_rows($con)>0):
                $_SESSION['sucesso']='Arquivo(s) enviado(s) com sucesso!';
                $destino=header("Location:../index.html");
            endif;
    else:
        $_SESSION['sucesso']='Existem arquivos que não foram enviados, por não obedecerem as normas de upload"';
        $destino=header("Location:../index.html");
    endif;
endfor;
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
    <input type="file" name="arquivo[]" multiple required >
    <input type="submit">
    <?php if(isset($_SESSION['erro'])):
            echo $_SESSION['erro'];
            session_unset();
          elseif(isset($_SESSION['sucesso'])):
            echo $_SESSION['sucesso'];
            session_unset();
          endif;
    ?>
    </form>
    
  </body>
</html>
