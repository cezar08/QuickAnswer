<?php
use Application\Interfaces\TypeQuestionInterface;
use PHPUnit\Framework\TestCase;
use Application\Validator\TypeQuickAnswerValidator as AnswerValidator ;
class AnswerValidatorTest extends TestCase
{
    protected $dataProvider;
    protected $invalidDataProvider;


    public function setUp()
    {

        $this->typeQuestion = $this->getMockBuilder('Application\Interfaces\TypeQuestionInterface')->getMock();

        $this->dataProvider = [
            'user' => null,
            'questio' => 'primeira questão',
            'answer' => 'primeira resposta'

        ];

        $this->invalidDataProvider = [
            'user' => null,
            'questio' => '',
            'answer' => ''

        ];
    }

    public function testValidator()
    {
        $validator = new answerValidator();
        $validator->setData($this->dataProvider);
       // $this->assertInstanceOf(TypeQuestionInterface::class, $this->dataProvider['TypeQuestion']);
    }

    public function testInvalidValidator()
    {
        $validator = new AnswerValidator();
        $validator->setData($this->invalidDataProvider);
        $this->assertFalse($validator->isValid());
        //$this->assertArrayHasKey('isEmpty', $validator->getMessages()['user']);



        $this->invalidDataProvider['TypeQuestion'] = null;
        $validator->setData($this->invalidDataProvider);
        $this->assertFalse($validator->isValid());
        //$this->assertArrayHasKey('isEmpty', $validator->getMessages()['user']);
    }
}
