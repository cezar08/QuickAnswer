<?php

namespace Service;

use Entity\Sala;
use Validator\SalaValidator;

class PerfilService extends Service
{

    public function cadastrar($dados)
    {
        $validator = $this->validacao($dados);
        $dados = $validator->getValues();
        $salaBanco = $this->buscaSala($dados);

        if(!$validator->isValid()) {
            throw new ValidatorException(
                'Dados inválidos',
                null,
                new \Exception(),
                $validator->getMessages()
            );
        }

        if(sizeof($salaBanco) != 0) {
            $result = array('error' => 'existe');
        } else {
            $result = new Sala();
            $result - $this->persistir($result, $dados);
        }

        return $result;
    }

    public function listarSalas($dados, $usuario)
    {
        $salas = $this->buscaSala($dados);
        $usuario = //presumo que deva existir um metodo que busque um usuario e retorne um objeto

        foreach ($salas as $key => $sala) {
            if($sala.tipo == "privado" && $sala.usuario != $usuario.id) {
                unset($sala);
            }
        }

        return $salas;

    }
    private function buscaSala($dados)
    {
        $sala = $dados['sala'];

        $select = $this->getEntityManager()->createQueryBuilder()
                        ->select('Sala')
                        ->from('Entity\Sala', 'Sala')
                        ->where('Sala.nomeSala = :SalaBusca')

                        ->setParameter('SalaBusca', $sala);

        return $select->getQuery()->getResult();
    }

    protected function validacao($dados)
    {
        $validator = new SalaValidator();
        $validator->setData($dados);

        return $validator;
    }

    public function persistir($sala, $dados)
    {
        try {
            $sala->setData($dados);

            $this->getEntityManager()
                ->persist($sala);
            $this->getEntityManager()->flush();
        } catch (\Exception $e) {
            return array('error' => 'Erro ao salvar: '.$e->getMEssage());
        }
    }
}
