<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->get('/', function () use ($app){
    $numero1 = "";
    $numero2 = "";
    $resultado = "";
    return $app['twig']->render('index.twig', array(
	'numero1' => $numero1,
	'numero2' => $numero2,
	'resultado' => $resultado
    ));
});

$app->post('/', function(Request $request) use ($app){
    $numero1 = $request->get('numero1');
    $numero2 = $request->get('numero2');
    $resultado = $numero1 + $numero2;
    $resultado = "El resultado es ".$resultado;
    return $app['twig']->render('index.twig', array(
	'numero1' => $numero1,
	'numero2' => $numero2,
	'resultado' => $resultado
    ));
});


$app->run();
