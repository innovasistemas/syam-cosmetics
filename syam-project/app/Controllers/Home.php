<?php namespace App\Controllers;

class Home extends BaseController
{
	public $data;


	public function __construct()
	{
		$this->data['titleEnterprise'] = ucwords('syamcosmetics'); 
		$spanishDays = [
			'Domingo', 'Lunes', 'Martes', 'Miércoles', 
			'Jueves', 'Viernes', 'Sábado'
		];
		$spanishMonths = [
			'Enero', 'Febrero', 'Marzo', 'Abril',
			'Mayo', 'Junio', 'Julio', 'Agosto',
			'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
		];
		$this->data['spanishDay'] = $spanishDays[date('w')];
		$this->data['spanishMonth'] = $spanishMonths[date('n') - 1];
	}


	public function __destruct()
	{

	}


	public function index()
	{

	}


	public function Countries()
	{
		$this->data['titlePage'] = ucwords('países'); 

	    echo view('templates/header', $this->data);
	    echo view('configurations/countries', $this->data);
	    echo view('templates/footer', $this->data);
	}
	
}
