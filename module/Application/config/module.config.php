<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Service\RoomService;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'room' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/room[/:action]',
                    'defaults' => [
                        'controller' => Controller\RoomController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'roomList' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/room[/:action]',
                    'defaults' => [
                        'controller' => Controller\RoomController::class,
                        'action'     => 'listRoom',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\RoomController::class => InvokableFactory::class,

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
            'RoomService' => function ($sm) {
                $entityManager = $sm->get('Doctrine\ORM\EntityManager');

                return new RoomService($entityManager);
            }
        ]
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
