<?php

class StatystykiController extends Zend_Controller_Action
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
        $this->view->title = "Statystyki  ";
    }
    
    function najczesciejogladaneAction()
    {
    	$this->view->title = "Najczęściej oglądane produkty";
    }
    
    function najczesciejkupowaneAction()
    {
    	$this->view->title = "Najczęściej kupowane produkty";
    }
    
    function najczesciejkupowanemarkiAction()
    {
    	$this->view->title = "Najczęściej kupowane marki";
    }
    
    function iloscproduktowwzamowieniuAction()
    {
    	$this->view->title = "Ilość produktów w zamówieniu";
    }
    
    function wartosczamowienAction()
    {
    	$this->view->title = "Wartość zamówień";
    }
    
    function rodzajplatnosciAction()
    {
    	$this->view->title = "Rodzaj płatności";
    }
    
    function rodzajdostawyAction()
    {
    	$this->view->title = "Rodzaj dostawy";
    }
    
    function bestselleryAction()
    {
    	$this->view->title = "Bestsellery";
    }
}