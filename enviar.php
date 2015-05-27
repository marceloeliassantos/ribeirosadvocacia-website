<?php

	$nome      =  $_POST['nome'];
	$email     =  $_POST['email'];
	$assunto   =  $_POST['assunto'];
	$mensagem  =  $_POST['msg'];

	mail("XXXX@YYYY.ZZZ","$assunto","$mensagem","FROM:$nome<$email>");
	header('Location: contato.php');  

?>

