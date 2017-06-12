<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 05/06/17
 * Time: 20:59
 */

namespace Application\Service;


use Application\Entity\ChoiceEntity;
use Application\Entity\QuestionEntity;
use Application\Entity\TypeMutipleOptionsEntity;
use Application\Entity\TypeQuickAnswer;
use Application\Validator\QuestionValidator;

class QuestionService extends AbstractService
{

    public function saveQuestion($values)
    {
        $validate = new QuestionValidator();
        $validate->setData($values);

        if (!$validate->isValid())
            return $validate->getMessages();

        $em = $this->getEntityManager();
        $question = new QuestionEntity();

        if (isset($values['choices'])) {
            $typeQuestion = new TypeMutipleOptionsEntity();
            $typeQuestion = $this->setChoices($typeQuestion, $values['choices']);
        } else {
            $typeQuestion = new TypeQuickAnswer();
            $typeQuestion->answer = $values['answer'];
        }

        $question->__set("description", $values['description']);
        $question->__set("TypeQuestion", $typeQuestion);
        $em->persist($question);
        $em->flush();
    }

    private function setChoices($typeQuestion, $choices)
    {
        foreach ($choices as $choice) {
            $newChoice = new ChoiceEntity();
            $newChoice->__set("description", $choice['description']);
            $newChoice->__set("correct", $choice['description']);
            $typeQuestion->choices->add($newChoice);
        }

        return $typeQuestion;
    }


}