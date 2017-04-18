<?php
/**
 * Created by PhpStorm.
 * User: Wesley Sartori
 * Date: 31/03/17
 */

namespace Application\Validator;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

class SalaValidator extends InputFilter
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
                    'name' => 'nomeSala',
                    'required' => true,
                    'filters' => [
                        ['name' => 'StringTags'],
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
                    'name' => 'dataCriacao',
                    'required' => false,
                    'validators' => [
                        [
                            'name' => 'dataCriacao',
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
                   'name' => 'tipo',
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
                    'name' => 'usuario',
                    'required' => true,
                    'filters' => [
                        ['name' => 'StringTags'],
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
                    'name' => 'perguntas',
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
