<?php
class IndexController extends Zend_Controller_Action
{
	
	// sprawdzanie autentykacji przed wejściem do dispatchera
	function preDispatch()
	{
		$auth = Zend_Auth::getInstance();
		if (!$auth->hasIdentity()) {
			$this->_redirect('auth/login');
		}
	}
	
    function indexAction() 
    {
    $this->view->title = "Strona główna - panel administracyjny";
	
    
	$strXML = '<graph caption=\"Miesięczna sprzedaż i nowi klienci\"  decimalPrecision=\"0\" formatNumberScale=\"0\">';

	$strXML .='<categories>';

	$strXML .= '<category name=\"NYGA\"/>';
	$strXML .= '<category name=\"Luty\"/>';
	$strXML .= '<category name=\"Mar\"/>';
	$strXML .= '<category name=\"Kw\"/>';
	$strXML .= '<category name=\"Maj\"/>';
	$strXML .= '<category name=\"Cze\"/>';
	$strXML .= '<category name=\"Lip\"/>';
	$strXML .= '<category name=\"Sie\"/>';
	$strXML .= '<category name=\"Wrz\"/>';
	$strXML .= '<category name=\"Paź\"/>';
	$strXML .= '<category name=\"List\"/>';
	$strXML .= '<category name=\"Gru\"/>';

	$strXML .='</categories>';
	
	$strXML .='<dataset seriesName=\"Nowi klienci\" color=\"1D8BD1\" anchorBorderColor=\"1D8BD1\" anchorBgColor=\"1D8BD1\">';

	$strXML .= '<set  value=\"462\"/>';
	$strXML .= '<set  value=\"362\"/>';
	$strXML .= '<set  value=\"452\"/>';
	$strXML .= '<set  value=\"272\"/>';
	$strXML .= '<set  value=\"667\"/>';
	$strXML .= '<set  value=\"463\"/>';
	$strXML .= '<set  value=\"412\"/>';
	$strXML .= '<set  value=\"162\"/>';
	$strXML .= '<set  value=\"402\"/>';
	$strXML .= '<set  value=\"122\"/>';
	$strXML .= '<set  value=\"762\"/>';
	$strXML .= '<set  value=\"192\"/>';

 	$strXML .='</dataset>';
	$strXML .='<dataset seriesName=\"Sprzedaż\" color=\"ff8BD1\" anchorBorderColor=\"1D8BD1\" anchorBgColor=\"1D8BD1\">';

	$strXML .= '<set  value=\"62\"/>';
	$strXML .= '<set  value=\"262\"/>';
	$strXML .= '<set  value=\"52\"/>';
	$strXML .= '<set  value=\"72\"/>';
	$strXML .= '<set  value=\"67\"/>';
	$strXML .= '<set  value=\"63\"/>';
	$strXML .= '<set  value=\"312\"/>';
	$strXML .= '<set  value=\"62\"/>';
	$strXML .= '<set  value=\"302\"/>';
	$strXML .= '<set  value=\"22\"/>';
	$strXML .= '<set  value=\"62\"/>';
	$strXML .= '<set  value=\"92\"/>';

 	$strXML .='</dataset>';
	$strXML .=  "</graph>";

	$this->view->xmlData = $strXML;
	 


    }
    
 
    function cosAction()
    {
    	echo "cos tam";
    }
    
/*    
    function postDispatch(){
    	$this->view->title = "Post dispath";
    	
    }
*/    
 
}