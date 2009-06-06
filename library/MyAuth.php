<?php

class MyAuth implements Zend_Auth_Adapter_Interface
{
	public function __construct($username,$password)
	{
		
	} 
	
	public function authenticate()
	{
		 //return Zend_Auth_Result::SUCCESS;
	}
	
}