<?php

namespace Application\Validator;


use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

class UserInviteValidator extends InputFilter
{
    public function __construct()
    {
        $factory = new InputFactory();

        $this->add(
            $factory->createInput(
                [
                    'name' => 'id',
                    'required' => false,
                    'filters' =>
                        [
                            [
                            'name' => 'Int'
                            ]
                        ]
                ]
            )
        );

        $this->add(
            $factory->createInput(
                [
                    'name' => 'id_user',
                    'required' => true,
                    'filters' =>
                        [
                            [
                            'name' => 'Int'
                            ]
                        ]
                ]
            )
        );

        $this->add(
            $factory->createInput(
                [
                    'name' => 'id_sala',
                    'required' => true,
                    'filters' =>
                        [
                            [
                            'name' => 'Int'
                            ]
                        ]
                ]
            )
        );
    }
}
