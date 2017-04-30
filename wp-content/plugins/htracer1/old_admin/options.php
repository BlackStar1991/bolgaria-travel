<?php 
	$GLOBALS['ht_admin_page']='options';
	$GLOBALS['ht_is_this_admin_options']=true;
	include_once('functions.php');
	htracer_admin_header('Настройки HTracer');
	$ht_options_array=$GLOBALS['ht_options_array'];
	
	//echo '<pre>';
	//print_r($HTracer->select_queries_like(false));
	
	foreach($ht_options_array as $Name => $Default)
		if(!isset($GLOBALS[$Name]))
			$GLOBALS[$Name]=$Default;
	if(isset($_POST['waspost']) && $_POST['waspost'])
	{
		// Пароли мы экранируем, поскольку возможен случай RegisterGlobals
		foreach($_POST as $Key => $Value)
			if(strpos($Key,'_htwdinput'))
				$_POST[str_replace('_htwdinput','',$Key)]=$Value;
		
		//echo '<pre>';
		//print_r($_POST);
		if(isset($_POST['htracer_admin_pass']) 
		&& $_POST['htracer_admin_pass']!=='******')
			$_POST['htracer_admin_pass']=ht_pwd_crc($_POST['htracer_admin_pass']);
		foreach($ht_options_array as $Name => $Default)
		{
			if(strpos($Name,'_pass') && $_POST[$Name]=='******')
				continue;
			if(isset($_POST[$Name]))
				$GLOBALS[$Name]=$_POST[$Name];
			else
				$GLOBALS[$Name]=false;
			if($Default===true||$Default===false)
			{	
				if($GLOBALS[$Name]==='0'||$GLOBALS[$Name]===0)
					$GLOBALS[$Name]=false;
				elseif($GLOBALS[$Name]==='1'||$GLOBALS[$Name]===1)
					$GLOBALS[$Name]=true;
			}
		}
		$Words=$GLOBALS['htracer_site_stop_words'];
		$Words=mb_strtolower($Words,'utf-8');
		$Words=explode(',',$Words);
		foreach($Words as $i=>$Word)
			$Words[$i]=trim($Word);
		$Words=join(',',$Words);
		$GLOBALS['htracer_site_stop_words']=$Words;
		$GLOBALS['htracer_encoding']=$_POST['htracer_encoding'];
		if(!$GLOBALS['htracer_encoding'])
			$GLOBALS['htracer_encoding']='utf-8';
		$HTT_Where=Array();
		//	$HTT_Where=' +'.$GLOBALS['insert_keywords_where'].'+ ';
		if($_POST['htracer_insert_meta_keys'])
			$HTT_Where[]='meta_keys';
		if($_POST['htracer_insert_img_alt'])
			$HTT_Where[]='img_alt';
		if($_POST['htracer_insert_a_title'])
			$HTT_Where[]='a_title';
		$GLOBALS['insert_keywords_where']=join('+',$HTT_Where);	
		$Data='
		// This file was created automatically by options.php
		// DON`T CHANGE!!!
		
			if(!isset($GLOBALS["htracer_encoding"]) 
			 ||!$GLOBALS["htracer_encoding"] 
			 ||strtolower($GLOBALS["htracer_encoding"])==="auto"
			 ||strtolower($GLOBALS["htracer_encoding"])==="global")
				$GLOBALS["htracer_encoding"]="'.$GLOBALS['htracer_encoding'].'";
		';
		foreach($ht_options_array as $Name => $Default)
			$Data.=HT_GetOptionPHP($Name, $Default);
		$Data="<?php \n $Data \n ?>";
		
		$ConfigPath=str_replace('old_admin','admin',dirname(__FILE__).'/auto_config.php');
		file_put_contents($ConfigPath,$Data);
		@chmod($ConfigPath, 0777);
		if(!file_exists($ConfigPath))
			echo "<br /><b style='color:red'>File 'admin/auto_config.php' not created. Check permission to HTracer/admin/ folder (must be 777).</b><br />";
		include_once($ConfigPath);
		if($GLOBALS['htracer_mysql'])
		{
			//Проверяем конект к MySQL
			hkey_connect_to_mysql();
			if(!$GLOBALS["hkey_connect_to_mysql_was_error"])
				HTracer::CreateTables();
		}
	}
	hkey_connect_to_mysql();

	$HTT_Where=' +'.$GLOBALS['insert_keywords_where'].'+ ';
	$GLOBALS['htracer_insert_meta_keys']=(bool) strpos($HTT_Where,'+meta_keys+');
	$GLOBALS['htracer_insert_img_alt']=(bool) strpos($HTT_Where,'+img_alt+');
	$GLOBALS['htracer_insert_a_title']=(bool) strpos($HTT_Where,'+a_title+');
?>
	<style>
		th{
			text-align:right; 
			font-weight:normal
		}
		.star_hint{color:gray}
		h2{margin-bottom:5px;}
		input{margin-left:0}
		th{min-width:200px}
	</style>

	<h1>Настройки HTracer</h1>
	<form method="post">
		<h2>Основные</h2>
		<table>
			<tr><th>Включить тестирование:</th>
				<td><?php HT_OutCheckBox('htracer_test'); ?></td></tr>
			<tr><th>Кодировка Вашего сайта:</th>
				<td><?php HT_OutSelect('htracer_encoding',Array('utf-8','windows-1251'));?></td></tr>
			<tr>
				<?php if($GLOBALS['htracer_admin_pass']):?>
					<th>Новый пароль на админку(*):</th>
				<?php else:?>
					<th>Пароль на админку HTracer(*):</th>
				<?php endif;?>
					<td><?php HT_OutPwdInput('htracer_admin_pass');?></td>
			</tr>
		</table>
		<div class="star_hint">
			* &mdash; Пароль хешируеться и записываеться в cookies браузера. Вводить его нужно крайне редко.
			Поэтому, вам может показаться, что он не работает. Вы можете убедиться, что он все-таки работает открыв админку в другом браузере.
		</div>
		<h2>MySQL</h2>
		
		<div class="star_hint">
		Если MySQL выключено, то запись будет происходить в файлы. Этот режим намного медленнее.<br /> 
		Если вы используете файлы и переключитеcь на MySQL, то переходы не будут импортированы. Они останутся в файлах.<br />
		Тоже самое если вы переключитесь из MySQL в файлы.<br />
		БД MySQL для HTracer и для CMS сайта должны совпадать.<br /> 
		Если на сайте нет MySQL или имена БД не совпадают, то включите форсирование MySQL.<br />
		</div><br />
		
		<table>
			<tr><th>Использовать MySQL:</th>
				<td><?php HT_OutSelect('htracer_mysql',Array('0'=>'нет','1'=>'да','forced'=>'Форсировать (*)'));?></td></tr>
			<tr><th>Пользователь MySQL:</th>
				<td><?php HT_OutTextInput('htracer_mysql_login');?></td></tr>
			<tr><th>Пароль к MySQL:</th>
				<td><?php HT_OutPwdInput('htracer_mysql_pass');?></td></tr>
			<tr><th>Имя базы данных:</th>
				<td><?php HT_OutTextInput('htracer_mysql_dbname');?></td></tr>
			<tr><th>Хост MySQL:</th>
				<td><?php HT_OutTextInput('htracer_mysql_host');?></td></tr>
			<tr><th>Префикс таблиц (**):</th>
				<td><?php HT_OutTextInput('htracer_mysql_prefix');?></td></tr>	
			<tr><th>SetNames админки(***):</th>
				<td><?php HT_OutSelect('htracer_mysql_set_names',Array('auto'=>'автоопределение','0'=>'нет','utf8'=>'UTF-8','cp1251'=>'cp1251'));?></td></tr>
			<tr><th>Игнор. mysql_ping(****):</th>
				<td><?php HT_OutCheckBox('htracer_mysql_ignore_mysql_ping');?></td></tr>
		</table>
		<div class="star_hint">
			* &mdash; Если сайт выводит ошибки в стиле "MySQL acess denied", то включайте форсированние.
			<br />
			** &mdash; Используется, когда число БД ограничено на хостинге и в одну БД "запихивается" несколько сайтов. 
			<br />
			*** &mdash; Если вместо запросов в админке вы увидите крокозяблы, то используйте эту опцию. 
			Если вы только что установили HTracer и используете форсирование MySQL, то установите "SetNames админки"=UTF-8. В противном случае менять эту опцию не рекомендую.
			<br />
			**** &mdash; используется при возникновении ошибки "Форсирование MySQL не возможно!"
		</div>
		<h2>Оптимизация</h2>
		<table>
			<tr><th>Актуальность кеша (*):</th>
				<td><?php HT_OutTextInput('htracer_cash_days');?> дней</td></tr>
			<?php if(function_exists('gzcompress')):?>
				<tr><th>GZip cжатие кеша(**):</th>
					<td><?php HT_OutCheckBox('htracer_cash_use_gzip');?></td></tr>	
			<?php endif;?>
			<tr><th>Кешировать только морду и общие данные:</th>
				<td><?php HT_OutCheckBox('htracer_short_cash');?></td></tr>
			<tr><th>Кешировать страницы целиком (***):</th>
				<td><?php HT_OutCheckBox('htracer_cash_save_full_pages');?></td></tr>
			<tr><th>Не создавать таблицы (****):</th>
				<td><?php HT_OutCheckBox('htracer_mysql_dont_create_tables'); ?></td></tr>
			<tr><th>Оптимизировать таблицы(*****):</th>
				<td><?php HT_OutCheckBox('htracer_mysql_optimize_tables'); ?></td></tr>
			<tr><th>Группировать переходы по (******):</th>
				<td><?php HT_OutTextInput('htracer_trace_grooping'); ?></td></tr>
			<tr><th>Только ночное обновление (*******):</th>
				<td><?php HT_OutCheckBox('htracer_only_night_update'); ?></td></tr>
			<tr><th>Закрывать MySQL соединение:</th>
				<td><?php HT_OutCheckBox('htracer_mysql_close'); ?></td></tr>	
			<tr><th>Способ разбора HTML:</th>
				<td><?php HT_OutSelect('htracer_use_php_dom',Array('ht_false'=>'стандартный','ht_true'=>'быстрый (PHP5)')); ?></td></tr>		
		</table>		
		<div class="star_hint">
			* &mdash; Чтобы отключить кеш совсем задайте 0.<br />
			<?php if(function_exists('gzcompress')):?>
				** &mdash; Немного замедляет сайт, но уменьшает место необходимое на кеш.<br />
			<?php endif;?>
			*** &mdash; Ускоряет HTracer за счет увеличения места на кеш.
			<br />
			**** &mdash; Если вы выберите эту опцию, то это немного увеличит скорость, но после каждого обновления вам нужно будет заходить на любую из страниц админки.
			<br />
			***** &mdash; раз в 2000 переходов оптимизирует таблицы 
			<br />
			****** &mdash; переходы могут быть записаны не сразу, а после достижения определенного числа. Для оптимизации необходимо установить значение примерно равное суточному трафику сайта.</div>
			<br />
			******* &mdash; Если опция включена, то переходы будут записываться и таблицы оптимизироваться только с 2 до 6 часов ночи.</div>
		<h2>Вставлять</h2>
		<table>
			<tr><th>Мета Кейвордс:</th>
				<td>
					<?php HT_OutCheckBox('htracer_insert_meta_keys');?>
					&nbsp;&nbsp;&nbsp;&nbsp;Переписывать: 
					<?php HT_OutCheckBox('htracer_meta_keys_rewrite');?>
				</td>
			</tr>
			<tr><th>Альты картинок:</th>
				<td>
					<?php HT_OutCheckBox('htracer_insert_img_alt');?>
					&nbsp;&nbsp;&nbsp;&nbsp;Переписывать: 
					<?php HT_OutCheckBox('htracer_img_alt_rewrite');?>
				</td>
			</tr>
			<tr><th>Титлы ссылок:</th>
				<td>
					<?php HT_OutCheckBox('htracer_insert_a_title');?>
					&nbsp;&nbsp;&nbsp;&nbsp;Переписывать: 
					<?php HT_OutCheckBox('htracer_a_title_rewrite');?>
				</td>
			</tr>
		</table>
		Автовалидация HTML: <?php HT_OutCheckBox('htracer_validate');?>
		<br />
		<h2>Контекстные ссылки</h2>
		<table>
			<tr><th>Вставлять контекстные ссылки:</th>
				<td><?php HT_OutSelect('hkey_insert_context_links',Array('0'=>'нет','1'=>'везде','ranges'=>'в диапозоне (*)'));?></td></tr>
			<tr><th>Стоп-слова сайта через запятую (**):</th>
				<td><?php HT_OutTextInput('htracer_site_stop_words');?></td></tr>
			<tr><th>Выделять жирным ключевики:</th>
				<td><?php HT_OutSelect('htracer_context_links_b',Array('0'=>'нет','only_first'=>'только первый','1'=>'да'));?></td></tr>
		</table>
		<div class="star_hint">
			*  &mdash; В этом случае контекстные ссылки будут вставлены только в текст между &lt;!--htracer_context_links--&gt; и &lt;!--/htracer_context_links--&gt;<br /> 
			** &mdash; Все словоформы, через запятую. Эти слова частично игнорируются при растановке контекстных ссылок. Например, если у вас сайт про Одессу, то стоп-слова: "Одесса, Одессу, Одессы, Одессе"
		</div>
		<h2>Переходы</h2>
		<table>
			<tr><th>Запоминать переходы:</th>
				<td><?php HT_OutCheckBox('htracer_trace');?></td></tr>
			<tr><th>Удвоить вес переходов со второй и более страниц (*):</th>
				<td><?php HT_OutCheckBox('htracer_trace_double_not_first_page');?></td></tr>
			<tr><th>Удвоить вес коммерческих запросов (**):</th>
				<td><?php HT_OutCheckBox('htracer_trace_double_comercial_query');?></td></tr>
			<tr><th>Секс-фильтр (***):</th>
				<td><?php HT_OutCheckBox('htracer_trace_sex_filter');?></td></tr>
			<tr><th>Фильтровать "бесплатные" слова (****):</th>
				<td><?php HT_OutCheckBox('htracer_trace_free_filter');?></td></tr>
			<tr><th>Софт-фильтр (*****):</th>
				<td><?php HT_OutCheckBox('htracer_trace_download_filter');?></td></tr>
			<tr><th>Фильтровать услуги (******):</th>
				<td><?php HT_OutCheckBox('htracer_trace_service_filter');?></td></tr>
			<tr><th>White-List символов (*******):</th>
				<td><?php HT_OutCheckBox('htracer_symb_white_list');?></td></tr>
		</table>
		<div class="star_hint">
			*  &mdash; Если переход совершен со второй или более страницы выдачи поисковой системы, то он засчитывать его за два
			<br /> 
			** &mdash; Если переход содержит слова купить, цена, цены и подобные, то зачитывать его за два. 
			<br /> 
			*** &mdash; фильтр на цензурные слова относящиеся к сексу, например, "оральный".   
			<br /> 
			**** &mdash; фильтр на слова бесплатно, кряк, кейген и прочие, говорящие о том, что пользователь не хочет платить.   
			<br /> 
			***** &mdash; фильтр на слова: скачать, драйвера, программы, фильмы, картинки и прочие, говорящих что пользователь хочет скачать или купить нематерьяльные объекты. Предназначен для магазинов.
			<br /> 
			****** &mdash; фильтр на слова: ремонт, аренда, установка и прочие слова говорящие об услугах, а не товарах. Предназначен для магазинов.
			<br /> 
			******* &mdash; Включать только для русского, английского, латыни, украинского и белорусского языков
		</div>
		<input type="hidden" name="waspost" value='1' />
		<br />
		<input type="submit" value='Сохранить' />
	</form>
<?php htracer_admin_footer();?>	