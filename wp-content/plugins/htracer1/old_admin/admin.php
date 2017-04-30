<?php
	$GLOBALS['ht_admin_page']='admin';
	include_once('functions.php');
	htracer_admin_header('HTracer: Редактирование переходов');
	set_time_limit(30);
	$page='';
	if(isset($_REQUEST['ht_page']))
		$page=$_REQUEST['ht_page'];
	$page=str_replace('http://'.$_SERVER['SERVER_NAME'],'',$page);
	$page=str_replace('http://www.'.$_SERVER['SERVER_NAME'],'',$page);
	$page=str_replace('www.'.$_SERVER['SERVER_NAME'],'',$page);
	//echo "_REQUEST['ht_page']={$_POST['ht_page']}<br />";
	//echo '<pre>';
	//	print_r($_POST);
	//echo '</pre>';

	if(isset($_REQUEST['was_ht_admin_post']) && $_REQUEST['was_ht_admin_post'])
	{
		if(isset($_POST['change_query_weigth']) && $_POST['change_query_weigth'])
		{	
			HTracer::ClearPageData($_POST['ht_page']);
			$Queries=Array();
			foreach($_POST as $Key=>$Value)
			{
				$Key=split('_',$Key);
				if($Key[0]=='key')
					$Queries[$Key[1]]['key']=$Value;
				if($Key[0]=='count')
					$Queries[$Key[1]]['count']=$Value;
			}
			foreach($Queries as $Data)
			{
				if(!isset($Data['count'])||$Data['count']===''||$Data['count']==='0'||$Data['count']===0)
					continue;
				if(!$GLOBALS['htracer_mysql'] && ($Data['count']==='-1'||$Data['count']==='-2'||$Data['count']===-2||$Data['count']===-1))
					continue;
				HTracer::AddQueryToDB($Data['key'],'user2','',$Data['count'],$page);
			}
		}		
		elseif(isset($_REQUEST['addkeys_btn']) && $_REQUEST['addkeys_btn'])
		{
			$keys_str=$_REQUEST['addkeys'];
			$keys=split("\n",$keys_str);
			foreach($keys as $key)
			{
				$key=str_replace("\r","",$key);
				$key=str_replace("\\\r","",$key);
				$key=trim($key);
				if(!$key)
					continue;
				HTracer::AddQueryToDB($key,'user','',1,$page);
			}
		}
		elseif(isset($_REQUEST['ht_optimize_tables']) && $_REQUEST['ht_optimize_tables'])
		{
			//$this->is_mysql()
			if(!$GLOBALS['htracer_mysql'])
				echo "Not Posible: You write Data in files, not in MySQL.";
			elseif(HTracer::OptimizeTables())
				echo "<h1>Optimization Compleated</h1>";
			else
				echo "<h1>Not posible. <br />
					Probably MySQL-user '{$GLOBALS['htracer_mysql_login']}'
					not have permission to 'LOCK TABLES' or on 'OPTIMIZE TABLE'
				</h1>";
		}
		elseif(isset($_REQUEST['ht_delallcash']) && $_REQUEST['ht_delallcash'])
		{
			HTracer::DelAllFiles('cash');
			echo "<h1>Cash was deleted</h1>";
		}
		elseif(isset($_REQUEST['ht_delallquery']) && $_REQUEST['ht_delallquery']) 
		{
			HTracer::TrancateTables();
			echo "<h1>Data was deleted</h1>";	
		}
	}
	$pages=HTracer::SelectMaxPages(300);
	ksort($pages);
	$htastoptions='';
	$pageDisplay=$page;
	foreach($pages as $key=>$cpage)
	{
		if(!$pageDisplay)
			$pageDisplay=$key;
		$dkey=urldecode($key);
		if($page!=$key)
			$htastoptions.="<option value='$key'>$dkey</option>";
		else
			$htastoptions.="<option selected='selected' value='$key'>$dkey</option>";
	}
	//echo microtime()%2000;
	
	if(!$pageDisplay)
		$pageDisplay='/';
?>
		<!--jQuery-->
			<script type="text/javascript" src="../keysyn/jquery-1.2.6.min.js"></script>
			<script type="text/javascript" src="../keysyn/jquery.form.js"></script>
		<!--/jQuery-->
	
		<!--TableSorter-->
			<!--<link rel="stylesheet" href="../keysyn/aws.css" type="text/css" id="" media="print, projection, screen" />-->
			<link rel="stylesheet" href="../keysyn/js/tablesorter/themes/blue/style.css" type="text/css" id="" media="print, projection, screen" />
			<style>
				table.tablesorter 
				{
					background-color:inherit;
					width:auto;
				}
				table.tablesorter thead tr th, table.tablesorter tfoot tr th 
				{
					padding-right: 20px;
					background-color:inherit;
					border:none;
				}
				table.tablesorter td,table.tablesorter th
				{
					white-space:nowrap;
					font-size:120%;
				}				
				table.tablesorter tbody td 
				{
					background-color:inherit;
				}
				table.tablesorter thead tr .headerSortDown, table.tablesorter thead tr .headerSortUp 
				{
					background-color:inherit;
				}
			</style>	
			<!--<script type="text/javascript" src="js/tablesorter/jquery-latest.js"></script> -->
			<script type="text/javascript" src="../keysyn/js/tablesorter/jquery.tablesorter.min.js"></script>
			<script type="text/javascript" src="../keysyn/js/tablesorter/jquery.metadata.js"></script>
			<script type="text/javascript">
				jQuery(document).ready(function() 
				{
					try{
						jQuery(".tablesorter").tablesorter({
							widgets: ['zebra'] 
						});
					}catch(e){}
				});	
			</script>
		<!--/TableSorter-->
<h1>Просмотр/редактирование переходов</h1>
<form method='post'>
	<input type="hidden" name='was_ht_admin_post' value='1' />
	<b><nobr>Выберите URL:</nobr></b> <br />
	<?php if ($htastoptions):?>
		<table>
			<tr><td><nobr>Либо выберите из списка:</nobr></td>
				<td>
					<select name="page0" id="page_select" onchange="ht_select_change_page()">
						<?php echo $htastoptions;?>
					</select>
				</td>
			</tr>
			<tr><td><nobr>Либо впишите URL сюда:</nobr></td>
				<td>
					<input name="ht_page" id="page_input" size="40" value="<?php echo $pageDisplay;?>" />
					<input type="submit" value="Выбрать" />
				</td>
			</tr>
		</table>
	<script type="text/javascript">
		function ht_select_change_page()
		{
			var Sel=document.getElementById('page_select');
			if(Sel.value)
				document.getElementById('page_input').value=Sel.value;
			else	
				document.getElementById('page_input').value=Sel.options[Sel.selectedIndex].value;
		}
	</script>
	<?php else:?>
		<input type="text" name="ht_page" size="40" value="<?php echo $pageDisplay;?>" />
		<input type="hidden" name='was_ht_admin_post_tmp' value='1' />
		<input type="submit" value="Показать" />
	<?php endif;?>
	
	<?php 
		if($page)
			$pq=HTracer::SelectMaxQueries(Array($page=>1),false,false,false,true);
	?>
	<?php if($page && !count($pq[$page]['Q'])) echo '<br /><br /><b>У данной страницы нет ключей</b>';?>
	<?php if($page && count($pq[$page]['Q'])): ?>
		<h2 style="padding-bottom:0;margin-bottom:0;">Ключи</h2>
		<table><tr> 
		<td style="padding-left:30px;">
			<table class="tablesorter {sortlist: [[1,1]]}">
				<thead>
					<tr><th>Ключ</th><th>Переходы</th></tr>
				</thead>
				<tbody>
				<?php 
					
					$i=0;
					$Queries0=$pq[$page]['Q'];
					$Queries=Array();
					$Max=0;
					foreach($Queries0 as $k=>$c)
					{
						if($Max<$c)
						{
							$Max=$c;
							$MaxKey=$k;
						}
						$i++;
						$c2=str_repeat('0',10-strlen($c.'')).$c;
						$k=str_replace(chr(209).chr(63),'ш',$k); 
						$Queries[$k]=$c;
						if($k)
							echo "<tr>
									<td>$k</td>
									<td>
										<span style='display:none'>$c2</span>
										<input name='count_{$i}' value='$c' size='3' />
										<input name='key_{$i}' value='$k' type='hidden' />
									</td>
								</tr>";
					}
					//echo 'HT_GetStartSymbCount='.HT_GetStartSymbCount('одесский','одесса');
					//echo '<pre>';
					//print_r($_SERVER);
					/*
					echo '<br />3:: '.HT_FormTitle('Base',3,$Queries);
					echo '<br />4:: '.HT_FormTitle('Base',4,$Queries);
					echo '<br />5:: '.HT_FormTitle('Base',5,$Queries);
					echo '<br />6:: '.HT_FormTitle('Base',6,$Queries);
					echo '<br />7:: '.HT_FormTitle('Base',7,$Queries);
					echo '<br />8:: '.HT_FormTitle('Base',8,$Queries);*/
				?>	
				</tbody>
			</table>
			<input type='submit' name='change_query_weigth' value='Сохранить изменения' />	
		</td><td style="padding-left:100px; color:gray">
			Изменения вступят в силу, когда кеш перестанет быть актуальным		<br />
			<br />
			Чтобы удалить ключ впишите 0 в число переходов по нему 				<br />
			Чтобы удалить ключ и игнорировать его для этой страницы впишите -1	<br />
			Чтобы удалить ключ и игнорировать его для всех страниц -2			<br />
			-1 и -2 работает, только если вы используте MySQL					<br />
		<td></tr></table> 
		<br /><br /><br />
<?php endif;?>
<?php if($page): ?>
		<?php 
			$keysyn_location='../keysyn/';
			if(htracer_admin_is_wp())
				$keysyn_location=get_bloginfo('url').'/wp-content/plugins/HTracer/keysyn/';
		?>
		<script src="<?php echo $keysyn_location;?>keysyn.js" type="text/javascript"></script>
		<script type="text/javascript">
			var hks_href="<?php echo $keysyn_location;?>";
			function SetKeys()
			{
				hks_DoRequest(
					document.getElementById('in_key').value,
					document.getElementById('in_count').value,
					'clear',
					document.getElementById('addkeys'),
					document.getElementById('in_btn')
				);
			}
		</script>
		<h2>Добавить ключи</h2>
		Автоподбор: <input size="30" id='in_key' value="ноутбуки одесса" />
		<input size="3" id='in_count' value="50" />
		<input type='button' id='in_btn' value="Подобрать" onclick='SetKeys()' /><br />
		Ключевые слова  (каждый ключ в новой строке):<br />
		<textarea name="addkeys" rows="5" cols="55" id='addkeys'></textarea><br />
		<input type="submit" name="addkeys_btn" value="Добавить" /><br />
<?php endif;?>
	</form>
	
<br /><br />
<h2>Оптимизация БД</h2>
<form method='post'>
	<input type="hidden" name="ht_optimize_tables" value="1" />
	<input type="hidden" name='was_ht_admin_post' value='1' />
	<input type="hidden" name='was_ht_admin_post_tmp' value='1' />
	<input type="submit" value="Оптимизировать таблицы"/>
</form>

<h2>Отчистка БД</h2>
<form method='post'>
	<input type="hidden" name="ht_delallcash" value="1" />
	<input type="hidden" name='was_ht_admin_post' value='1' />
	<input type="hidden" name='was_ht_admin_post_tmp' value='1' />
	<input type="submit"  value="Отчистить кеш" />
</form>
<form method='post'>
	<input type="hidden" name="ht_delallquery" value="1" />
	<input type="hidden" name='was_ht_admin_post' value='1' />
	<input type="hidden" name='was_ht_admin_post_tmp' value='1' />
	<input type="submit" onclick="return confirm('Уверены ли вы, в том, что хотите Удалить информацию о переходах (Запросы)?');" value="Удалить информацию о переходах" />
</form>
<br style="clear:both"/>
<br /><br />
<?php htracer_admin_footer();?>