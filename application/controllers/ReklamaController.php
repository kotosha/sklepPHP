<?php

class ReklamaController extends Zend_Controller_Action
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
        $this->view->title = "Reklama index action ";
 
    }
    
        function promocjeAction()
    {
        $this->view->title = "Promocje";
 
    }
        function sprzedazsugestywnaAction()
    {
        $this->view->title = "Cross-selling & up-selling";
 
    }
    
        function produktdniaAction()
    {
        $this->view->title = "Produkt dnia";
 
    }
    
        function integracjeAction()
    {
        $this->view->title = "Integracje";
 
    }
    
    
}