<?php 
	require "lib/functions.php";
?>


<form action="#" method =''>
	<?= input('Login : ', 'text', 'login') ?>
	<?= input('password', 'password', 'password') ?>
	<?= select('Role', ['Admin','Prof','Eleve']) ?>
	<?= checkbox('Se souvenir de moi ?', 'remember') ?>
	<?=
</form>