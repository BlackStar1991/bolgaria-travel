<?php
	header ("Content-Type: text/html;charset=utf-8");
	$host  = array_key_exists('host', $_REQUEST)  ? $_REQUEST['host']  : '';
	$query = array_key_exists('query', $_REQUEST) ? $_REQUEST['query'] : 'машина';
	
	include_once("Snoopy.class.php");	
	$snoopy = new Snoopy;

	$Proxies=Array(
				"178.170.148.213;hkey105;zZH8IjT2;pecaxyhu3320;03.115927157:d7cd687c9b247dc0f07d5dafa544ee01",
				"178.170.148.215;hkey105;zZH8IjT2;nedybaca710;03.115927282:1cb486e76bd9263bae8c317bde8b3ab0",
				"178.170.148.220;hkey105;zZH8IjT2;misigote3300;03.115927594:b99bccb1d16e02d0f757d6297f7ed1d8",
				"178.170.148.221;hkey105;zZH8IjT2;palejevi5581;03.115927660:e5f57599ca637ec60b14649dd07de07d",
				"178.170.148.222;hkey105;zZH8IjT2;mydozomu8075;03.115927690:de2c418379a23bd3bff41907acf02e2c"
			);
	
	srand();
	$Proxy=$Proxies[rand()%count($Proxies)];
	list($ip,$login, $pass,$xmllogin,$xmlkey) = explode(";",$Proxy);

	$snoopy->proxy_host		=	$ip;					// proxy host to use
	$snoopy->proxy_port		=	"3128";					// proxy port to use
	$snoopy->proxy_user		=	$login;					// proxy user to use
	$snoopy->proxy_pass		=	$pass;					// proxy password to use

	//echo $Proxy;
	//exit;
	
	$snoopy->agent 	 = "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13";
	$snoopy->rawheaders["Accept"] = "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
	$snoopy->rawheaders["Accept-Language"] = "ru-ru,ru;q=0.8,en-us;q=0.5,en;q=0.3";
	$snoopy->rawheaders["Accept_charset"] = "windows-1251,utf-8;q=0.7,*;q=0.7";
	$snoopy->rawheaders["Accept_encoding"] = "identity";
	$snoopy->rawheaders["Connection"] = "Keep-Alive";
	
	$query = mb_convert_encoding($query,'utf-8',mb_detect_encoding($query,array('utf-8','cp1251')));
	$esc   = htmlspecialchars($query);
	$ehost = htmlspecialchars($host);
	if($_REQUEST['host'])
		$search_tail = htmlspecialchars(" host:$ehost");
	$doc = "<?xml version='1.0' encoding='utf-8'?>
			<request>
				<query>$esc{$search_tail}</query>
			</request>";
	$URL = "http://xmlsearch.yandex.ru/xmlsearch?user=$xmllogin&key=$xmlkey"; 
	//echo $URL;
	//$URL ="http://google.com/";
	$snoopy->httpmethod = "POST";
	$snoopy->submit($URL, $doc);
	$response=$snoopy->results;
	if($response && $_REQUEST['single'])
	{
		$xmldoc = new SimpleXMLElement($response);
		$found = $xmldoc->xpath("response/results/grouping/group/doc");
		foreach ($found as $item)
		{
			echo $item->url;
			exit();
		}
		exit();
	}
if(!$_GET['place']):
?>
	<html>
	<head>
		<link media="screen" rel="stylesheet" href="serp.css" />
		<meta name="robots" content="noindex,nofollow" />
	</head>
	<body><div id="mdiv">
<?php	
endif;
	if($response) 
	{
 		$xmldoc = new SimpleXMLElement($response);
		$error = $xmldoc->response->error;
		if (!$error) 
		{
			$found = $xmldoc->xpath("response/results/grouping/group/doc");
			if(!$_GET['place'])
				echo "<ol>";
			$i=0;	
			foreach ($found as $item) 
			{
				$i++;
				if($_GET['place'])
				{
					$U1=strtolower($item->url);
					$U2=strtolower($_GET['place']);
					if(strpos($U1,'http://www.'.$U2)===0
					 ||strpos($U1,'http://'.$U2)===0	
				  	 ||strpos($U1,'www.'.$U2)===0
					 ||strpos($U1,$U2)===0)
					{
						echo($i);
						exit;
					}
					continue;
				}
				echo strtolower($item->url).'<br />';
				echo "<li>";
				if(!$_GET['pid'])
					echo "<a href='{$item->url}'>" . highlight_words($item->title) . "</a>";
				else
					echo "<span onclick='seturl(\"{$item->url}\")' class='plink'>".highlight_words($item->title)."</span>";
				echo "<div class='passages'>";
				if ($item->passages) 
					foreach ($item->passages->passage as $passage) 
						echo highlight_words($passage)."<br/>";
				if(!$_GET['pid'])
					echo "<span class='url'>{$item->url}</span>";
				else
					echo "<span onclick='seturl(\"{$item->url}\")' class='purl'>{$item->url}</span>";
				echo "</div></li>\n";
			}
			if($_GET['place'])
			{
				if(!$i)
					die('1002 ');
				die('1001 ');
			}	
			echo "</ol>\n";
		}
		else
		{
			if($_GET['place'])
				die('1002 ');
			else
				echo "@%#$error\n";
		}
	}
	else
	{
		if($_GET['place'])
			die('1002 ');
		else
			echo "@%#¬нутренн€€ ошибка сервера.\n";
	}
function highlight_words($node)
{
	$stripped = preg_replace('/<\/?(title|passage)[^>]*>/', '', $node->asXML());
	return str_replace('</hlword>', '</strong>', preg_replace('/<hlword[^>]*>/', '<strong>', $stripped));
}
?>
	</div><body>
</html>