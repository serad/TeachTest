<?php
error_reporting(E_ALL);

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Session\Adapter\Files as Session;
use App\Plugins\SecurityPlugin;
use App\Plugins\NotFoundPlugin;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Url as UrlProvider;

// Define some absolute path constants to aid in locating resources
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app/');



// Creates the autoloader
$loader = new Loader();

// Register some namespaces
$loader->registerNamespaces(
    [
        "App\\Controllers"    => APP_PATH . "controllers/",
        "App\\Models" => APP_PATH . "models/",
	"App\\Plugins" => APP_PATH . "plugins/",
        "App"          => APP_PATH ,
    ]
);
// Register autoloader
$loader->register();



require_once APP_PATH .'../vendor/autoload.php';

// Create a DI
$di = new FactoryDefault();
$twigFS = new Twig_Loader_Filesystem( APP_PATH . '/views/' );
$twig = new Twig_Environment($twigFS, array(
    'cache' => false,
));
$di->set(
    'session',
    function () {
        $session = new Session();

        $session->start();

        return $session;
    }
);
$di['twigService'] = function($view, $di) {
    $options = [
        'debug'               => true,
        'charset'             => 'UTF-8',
        'base_template_class' => 'Twig_Template',
        'strict_variables'    => false,
        'autoescape'          => false,
        'cache'               =>  APP_PATH . '/views/cache',
        'auto_reload'         => null,
        'optimizations'       => -1,
    ];

    $twig = new \Phalcon\Mvc\View\Engine\Twig($view, $di, $options);
    return $twig;
};


// Setup the view component
$di['view'] = function() {
    $view = new \Phalcon\Mvc\View();
    $view->setViewsDir(APP_PATH . '/views/');
    $view->registerEngines(array(
            ".twig" => 'twigService'
    ));
    return $view;
};

// Setup a base URI so that all generated URIs
$di->set(
    'url',
    function () {
        $url = new UrlProvider();
        $url->setBaseUri('/');
        return $url;
    }
);
$di->set('db', function() {
    return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
        "host"      => 'localhost', //$config->database->host,
        "username"  => 'teachtest', //$config->database->username,
        "password"  => 'teachtest', //$config->database->password,
        "dbname"    => 'teachtest', //$config->database->dbname,
        "charset"   => 'UTF8' //$config->database->encoding
    ));
});
$di->set( 'dispatcher', function() {


	$eventsManager = new EventsManager();
	$eventsManager->attach(
            'dispatch:beforeExecuteRoute',
            new SecurityPlugin()
        );

	$eventsManager->attach(
            'dispatch:beforeException',
            new NotFoundPlugin()
        );
	$dispatcher = new Dispatcher;
	$dispatcher->setDefaultNamespace('App\Controllers');
	$dispatcher->setEventsManager($eventsManager);
	return $dispatcher;
});



$application = new Application($di);
try {
    // Handle the request

    $response = $application->handle();

    $response->send();
} catch (\Exception $e) {
    echo 'Exception: '. $e->getMessage();
echo nl2br(htmlentities($e->getTraceAsString()));
}
