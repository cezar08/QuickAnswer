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
                                'UTF-8'
                            )
                        )
                    )
                )
            )
        );
        // $this->add(
        //     $factory->createInput(
        //         array(
        //             'name' => 'TypeQuestion',
        //             'required' => true,
        //             'validators' => array(
        //                 array(
        //                     'name' => 'IsInstanceOf',
        //                     'options' => array(
        //                         'className' => 'TypeQuestion'
        //                     )
        //                 )
        //             )
        //         )
        //     )
        // );
	}

}