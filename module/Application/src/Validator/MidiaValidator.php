<?php
/**
 * @author Rafael/Alessandro
 */
namespace Application\Validator;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/**
 * Class MidiaValidatorTest
 * @package ApplicationTest\Validator
 * @group Validator
 */
class MidiaValidator extends InputFilter
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
                                'encoding' => 'UTF-8',
                                'min' => 1,
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
                    'name' => 'path',
                    'required' => true,
                    'validators' => [
                        [
                            'name' => 'StringLength',
                            'options' => [
                                'encoding' => 'UTF-8',
                                'min' => 1,
                                'max' => 120
                            ]
                        ]
                    ]
                ]
            )
        );
        $this->add(
            $factory->createInput(
                [
                    'name' => 'dateMidia',
                    'required' => true,
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
                    'name' => 'typeOfMidia',
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
