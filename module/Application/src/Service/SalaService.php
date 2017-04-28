<?php
/**
 * @author Jean/Marcos
 */
namespace Service;

use Application\Entity\SalaEntity;
use Application\Validator\SalaValidator;
use Doctrine\ORM\EntityManager;

class SalaService
{

    protected $entityManager;

    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
    }

    /**
     * Pega os valores já validados e faz a busca
     * da sala para verificar se ela já existe
     * se existir cai na exception, se não
     * chama uma nova entidade sala e persiste
     * no banco com a função persistir.
     *
     * @param $dados
     * @return array $result
     */
    public function cadastrar($dados)
    {
        $validator = $this->validacao($dados);
        $dados = $validator->getValues();
        $salaBanco = $this->buscaSala($dados);

        if (! $validator->isValid()) {
            throw new ValidatorException(
                'Dados inválidos',
                null,
                new \Exception(),
                $validator->getMessages()
            );
        }

        if (sizeof($salaBanco) != 0) {
            $result = ['error' => 'existe'];
        } else {
            $result = new Sala();
            $result - $this->persistir($result, $dados);
        }

        return $result;
    }

    /**
     * Percorre um array de salas até achar uma
     * sala tipo privada, quando isso acontece
     * ele retira o objeto sala do array.
     *
     * @param $dados
     * @param $usuario
     * @return array $salas
     */
    public function listarSalas($dados, $usuario)
    {
        $salas = $this->buscaSala($dados);
        $usuario = " "; //presumo que deva existir um metodo que busque um usuario e retorne um objeto

        foreach ($salas as $key => $sala) {
            if ($sala.tipo == "privado" && $sala.usuario != $usuario.id) {
                unset($sala);
            }
        }

        return $salas;
    }

    /**
     * Faz uma query no banco de dados e
     * busca uma sala pelo nome pelo nome
     * digitado pelo usuario, conforme o
     * parametro indicado.
     *
     * @param $dados
     * @return $select resultado da query
     */
    private function buscaSala($dados)
    {
        $sala = $dados['sala'];

        $select = $this->entityManager->createQueryBuilder()
                        ->select('Sala')
                        ->from('Entity\Sala', 'Sala')
                        ->where('Sala.nomeSala = :SalaBusca')

                        ->setParameter('SalaBusca', $sala);

        return $select->getQuery()->getResult();
    }

    /**
     * Busca a sala e retorna um objeto da mesma
     *
     * @param $id
     * @return $sala objeto
     */
    private function buscaSalaObjeto($id)
    {
        $sala = $this->entityManager
            ->find('QuickAnswer\Module\Application\Entity\SalaEntity', $id);

        return $sala;
    }

    /**
     * Chama o Validator da sala
     * seta os dados e faz a validação
     *
     * @param $dados
     * @return SalaValidator
     */
    protected function validacao($dados)
    {
        $validator = new SalaValidator();
        $validator->setData($dados);

        return $validator;
    }

    /**
     * Persiste os dados e caso algo
     * de errado ele retorna uma exception
     *
     * @param $sala
     * @param $dados
     * @return array
     */
    public function persistir($sala, $dados)
    {
        try {
            $sala->setData($dados);

            $this->entityManager
                ->persist($sala);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            return ['error' => 'Erro ao salvar: '.$e->getMEssage()];
        }
    }

    /**
     * Busca uma sala valida a mesma e
     * pega a função que prepara e persiste
     * os dados para edição
     *
     * @param $id
     * @param $dados
     */
    public function editar($id, $dados)
    {
        $sala = $this->buscaSalaObjeto($id);
        $validator = $this->validacao($dados);
        $this->dadosAtualizar($sala, $validator->getValues());
    }

    /**
     * Pega os dados de um array e
     * coloca esses dados no objeto sala
     * e depois persiste os dados no banco
     *
     * @param $sala
     * @param $dados
     */
    public function dadosParaEditar($sala, $dados)
    {
        $sala->nomeSala = $dados['nomeSala'];
        $sala->dataCriacao = $dados['dataCriacao'];
        $sala->tipo = $dados['tipo'];
        $sala->usuario = $dados['usuario'];
        $sala->perguntas = $dados['perguntas'];

        $this->entityManager->persistir($sala);
        $this->entityManager->flush();
    }

    /**
     * Busca um objeto e exclui o mesmo
     * pelo id da sala
     *
     * @param $id
     * @return bool
     */
    public function excluir($id)
    {
        $sala = $this->buscaSalaObjeto($id);
        $this->entityManager->remove($sala);
        $this->entityManager->flush();

        return true;
    }
}
