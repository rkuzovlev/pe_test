<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class ImagesController extends FOSRestController
{
    /**
     * @Rest\View(serializerGroups={"list"})
     */
    public function AlbumImagesAction($albumId)
    {
    	return $this->getDoctrine()
					->getRepository('AppBundle:Image')
	        		->findBy(array('album' => $albumId));
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

    	$image = $this->get('AlbumService')->uploadImage($imageFile, $album);
    	
    	return $image;
    }
}
