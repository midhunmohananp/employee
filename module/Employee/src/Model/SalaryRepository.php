<?php
namespace Employee\Model;

use RuntimeException;
use Laminas\Db\Sql\Sql;
use InvalidArgumentException;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Hydrator\HydratorInterface;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\HydratingResultSet;
use Employee\Model\SalaryRepositoryInterface;
use Laminas\Db\Adapter\Driver\ResultInterface;

class SalaryRepository implements SalaryRepositoryInterface
{
    /**
     * @var AdapterInterface
     */
    private $db;
    /**
     * @var HydratorInterface
     */
    private $hydrator;

    /**
     * @var Salary
     */
    private $salaryPrototype;

    /**
     * @param AdapterInterface $db
     */
    public function __construct(
        AdapterInterface $db,
        HydratorInterface $hydrator,
        Salary $salaryPrototype
    ) {
        $this->db            = $db;
        $this->hydrator      = $hydrator;
        $this->salaryPrototype = $salaryPrototype;
    }
    public function findAllSalaries($empoyee_id)
    {
        $sql    = new Sql($this->db);
        $select = $sql->select('salary');
        $select->where(['employee_id'=>$empoyee_id]);
        $select->where("date_format(paid_date,'%Y-%m') < date_format(now(),'%Y-%m')");
        $select->where("date_format(paid_date,'%Y-%m') >= date_format(now() - interval 12 month,'%Y-%m')");
        $select->order('paid_date DESC');
        $stmt   = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();
        if (! $result instanceof ResultInterface || ! $result->isQueryResult()) {
            return [];
        }
        $resultSet = new HydratingResultSet($this->hydrator, $this->salaryPrototype);
        $resultSet->initialize($result);
        return $resultSet;
    }
}