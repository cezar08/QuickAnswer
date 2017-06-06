<?php
/**
 * Created by PhpStorm.
 * User: wesley
 * Date: 27/04/17
 * Time: 23:23
 */

namespace Application\Validator;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

class RoomValidator extends InputFilter
{
    public function __construct()
    {
        $factory = new InputFactory();
        $this->add(
            $factory->createInput(
                [
                    'name' => 'id',
                    'required' => 'false',
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
                    'name' => 'roomName',
                    'required' => true,
                    'filters' => [
                        ['name' => 'StripTags'],
                        ['name' => 'StringTrim']
                    ],
                    'validator' => [
                        [
                            'name' => 'StripLength',
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
                    'name' => 'createDate',
                    'required' => false,
                    'validators' => [
                        [
                            'name' => 'Date',
                            'options' => [
                                'format' => 'd/m/Y'
                            ]
                        ]
                    ]
                ]
            )
        );

        $this->add(
            $factory->createInput(
                [
                    'name' => 'type',
                    'required' => true,
                    'validators' => [
                        [
                            'name' => 'InArray',
                            'options' => [
                                'haystack' => ['Publica', 'Privada']
                            ]
                        ]
                    ]
                ]
            )
        );

        $this->add(
            $factory->createInput(
                [
                    'name' => 'user',
                    'required' => true,
                    'filters' => [
                        ['name' => 'StripTags'],
                        ['name' => 'StringTrim']
                    ],
                    'validator' => [
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
                    'name' => 'question',
                    'required' => true,
                    'validators' => [
                        [
                            'name' => 'InArray',
                            'options' => [
                                'haystack' => ['Qual é a materia que te faz aprender ZendFramework na marra ?']
                            ]
                        ]
                    ]
                ]
            )
        );
    }
}
