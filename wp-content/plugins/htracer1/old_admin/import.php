<?php

	if($_POST['ht_in_csv_import'])
	{
		include_once('CSV_Import.php');
		if(!htracer_admin_is_wp())
			exit();
		else
			return;
	}	 
	$GLOBALS['ht_admin_page']='import';
	$GLOBALS['ht_in_ga_import']=true;
	include_once('functions.php');
	htracer_admin_header('HTracer: Импорт из Google Analitics');
?>
	<h1>Импорт данных в HTracer</h1>
	<br />
	Если у вас "SetNames админки" = автоопределение, то перед импортом перейдите на сайт с поисковика несколько раз по запросам содержащим русские слова.
	Это нужно, чтобы HTracer определил кодировку в которой CMS сайта запрашивает данные у MySQL. Если вы для оптимизации задали группировку запросов, то отключите ее.
	<br /><br />
	Импорт данных в HTracer нужен для того, чтобы HTracer быстрее начал работать в полную силу.
	Импорт данных следует проводить только один раз за всю работу скрипта, после его установки.
	<br />
	<h2>Импорт из Google Analitics</h2>
<?php
	$Data=NULL;
	if(isset($_POST['Data']))
		$Data=$_POST['Data'];
	if($Data && isset($_POST['was_ht_import_post']) && $_POST['was_ht_import_post'])
		echo '<h2> Импортирована информация о '.HTracer::ImportFromGA($Data).' переходах</h2>';
?>
<style>
	.normal_ul
	{	
		list-style-position: outside;
		list-style-type:	 decimal;
		clear:both;
	}
	.normal_ul li
	{	
		list-style-position: outside;
		list-style-type:	 decimal;
		clear:both;
	}
		
</style>
<ol class="normal_ul">
	<li>
		Зайдите в Google Analitics и выберите сайт
	</li>
	<li>		
		Перейдите в "обзор содержания"
	</li>
	<li>		
		Нажмите по ссылке "просмотреть полный отчет" 
	</li>
	<li>		
		Вверху таблицы рядом с надписью "страницы" есть выпадающий список("нет"). 
		Выберите в нем "ключевое слово"
	</li>
	<li>		
		Под таблицей есть ссылка расширенный фильтр шелкните на ней.
	</li>
	<li>		
		Выберите "искл" и впишите "not set"
	</li>
	<li>		
		Выберите как можно больший диапозон дат
	</li>
	<li>		
		Под таблицей справа есть выпадающий список("10") выберите в нем 500
	</li>
	<li>		
		 Вверху над графиком есть кнопка экспортировать нажмите ее и выберите CSV
	</li>
	<li>		
		 Файл открывайте текстовым редактором отличным от блокнота (он не правильно распознает переносы строк)
	</li>		
</ol>
<br style="clear:both" />
Импорт может занять несколько минут<br />
Если вы хотите импортировать несколько страниц статистики, то лучше импортировать их за один раз<br />

<form method="POST">
	<textarea name="Data" wrap="off" rows="10" style="width:920px; white-space:nowrap; font-size:90%"></textarea><br />
	<!--<input type="checkbox" name="idelallquery" value="1" />Отчистить информацию о переходах перед импортом<br />-->
	<input type="submit" value="Импортировать" /><br />
	<input type="hidden" name='was_ht_import_post' value='1' />
</form>
<br style="clear:both" />

<?php include_once('CSV_Import.php');?>

<?php htracer_admin_footer();?>