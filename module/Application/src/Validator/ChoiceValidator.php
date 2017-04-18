<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 03/04/17
 * Time: 20:37
 */

namespace Application\Validator;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

class ChoiceValidator extends InputFilter
{
    public function __construct()
    {
        $factory = new InputFactory();

        $this->add(
            $factory->createInput(
                [
                    'name' => 'description',
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
                                'min' => 100,
                                'max' => 600
                            )
                        )
                    )
                ]
            )
        );
        $this->add(
            $factory->createInput(
                [
                    'name' => 'correct',
                    'required' => true,
                    'validators' => array(
                        array(
                            'name' => 'correct',
                            'options' => array(
                                'Boolean',
                                'min' => 0,
                                'max' => 1
                            )
                        )
                    )
                ]
            )
        );

    }
}