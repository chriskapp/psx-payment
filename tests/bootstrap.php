<?php

$loader = require('vendor/autoload.php');
$loader->add('PSX', 'tests');

$container = getContainer();

PSX\Bootstrap::setupEnvironment($container->get('config'));

function getContainer()
{
	static $container;

	if($container === null)
	{
		$container = new PSX\Dependency\DefaultContainer();
		$container->setParameter('config.file', array(
			'psx_url'                 => 'http://127.0.0.1/projects/psx/public',
			'psx_dispatch'            => 'index.php/',
			'psx_timezone'            => 'UTC',
			'psx_debug'               => true,

			'psx_path_cache'          => sys_get_temp_dir(),
			'psx_path_library'        => __DIR__ . '/../src',
		));
	}

	return $container;
}
