<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Service\AuthService;
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
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
    'saveTypeQuick' => [
              'type' => Literal::class,
                'options' => [
                  'route' => '/saveTypeQuick',
                    'defaults' => [
                        'controller' => Controller\QuestionController::class,
                        'action' => 'saveTypeQuick'
                    ]
                ],
      ],
    'saveTypeMultipleOptions' => [
        'type' => Literal::class,
        'options' => [
            'route' => '/saveTypeMultipleOptions',
            'defaults' => [
                'controller' => Controller\QuestionController::class,
                'action' => 'saveTypeMultipleOptions'
            ]
        ],
    ],
    'saveChoice' => [
        'type' => Literal::class,
        'options' => [
            'route' => '/saveChoice',
            'defaults' => [
                'controller' => Controller\QuestionController::class,
                'action' => 'saveChoice'
            ]
        ],
    ],

    'doctrine' => [
        'driver' => [
            'driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [
                    __DIR__.'/../src/Entity'
                ],
            ],
            'orm_default' => [
                'drivers' => [
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
    ],
];
