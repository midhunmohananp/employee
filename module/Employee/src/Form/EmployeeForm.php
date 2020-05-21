<?php
namespace Employee\Form;

use Laminas\Form\Form;

class EmployeeForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('employee');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'name',
            'type' => 'text',
            'options' => [
                'label' => 'Name',
            ],
        ]);
        $this->add([
            'name' => 'designation',
            'type' => 'text',
            'options' => [
                'label' => 'Designation',
            ],
        ]);
        $this->add([
            'name' => 'hire_date',
            'type' => 'date',
            'options' => [
                'label' => 'Hire Date',
            ],
        ]);
        $this->add([
            'name' => 'salary',
            'type' => 'number',
            'options' => [
                'label' => 'Monthly salary',
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id' => 'submitbutton',
            ],
        ]);
    }
}
