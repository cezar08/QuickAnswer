<?php

namespace Application\Service;


abstract class AbstractService
{
    protected $sm;

    public function __construct($sm)
    {
        $this->sm = $sm;
    }

    public function getEntityManager(){
        return $this->sm->get('Doctrine\ORM\EntityManager');
    }


}