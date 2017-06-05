<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 05/06/17
 * Time: 19:29
 */

namespace Application\Service;


use Application\Interfaces\DbAdapter;

class FactoryService
{

    public function __construct(DbAdapter $db)
    {
        $this->db = $db;
    }

    public function getData()
    {
        return [
            uniqid(),
            uniqid(),
            uniqid()
        ];
    }

}