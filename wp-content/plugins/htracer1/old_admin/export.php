<?php
	$GLOBALS['ht_admin_page']='export';
	if(!function_exists('htracer_admin_is_wp'))
		include_once('functions.php');

	if($_REQUEST['maxpages'] && $_REQUEST['was_ht_export_post'] 
	&& $_REQUEST['to']=='seopult' && $_REQUEST['download'])
		htracer_admin_export_create_file();
	htracer_admin_header('HTracer: Экспорт в Sape');
?>
<?php if(!htracer_admin_is_wp()): ?>
<script type="text/javascript" src="../keysyn/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="export.js" charset="UTF-8"></script>
<?php else: ?>
<script type="text/javascript" charset="UTF-8">
	<?php include_once('export.js');?>
</script>
<?php endif; ?>
<script type="text/javascript">
	var domain='<?php echo str_replace('www.','',$_SERVER['SERVER_NAME']);?>';
	//var domain='visit.odessa.ua';
	var keysyn_location_export=''../keysyn/'';
</script>
<h1>Экспорт в SAPE/LMPanel</h1>
<form method="post">
	Максимум страниц: <input type="text" name='maxpages' value='100' />
	<br />
	<input type="checkbox" name='summ_trafic' value='1' /> 
	 Добавлять к названию URL число переходов на страницу
	<br />
	<input type="hidden" name='maxkeys' value='100' />
	<input type="hidden" name='was_ht_export_post' value='1' />
	<input type="submit" value="Сформировать" />
</form>
<h1>Экспорт в SEOPult/WebEffector/Rookee</h1>
<form method="post">
	Куда импортируем: <br /> 
	<select name='service'>
		<option value='webeffector'>WebEffector</option>
		<option value='seopult'>SEOPult</option>
		<option value='rookee'>Rookee</option>
	</select><br /> 
	Максимум страниц: <br /> 
	<input type="text" name='maxpages' value='100' /><br />
	Требуемый ТОП (целое число от 1 до 50):<br />
	<input type="text" name='need_position' value='10' /><br />
	Общий бюджет (руб/месяц)  <br /> 
	<input type="text" name='budget' value='1000' /><br />
	Если бюджет какого-то ключевика меньше 25 руб в месяц для SEO пульта и 1 руб для WebEffector, то он будет удален.
	<br />
	<input type="hidden" name='to' value='seopult' />
	<input type="hidden" name='maxkeys' value='100' />
	<input type="hidden" name='was_ht_export_post' value='1' />
	<input type="submit" value="Сформировать" />
</form>
<?php if(isset($_REQUEST['maxpages']) && isset($_REQUEST['was_ht_export_post'])
	  && $_REQUEST['maxpages'] && $_REQUEST['was_ht_export_post']): ?>	
	<br />
	<?php if($_REQUEST['to']=='seopult'): ?>	
		<?php if($_REQUEST['service']=='seopult'): ?>	
			<h2>Проект для SEOPult</h2>
			<ol>
				<?php if(htracer_admin_is_wp()): ?>	
					<li>Создайте файл .csv. Откройте его текстовым редактором. Вставьте в него данные из текстового поля внизу</li>
				<?php else: ?>	
					<li>Скачайте файл</li>
				<?php endif; ?>	
				<li>Откройте этот файл в MS Excel или в Open Office Calc(кодировка UTF-8, разделитель столбцов tab)</li>
				<li>Сохраните его в формате .xls (MS.Excel 97-2003)</li>
				<li>Откройте в сеопульте неообходимый_проект->ключевый слова</li>
				<li>Найдите заголовок "Пакетная работа с ключевыми словами"</li>
				<li>Под этим заголовком будет форма для загрузки файла, блакгодаря которой загрузите .xls файл</li>
			</ol>
		<?php elseif($_REQUEST['service']=='webeffector'): ?>	
			<h2>Проект для WebEffector</h2>
			<ol>
				<?php if(htracer_admin_is_wp()): ?>	
					<li>Создайте файл .csv. Откройте его текстовым редактором. Вставьте в него данные из текстового поля внизу</li>
				<?php else: ?>	
					<li>Скачайте файл</li>
				<?php endif; ?>	
				<li>Откройте этот файл в MS Excel или в Open Office Calc(кодировка UTF-8, разделитель столбцов tab)</li>
				<li>Сохраните его в формате .xls (MS.Excel 97-2003)</li>
				<li>Создайте новый проект (Быстрый запуск проекта)</li>
				<li>Внизу страницы будет поле для загрузки файла (Загрузка из таблицы Excel)</li>
				<li>Загрузите в это поле .xls файл</li>
			</ol>
		<?php elseif($_REQUEST['service']=='rookee'): ?>	
			<h2>Проект для Rookee</h2>
			<ol>
				<?php if(htracer_admin_is_wp()): ?>	
					<li>Создайте файл .csv. Откройте его текстовым редактором. Вставьте в него данные из текстового поля внизу</li>
				<?php else: ?>	
					<li>Скачайте файл</li>
				<?php endif; ?>	
				<li><a href="http://www.rookee.ru/post/2010/06/29/%D0%AD%D0%BA%D1%81%D0%BF%D0%BE%D1%80%D1%82-%D0%B8-%D0%B8%D0%BC%D0%BF%D0%BE%D1%80%D1%82-%D0%B2%D0%BC%D0%B5%D1%81%D1%82%D0%B5-%D0%B2%D0%B5%D1%81%D0%B5%D0%BB%D0%B5%D0%B5.aspx">В руках справа верху таблицы</a> с ключевыми словами есть кнопка "импортировать запросы", нажмите ее</li>
				<li>Выберите загруженный файл и импортируйте его</li>
			</ol>	
		<?php endif; ?>	
		<?php if(htracer_admin_is_wp()):
			$_REQUEST['download']=1;
			htracer_admin_export_create_file();
			//include('export.php');
		?>		
		<?php else:?>	
		
		<form method="post" style="margin:0;padding:0">
			<input type="hidden" name='service' value='<?php echo $_REQUEST['service']; ?>' />
			<input type="hidden" name='maxpages' value='<?php echo $_REQUEST['maxpages']; ?>' />
			<input type="hidden" name='need_position' value='<?php echo $_REQUEST['need_position']; ?>' />
			<input type="hidden" name='budget' value='<?php echo $_REQUEST['budget']; ?>' />
			<input type="hidden" name='minbudget' value='<?php echo $_REQUEST['minbudget']; ?>' />
			<input type="hidden" name='to' value='seopult' />
			<input type="hidden" name='download' value='1' />
			<input type="hidden" name='maxkeys' value='100' />
			<input type="hidden" name='was_ht_export_post' value='1' />
			<input type="submit" value="Скачать файл" />
		</form>
		<?php endif; ?>	

	<?php elseif(!isset($_REQUEST['to'])|| !$_REQUEST['to'] ||$_REQUEST['to']=='sape'): ?>	
		<h2>Проект для Sape</h2>
		Создайте новый проект в Sape. 
		Выберите "+URL"->"добавить URLы списком" и вставьте:
		<br /><br />
		<textarea 
			id="ta"
			onfocus="this.select()"
			spellcheck="false" 
			wrap="off"
			style="
				white-space:nowrap; 
				margin-left: 25px; 
				width:920px; 
				height:460px; 
				overflow:scroll;
				"
		><?php
			$pages=HTracer::SelectMaxPages(intval($_REQUEST['maxpages']));
			$pages=HTracer::SelectMaxQueries($pages,false,false,false);
			//echo '<pre>';
			//print_r($pages);
			//echo '</pre>';
			$res='';
			foreach($pages as $key => $cpage)
			{
				$pq=$cpage['Q'];
				$Summ=$cpage['N']*1;
				arsort($pq);
				$name='';
				$i=0;
				$maxnum=0;
				$PageOut=Array();
				foreach($pq as $q => $num)
				{
					if(($maxnum>10 && $num<3)||($maxnum>100 && $num<7)||($num * 200 < $maxnum))
						continue;
					$q=trim(str_replace(chr(209).chr(63),'ш',$q));
					if(!$q||strlen($q)<2)
						continue;
					if($maxnum<$num)	
						$maxnum=$num;
					$i++;
					if($i==1||$i==0)
					{
						if($_REQUEST['summ_trafic'])
							$name='&lt;name>'.sanitarize_keyword($q)."($Summ)&lt;/name>";
						else
							$name='&lt;name>'.sanitarize_keyword($q)."&lt;/name>";
					}
					//$name='';
					if($i>intval($_REQUEST['maxkeys']))
						break;	
					$PageOut[$q]=Array('num'=>$num,'links'=>Array());
					$url='"http://'.$_SERVER['SERVER_NAME'].$key.'"';
					//$a="&lt;a href=$url>$q&lt;/a>";
					$CurAddons=HT_AddOStoSapeProjectLink($q);
					//$res.="{$name}{$a}\n";
					$k=1;
					foreach($pq as $q2 => $num2)
					{		
						$q2=trim(str_replace(chr(209).chr(63),'ш',$q2));
						$a2=str_replace($q,'|'.$q.'|',$q2);
						if($q2==$q||$a2==$q2||strpos(' '.$q2.' ',' '.$q.' ')===false)//||$num/$k < $Summ/count($pq))
							continue;
						$parts=split('\|',$a2);
						if(count($parts)!=3)
							continue;
						$CurAddons2=HT_AddOStoSapeProjectLink($parts[1],$parts[0],$parts[2]);
						foreach($CurAddons2 as $CurAddon)
							$CurAddons[]=$CurAddon;
						$k++;
					}
					$Was=Array();
					foreach($CurAddons as $CurAddon)
					{
						$tmp=$name.trim("{$CurAddon['Pre']} &lt;a href=$url>{$CurAddon['Anchor']}&lt;/a>{$CurAddon['Post']}")."\n";
						$tmp=str_replace(' ,',',',$tmp);
						$tmp=str_replace('  ',' ',$tmp);
						$tmp=str_replace('  ',' ',$tmp);
						$tmp=str_replace('  ',' ',$tmp);
						if(!isset($Was[$tmp]))
						{
							$PageOut[$q]['links'][]=$tmp;
							$Was[$tmp]=1;
						}
					}
					//print_r($PageOut[$q]);
				}
				$MinCP=10000000;//Минимальные коефициент плюларизма
				foreach($PageOut as $q=>$Data)
				{
					$CP=count($Data['links'])/$Data['num'];
					if($MinCP>$CP)
						$MinCP=$CP;
					//echo "$CP\n";
				}
				foreach($PageOut as $q=>$Data)
				{
					//$CP=count($Data['links'])/$Data['num'];
					$t=0;
					$maxt=1 + $MinCP * $Data['num'] * 3;//Ссылок может быть не более чем втрое больше чем минимальный коефициент плюларизма
					foreach($Data['links'] as $Link)
					{
						$res.=$Link;
						$t++;
						if($t>$maxt)
							break;
					}
				}
				$res.="\n";
			}
			echo $res;
		?>			
		</textarea>
		<h2>Оптимизировать проект</h2>
		Вы можете удалить из проекта те ссылки, по анкорам которых сайт уже находиться на приемлемом месте выдачи Яндекса.<br />
		Это поможет сократить расходы.<br />
		Доступы к Yandex.XML должны быть прописаны в keysyn/config.php<br />
		Учтите что Yandex.XML имеет ограничение в 1000 запросов в сутки.<br />
		<br />
		<b>Удалить ссылку</b><br />
		<!--&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" checked="checked"> -->
			если она в 
			топ-<select id='ya_min_pos'>
					<option value="1">1</option>
					<option selected="selected" value="3">3</option>
					<option value="5">5</option>
					<option value="10">10</option>
				</select> 
			выдачи Яндекса<br />
		<!--	
		&nbsp;&nbsp;&nbsp;&nbsp;<select><option>И</option><option>ИЛИ</option></select><br />
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"> в 
			топ-<select><option>1</option><option selected="selected">3</option><option>5</option><option>10</option></select> 
			выдачи Google<br />
		-->
		<input type="button" value="Поехали" id="opt_btn" onclick="start_optimization()"/>
		<script>
			document.getElementById('opt_btn').disabled=false;
		</script>
	
		<br /><br />
		<div id='optproject' style='display:none'>
			<h2>Оптимизированый проект</h2>
			Обработано <b id='calc'>0</b> из <b id='all'>0</b> строк<br />
			Удалено <b id='del'>0</b> строк<br />
			Использовано <b id='ya_req'>0</b> запросов к Яндекс.XML<br />
			<textarea 
				id="ta_opt"
				onfocus="this.select()"
				wrap="off"
				spellcheck="false" 
				style="
					white-space:nowrap; 
					margin-left: 25px; 
					width:920px; 
					height:460px; 
					overflow:scroll;
				"
			></textarea>
			<h2>Позиции сайта</h2>
			<div id='positions'>
			</div>	
		</div>	
	<?php endif; ?>	
<?php endif; ?>	
<?php htracer_admin_footer();?>	