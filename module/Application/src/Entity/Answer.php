<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 17/04/17
 * Time: 20:16
 */

namespace Application\Entity;


class Answer
{
    protected  $user;
    protected  $question;
    protected  $answer;

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

}
