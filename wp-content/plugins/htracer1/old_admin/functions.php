<?php 
	function htracer_admin_is_wp()
	{
		$dirname=dirname(__FILE__);
		return strpos($dirname,'wp-content\plugins')||strpos($dirname,'wp-content/plugins');
	}
	$keysyn_location='../keysyn/';
	if(htracer_admin_is_wp())
		$keysyn_location=get_bloginfo('url').'/wp-content/plugins/HTracer/keysyn/';

	function ht_pwd_crc($str)
	{
		$str=strtolower(trim($str));
		if(function_exists('sha1'))
			$str=sha1($str);
		if(function_exists('crc32'))
			$str.=crc32($str);
		return md5($str);
	}
	function htracer_admin_check_pwd($pwd=false)
	{
		if(!$GLOBALS['htracer_admin_pass']||$GLOBALS['htracer_admin_pass']===ht_pwd_crc(''))
			return true;

		if($pwd==false && $_COOKIE["cookie_htracer_admin_pass"])
			return htracer_admin_check_pwd($_COOKIE["cookie_htracer_admin_pass"]);
		if(strtolower(trim($pwd))==strtolower(trim($GLOBALS['htracer_admin_pass'])))	
			return true;
		if($pwd==ht_pwd_crc($GLOBALS['htracer_admin_pass']))
			return true;
		if($GLOBALS['htracer_admin_pass']==ht_pwd_crc($pwd))
			return true;
		if(ht_pwd_crc($pwd)==ht_pwd_crc($GLOBALS['htracer_admin_pass']))
			return true;
		if($_COOKIE["cookie_htracer_admin_pass"] && $_COOKIE["cookie_htracer_admin_pass"]!=$pwd)
			return htracer_admin_check_pwd($_COOKIE["cookie_htracer_admin_pass"]);
		return false;
	}
	function htracer_admin_header($Title)
	{
		global $user_level, $user_ID; 
		$GLOBALS['htracer_admin_page']=true;
		if(htracer_admin_is_wp())
		{
			if (!$user_ID || $user_level<6)
				die('Access denied. Use  <a href="/wp-admin/options-general.php?page=HTracer">this link</a>');
			echo "<style>	#tabs div ol{list-style:decimal outside none;}</style>";	
			HTracer_In();
		}
		else
		{
			if($Title!==false)
				header("Content-type: text/html;charset=UTF-8");
			include_once('../HTracer.php');
			if(isset($GLOBALS['htracer_admin_pass']) && $GLOBALS['htracer_admin_pass'] 
			&& $GLOBALS['htracer_admin_pass']!='******')
			{
				HTracer_In();
				$UserPass=false;
				if(isset($_POST['htracer_admin_login_pass']))
				{
					$UserPass=$_POST['htracer_admin_login_pass'];
					setcookie('cookie_htracer_admin_pass',ht_pwd_crc($_POST['htracer_admin_login_pass']),time()+365 *24 * 3600);
				}
				if(!htracer_admin_check_pwd($UserPass))
				{
				?>
					<form method='post'>
						<b>Введите пароль к админке HTracer</b><br />
						<input name='htracer_admin_login_pass' />
						<input type='submit' /><br /><br /><br />
						<small>
							Если вы забыли пароль, то вы сможете его в файле admin/auto_config.php.<br /> 
							Для этого найдите строку вроде $GLOBALS['htracer_admin_pass']='e3d3d25dcfe5f7043869f311714ce216'; 
							и замените ее на $GLOBALS['htracer_admin_pass']=''; 
						</small>	
					<br />
					</form>	
				<?php
					exit();
				}
				if(isset($_POST['htracer_admin_pass']) && $_POST['htracer_admin_pass'] && $_POST['htracer_admin_pass']!='******')
					setcookie('cookie_htracer_admin_pass',ht_pwd_crc($_POST['htracer_admin_pass']),time()+365 *24 * 3600);

			}
			//Автоопределение сет неймес MySQL
			if($GLOBALS['htracer_mysql'] && $GLOBALS['htracer_mysql_set_names']=='auto'
			&& !$GLOBALS['ht_is_this_admin_options'])
			{
				$pages=HTracer::SelectMaxPages(10);
				$pages=HTracer::SelectMaxQueries($pages,false,false,false);
				$All=0;
				$Collapsed=0;
				$CP1251=0;
				
				foreach($pages as $key => $cpage)
				{
					foreach($cpage['Q'] as $q => $num)
					{
						$All++;
						if((strpos($q,'??')!==false||strpos($q,'? ?')!==false)
						 && strpos($q,'а')===false && strpos($q,'А')===false
						 && strpos($q,'о')===false && strpos($q,'О')===false
						 && strpos($q,'е')===false && strpos($q,'Е')===false
						 && strpos($q,'и')===false && strpos($q,'И')===false)
							$Collapsed++;
						if(strpos(mb_detect_encoding($q,Array('utf8','cp1251')),'1251')!==false)
							$CP1251++;
						if($All>100)
							break;
					}
				}
				if($CP1251>$All/2)
					mysql_query("SET NAMES 'utf8'") or die ('_SET NAMES :'.mysql_error());
				elseif($Collapsed>$All/2)
					mysql_query("SET NAMES 'cp1251'") or die ('_SET NAMES :'.mysql_error());
			}
			if($Title===false)
				return;
			?>
				<html>
				<head>
					<title><?php echo $Title;?></title>
					<meta name="robots" content="noindex,nofollow">
				</head>
				<body>
				<style>	
					body {padding:30px;padding-top:10px}
					h1{padding-top:0;margin-top:0}
					#hnavi{padding-bottom:35px;}
					#hnavi a,#hnavi span {margin-right:10px;}
				</style>
				<div id='hnavi'>
					<?php if($GLOBALS['ht_admin_page']=='admin'):?>
						<span>Редактирование переходов</span>
					<?php else:?>
						<a href="admin.php">Редактирование переходов</a>
					<?php endif;?>
					<?php if($GLOBALS['ht_admin_page']=='import'):?>
						<span>Импорт</span>
					<?php else:?>
						<a href="import.php">Импорт</a>
					<?php endif;?>
					<?php if($GLOBALS['ht_admin_page']=='export'):?>
						<span>Экспорт</span>
					<?php else:?>
						<a href="export.php">Экспорт</a>
					<?php endif;?>
					<?php if($GLOBALS['ht_admin_page']=='options'):?>
						<span>Настройки</span>
					<?php else:?>
						<a href="options.php">Настройки</a>
					<?php endif;?>
				</div>
			<?php
		}
	}
	function htracer_admin_footer()
	{
		if(HTracer::IsNeedToConvertTables())
			HTracer::ConvertTables();
		if(!htracer_admin_is_wp())
			echo "</body></html>";			
		HTracer_Out();	
	}
	
	function HT_GetOptionPHP($Name,$Default)
	{	
		$Value=$Default;
		if(isset($GLOBALS[$Name]))
			$Value=$GLOBALS[$Name];
		//echo "$Name == {$GLOBALS[$Name]} // $Value <br />";
			
		if($Value===false)
			$Value='false';
		elseif($Value===true)
			$Value='true';
		elseif(!is_numeric($Value))
			$Value="'$Value'";
		return "
		if(!isset(\$GLOBALS['$Name']))
			\$GLOBALS['$Name']=$Value;";
	}
	function HT_OutCheckBox($Name)
	{
		if($GLOBALS[$Name])	
			echo "<input type='checkbox' name='$Name' value='1' checked='checked' />";
		else
			echo "<input type='checkbox' name='$Name' value='1' />";
	}
	function HT_OutSelect($Name,$Values)
	{
		$is_assoc=false;
		$i=0;
		foreach($Values as $Key => $Val)
		{
			if($Key!==$i)
				$is_assoc=true;
			$i++;
		}
		$pr='<br />';

		//echo "<br />is_assoc=$is_assoc<br />";

		echo "<select name='$Name'>";
			foreach($Values as $Key => $Val)
			{
				$pr.="$Key => $Val// ";
				if(!$is_assoc)
				{
					$Key=$Val;
					if(mb_strtolower($Val,'utf-8')==='нет'||$Val==='нет'||$Val==='Нет')
						$Key='0';
					elseif(mb_strtolower($Val,'utf-8')==='да'||$Val==='да'||$Val==='Да')
						$Key='1';
					elseif(strtolower($Val)==='no')
						$Key='0';
					elseif(strtolower($Val)==='yes')
						$Key='1';
				}
				else
				{
					if($Key==='ht_true')
						$Key='1';
					if($Key==='ht_false')
						$Key='0';
				}
				
				if($GLOBALS[$Name]===$Key||
				(($GLOBALS[$Name]===false||$GLOBALS[$Name]===0||$GLOBALS[$Name]==='0')&&
				($Key===false||$Key===0||$Key==='0'))||
				(($GLOBALS[$Name]===true||$GLOBALS[$Name]===1||$GLOBALS[$Name]==='1')&&
				($Key===true||$Key===1||$Key==='1'))||
				strtolower($GLOBALS[$Name])===strtolower($Key))
				{	
					$pr.="$Name:: $Key == {$GLOBALS[$Name]} SELECTED<br />";
					echo "<option value='$Key' selected='selected'>$Val</option>";
				}
				else	
				{
					$pr.="$Name:: $Key == {$GLOBALS[$Name]} NOT_SELECTED<br />";
					echo "<option value='$Key'>$Val</option>";
				}
			}
		echo "</select>";
		//echo $pr;
	}
	function HT_OutPwdInput($Name)
	{
		// Имена экранируем, от RegisterGlobals
		if((!$GLOBALS[$Name] && $GLOBALS[$Name]!=='0' && $GLOBALS[$Name]!==0)
		|| $GLOBALS[$Name]===ht_pwd_crc(''))
			echo "<input name='{$Name}_htwdinput' value='' />";
		else
			echo "<input name='{$Name}_htwdinput' value='******' />";
	}
	function HT_OutTextInput($Name)
	{
		echo "<input name='$Name' value='{$GLOBALS[$Name]}' />";
	}
	$FirstWordOS_0=Array(
		'одесса,киев,львов,луганск,донецк,харьков,днепропетровск,херсон'=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('украин','Украин'),//слова которых не должно быть
				'Addon' => Array('украина,'),
				'Place' => 'Pre'
			),
		'симферополь,севастополь,форос,феодосия,ялка,алупка,алушта'=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('украин','росс','Украин'),//слова которых не должно быть
				'Addon' => Array('украина,','крым,','Украина, Крым,'),
				'Place' => 'Pre'
			),
		'рестораны,гостиницы,отели,клубы'=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('лучш','дешев','дешёв','дорог'),//слова которых не должно быть
				'Addon' => Array('лучшие','самые лучшие'),
				'Place' => 'Pre'
			),
		'квартиры'=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('1','2','3','4','5','6','7','одно','двух','трех','трёх','четыр'),//слова которых не должно быть
				'Addon' => Array('1-комнатные','однокомнатные','2-комнатные','двухомнатные','3-комнатные','трехомнатные'),
				'Place' => 'Pre'
			),
		'квартиры'=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('цен','стоим'),//слова которых не должно быть
				'Addon' => Array('цены'),
				'Place' => 'Pre'
			),
		'москва,владивосток,суздаль,спб,тюмень,иркутск,новгород,екатеренбург,тверь,калуга'=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('рос','РФ','Рос','рф'),//слова которых не должно быть
				'Addon' => Array('Россия,','РФ,'),
				'Place' => 'Pre'
			),
		'достопримечательности,достопремечательности'=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array(' главн',' основн',' сам','наиболее',' известн'),//слова которых не должно быть
				'Addon' => Array('главные','основные'),
				'Place' => 'Pre'
			),
		'одесса,москва,донецк,луганск,харьков,днепропетровск,стамбул,каир,александрия,владивосток,адлер,алупка,алушта,ростов,владивосток,париж,сочи,ялта,севастополь,симферополь,спб,воронеж,казань,киев,львов,теронополь,луганск'=>
			Array(
				'Find'	=> Array('достопримечательности','клубы','достопримечательности','музеи','гостиницы','отели','музеи','карта'),//слова которые должны быть
				'Ex'	=> Array('город'),//слова которых не должно быть
				'Addon' => Array('города'),
				'Place' => 'Post'
			),
		'карта'=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('онлайн','скачать','купит','бума','офлайн','он лайн','online'),//слова которых не должно быть
				'Addon' => Array('онлайн'),
				'Place' => 'Pre'
			),
		'гостиницы,отели'=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('дешев','дёшев','недорог','цен','стоим'),//слова которых не должно быть
				'Addon' => Array('дешевые','недорогие'),
				'Place' => 'Pre'
			),
		'ноутбуки,телевизоры,нетбуки,компьютеры,пластиковые,стиральные,швейные,посудомоечные,холодильники,телефоны'=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('ремонт','настройк','прод','покуп','дешев','дёшев','недорог','цен','стоим','купит','скачать','драйв','купл'),//слова которых не должно быть
				'Addon' => Array('дешевые','недорогие','купить','купить недорого'),
				'Place' => 'Pre'
			),
		'ноутбук,телевизор,нетбук,компьютер,холодильник,телефон'=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('ремонт','бесплатн','настройк','прод','покуп','дешев','дёшев','недорог','цен','стоим','купит','скачать','драйв','купл'),//слова которых не должно быть
				'Addon' => Array('купить','купить недорого'),
				'Place' => 'Pre'
			),
		'купить,снять'=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('недорог','дешев','дешёв','цен','стоим'),//слова которых не должно быть
				'Addon' => Array('недорого'),
				'Place' => 'Pre'
			),
		'купить'=>
			Array(
				'Find'	=> Array('ноутбук','телевизор','нетбук','компьютер','холодильник','телефон','машин',' авто'),//слова которые должны быть
				'Ex'	=> Array('недорог','дешев','дешёв','цен','стоим','опт','розн','расср','росср','раср','роср','кред'),//слова которых не должно быть
				'Addon' => Array('оптом','в розницу','по низким ценам','по оптовым ценам','в рассрочку','в кредит','недорого','дешево'),
				'Place' => 'Post'
			),
		'скачать'=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('бесплатн','недорог','дешев','дешёв','цен','стоим'),//слова которых не должно быть
				'Addon' => Array('бесплатно'),
				'Place' => 'Pre'
			),
		'сайт'=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('веб','web','интернет','Web','вэб'),//слова которых не должно быть
				'Addon' => Array('веб','web','интернет'),
				'Place' => 'Pre'
			),	
		'поезд'	=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('движ','приб','отбыт','росп','расп'),
				'Addon' => Array('расписание','расписание движения'),
				'Place' => 'Post'
			),
		'кинотеатр'	=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('движ','приб','отбыт','росп','расп','сеан','фильм','филм','афиш'),
				'Addon' => Array('расписание','расписание сеансов','расписание фильмов','афиша'),
				'Place' => 'Post'
			),	
		'театр'	=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('движ','приб','отбыт','росп','расп','сеан','фильм','филм','кино','афиш','спект'),
				'Addon' => Array('расписание','расписание сеансов','расписание фильмов','афиша'),
				'Place' => 'Post'
			),	
		'аренда,снять'=>
			Array(
				'Find'	=> Array('квартир','комнат',' дом'),//слова которые должны быть
				'Ex'	=> Array('месяц','сутк','сроч','длит','долго','меся'),//слова которых не должно быть
				'Addon' => Array('посуточно','длительно','долгосрочно','без посредников'),
				'Place' => 'Post'
			),
		'квартиру,квартира,квартир,квартиры,комнат,комнаты,комнат,комнату,дом,дома,домов'=>
			Array(
				'Find'	=> Array('аренда','снять'),//слова которые должны быть
				'Ex'	=> Array('месяц','сутк','сроч','длит','долго','меся'),//слова которых не должно быть
				'Addon' => Array('посуточно','длительно','долгосрочно','без посредников'),
				'Place' => 'Post'
			),
		'отели'	=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('гостин'),
				'Addon' => Array('гостиницы и'),
				'Place' => 'Pre'
			),	
		'гостиницы'	=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('отел'),
				'Addon' => Array('отели и'),
				'Place' => 'Pre'
			),	
		'санатории'	=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('пансион'),
				'Addon' => Array('пансионаты и'),
				'Place' => 'Pre'
			),	
		'пансионаты'	=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('санато'),
				'Addon' => Array('санатории и'),
				'Place' => 'Pre'
			),		
		'кафе'	=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('рестор'),
				'Addon' => Array('рестораны и'),
				'Place' => 'Pre'
			),	
		'рестораны'	=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('каф'),
				'Addon' => Array('кафе и'),
				'Place' => 'Pre'
			),		
			
	);
	$FirstWordOS=Array();
	foreach ($FirstWordOS_0 as $Keys => $Data)
	{
		$Keys=explode(',',$Keys);
		foreach($Keys as $Key)
		{	
			$Key=trim($Key);
			if($Key)
				$FirstWordOS[$Key][]=$Data;
		}
	}
	$LastWordOS_0=Array(
		'аренда,снять'=>
			Array(
				'Find'	=> Array('квартир','комнат',' дом'),//слова которые должны быть
				'Ex'	=> Array('месяц','сутк','сроч','длит','долго','меся'),//слова которых не должно быть
				'Addon' => Array('посуточно','длительно','долгосрочно','без посредников'),
				'Place' => 'Post'
			),
		'квартиру,квартира,квартир,квартиры,комнат,комнаты,комнат,комнату,дом,дома,домов'=>
			Array(
				'Find'	=> Array('аренда','снять'),//слова которые должны быть
				'Ex'	=> Array('месяц','сутк','сроч','длит','долго','меся'),//слова которых не должно быть
				'Addon' => Array('посуточно','длительно','долгосрочно','без посредников'),
				'Place' => 'Post'
			),
		'одесса,киев,львов,луганск,донецк,харьков,днепропетровск,херсон'=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('украин','росс'),//слова которых не должно быть
				'Addon' => Array(', Украина'),
				'Place' => 'Post'
			),
		'москва,владивосток,суздаль,спб,тюмень,иркутск,новгород,екатеренбург,тверь,калуга'=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('украин','росс','рф'),//слова которых не должно быть
				'Addon' => Array(', Россия', ', РФ'),
				'Place' => 'Post'
			),	
		'ноутбук,телевизор,нетбук,компьютер,холодильник,телефон,ноутбуки,телевизоры,нетбуки,компьютеры,холодильники,телефоны'=>	
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('опт','кред','расрочк','розниц'),//слова которых не должно быть
				'Addon' => Array('розница', 'опт'),
				'Place' => 'Post'
			),	
		'симферополь,севастополь,форос,феодосия,ялка,алупка,алушта'=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('украин','росс','Украин'),//слова которых не должно быть
				'Addon' => Array(', Украина',', Крым',', Крым, Украина'),
				'Place' => 'Post'
			),
		'расписание,росписание'	=>
			Array(
				'Find'	=> Array('поезд','автобус','жд','вокзал','ЖД'),//слова которые должны быть
				'Ex'	=> Array('движ','приб','отбыт'),//слова которых не должно быть
				'Addon' => Array('движения'),
				'Place' => 'Post'
			)
		,
		'расписание,росписание,'	=>
			Array(
				'Find'	=> Array('кинотеатр','синема'),//слова которые должны быть
				'Ex'	=> Array('показ','филм','фильм','сеанс'),//слова которых не должно быть
				'Addon' => Array('сеансов','фильмов'),
				'Place' => 'Post'
			),
		'расписание,росписание,,'	=>
			Array(
				'Find'	=> Array(' театр'),//слова которые должны быть
				'Ex'	=> Array('показ','филм','фильм','сеанс','спект'),//слова которых не должно быть
				'Addon' => Array('спектаклей'),
				'Place' => 'Post'
			),
		'расписание,росписание,,,'	=>
			Array(
				'Find'	=> Array(' вокзал',' жд ',' ЖД '),//слова которые должны быть
				'Ex'	=> Array('поезд','движ','приб','отпр'),//слова которых не должно быть
				'Addon' => Array('поездов','движения поездов'),
				'Place' => 'Post'
			),			
		'расписание,росписание,,,,'	=>
			Array(
				'Find'	=> Array('автовокзал'),//слова которые должны быть
				'Ex'	=> Array('поезд','движ','приб','отпр','автобус','маршр'),//слова которых не должно быть
				'Addon' => Array('автобусов','движения автобусов'),
				'Place' => 'Post'
			),			
			
		'поезд'	=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('движ','приб','отбыт','росп','расп'),
				'Addon' => Array('расписание','расписание движения'),
				'Place' => 'Post'
			),
		'купить'	=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('дорог','дешев','дёшев','цен','стоим'),
				'Addon' => Array('недорого'),
				'Place' => 'Post'
			),
		'отели'	=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('гостин'),
				'Addon' => Array('и гостиницы'),
				'Place' => 'Post'
			),	
		'гостиницы'	=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('отел'),
				'Addon' => Array('и отели'),
				'Place' => 'Post'
			),	
		'санатории'	=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('пансион'),
				'Addon' => Array('пансионаты и'),
				'Place' => 'Post'
			),	
		'пансионаты'	=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('санато'),
				'Addon' => Array('санатории и'),
				'Place' => 'Post'
			),		
		'кафе'	=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('рестор'),
				'Addon' => Array('рестораны и'),
				'Place' => 'Post'
			),	
		'рестораны'	=>
			Array(
				'Find'	=> Array(),//слова которые должны быть
				'Ex'	=> Array('каф'),
				'Addon' => Array('кафе и'),
				'Place' => 'Post'
			),		
			
		//купить, скачать, см. онлайн 	
	);
	$LastWordOS=Array();
	foreach ($LastWordOS_0 as $Keys => $Data)
	{
		$Keys=explode(',',$Keys);
		foreach($Keys as $Key)
		{	
			$Key=trim($Key);
			if($Key)
				$LastWordOS[$Key][]=$Data;
		}
	}
	function HT_AddOStoSapeProjectLink($Anchor,$Pre='',$Post='',$i=0)
	{//Возвращает массив возможных анкоров с околоссыочным
		global $FirstWordOS,$LastWordOS;
		$Res=Array();
		if(!$i)
			$Res[]=Array('Anchor' => $Anchor,'Pre' => $Pre, 'Post' => $Post);
			
		//return $Res; 
		$Full=" $Pre $Anchor $Post ";
		$arr=explode(' ',trim($Full));
		$First=$arr[0];
		$Last=$arr[count($arr)-1];
		
		
	//	for($i=0;$i<2;$i++)
	//	{
			$Arr=&$FirstWordOS;
			$Word=$First;
			if($i)
			{
				$Arr=&$LastWordOS;
				$Word=$Last;
			}
			//echo "$i";
			if(isset($Arr[$Word]))
			{
				$cur=$Arr[$Word];
				foreach($cur as $cur2)
				{
					if((count($cur2['Find'])==0 || str_replace($cur2['Find'],'',$Full)!=$Full)
					&& (count($cur2['Ex'])==0   || str_replace($cur2['Ex']  ,'',$Full)==$Full))
					{
						$New=Array('Anchor' => $Anchor,'Pre' => $Pre, 'Post' => $Post);
						foreach($cur2['Addon'] as $Addon)
						{
							$New2=$New;
							if($cur2['Place']=='Pre')
								$New2['Pre']=trim("$Addon {$New['Pre']}");
							else
								$New2['Post']=trim("{$New['Post']} $Addon");
							$Res[]=$New2;
						}
					}
				}
			}
	//	}
		foreach($Res as $j=>$cur)
		{	
			$Res[$j]['Anchor']=trim($Res[$j]['Anchor']);
			$Res[$j]['Pre']=trim($Res[$j]['Pre']);
			$Res[$j]['Post']=trim($Res[$j]['Post']);
			if($Res[$j]['Post'] && $Res[$j]['Post']{0}!=',')
				$Res[$j]['Post']=' '.$Res[$j]['Post'];
		}
		if(!$i)
		{
			$Res0=$Res;
			foreach($Res0 as $i=>$Cur)
			{
				$Res2=HT_AddOStoSapeProjectLink($Cur['Anchor'],$Cur['Pre'],$Cur['Post'],1);
				foreach($Res2 as $Cur2)
					$Res[]=$Cur2;
			}
		}
		return $Res; 
	}
	function htracer_admin_export_create_file()
	{
		if(!htracer_admin_is_wp())
		{
			htracer_admin_header(false);
			header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
			header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
			header ("Cache-Control: no-cache, must-revalidate");
			header ("Pragma: no-cache");
			header ("Content-type: application/csv");
			header ("Content-Disposition: attachment; filename=HTracerExport.csv" );
			header ("Content-Description: PHP/HTracer Generated Data" );/**/
		}
		else	
		{
			echo '<textarea onfocus="this.select()"
					spellcheck="false" wrap="off"
					style="
						white-space:nowrap; 
						margin-left: 7px; 
						width:920px; 
						height:460px; 
						overflow:scroll;
					">';
		}
		$pages=HTracer::SelectMaxPages(intval($_REQUEST['maxpages']));
		$pages=HTracer::SelectMaxQueries($pages,false,false,false);
		$Core=Array();
		$Summ=0;
		$Arr=Array();
		foreach($pages as $URL => $cpage)
		{
			$pq=$cpage['Q'];
			arsort($pq);
			$maxnum=0;
			foreach($pq as $q => $num)
			{
				if(($maxnum>10 && $num<3)||($maxnum>100 && $num<7)||($num * 200 < $maxnum))
					continue;
				$q=trim(str_replace(chr(209).chr(63),'ш',$q));
				$q=trim(str_replace(Array("\t","  ",';'),' ',$q));
				$q=str_replace("  ",' ',$q);
				$q=str_replace("  ",' ',$q);
				$q=str_replace("  ",' ',$q);

				if(!$q||strlen($q)<2)
					continue;
				if($maxnum<$num)	
					$maxnum=$num;
				if(!isset($Core[$URL]))
					$Core[$URL]=Array();
				$Value=pow(intval($num),0.75);
				if(!$Value)
					$Value=	intval($num);
				$Core[$URL][$q]=$Value;
				$Summ+=$Value;
				$Arr[$URL.'|*_htracer_*|'.$q]=$Value;
			}
		}
		if($Summ==0)
			$Summ=1;
		// Теперь нужно удалить все ключи с бюджетом ниже 25	
		asort($Arr);
		foreach($Arr as $Key => $Count)
		{
			
			$Budget=round(($_REQUEST['budget']/$Summ) * $Count);
			if($Budget<1 ||($Budget<25 && $_REQUEST['service']!='webeffector' && $_REQUEST['service']!='rookee'))
			{
				$Key=explode('|*_htracer_*|',$Key);
				unset($Core[$Key[0]][$Key[1]]);
				$Summ-=$Count;
			}
		}
		if($Summ==0)
			$Summ=1;
		foreach($Core as $URL => $Queries)
		{
			$FullURL='http://'.$_SERVER['SERVER_NAME'].$URL;
			foreach($Queries as $Query => $Count)
			{
				$Budget=round(($_REQUEST['budget']/$Summ) * $Count);
				if($Budget<1 ||($Budget<25 && $_REQUEST['service']!='webeffector' && $_REQUEST['service']!='rookee'))
					continue;
				$ResBudget+=$Budget;
				if($_REQUEST['service']=='rookee')
				{
					$CurAddons=HT_AddOStoSapeProjectLink($Query);
					foreach($Queries as $Query2 => $Count2)
					{		
						if($Query2==$Query)
							continue;
						$a2=str_replace($Query,'|'.$Query.'|',$Query2);
						if($a2==$Query2||strpos(' '.$Query2.' ',' '.$Query.' ')===false)
							continue;
						$parts=split('\|',$a2);
						if(count($parts)!=3)
							continue;
						$CurAddons2=HT_AddOStoSapeProjectLink($parts[1],$parts[0],$parts[2]);
						foreach($CurAddons2 as $CurAddon)
							$CurAddons[]=$CurAddon;
					}
					$AddQueries='';
					foreach($CurAddons as $CurAddon)
					{
						if(!$CurAddon['Pre']||!$CurAddon['Post'])
							continue;
						if($AddQueries)
							$AddQueries.=';';
						$CurAddQuery="{$CurAddon['Pre']} #a#{$CurAddon['Anchor']}#/a# {$CurAddon['Post']}";
						$CurAddQuery=str_replace('"','""',$CurAddQuery);
						$CurAddQuery=str_replace('#a# ','#a#',$CurAddQuery);
						$CurAddQuery=str_replace(' #/a#','#/a#',$CurAddQuery);
						$CurAddQuery=str_replace('  ',' ',$CurAddQuery);
						$CurAddQuery=str_replace('  ',' ',$CurAddQuery);
						$CurAddQuery=str_replace('  ',' ',$CurAddQuery);
						$CurAddQuery=str_replace('  ',' ',$CurAddQuery);
						$AddQueries.='"'.$CurAddQuery.'"';
					}
					if($AddQueries)
						$AddQueries=';;;'.mb_convert_encoding($AddQueries,'cp1251','utf-8');
					$CPQuery=mb_convert_encoding($Query,'cp1251','utf-8');
					echo "\"$CPQuery\";\"$FullURL\";{$_REQUEST['need_position']};$Budget{$AddQueries}\n";
				}
				elseif($_REQUEST['service']=='webeffector')
					echo "$Query	$URL	{$_REQUEST['need_position']}	$Budget\n";
				else
					echo "$Query	{$_REQUEST['need_position']}	$URL	$Budget\n";
			}
		}
		if(htracer_admin_is_wp())
		{
			echo '</textarea>';
			return;
		}
		exit;
	}
?>