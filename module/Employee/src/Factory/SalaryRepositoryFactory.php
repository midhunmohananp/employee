<?php
namespace Employee\Factory;

use Employee\Model\Salary;
use Employee\Model\SalaryRepository;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Hydrator\ReflectionHydrator;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class SalaryRepositoryFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return SalaryRepositoryFactory
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new SalaryRepository($container->get(AdapterInterface::class),
        new ReflectionHydrator(),
        new Salary('','', ''));
    }
}