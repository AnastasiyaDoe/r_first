
<form action="net8.php" method="post" accept-charset="utf-8">
<input type="text" name="usr">
<button type="submit" name="check">Проверить</button>
</form>
<?php

if (isset($_POST['check'])) {
	$usr = $_POST['usr'];
}else{
	$usr = '';
}

$file_content = file_get_contents('register.txt');

$file_arr = explode(";",$file_content);

if (stripos($file_content, $usr)!==false){
	echo $usr."<br>URL внесен в реестр<br>";
  
}else{
	echo $usr."<br>URL чист<br>";
}


$domain = parse_url($usr,PHP_URL_HOST);

echo preg_replace("/(www\.)/", '', $domain);
$cout = 0;
foreach ($file_arr as $value){
if ($value == $domain || $value == preg_replace("/(www\.)/", '', $domain)) {
	$cout++;
}

}

if ($cout > 0) {
	echo "<br>Домен внесен в реестр<br>";
}

echo "<br><br>";
//////////////////////
$ipaddr = gethostbyname($domain);

if (stripos($file_content, $ipaddr)!==false) {
	echo $ipaddr."<br>IP внесен в реестр<br>";
  
}else{
	echo $ipaddr."<br>Всё чисто<br>";
}