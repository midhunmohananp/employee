<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Employee;

use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig() : array
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\EmployeeTable::class => function($container) {
                    $tableGateway = $container->get(Model\EmployeeTableGateway::class);
                    return new Model\EmployeeTable($tableGateway);
                },
                Model\EmployeeTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Employee());
                    return new TableGateway('employee', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }
    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\EmployeeController::class => function($container) {
                    return new Controller\EmployeeController(
                        $container->get(Model\EmployeeTable::class)
                    );
                },
            ],
        ];
    }
}
