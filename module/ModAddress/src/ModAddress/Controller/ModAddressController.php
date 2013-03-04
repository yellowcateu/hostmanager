<?php
namespace ModAddress\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ModAddressController extends AbstractActionController
{
    
    protected $modaddressTable;
     
    public function getModAddressTable()
    {
        if (!$this->modaddressTable) {
            $sm = $this->getServiceLocator();
            $this->modaddressTable = $sm->get('ModAddress\Model\ModAddressTable');
        }
        return $this->modaddressTable;
    }
        
        
    public function indexAction()
    {
        return new ViewModel(array(
            'addresses' => $this->getModAddressTable()->fetchAll(),
        ));
    }

    public function addAction()
    {
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}