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
                    'name' => 'name',
                    'required' => true,
                    'filters' => [
                        ['name' => 'StripTags'],
                        ['name' => 'StringTrim']
                    ],
                    'validators' => [
                        [
                            'name' => 'StringLength',
                            'options' => [
                                'encoding' => 'UTF-8',
                                'min' => 3,
                                'max' => 60
                            ]
                        ]
                    ],
                ]
            )
        );
        $this->add(
            $factory->createInput(
                [
                    'name' => 'password',
                    'required' => false,
                    'validators' => [
                        [
                            'name' => 'StringLength',
                            'options' => [
                                'encoding' => 'UTF-8',
                                'min' => 6,
                                'max' => 60
                            ]
                        ]
                    ]
                ]
            )
        );
        $this->add(
            $factory->createInput(
                [
                    'name' => 'facebookId',
                    'required' => false,
                    'validators' => [
                        [
                            'name' => 'StringLength',
                            'options' => [
                                'encoding' => 'UTF-8',
                                'min' => 6,
                                'max' => 60
                            ]
                        ]
                    ]
                ]
            )
        );
        $this->add(
            $factory->createInput(
                [
                    'name' => 'gmailId',
                    'required' => false,
                    'validators' => [
                        [
                            'name' => 'StringLength',
                            'options' => [
                                'encoding' => 'UTF-8',
                                'min' => 6,
                                'max' => 60
                            ]
                        ]
                    ]
                ]
            )
        );
        $this->add(
            $factory->createInput(
                [
                    'name' => 'email',
                    'required' => true,
                    'valildators' => [
                        'name' => 'EmailAddress'
                    ]
                ]
            )
        );
        $this->add(
            $factory->createInput(
                [
                    'name' => 'typeAuth',
                    'required' => true,
                    'validators' => [
                        [
                            'name' => 'InArray',
                            'options' => [
                                'haystack' => ['1', '2', '3']
                            ]
                        ]
                    ]
                ]
            )
        );
        $this->add(
            $factory->createInput(
                [
                    'name' => 'university',
                    'required' => false,
                    'filters' => [
                        ['name' => 'StripTags'],
                        ['name' => 'StringTrim']
                    ],
                    'validators' => [
                        [
                            'name' => 'StringLength',
                            'options' => [
                                'encoding' => 'UTF-8',
                                'min' => 3,
                                'max' => 60
                            ]
                        ]
                    ],
                ]
            )
        );
    }
}
