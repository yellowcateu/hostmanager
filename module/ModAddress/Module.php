<?php
namespace ModAddress;

use ModAddress\Model\ModAddress;
use ModAddress\Model\ModAddressTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
	
	public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'ModAddress\Model\ModAddressTable' =>  function($sm) {
                    $tableGateway = $sm->get('ModAddressTableGateway');
                    $table = new ModAddressTable($tableGateway);
                    return $table;
                },
                'ModAddressTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new ModAddress());
                    return new TableGateway('addresses', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
}