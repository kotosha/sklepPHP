<?php

class ZamowieniaController extends Zend_Controller_Action
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
        $this->view->title = "Zamowienia i klienci";
 
    }
    
    function klienciAction()
    {
        $this->view->title = "Klienci";
 
    }
    
    function zamowieniaAction()
    {
        $this->view->title = "Zamówienia";
 
    }
    
    function rabatyAction()
    {
        $this->view->title = "Rabaty";
 
    }
    
    function fakturyAction()
    {
        $this->view->title = "Faktury";
 
    }
}