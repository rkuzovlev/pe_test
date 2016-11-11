<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $albums = $this->get('AlbumService')->getAlbums();
        
        $prefetch = array('albums' => $albums);
        return $this->render('default/index.html.twig', array('prefetch' => $prefetch));
    }

    /**
     * @Route("/album/{id}", name="album")
     * @Route("/album/{id}/page/{page}", requirements={"id" = "\d+", "page" = "\d+"}, name="album_page")
     */
    public function albumAction(Request $request, $id, $page = 1)
    {
        $album = $this->getDoctrine()
                    ->getRepository('AppBundle:Album')
                    ->findOneById($id);
        
        if(!$album){
            throw new NotFoundHttpException();
        }

        $images = $this->get('AlbumService')->getAlbumImages($album, $page);

        $prefetch = array('album_images' => $images);
        return $this->render('default/index.html.twig', array('prefetch' => $prefetch));
    }
}
