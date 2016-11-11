<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class ImagesController extends FOSRestController
{
    /**
     * @Rest\View(serializerGroups={"list"})
     */
    public function AlbumImagesAction($albumId, $page = 1)
    {
    	$images = $this->get('AlbumService')->getAlbumImages($albumId, $page);
        
        if (!$images){
            throw new NotFoundHttpException();
        }

        return $images;
    }

    /**
     * @Rest\View(serializerGroups={"list"})
     */
    public function AlbumImagesCountAction($albumId)
    {
        return $this->get('AlbumService')->getAlbumImagesCount($albumId);
    }

    /**
     * @Rest\View(serializerGroups={"list"})
     */
    public function UploadAlbumImagesAction($albumId)
    {
    	$album = $this->getDoctrine()
					->getRepository('AppBundle:Album')
		    		->findOneById($albumId);

    	$imageFile = $this->getRequest()->files->get('image');

    	return $this->get('AlbumService')->uploadImage($imageFile, $album);
    }
}
