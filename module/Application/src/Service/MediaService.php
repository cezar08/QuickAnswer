<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Application\Entity\MediaEntity;
use Application\Validator\MediaValidator;

class MediaService
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
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
            $media = new MediaEntity();
            $media->typeOfMedia = $media_type;
            $media->dateOfMedia = new \DateTime("now");

            $media->path = $media_path;

            $this->entityManager->persist($media);
            $this->entityManager->flush();

            return ['success' => 'Media stored successfully'];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
