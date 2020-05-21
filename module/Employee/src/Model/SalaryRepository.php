<?php
namespace Employee\Model;

use Employee\Model\SalaryRepositoryInterface;

class SalaryRepository implements SalaryRepositoryInterface
{

    private $data = [
        1 => [
            'id'    => 1,
            'employee_id' => '1',
            'salary'  => 'This is our first blog post!',
            'paid_date'  => 'This is our first blog post!',
        ],
        2 => [
            'id'    => 2,
            'employee_id' => '1',
            'salary'  => 'This is our first blog post!',
            'paid_date'  => 'This is our first blog post!',
        ],
        3 => [
            'id'    => 3,
            'employee_id' => '1',
            'salary'  => 'This is our first blog post!',
            'paid_date'  => 'This is our first blog post!',
        ],
        4 => [
            'id'    => 4,
            'employee_id' => '1',
            'salary'  => 'This is our first blog post!',
            'paid_date'  => 'This is our first blog post!',
        ],
        5 => [
            'id'    => 5,
            'employee_id' => '1',
            'salary'  => 'This is our first blog post!',
            'paid_date'  => 'This is our first blog post!',
        ],
    ];

    public function findAllSalaries($id)
    {
        return array_map(function ($salary) {
            return new Salary(
                $salary['paid_date'],
                $salary['salary'],
                $salary['employee_id'],
                $salary['id']
            );
        }, $this->data);
    }
}