<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Controller\ExemploFactoryController;
use Application\Controller\UsersController;
use Application\Service\AuthService;
use Application\Service\FactoryService;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Method;
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
            'acao1' => [
              'type' => Literal::class,
                'options' => [
                  'route' => '/acao1',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'acao1'
                    ]
                ],
            ],
            'login' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/login/[:type]',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action' => 'login',
                    ]
                ]
            ],
            'users_literal' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/users'
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'get' => [
                        'type' => Method::class,
                        'options' => [
                            'verb' => 'get',
                            'defaults' => [
                                'controller' => Controller\UsersController::class,
                                'action' => 'fetchAll'
                            ]
                        ]
                    ],
                    'post' => [
                        'type' => Method::class,
                        'options' => [
                            'verb' => 'post',
                            'defaults' => [
                                'controller' => Controller\UsersController::class,
                                'action' => 'create'
                            ],
                        ]
                    ],
                ]
            ],
            'users_segment' => [
              'type' => Segment::class,
                'options' => [
                    'route' => '/users/[:id]'
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'put' => [
                        'type' => Method::class,
                        'options' => [
                            'verb' => 'put',
                            'defaults' => [
                                'controller' => Controller\UsersController::class,
                                'action' => 'update'
                            ]
                        ]
                    ],
                    'delete' => [
                        'type' => Method::class,
                        'options' => [
                            'verb' => 'delete',
                            'defaults' => [
                                'controller' => Controller\UsersController::class,
                                'action' => 'delete'
                            ]
                        ]
                    ],
                    'get' => [
                        'type' => Method::class,
                        'options' => [
                            'verb' => 'get',
                            'defaults' => [
                                'controller' => Controller\UsersController::class,
                                'action' => 'fetch'
                            ]
                        ]
                    ]
                ]
            ],

        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\LoginController::class => InvokableFactory::class,
            Controller\ExemploFactoryController::class => function($sm){
                return new ExemploFactoryController($sm);
            },
            Controller\UsersController::class => function($sm) {
                $server = $sm->get('ZF\OAuth2\Service\OAuth2Server');
                $provider = $sm->get('ZF\OAuth2\Provider\UserId');

                return new UsersController($server, $provider);
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
          'FactoryService' => function($sm){
            return new FactoryService();
          }
      ],
      'aliases' => [
        'ZF\OAuth2\Provider\UserId' => 'ZF\OAuth2\Provider\UserId\AuthenticationService'
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
