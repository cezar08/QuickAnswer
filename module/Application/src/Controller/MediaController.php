<?php

namespace Application\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Application\Entity\MediaEntity;

class MediaController extends AbstractActionController
{
    /**
     *
     * @return mixed
     */
    public function storeMediaAction()
    {
        try {

            if ($this->getRequest()->isPost()) {

                $dateOfNow = new \DateTime();
                    $date = $dateOfNow->format('d_m_Y_H:i:s_');
                    $move_media = getcwd()."/public/img/media_repository/" .
                        basename($date . $_FILES['media']['name']);
                    $media_path = "img/media_repository/" .
                        basename($date . $_FILES['media']['name']);

                    move_uploaded_file($_FILES['media']['tmp_name'], $move_media);

                    $media_type = 'image';

                    $this->getService('MediaService')
                        ->persistMedia($media_type, $media_path);
            }

        } catch (\Exception $e) {

            return array ('error' => $e);
        }
    }
}