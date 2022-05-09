<?php
	    include_once 'C:/xampp/htdocs/stylistic-master/Controller/livraisonC.php';
	$livraisonC=new livraisonC();
	$livraisonC->supprimerlivraison($_GET["id"]);
	header('Location:about.php');
?>