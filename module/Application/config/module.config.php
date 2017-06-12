<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Controller\ExemploFactoryController;
use Application\Service\AuthService;
use Application\Service\MediaService;
use Application\Service\FactoryService;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'exemploFactory' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/exemplo-factory',
                    'defaults' => [
                        'controller' => Controller\ExemploFactoryController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'application' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'media' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/media',
                    'defaults' => [
                        'controller' => Controller\MediaController::class,
                        'action' => 'storeMedia',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\MediaController::class => InvokableFactory::class,
            Controller\ExemploFactoryController::class => function ($sm) {

                return new ExemploFactoryController($sm);
            }
        ],
    ],
    'doctrine' => [
        'driver' => [
            'driver' => [
                //define um driver de notação para a pasta src/Entity
                // (poderia ser varias pastas), e o nome do driver é 'driver'
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../src/Entity'
                ]
            ],
            'orm_default' => [
                'drivers' => [ //registra o 'driver' para qualquer entidade na namespace Application\Entity
                    'Application\Entity' => 'driver'
                ]
            ]
        ]
    ],
    'service_manager' => [
      'factories' => [
          'AuthService' => function ($sm) {
            $entityManager = $sm->get('Doctrine\ORM\EntityManager');

            return new AuthService($entityManager);
          },
          'MediaService' => function ($sm) {
            $entityManager = $sm->get('Doctrine\ORM\EntityManager');

            return new MediaService($entityManager);
          },
          'FactoryService' => function($sm) {

            return new FactoryService(new \DateTime());
          }
      ]
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy'
        ]
    ],
];