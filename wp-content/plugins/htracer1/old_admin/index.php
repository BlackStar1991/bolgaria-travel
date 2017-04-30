<?php
	include_once('functions.php');
	htracer_admin_header('Настройки HTracer');
?>	
	<h1>Добро пожаловать в админку HTracer!</h1> 
	<br />
	<a href="admin.php">Редактирование переходов</a> &mdash; позволяет добавлять и удалять ключевые слова.<br /><br />
	<a href="import.php">Импорт</a> &mdash; можно импортировать из Google Analitic, LiveInternet или других источников.
		Нужен для того что-бы скрипт быстрее начал работать в полную силу. <br /><br />
	<a href="export.php">Экспорт</a> &mdash;  в Sape, Руки, Сеопульт или ВебЭффектор. Можно купить ссылочек и еще лучше продвинуться.
<?php htracer_admin_footer();?>	