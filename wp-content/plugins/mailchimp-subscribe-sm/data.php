<?php

$savedata = $_REQUEST['savedata'];

if ($savedata == 1){ 
	function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$data = '* Name : '.check_input($_POST['sm_name']);
$data .= ' Email : '. check_input($_POST['sm_email']).' , '. PHP_EOL;

$post_sub_url = check_input($_POST['ssm_sub_url']);


if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$data))
{
    die("E-mail address not valid"); 
}
else{
	
	$file = "sm_subcribers-list.csv"; 
	$fp = fopen($file, "a")or die("Error Couldn't open $file for writing!");
	fwrite($fp, $data)or die("Error Couldn't write values to file!"); 
	fclose($fp); 
}



/*
$data = array(

	 array($_POST['name']),
	 array($_POST['email'] )
	);
	*/
if (!empty($post_sub_url)){
	
	header('Location:'.$post_sub_url);
	
}
else{
	include 'subscribe_msg.php';
}
}


 ?>
