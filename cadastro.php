<form action="cadastro.php" method="post" enctype = "multipart/form-data">
<input type="text" name = "titulo" placeholder ="Entre com o titulo"/><br/>
<input type ="file" name = "arquivo"/><br/>                                    //primeira parte = formulário
<input type ="subimit" name = "upload" value = "gravar"/>
</form> 
                                                                            //segunda parte = banco de dados
<?php
if(isset($_POST['upload'])){                                                  //quarta parte = cabeçario
$titulo = $_POST['titulo'];
$_UP['pasta'] = "arquivos/";
$_UP['tamanho'] = 1024*1024*2;
$_UP['extensao']=['jpg', 'jpeg', 'png', 'gif'];
$_UP['renomear'] = true;

$explode = explode('.',$_FILES['arquivo']['nome']);                          //Quinta parte = Validação
$aponta = end($explode);
$extensao = strtolower($aponta);
if(array_search($extensao, $_UP['extensao'])===false){
echo "Extensão não aceita";
exit;
}

if($_UP['tamanho']<=$_FILES['arquivos']['size']){                           //Sexta parte = Tamanho do arquivo
    echo "Arquivo muito grande";
    exit;
}

if($_UP['renomear']===true){                                               //Sétima parte = Renomear
    $nome_final = md5(time()).".$extensao";        
}else{
    $nome_final = $_FILES['arquivos']['name'];
}

if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'].$nome_final)){  //Oitava parte = Mover arquivos
$url=$_UP['pasta'].$nome_final;
include "config.php"                                                                //Oitava.5 parte = Armazenar a imagem no banco de dados
$grava = $conn -> prepare("INSERT INTO arquivos (id_arq, titulo_arq, url_arq) VALUES (NULL, :titulo, :url)");
$grava -> bindValue(":titulo", $titulo);
$grava -> bindValue(":url", $url);
$grava -> execute();
echo "Gravado com Sucesso"; 
}
}
?>

<br/>
<a href = "index.php">Voltar</a>