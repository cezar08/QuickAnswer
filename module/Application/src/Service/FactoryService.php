<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 05/06/17
 * Time: 19:28
 */

namespace Application\Service;


class FactoryService
{
    public function __construct(\DateTime $date)
    {
        $this->date = $date;
    }

    public function getData(){

        return [$this->date => [
            uniqid(),
            uniqid(),
            uniqid()
            ]
        ];
        
    }

}