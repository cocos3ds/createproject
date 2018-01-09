<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/6
 * Time: 12:44
 *
 * 思路:
 * 1. 获取项目名。
 * 2. 域名重定向
 * 3. 创建虚拟主机
 * 4. 复制文件
 * 5. 修改连接数据库文件public.php
 * 6. 创建数据库
 * 7. 重启apache
 */




	
	
	if(empty($argv[1])){
		fwrite(STDOUT,'input your project name:');
		$name = fgets(STDIN);
		$name = str_replace(PHP_EOL,'',$name);
	}else{
		$name = $argv[1];
	}
	
	$domain = 'www.local'.$name.'.com';

	$config = include_once ('./config.php');

	if(!file_exists($config['HOSTS'])){
		exit('host file not found');
	}
	
	//获取hosts文件句柄
	$hostsHandler = fopen($config['HOSTS'],'a');
	
	
	if(!fwrite($hostsHandler,"\n127.0.0.1 ".$domain)){
		echo 'failed to write hosts';
	}
	
	echo 'success '.$domain;
	
	
	
	
	
	



