<?php

use Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Mink\Driver\GoutteDriver;
use Behat\Mink\Session;

require_once 'PHPUnit/Framework/Assert/Functions.php';

class FeatureContext extends BehatContext
{

    static private $APP_URL = "http://localhost/bddsample/";
    private $session;

    /** @BeforeScenario */
    public function before()
    {
	$driver = new GoutteDriver();
	$this->session = new Session($driver);
	$this->session->start();	
    }

    /**
     * @Given /^que estoy en la aplicación$/
     */
    public function queEstoyEnLaAplicacion()
    {
        $this->session->visit('http://localhost/bddsample');
    }

    /**
     * @Given /^ingreso los números ([-]?\d+) y ([-]?\d+)$/
     */
    public function ingresoLosNumerosY($numero1, $numero2)
    {
        $pagina = $this->session->getPage();
        $campo1 = $pagina->findById('numero1');
	$campo2 = $pagina->findById('numero2');
	$campo1->setValue($numero1);
	$campo2->setValue($numero2);
    }

    /**
     * @Given /^solicito el resultado del cálculo$/
     */
    public function solicitoElResultadoDelCalculo()
    {
        $pagina = $this->session->getPage();
        $boton = $pagina->findById('btn_calcular');
 	$boton->press();
    }

    /**
     * @Given /^el resultado debe ser ([-]?\d+)$/
     */
    public function elResultadoDebeSer($resultado)
    {
        $pagina = $this->session->getPage();
        $div = $pagina->findById('resultado');
	assertEquals($div->getText(),'El resultado es '.$resultado);
    }

    /** @AfterScenario */
    public function after(){
        $this->session->reset();
    }
}
