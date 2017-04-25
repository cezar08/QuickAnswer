<?php

namespace Application\Validator;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

class QuestionValidator extends InputFilter
{

    public function __construct()
    {
        $factory = new InputFactory();

        $this->add(
            $factory->createInput(
                [
                    'name' => 'id',
                    'required' => false,
                    'filters' => [
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
                    'name' => 'description',
                    'required' => true,
                    'filters' => [
                        ['name' => 'StripTags'],
                        ['name' => 'StringTrim']
                    ],
                    'validators' => [
                        [
                            'name' => 'StringLength',
                            'options' => [
                                'UTF-8'
                            ]
                        ]
                    ]
                ]
            )
        );
         $this->add(
             $factory->createInput(
                 [
                     'name' => 'TypeQuestion',
                     'required' => true,
                     'validators' => [
                         [
                             'name' => 'IsInstanceOf',
                             'options' => [
                                 'className' => 'Application\Entity\TypeQuestion'
                             ]
                         ]
                     ]
                 ]
             )
         );
    }
}
