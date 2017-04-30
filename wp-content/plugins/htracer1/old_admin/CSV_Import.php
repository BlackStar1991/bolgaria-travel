<?php
	@set_time_limit(600);
	//include_once('../HTracer.php');
	include_once('CSV_Import_funs.php');
	include_once('functions.php');
	set_time_limit(600);

	if($GLOBALS['ht_in_ga_import'])
	{
		htracer_admin_header(false);
		echo '<h2>Импорт из CSV произвольного вида</h2>';
	}
	else
	{
		htracer_admin_header('HTracer: Импорт из CSV произвольного вида');
		echo '<h1>Импорт из CSV произвольного вида</h1>';
	}
?>


<?php if(!isset($_REQUEST['step'])||$_REQUEST['step']==1||!$_REQUEST['step']): ?>
	Здесь вы можете импортировать запросы в HTracer практически из любого источника.<br />
	Поддерживаемые источники: MS Excel, LiveInternet либо любая другая программа или веб-сервис который может экспортировать данные в формат CSV.<br />
	Также поддерживается импорт неполных данных, когда в данных нет целевой страницы или веса запроса либо того и другого.
	В этом случае: URL будет уточняться из выдачи поисковой системы, а число запросов из данных WordStat.<br />
	
	Например, можно задать простой список запросов, где каждый запрос идет в отдельной строке. Одна лучше использовать <a href="http://htracer.ru/keysyn2/1step.php">специальный сервис для составления семантического ядра</a> 
	
	
	<br /><br />
	<b>Поддерживаемые форматы:</b> <br />
		&nbsp;&nbsp;&nbsp;&nbsp;CSV с разделителеми колонок '#' или ';' или ',' <br />
		&nbsp;&nbsp;&nbsp;&nbsp;TSV<br />
		&nbsp;&nbsp;&nbsp;&nbsp;DSV с произвольным разделителем (задается вручную) <br />
		&nbsp;&nbsp;&nbsp;&nbsp;Простой список, где каждый запрос идет с новой строки<br />
		&nbsp;&nbsp;&nbsp;&nbsp;Разделенные пробелом запрос и вес ("купить ноутбук 10" или "10 купить ноутбук") каждый в новой строке<br />
		&nbsp;&nbsp;&nbsp;&nbsp;Простой список, где четные строки - запросы, нечетные - веса либо наоборот (если выделить в WordStat запросы и скопировать их)<br />
	<br />
	<b>Как импортировать из LiveInternet?</b><br />
		&nbsp;&nbsp;&nbsp;&nbsp;1. Откройте страницу "http://www.liveinternet.ru/stat/<i>site.ru</i>/queries.html (вместо site.ru введите ваш домен) и введите пароль<br />
		&nbsp;&nbsp;&nbsp;&nbsp;2. Откройте страницу "http://www.liveinternet.ru/stat/<i>site.ru</i>/queries.csv?period=month&amp;per_page=100&amp;total=yes"<br />
		&nbsp;&nbsp;&nbsp;&nbsp;3. Скопируйте данные в поле ввода расположенное ниже:<br />
	<br />
	<b>Как импортировать из MS Excel/ Open Office Calc?</b><br />
		&nbsp;&nbsp;&nbsp;&nbsp;1. Сохраните данные в формате CSV<br />
		&nbsp;&nbsp;&nbsp;&nbsp;2. Откройте  CSV в любом текстовом редакторе, кроме блокнота (он не правильно распознает строки)<br />
		&nbsp;&nbsp;&nbsp;&nbsp;3. Скопируйте содержимое файла в поле ввода<br />
		
	<h2>Шаг 1</h2>
	<form method="POST">
		<b>На этом шаге вы должны скопировать содержимое CSV файла сюда:</b><br />
		<textarea name="CSVData" wrap="off" rows="10" style="width:920px; white-space:nowrap; font-size:90%"></textarea><br />
		<input type="hidden" name="step" value="2" />
		<input type="hidden" name="ht_in_csv_import" value="1" />
		
		HTracer попытается автоматически определить формат данных.<br />
		На следующем шаге вы сможете проверить коррекность автоопределения и исправить его, если это потребуется.<br />
		<input type="submit" /><br />
	</form>
<?php elseif($_REQUEST['step']==2): ?>
	<h2>Шаг 2: Проверка корректности автоопределения</h2>
		<?php 
			if(!isset($_REQUEST['Comma']))
				$_REQUEST['Comma']=false;
			if($_REQUEST['Comma']=='other')
				$_REQUEST['Comma']=$_REQUEST['Comma2'];
			if($_REQUEST['Comma']=="\t")
				$_REQUEST['Comma']='tab';
			$Format=AutoDetectFormat($_REQUEST['CSVData'],$_REQUEST['Comma']);
			print_comma_select($Format['Comma'],$_REQUEST['CSVData']);
		?>
			<script type="text/javascript" >
				<?php if(!htracer_admin_is_wp()):?>
					window.onload=function()
					{
						for(var i=0;i<RowCount;i++)
							row_checked(i);
						comma_changed();
					}
				<?php else:	?>
					jQuery(document).ready(function(){
						for(var i=0;i<RowCount;i++)
							row_checked(i);
						comma_changed();
					});	
				<?php endif;?>
				function comma_changed()
				{
					if(document.getElementById('Comma').value=='other')
						display='inline';
					else
						display='none';
					document.getElementById('Comma2').style.display=display;
				}
				function row_checked(i)
				{
					var checked=document.getElementById('row_'+i+'_enabled').checked;
					var disabled=!checked;
					for(var j=0;j<MaxColCount;j++)
						document.getElementById('cell_'+i+'_'+j).disabled=disabled;
				}
				
			</script>
			
			<form method='post'>
				<input type="hidden" name="ht_in_csv_import" value="1" />
				Проверьте правильно ли скрипт определил роли столбцов. Какие данные они содержат.<br />
				<ul>
					<li><b>Ключевое слово</b> &mdash; столбец, содержащий запрос. Например, "купить ноутбуки". Единственная обязательная роль.</li>
					<li><b>URL страницы</b>   &mdash; URL-адрес продвигаемой страницы (Например, "http://site.ru/page1.php" или просто "/page1.php")</li>
					<li><b>Вес (число переходов)</b> &mdash; число, говорящее насколько важен ключевик, какой процент ресурсов тратить на его продвижение.</li>
				</ul>
				<br />
				Вы можете задать нескольким столбцам роль "Вес (число переходов)" в этом случае они просумируются. 
				Другие роли должны быть уникальными. 
				Если вы не зададите ни одному столбцу роли "Страница" или/и "Вес", то эти данные будут получены на следующем шаге из выдачи Яндекса или Google или/и из Wordstat соответсвенно.<br />
				<br />
				Выделенные серым строки будут проигнорированы. Включить/отключить строку можно нажав на галочку в начале строки.
				<br /><br />
				<?php print_csv_table($_REQUEST['CSVData'],$Format);?> 
				<input type="hidden" name="step" value="3" /><br />
				<input type='submit' value='Перейти на следующий шаг' /> 
			</form>
<?php elseif($_REQUEST['step']==3): ?>
	<h2>Шаг 3: Корректировка данных</h2>
	
	<!--colorbox-->
		<?php if(!htracer_admin_is_wp()):?>
			<script type="text/javascript" src="<?php echo $keysyn_location;?>js/tablesorter/jquery-latest.js"></script>
		<?php endif;?>
		<script type="text/javascript" src="<?php echo $keysyn_location;?>js/colorbox/jquery.colorbox-min.js"></script>
		<link media="screen" rel="stylesheet" href="<?php echo $keysyn_location;?>js/colorbox/colorbox.css" />
		<script type="text/javascript" src="<?php echo $keysyn_location;?>3step.js"></script>
		<link media="screen" rel="stylesheet" href="<?php echo $keysyn_location;?>serp.css" />
	<!--/colorbox-->
	<!--Google Search-->
		<script src="https://www.google.com/jsapi" type="text/javascript"></script>
	<!--/Google Search-->
	<script type="text/javascript" >var Domain="<?php echo $_SERVER['HTTP_HOST']; ?>";</script>
	<script type="text/javascript" >
		var ht_progress_count=0;
		var ht_req_count=false;
		function ht_load_eva()
		{
			var sel=document.getElementById('count_source').value;
			if(sel=='wordstat_k'||sel=='wordstat_kv'||sel=='wordstat'||sel=='wordstat_v')
			{
				ht_progress_count=0;
				document.getElementById('ht_load_eva_btn').style.display='none';
				document.getElementById('ht_load_eva_info').innerHTML='Прогресс: 0 из '+ht_table_rows;
				ht_load_eva_next();
			}
			else
			{
				sel=sel.split('_');
				sel=sel[1];
				for (var i=0; i<ht_table_rows; i++)
					document.getElementById('Q_'+i+'_Count').value=sel;
			}
		}
		function ht_load_eva_next()
		{
			ht_DoEvaRequest(document.getElementById('Q_'+ht_progress_count+'_Query').value);
		}
		
		function ht_DoEvaRequest(key)
		{
			var sel=document.getElementById('count_source').value;
			var kav=(sel=='wordstat_k'||sel=='wordstat_kv');
			var voskl=(sel=='wordstat_v'||sel=='wordstat_kv');
			
			key=encodeURIComponent(key);
			ht_req_count=ht_createRequestObject();
			if (ht_req_count) 
			{       
				var href='<?php echo $keysyn_location;?>keysyn_fun.php?getcountof='+key+'&kav='+kav+'&voskl='+voskl;
				ht_req_count.open("GET", href, true);
				ht_req_count.onreadystatechange = ht_load_eva_parsed;
				ht_req_count.send(null);
			}
		}
		function ht_createRequestObject() 
		{
			if (typeof XMLHttpRequest === 'undefined') {
				XMLHttpRequest = function() {
					try { return new ActiveXObject("Msxml2.XMLHTTP.6.0"); }
					catch(e) {}
					try { return new ActiveXObject("Msxml2.XMLHTTP.3.0"); }
					catch(e) {}
					try { return new ActiveXObject("Msxml2.XMLHTTP"); }
					catch(e) {}
					try { return new ActiveXObject("Microsoft.XMLHTTP"); }
					catch(e) {}
					throw new Error("This browser does not support XMLHttpRequest.");
				};
			}
			return new XMLHttpRequest();
		}
		
		function ht_load_eva_parsed()
		{
			if (ht_req_count.readyState == 3 && ht_req_count.status == 200) 
			{
				document.getElementById('Q_'+ht_progress_count+'_Count').value=ht_req_count.responseText;
				ht_progress_count++;
				document.getElementById('ht_load_eva_info').innerHTML='Прогресс: '+	ht_progress_count +' из '+ht_table_rows;
				if(ht_progress_count<ht_table_rows)
					ht_load_eva_next();
				else
				{
					document.getElementById('ht_load_eva_btn').style.display='inline';
					document.getElementById('ht_load_eva_info').innerHTML='';
				}
			}
		}	
		var ht_progress_url=0;
		var ht_req_url=false;

		function ht_parse_se()
		{	
			ht_progress_url=0;
			ht_load_url_next();
		}
		function ht_load_url_next()
		{
			document.getElementById('ht_load_url_btn').style.display='none';
			document.getElementById('ht_load_url_info').innerHTML='Прогресс: '+ht_progress_url+' из '+ht_table_rows;
			ht_DoUrlRequest(document.getElementById('Q_'+ht_progress_url+'_Query').value);
		}
		function ht_DoUrlRequest(key)
		{
			key+=' site:'+Domain;
			key=encodeURIComponent(key);
			jQuery.getJSON("http://ajax.googleapis.com/ajax/services/search/web?v=1.0&callback=ht_load_url_parsed_google&q="+key+"&context=?",function(data){});
		}
		function ht_load_url_parsed_google(func,data)
		{	
			if(data && data.results && data.results.length && data.results[0])
				document.getElementById('Q_'+ht_progress_url+'_URL').value=data.results[0].url;
			ht_progress_url++;
			if(ht_progress_url<ht_table_rows)
				ht_load_url_next();
			else
			{
				document.getElementById('ht_load_url_btn').style.display='inline';
				document.getElementById('ht_load_url_info').innerHTML='';
			}
		}
		function s_link_click(i)
		{	
			document.getElementById('s_link_'+i).href=document.getElementById('Q_'+i+'_URL').value;
		}
		<?php if(!htracer_admin_is_wp()):?>
			window.onload=function()
			{
				for(var i=0;i<ht_table_rows;i++)
					s_link_click(i);
			}
		<?php else:	?>
			jQuery(document).ready(function(){
				for(var i=0;i<ht_table_rows;i++)
					s_link_click(i);
			});	
		<?php endif;?>

	</script>
	<form method='post'>
		<input type="hidden" name="ht_in_csv_import" value="1" />
		Пустые ключевые слова будут проигнорированы, потому удалить запрос можно очистив его поле "ключевое слово".
		<br />
		<?php print_step3_csv_table();?>
		<input type="hidden" name="step" value="4" /><br />
		<input type='submit' value='Импортировать данные в HTracer' /> 
	</form>
<?php elseif($_REQUEST['step']==4): 
		$Table=Array();
		foreach($_POST as $Key => $Value)
		{
			$Key=explode('_',$Key);
			if(count($Key)!=3)
				continue;
			$Table[$Key[1]][$Key[2]]=$Value;
		}
		$All=0;
		$Count=0;
		$optimize_tables=$GLOBALS['htracer_mysql_optimize_tables'];
		$GLOBALS['htracer_mysql_optimize_tables']=false;
		foreach($Table as $Row)
		{
			if($Row['URL']===''||$Row['Query']===''||!$Row['Count'])
				continue;
			if(stripos($Row['URL'],'http://')===0)
			{
				$Row['URL']=explode('/',$Row['URL'],4);
				$Row['URL']='/'.$Row['URL'][3];
			}
			$Row['Count']=round($Row['Count']*1);
			HTracer::AddQueryToDB($Row['Query'],'analitics','',$Row['Count'],$Row['URL'],false);
			$All+=$Row['Count'];
			$Count++;
		}
		$GLOBALS['htracer_mysql_optimize_tables']=$optimize_tables;
		if($GLOBALS['htracer_mysql_optimize_tables'])
			HTracer::OptimizeTables();
		echo "<b>Была импортирована информация о $Count запросах с общим числом переходов (весом) = $All</b>";
	endif;?>
<?php htracer_admin_footer();?>
