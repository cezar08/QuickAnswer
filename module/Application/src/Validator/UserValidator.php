<?php

namespace Application\UserValidator;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

class UserValidator extends InputFilter
{
    public function __construct($name = null)
    {
        parent::__construct($name);
        $factory = new InputFactory();

        $this->add(array(
            'name' => 'id',
            'required' => false,
            'filters' => array(
                array(
                    'name' => 'Int'
                )
            )
        ));

        $this->add(array(
            'name' => 'name',
            'required' => true,
            'filters' => array(
                array('name' => 'Striptags'),
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => 'UTF-8',
                    'min' => 3,
                    'max' => 60
                )
            )
        ));

    }

}