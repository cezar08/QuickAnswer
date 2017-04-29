<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class QuestionEntity
 * @package Application\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="question_qa")
 */
class QuestionEntity
{
	
	/**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     *
     * @var string
     */
    protected $description;

    protected $TypeQuestion;

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
