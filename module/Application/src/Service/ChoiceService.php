<?php
namespace Application\Service;

use Application\Entity\ChoiceEntity;
use Application\Entity\QuestionEntity;
use Application\Entity\TypeMutipleOptionsEntity;
use Application\Entity\TypeQuickAnswer;
use Application\Validator\QuestionValidator;

class ChoiceService{
    protected $entityManger;
    public function __construct(EntityManager $entityManager){
    $this->entityManger = $entityManager;
}
    public function saveChoice($values){
        $validate = new ChoiceValidator();
        $validate->setData($values);

        if (!$validate->isValid())
        return $validate->getMessages();

        $em = $this->getEntityManager();
        $choice = new ChoiceEntity();

        if (isset($values['description'])) {
            $descChoice = new ChoiceEntity();
            $descChoice = $this->setDescription($descChoice, $values['description']);
        } else {

        }
        if (isset($values['correct'])) {
            $correctChoice = new ChoiceEntity();
            $correctChoice = $this->setCorrect($correctChoice, $values['correct']);
        } else {

        }

        $choice->__set("description", $values['description']);
        $choice->__set("correct", $values['correct']);
        $em->persist($choice);
        $em->flush();
    }
    }

}
?>