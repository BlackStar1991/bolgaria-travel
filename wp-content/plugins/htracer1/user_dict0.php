<?php
	//Переименуйте это файл в user_dict.php
	
	//Чтобы довать аббревиатуру, напишите 
	$GLOBALS['htracer_dict']['ABBRs']['абвгд']=1;	// Вместо абвгд напишите необходимое слово в нижнем регистре

	//Добаввление имени собственного
	$GLOBALS['htracer_dict']['upcase_words']['абвгд']=1;	
	
	//добавление фильтра
	$GLOBALS['htracer_dict']['bad_words'][]=' хуй '; //ищеться слово хуй
	$GLOBALS['htracer_dict']['bad_words'][]=' пизд'; //ищеться слово начинающиеся на пизд
	$GLOBALS['htracer_dict']['bad_words'][]='пизд'; //ищеться подстрока пизд
	
	

	
?>