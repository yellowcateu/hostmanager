<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'ModAddress\Controller\ModAddress' => 'ModAddress\Controller\ModAddressController',
        ),
    ),
    //Router config
    'router' => array(
        'routes' => array(
            'addresses' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/addresses[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'ModAddress\Controller\ModAddress',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
	
    'view_manager' => array(
        'template_path_stack' => array(
            'addresses' => __DIR__ . '/../view',
        ),
    ),
);