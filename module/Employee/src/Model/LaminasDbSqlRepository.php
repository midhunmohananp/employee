<?php
namespace Employee\Model;

use RuntimeException;
use InvalidArgumentException;
use Laminas\Db\Adapter\AdapterInterface;
use Employee\Model\SalaryRepositoryInterface;

class LaminasDbSqlRepository implements SalaryRepositoryInterface
{
    /**
     * @var AdapterInterface
     */
    private $db;

    /**
     * @param AdapterInterface $db
     */
    public function __construct(AdapterInterface $db)
    {
        $this->db = $db;
    }
    public function findAllSalaries($empoyee_id)
    {
    }
}