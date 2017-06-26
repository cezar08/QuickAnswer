<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class MediaController extends AbstractActionController
{
    /**
     *
     * @return mixed
     */
    public function storeMediaAction()
    {
        if ($this->getRequest()->isPost()) {

            $ext = pathinfo($_FILES['media']['name'], PATHINFO_EXTENSION);

            $mime_type_image = [

                // image
                'png' => 'image/png',
                'jpe' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'jpg' => 'image/jpeg',
                'gif' => 'image/gif',
                'bmp' => 'image/bmp',
                'ico' => 'image/vnd.microsoft.icon',
                'tiff' => 'image/tiff',
                'tif' => 'image/tiff',
                'svg' => 'image/svg+xml',
                'svgz' => 'image/svg+xml',
            ];

            $mime_type_audio = [

                // audio
                'mp3' => 'audio/mpeg',
            ];

            $mime_type_video = [

                // video
                'qt' => 'video/quicktime',
                'mov' => 'video/quicktime',
            ];

            if (array_key_exists($ext, $mime_type_image)) {
                $media_type = 'image';
                verifiedMedia($media_type);
            } elseif (array_key_exists($ext, $mime_type_audio)) {
                $media_type = 'audio';
                verifiedMedia($media_type);
            } elseif (array_key_exists($ext, $mime_type_video)) {
                $media_type = 'video';
                verifiedMedia($media_type);
            } else {
                return 'Extension Invalid';
            }
        } else {
            
            return new JsonModel([
                ['error' => 'Error!']
            ]);
        }
    }

    public function verifiedMedia($media_type)
    {
        $dateOfNow = new \DateTime();
        $date = $dateOfNow->format('d_m_Y_H:i:s_');
        $move_media = getcwd()."/public/img/media_repository/" .
            basename($date . $_FILES['media']['name']);
        $media_path = "img/media_repository/" .
            basename($date . $_FILES['media']['name']);

        move_uploaded_file($_FILES['media']['tmp_name'], $move_media);

        $this->getService('MediaService')
            ->persistMedia($media_type, $media_path);

        return new JsonModel([
            ['success' => 'Success!']
        ]);
    }
}
