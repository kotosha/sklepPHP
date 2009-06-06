<?php

/**
 * @author michal
 *
 */
class AuthController extends Zend_Controller_Action
{	
	 public function indexAction()
	 {
	 	$this->_forward('login');
	 }
	 
	 public function loginAction()
	 {
	 	$this->view->title = "Logowanie";
	 } 
 
	 public function identifyAction()
	 {
  	  $success = false;
  	  $message = '';
  	  if ($this->_request->isPost()) 
  	  {                                   
  	      // collect the data from the user
  	      $formData = $this->_request->getPost();//_getFormData();                             
   	      if (empty($formData['username'])
                 || empty($formData['password'])) 
            {
            	 $message = 'Please provide a username and password.';
            	 //echo $message;
        	} 
        	else 
        	{ 
             // do the authentication
             
             $authAdapter = $this->_getAuthAdapter($formData);              
             $auth = Zend_Auth::getInstance();
             $result = $auth->authenticate($authAdapter);          
             if ($result->isValid()) 
             {       	
                 // success: store database row to auth's storage
                 // (Not the password though!)
                 $data = $authAdapter->getResultRowObject(null,
                             'password');
                 $auth->getStorage()->write($data);                
                 $success = true;
                 $redirectUrl = $this->_redirectUrl;// redirectUrl = '/'
             } 
             else
             {
                 $message = 'Login failed';
                
           	 }
        }
     }
    
    if(!$success) {
        $flashMessenger = $this->_helper->FlashMessenger;          
        $flashMessenger->setNamespace('actionErrors');             
        $flashMessenger->addMessage($message);                     
        $redirectUrl = '/auth/login';                                  
 	   }
    	$this->_redirect($redirectUrl);
	}
	
	
	// adapter do autentykacji przy pomocy bazy danych
	protected function _getAuthAdapter($formData)
	{
	  // adapter bazodanowy wyciagniety z rejestru
  	  $dbAdapter = Zend_Registry::get('db');
  	  //tworzenie autentykacyjnego adaptera bazodanowego
      $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
  	  $authAdapter->setTableName('users')                       
 	              ->setIdentityColumn('username')               
                  ->setCredentialColumn('password');                               
   	         
       $password = $formData['password'];//sha1($formData['password']);            
       $authAdapter->setIdentity($formData['username']);        
       $authAdapter->setCredential($password);                      
       return $authAdapter;
	}
	
	public function logoutAction()
	{
    	$auth = Zend_Auth::getInstance();
    	$auth->clearIdentity();
    	$this->_redirect('/');
	}
	
	
}
