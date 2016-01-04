<?php
return array(
	'logs'=>array(
		'path'=>'backup/logs/log',
		'type'=>'file'
	),
	'DB'=>array(
		'type'=>'mysqli',
        'tablePre'=>'iwebshop_',
		'read'=>array(
			array('host'=>'localhost:3306','user'=>'root','passwd'=>'root','name'=>'iwebshop'),
		),

		'write'=>array(
			'host'=>'localhost:3306','user'=>'root','passwd'=>'root','name'=>'iwebshop',
		),
	),
	'interceptor' => array('themeroute@onCreateController','layoutroute@onCreateView','hookCreateAction@onCreateAction','hookFinishAction@onFinishAction'),
	'langPath' => 'language',
	'viewPath' => 'views',
	'skinPath' => 'skin',
    'classes' => 'classes.*',
    'rewriteRule' =>'url',
	'theme' => array('pc' => array('default' => 'red','sysdefault' => 'red','sysseller' => 'red'),'mobile' => array('mobile' => 'default','sysdefault' => 'default','sysseller' => 'default')),
	'timezone'	=> 'Etc/GMT-8',
	'upload' => 'upload',
	'dbbackup' => 'backup/database',
	'safe' => 'cookie',
	'lang' => 'zh_sc',
	'debug'=> false,
	'configExt'=> array('site_config'=>'config/site_config.php'),
	'encryptKey'=>'a46f0c9b4c499b1e9ec41d6b43b6ecaa',
);
?>