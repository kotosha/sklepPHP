<?php

class NarzedziaController extends Zend_Controller_Action
{
	function preDispatch()
	{
		$auth = Zend_Auth::getInstance();
		if (!$auth->hasIdentity()) {
			$this->_redirect('auth/login');
		}
	}
	
    function indexAction()
    {
        $this->view->title = "Narzedzia index action ";
 
    }
    
    function kreatorsadazyAction()
    {
        $this->view->title = "Kreator sądaży";
 
    }
    
    function kreatornewsletteraAction()
    {
        $this->view->title = "Kreator newslettera";
 
    }
    
    function kopiasystemuAction()
    {
        $this->view->title = "Kopia zapasowa systemu";
 
    }
    
    function wysylkaAction()
    {
        $this->view->title = "Wysyłka";
 
    }
    
    function walutyAction()
    {
        $this->view->title = "Waluty w sklepie";
 
    }
    
    function jezykiAction()
    {
        $this->view->title = "Języki";
 
    }
    
}