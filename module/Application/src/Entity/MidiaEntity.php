<?php

namespace Application\Entity;
use Application\Interfaces\MidiaInterface;

class Midia extends Entity implements MidiaInterface
{
    protected $_id;

    protected $_typeofmidia;

    protected $_description;

    protected $_path;

    protected $_dateMidia;

}