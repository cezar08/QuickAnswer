<?php
/**
 * Created by PhpStorm.
 * User: Ilso Pasa
 * Date: 31/03/17
 * Time: 20:54
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
            $factory->CreateInput(
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
                    'name' => ''
                ]
            )
        )

    }


}