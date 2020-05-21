<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */
namespace Employee\Model;

use DomainException;
use Laminas\Filter\ToInt;
use Laminas\Filter\StripTags;
use Laminas\Filter\StringTrim;
use Laminas\Validator\StringLength;
use Laminas\InputFilter\InputFilter;
use Laminas\InputFilter\InputFilterInterface;
use Laminas\InputFilter\InputFilterAwareInterface;

class Employee implements InputFilterAwareInterface
{
    public $id;
    public $name;
    public $designation;
    public $hire_date;
    public $salary;
    private $inputFilter;

    public function exchangeArray(array $data)
    {
        $this->id = !empty($data['id']) ? $data['id'] : null;
        $this->name = !empty($data['name']) ? $data['name'] : null;
        $this->designation = !empty($data['designation']) ? $data['designation'] : null;
        $this->hire_date = !empty($data['hire_date']) ? $data['hire_date'] : null;
        $this->salary = !empty($data['salary']) ? $data['salary'] : null;
    }
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new DomainException(sprintf(
            '%s does not allow injection of an alternate input filter',
            __CLASS__
        ));
    }

    public function getInputFilter()
    {
        if ($this->inputFilter) {
            return $this->inputFilter;
        }

        $inputFilter = new InputFilter();

        $inputFilter->add([
            'name' => 'id',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'name',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'designation',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);
        $inputFilter->add([
            'name' => 'salary',
            'required' => true,
        ]);
        $inputFilter->add([
            'name' => 'hire_date',
            'required' => true,
        ]);

        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }
    public function getArrayCopy()
    {
        return [
            'id'     => $this->id,
            'name' => $this->name,
            'designation'  => $this->designation,
            'hire_date'  => $this->hire_date,
            'salary'  => $this->salary,
        ];
    }
}
