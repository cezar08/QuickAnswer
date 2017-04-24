<?php
namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Zend\Validator\EmailAddress;
use Zend\Validator\StringLength;
    class ChoiceService{
    protected $entityManger;
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManger = $entityManager;
    }
    public function dataBaseAuth($data)
    {

        }
    }
?>