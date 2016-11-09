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
}
