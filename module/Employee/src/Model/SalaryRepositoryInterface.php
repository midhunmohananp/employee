<?php
namespace Employee\Model;

interface SalaryRepositoryInterface
{
    public function findAllSalaries($empoyee_id);
}