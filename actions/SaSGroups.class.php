<?php
/**
 * SaSGroups Controller provide process services
 * 
 * @author Bertrand Chevrier, <taosupport@tudor.lu>
 * @package taoGroups
 * @subpackage actions
 * @license GPLv2  http://www.opensource.org/licenses/gpl-2.0.php
 */
class SaSGroups extends Groups {
    
    /**
     * @see Groups::__construct()
     */
    public function __construct() {
        $this->setSessionAttribute('currentExtension', 'taoGroups');
		tao_helpers_form_GenerisFormFactory::setMode(tao_helpers_form_GenerisFormFactory::MODE_STANDALONE);
		parent::__construct();
    }
		
	/**
     * @see TaoModule::setView()
     */
    public function setView($identifier, $useMetaExtensionView = false) {
		if($useMetaExtensionView){
			$this->setData('includedView', $identifier);
		}
		else{
			$this->setData('includedView', BASE_PATH . '/' . DIR_VIEWS . $GLOBALS['dir_theme'] . $identifier);
		}
		parent::setView('sas.tpl', true);
    }
	
	/**
     * overrided to prevent exception: 
     * if no class is selected, the root class is returned 
     * @see TaoModule::getCurrentClass()
     * @return core_kernel_class_Class
     */
    protected function getCurrentClass() {
        if($this->hasRequestParameter('classUri')){
        	return parent::getCurrentClass();
        }
		return $this->getRootClass();
    }
	
	/**
	 * Render the tree to select the group related subjects 
	 * @return void
	 */
	public function selectSubjects(){
		$this->setData('uri', $this->getRequestParameter('uri'));
		$this->setData('classUri', $this->getRequestParameter('classUri'));
		$this->setData('relatedSubjects', json_encode(array_map("tao_helpers_Uri::encode", $this->service->getRelatedSubjects($this->getCurrentInstance()))));
		$this->setView('subjects.tpl');
	}
	
	
	/**
	 * Render the tree to select the group related deliveries 
	 * @return void
	 */
	public function selectDeliveries(){
		$this->setData('uri', $this->getRequestParameter('uri'));
		$this->setData('classUri', $this->getRequestParameter('classUri'));
		$this->setData('relatedDeliveries', json_encode(array_map("tao_helpers_Uri::encode", $this->service->getRelatedDeliveries($this->getCurrentInstance()))));
		$this->setView('deliveries.tpl');
	}
}
?>