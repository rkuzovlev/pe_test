<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class AlbumController extends FOSRestController
{

	/**
     * @Rest\View(serializerGroups={"list"})
     */
    public function AlbumListAction()
    {
    	return $this->getDoctrine()
					->getRepository('AppBundle:Album')
	        		->findAll();
    }
}
