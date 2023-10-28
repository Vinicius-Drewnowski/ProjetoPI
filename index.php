<a href = "cadastro.php">Cadastro</a>         //Nona parte = Puxar as imagens
<hr/>
<?php
include "config.php";
$exib = $conn->("SELECT * FROM arquivos");
$exib -> execute();
if($exib->rowCount()==0){
echo "Não há registro";
}else{
    while($row=$exib->fetch(){
        echo "<a href=\"exib.php/id=".$row['id_arq'].\">".$row['titulo_arq']."</a><br/>";
    }
}

?>