<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 05/06/17
 * Time: 21:06
 */

namespace Application\Controller;


use Application\Entity\QuestionEntity;
use Zend\Mvc\Controller\AbstractActionController;

class QuestionController extends AbstractActionController
{

    protected $sm;

    public function __construct($sm)
    {
        $this->sm = $sm;
    }

    public function saveQuickAction(){
        $questionService = $this->sm->get("QuestionService");
        $request = $this->getRequest();
        $values = $request->getPost();
        $questionService->saveQuestion($values);
    }


}