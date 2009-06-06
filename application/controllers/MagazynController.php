<?php

class MagazynController extends Zend_Controller_Action
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
        $this->view->title = "Magazyn";
    }
    
    function produktyAction()
    {
        $this->view->title = "Zarządzaj produktami";
    }
    
    function kategorieAction()
    {
        $this->view->title = "Zarządzaj kategoriami";
        //$kategorie = new Kategorie();
        //$this->view->kategorie = $kategorie->fetchAll();
    }
    
    function producenciAction()
    {
        $this->view->title = "Zarządzaj producentami";
        $producenci = new Producenci();
       // $this->view->producenci = $producenci->fetchAll();
	      
		$result = $producenci->fetchAll(); //$db->fetchAll($sql);
		$paginator = Zend_Paginator::factory($result);

		$paginator->setCurrentPageNumber($this->_getParam('page'));
		$paginator->setItemCountPerPage(4); // number of records per page
		$this->view->paginator = $paginator;

		$this->view->page_nr = $this->_getParam('page');
		//$this->render('list');
    }
    
    function edytujAction() {
    	$id= $this->_request->getParam('id',0);
    	$this->view->title = "Edytuj producenta";
    	$form = new ProducentForm($id);
    	echo "idinitial =".$id;
    	//(int)$this->_request->getParam('id', 0);
    	
		//$form->submit->setLabel('Zapisz');
		$this->view->form = $form;
		
		if ($this->_request->isPost()) {
			echo "whodzi do posta";
			$formData = $this->_request->getPost();
			if ($form->isValid($formData)) { 
				$producenci = new Producenci();
				//$id = $form->getValue('id');
								echo "ajdDFAFASi".$id;
				
				$row = $producenci->fetchRow('PRC_Id='.$id);
				$row->PRC_Name = $form->getValue('nazwa');
				$row->PRC_Url = $form->getValue('adres');
				$row->PRC_Email = $form->getValue('email');
				$row->save();
			//	$this->_redirect('/magazyn/producenci');
			} else {
				$form->populate($formData);
			}
		}/* else {
			//$dbAdapter = Zend_Registry::get('db')
// album id is expected in $params['id']
				$id = (int)$this->_request->getParam('id', 0);
				
				if ($id > 0) {
					$producenci = new Producenci();		
					$row = $producenci->fetchRow('PRC_Id='.$id);
				//	print_r($row);
					$form->populate($row->toArray());
				}
			}*/
    }
		/*$this->view->title = "Dodaj nowego producenta";
               $form = new ProducentForm();
               //$form-> submit->setLabel('Dodaj');
               $this->view->form = $form;
               if ($this->_request->isPost()) {
               $formData = $this->_request->getPost();
               if ($form->isValid($formData)) {

               $producenci = new Producenci();
               $row = $producenci->createRow();
               $row->PRC_Name = $form->getValue('nazwa');
               $row->PRC_Url = $form->getValue('adres');
               $row->PRC_Email = $form->getValue('email');
               $row->save();
               $this->_redirect('/magazyn/producenci');
               } else {
               $form->populate($formData);
               }
       }*/
		
}