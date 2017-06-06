<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Application\Entity\MediaEntity;
use Application\Validator\MediaValidator;

class MediaService
{
    protected $entityManger;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManger = $entityManager;
    }

    /**
     * Method that inserts a new
     * Media in the database.
     *
     * @param object $media_type receives the media type.
     * @param object $media_path receives the media path.
     *
     * @return mixed
     */
    public function persistMedia($media_type, $media_path)
    {
        try {
            $media = new MediaService();
            $media->typeOfMedia = $media_type;
            $media->dateOfMedia = strtotime((new \DateTime('now'))->format('Y-m-d H:i'));
            $media->path = $media_path;

            $this->entityManger->persist($media);
            $this->entityManger->flush();

            return ['success' => 'Media stored successfully'];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
