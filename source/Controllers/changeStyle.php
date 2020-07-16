<?php 

	//include "../controler/style.php";

	$cor = $_POST["corSite"];
	$linkFonte = $_POST["linkFonte"];
	$nomeFonte = $_POST["nomeFonte"];
	$tipoFonte = $_POST["tipoFonte"];

	$style = Style::updateStyle($cor, $linkFonte, $nomeFonte, $tipoFonte);

	header("Location: ../view/configuracoes.php");