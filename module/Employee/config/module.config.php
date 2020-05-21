<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare (strict_types = 1);

namespace Employee;

use Laminas\Router\Http\Segment;

return [


    // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'employee' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/employee[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\EmployeeController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'employee' => __DIR__ . '/../view',
        ],
    ],
    'service_manager' => [
        'aliases' => [
            Model\SalaryRepositoryInterface::class => Model\SalaryRepository::class,
        ],
        'factories' => [
            Model\SalaryRepository::class => InvokableFactory::class,
        ],
    ],
];
