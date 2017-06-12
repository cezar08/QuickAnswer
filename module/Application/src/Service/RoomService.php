<?php
/**
 * @author Jean/Marcos
 */
namespace Service;

use Application\Entity\SalaEntity;
use Application\Validator\SalaValidator;
use Doctrine\ORM\EntityManager;

class RoomService
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
    public function create($dados)
    {
        $validator = $this->validation($dados);
        $data = $validator->getValues();
        $roomdb = $this->buscaSala($dados);

        if (! $validator->isValid()) {
            throw new ValidatorException(
                'Dados inválidos',
                null,
                new \Exception(),
                $validator->getMessages()
            );
        }

        if (sizeof($roomdb) != 0) {
            $result = ['error' => 'existe'];
        } else {
            $result = new Room();
            $result - $this->persit($result, $data);
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
    public function listRoom($data, $user)
    {
        $rooms = $this->searchRoom($data);
        $user = " "; //presumo que deva existir um metodo que busque um usuario e retorne um objeto

        foreach ($rooms as $key => $room) {
            if ($room.type == "privado" && $room.user != $user.id) {
                unset($room);
            }
        }

        return $rooms;
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
    private function searchRoom($data)
    {
        $room = $data['room'];

        $select = $this->entityManager->createQueryBuilder()
                        ->select('Sala')
                        ->from('Entity\Sala', 'Sala')
                        ->where('Sala.nomeSala = :SalaBusca')

                        ->setParameter('SalaBusca', $room);

        return $select->getQuery()->getResult();
    }

    /**
     * Busca a sala e retorna um objeto da mesma
     *
     * @param $id
     * @return $sala objeto
     */
    private function searchRoomObject($id)
    {
        $room = $this->entityManager
            ->find('QuickAnswer\Module\Application\Entity\SalaEntity', $id);

        return $room;
    }

    /**
     * Chama o Validator da sala
     * seta os dados e faz a validação
     *
     * @param $dados
     * @return SalaValidator
     */
    protected function validation($data)
    {
        $validator = new SalaValidator();
        $validator->setData($data);

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
    public function persist($room, $data)
    {
        try {
            $room->setData($room);

            $this->entityManager
                ->persist($room);
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
    public function edit($id, $data)
    {
        $room = $this->searchRoomObject($id);
        $validator = $this->validation($data);
        $this->dataForEdit($room, $validator->getValues());
    }

    /**
     * Pega os dados de um array e
     * coloca esses dados no objeto sala
     * e depois persiste os dados no banco
     *
     * @param $sala
     * @param $dados
     */
    public function dataForEdit($room, $data)
    {
        $room->roomName = $data['roomName'];
        $room->createDate = $data['dataCriacao'];
        $room->type = $data['type'];
        $room->user = $data['user'];
        $room->question = $data['question'];

        $this->entityManager->persistir($room);
        $this->entityManager->flush();
    }

    /**
     * Busca um objeto e exclui o mesmo
     * pelo id da sala
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $room = $this->searchRoomObject($id);
        $this->entityManager->remove($room);
        $this->entityManager->flush();

        return true;
    }
}
