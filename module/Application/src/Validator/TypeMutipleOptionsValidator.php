<?php

namespace Application\Validator;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

class TypeMutipleOptionsValidator extends InputFilter
{
    public function __construct()
    {
        $factory = new InputFactory();

        $this->add(
            $factory->createInput(
                array(
                    'name' => 'id',
                    'required' => false,
                    'filters' => array(
                        array(
                            'name' => 'Int'
                        )
                    )
                )
            )
        );
        $this->add(
            $factory->createInput(
                array(
                    'name' => 'Choices',
                    'required' => true,
                    'validators' => array(
                        array(
                            'name' => 'IsInstanceOf',
                            'options' => array(
                                'className' => 'Application\Entity\Choices'
                            )
                        )
                    )
                )
            )
        );

    }

}