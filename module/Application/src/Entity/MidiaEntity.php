<?php

namespace Application\Entity;
use Application\Interfaces\MidiaInterface;

class Midia extends Entity implements MidiaInterface
{
    protected $id;

    protected $typeofmidia;

    protected $description;

    protected $dateMidia;

    protected $path;

}