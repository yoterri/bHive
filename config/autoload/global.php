<?php

use Bhive\Factory\AdapterAbstractServiceFactory;

return array(

    'db' => array(
        'adapters' => array(
            
            'default' => array(
                'driver' => 'Mysqli',
                'database' => 'test',
                'username' => 'dbuser',
                'password' => '',
                'hostname' => 'localhost',
                'profiler' => true,
                'charset' => 'UTF8',
                'options' => array(
                    'buffer_results' => true
                )
            ),

            'other' => array(
                'driver' => 'Mysqli',
            ),
        ),
    ),

    'db_prefix' => '',

    'application_salt' => 'UYg)(/Y90JPNo(&(/6I8IOPJMOI/%(/&907U0KPMO876T85&/gi(ohNJIOÃ‘JLK',

    'controllers' => array(
        'abstract_factories' => array(
            'Bhive\Factory\Controller'
        )
    ),

    'service_manager' => array(

        'abstract_factories' => array(
            #'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            #'Zend\Log\LoggerAbstractServiceFactory',
            #'Com\Service\CommonFactory'
        ),

        'factories' => array(
            'default' => AdapterAbstractServiceFactory::class,
        ),
        
        'aliases' => array(
            'adapter' => 'default'
        )
    ),
    
    'php_settings' => array(
        'display_startup_errors' => false,
        'display_errors' => false,
        'max_execution_time' => 60,
        'date.timezone' => 'America/La_Paz',
        #'error_reporting' => E_ALL,
    ),


    'router' => array(

        'routes' => array(

            'front' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/',
                    'constraints' => array(),
                    'defaults' => array(
                        'controller' => 'Front\Controller\Index',
                        'action' => 'index' 
                    ) 
                ),
                
                'may_terminate' => true,
                
                'child_routes' => array(
                    'wildcard' => array(
                        'type' => 'Wildcard' 
                    ) 
                ) 
            ),
        )
    ),

    'view_manager' => array(
        'display_exceptions' => false,
        'display_not_found_reason' => false,

        'doctype' => 'HTML5',
        'default_template_suffix' => 'phtml',

        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',

        'template_map' => array(
            'layout/layout' => realpath(__DIR__ . '/../view/layout/layout.phtm'),
            'error/404' => realpath(__DIR__ . '/../view/error/404.phtml'),
            'error/401' => realpath(__DIR__ . '/../view/error/401.phtml'),
            'error/index' => realpath(__DIR__ . '/../view/error/index.phtm'),
            
        ),

        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),

    'strategies' => array(
        'ViewJsonStrategy'
    ),
);