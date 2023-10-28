<?php
include "config.php";                                                   //Décima parte = Exibição final
$exib = $conn -> prepare("SELECT * FROM arquivos WHERE id_arq = :id");
$exib -> bindValue(":id", $_GET['id']);
$row -$exib -> fetch();
?>
<h1><?php echo $row['titulo_arq']; ?></h1>
<img src = "<?php echo $row['url_arq']; ?>"/>
<br/><a href = "index.php">Voltar</a>