<?php

class Zend_View_Helper_LoggedInUser
{
    protected $_view;
    function setView($view)                                        
    {                                                                   
        $this->_view = $view;                                       
    }                                                                   
    function loggedInUser()
    {
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity())                                           
        {
            $logoutUrl = $this->_view->linkTo('auth/logout');
            $user = $auth->getIdentity();              
            $username = $this->_view->escape(ucfirst($user->username));
            $string = 'Zalogowany jako ' . $username . ' | <a href="' .
                        $logoutUrl . '">Wyloguj</a>';
        } else {
            $loginUrl = $this->_view->linkTo('auth/identify');          
            $string = '<a href="'. $loginUrl . '">Zaloguj</a>';          
        }
        return $string;
    }
}
