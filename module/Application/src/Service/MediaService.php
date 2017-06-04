<?php
/**
 * @author Rafael/Alessandro
 */
namespace Application\Service;

use Application\Entity\MediaEntity;
use Application\Validator\MediaValidator;

class MediaService extends Service
{
    /**
     * Method that inserts a new
     * Picture in Existing User
     * In the database.
     *
     * @param object $id_user         receives the id of user.
     * @param object $path receives the image path.
     *
     * @return mixed
     */
    public function persistMedia($media_type, $media_desc, $media_path, $id_user)
    {
        try {
            // $user = $this->consultarUsuario($id_user);
            $media = new Media();
            $media->$typeOfMedia = $media_type;
            $media->$description = $media_desc;
            $media->$dateOfMedia = strtotime((new \DateTime('now'))->format('Y-m-d H:i'));
            $media->$path = $media_path;
            $media->$userOfmedia = $id_user;

            $this->getEntityManager()->persist($media);
            $this->getEntityManager()->flush();

            return ['success' => 'Media stored successfully'];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
