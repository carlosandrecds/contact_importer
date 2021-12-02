<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once(APPPATH.'core/CTRL_PAI.php');

class Dashboard extends CTRL_PAI 
{
	public function index() 
    {	
 
    	$this->visualizar();
    }

    public function visualizar() 
    {
    	//That is how we load a view inside the template. 
    	$this->load->view('app/template', ['view' => 'app/dashboard']);
    }
}
