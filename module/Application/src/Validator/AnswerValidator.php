<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 17/04/17
 * Time: 20:03
 */

namespace Application\Validator;


use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

class AnswerValidator extends InputFilter
{
    public function __construct()
    {
        $factory = new InputFactory();


        $this->add(
            $factory->createInput(
                [
                    'name' => 'user',
                    'required' => true,
                    'filters' => [
                        ['user' => 'StripTags'],
                        ['user' => 'StringTrim']
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
                    'name' => 'question',
                    'required' => true,
                    'filters' => [
                        ['question' => 'StripTags'],
                        ['question' => 'StringTrim']
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
                    'name' => 'answer',
                    'required' => true,
                    'filters' => [
                        ['answer' => 'StripTags'],
                        ['answer' => 'StringTrim']
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

    }
}
