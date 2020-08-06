<?php

namespace application;

class Config {
    const PDO = [
		'dbtype' => 'mysql',
    	'host' => 'localhost',
    	'db' => 'hellodb',
    	'user' => 'hellouser',
    	'password' => '1',
        'charset' => 'utf8'
    ];
    
    const BootstrapCDN = '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">';
}
