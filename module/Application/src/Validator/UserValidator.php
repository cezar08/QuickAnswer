<?php

namespace Application\Validator;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

class UserValidator extends InputFilter
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
                    'name' => 'name',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'UTF-8',
                                'min' => 3,
                                'max' => 60
                            )
                        )
                    )
                )
            )
        );
        $this->add(
            $factory->createInput(
                array(
                    'name' => 'password',
                    'required' => false,
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min' => 6,
                                'max' => 60
                            )
                        )
                    )
                )
            )
        );
        $this->add(
            $factory->createInput(
                array(
                    'name' => 'email',
                    'required' => true,
                    'validator' => array(
                        array(
                            'name' => 'EmailAdress'
                        )
                    )
                )

            )
        );
        $this->add(
            $factory->createInput(
                array(
                    'name' => 'birthDate',
                    'required' => false,
                    'validators' => array(
                        array(
                            'name' => 'Date',
                            'options' => array(
                                'format' => 'd/m/Y'
                            )
                        )
                    )
                )

            )
        );
        $this->add(
            $factory->createInput(
                array(
                    'name' => 'typeAuth',
                    'required' => true,
                    'validators' => array(
                        array(
                            'name' => 'InArray',
                            'options' => array(
                                'haystack' => array('FACEBOOK', 'GMAIL', 'LOCAL')
                            )
                        )
                    )
                )

            )
        );
        $this->add(
            $factory->createInput(
                array(
                    'name' => 'universitie',
                    'required' => false,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'UTF-8',
                                'min' => 3,
                                'max' => 60
                            )
                        )
                    )
                )
            )
        );
    }

}