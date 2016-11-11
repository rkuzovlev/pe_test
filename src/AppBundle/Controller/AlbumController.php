<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;

use AppBundle\Form\AlbumType;
use AppBundle\Entity\Album;

class AlbumController extends FOSRestController
{

	/**
     * @Rest\View(serializerGroups={"list"})
     */
    public function AlbumListAction()
    {
        return $this->get('AlbumService')->getAlbums();
    }

    /**
     * @Rest\View(serializerGroups={"list"})
     */
    public function CreateAlbumAction()
    {
		$album = new Album ();

    	$form = $this->createForm(new AlbumType(), $album);
    	$form->submit($this->getRequest()->request->all());
    	
    	if ($form->isValid()) {
	        $em = $this->getDoctrine()->getManager();
	        $em->persist($album);
	        $em->flush();

	        return $album;
	    }

        return View::create($form, 400);
    }
}
