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
use Application\Validator\AnswerValidator;
use Application\Validator\QuestionValidator;
use Application\Validator\TypeMutipleOptionsValidator;

class QuestionService extends AbstractService
{

    public function saveTypeQuickQuestion($values)
    {
        $validate = new AnswerValidator();
        $validate->setData($values);

        if (!$validate->isValid())
            return $validate->getMessages();

        $em = $this->getEntityManager();
        $question = new QuestionEntity();
        $typeAnswer = new TypeQuickAnswer();

        $question->__set("description", $values['description']);
        $typeAnswer->__set("answer", $values['answer']);
        $question->__set("TypeQuestion", $typeAnswer);

        $em->persist($question);
        $em->flush();
    }


    public function saveTypeMultipleOptionsQuestion($values)
    {
        $validate = new TypeMutipleOptionsValidator();
        $validate->setData($values);

        if (!$validate->isValid())
            return $validate->getMessages();

        $em = $this->getEntityManager();
        $question = new QuestionEntity();
        $typeMultiple = new TypeMutipleOptionsEntity();

        $question->__set("description", $values['description']);
        $typeMultiple = $this->setChoices($typeMultiple, $values['choices']);
        $question->__set("TypeQuestion", $typeMultiple);

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
