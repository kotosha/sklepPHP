<?php
class ProducentForm extends Zend_Form
       {
       	
       public function __construct($options = null,$id=null)
       {
       	
       parent::__construct($options);
       $this->setName('Dodaj');
       $id = new Zend_Form_Element_Hidden('id');
       $id->setValue($id);
       $nazwa = new Zend_Form_Element_Text('nazwa');
       $nazwa->setLabel('Nazwa')
       ->setRequired(true)
       ->addFilter('StripTags')
       ->addFilter('StringTrim')
       ->addValidator('NotEmpty')
       ->addValidator('StringLength');
       
       $adres = new Zend_Form_Element_Text('adres');
       $adres->setLabel('Adres')
       ->setRequired(true)
       ->addFilter('StripTags')
       ->addFilter('StringTrim')
       ->addValidator('NotEmpty');
       $email = new Zend_Form_Element_Text('email');
       $email->setLabel('Email')
       ->setRequired(true)
       ->addFilter('StripTags')
       ->addFilter('StringTrim')
       ->addValidator('NotEmpty')
       ->addValidator('EmailAddress');
       
       $submit = new Zend_Form_Element_Submit('dodaj');
       $submit->setAttrib('Dodaj', 'submitbutton');
       $this->addElements(array($id, $nazwa, $adres,$email, $submit));
       }
}