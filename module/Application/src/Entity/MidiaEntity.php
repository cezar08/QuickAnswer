<?php

namespace Application\Entity;
use Application\Interfaces\MidiaEntityInterface;

class MidiaEntity extends Entity implements MidiaEntityInterface
{
    protected $_id;

    protected $_typeofmidia;

    protected $_description;

    protected $_dateMidia;

    protected $_path;

}
