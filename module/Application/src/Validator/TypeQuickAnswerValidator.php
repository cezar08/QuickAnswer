<?php

namespace Application\Validator;

use Application\Interfaces\TypeQuickAnswerValidatorInterface;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

class TypeQuickAnswerValidator extends InputFilter implements TypeQuickAnswerValidatorInterface
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
                    'name' => 'Answer',
                    'required' => true,
                    'validators' => array(
                        array(
                            'name' => 'IsInstanceOf',
                            'options' => array(
                                'className' => 'Application\Entity\Answer'
                            )
                        )
                    )
                )
            )
        );

    }

}
