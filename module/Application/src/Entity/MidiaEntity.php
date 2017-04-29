<?php

namespace Application\Entity;
use Application\Interfaces\MidiaEntityInterface;

class MidiaEntity extends Entity implements MidiaEntityInterface
{
    protected $id;

    protected $typeofmidia;

    protected $description;

    protected $dateMidia;

    protected $path;

}