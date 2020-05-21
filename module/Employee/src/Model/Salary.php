<?php
namespace Employee\Model;

class Salary
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $employee_id;

    /**
     * @var int
     */
    private $salary;
    private $paid_date;

    /**
     * Undocumented function
     *
     * @param [type] $paid_date
     * @param [type] $title
     * @param [type] $text
     * @param [type] $id
     */
    public function __construct($paid_date,$salary, $employee_id, $id = null)
    {
        $this->paid_date = $paid_date;
        $this->salary = $salary;
        $this->employee_id = $employee_id;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getEmployeeId()
    {
        return $this->employee_id;
    }
    public function getSalary()
    {
        return $this->salary;
    }
    public function getPaidDate()
    {
        return $this->paid_date;
    }
}