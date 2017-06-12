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
                    'name' => 'username',
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
                    'name' => 'room',
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
                    'name' => 'accepted',
                    'required' => true,
                    'filters' =>
                        [
                            [
                                'name' => 'Boolean'
                            ]
                        ]
                ]
            )
        );
    }
}
