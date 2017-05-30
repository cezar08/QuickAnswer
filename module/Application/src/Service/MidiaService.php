<?php
/**
 * @author Rafael/Alessandro
 */
namespace Application\Service;
use Application\Entity\MidiaEntity;
use Application\Validator\MidiaValidator;
class MidiaService extends Service
{
    /**
     * Método que insere uma nova
     * foto em Usuario já existente
     * no banco de dados.
     *
     * @param object $idUser         recebe o id do usuario.
     * @param object $caminho_imagem recebe o caminho da imagem.
     *
     * @return mixed
     */
    public function persistirMidia($idUser, $caminho_midia)
    {
        try {
            $usuario = $this->consultarUsuario($idUser);
            $usuario->midia = $caminho_midia;
            $this->getEntityManager()->persist($usuario);
            $this->getEntityManager()->flush();

            return array('success' => 'Midia armazenada com sucesso');
        }catch (\Exception $e){
            return array('error' => $e->getMessage());
        }
    }
}