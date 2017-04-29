<?php

namespace Application\Entity;
use Application\Interfaces\MidiaInterface;

class Midia extends Entity implements MidiaInterface
{
    protected $_id;
    protected $_description;
    protected $_dateMidia;
    protected $_path;
    protected $_typeofmidia;
}
