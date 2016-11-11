<?php

namespace AppBundle\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Filesystem\Filesystem;

use AppBundle\Entity\Album;
use AppBundle\Entity\Image;

use \Doctrine\Common\Collections\ArrayCollection;

class AlbumService
{
	protected $imageUploader;
	protected $doctrine;
	protected $fs;

	public function __construct ($imageUploader, $doctrine){
		$this->imageUploader = $imageUploader;
		$this->doctrine = $doctrine;
		$this->fs = new Filesystem();
	}

	/**
	 *	Uploader new album image
	 *
	 *	@var $file UploadedFile - file from client
	 *	@var $album Album
	 */
	public function uploadImage(UploadedFile $file, Album $album){
		$image = new Image();
		$image->setAlbum($album);
		$image->setSrc('');

		$em = $this->doctrine->getManager();
        $em->persist($image); // have to get image id for next process
        $em->flush();

		$filename = $image->getId() . '_' . $file->getClientOriginalName();
		$folder = '/upload/images/albums/' . $album->getId();

		$file = $this->imageUploader->albumImage($file);
		$this->imageUploader->uploadFile($file, $folder, $filename);

		$fullFuleName = $folder . '/' . $filename;

		$image->setSrc($fullFuleName);
		$album->setSrc($fullFuleName);
		
        $em->flush();

        return $image;
	}

	/**
	 *	Get album images
	 *
	 *	@var $album int|Album
	 *	@var $page int
	 *
	 *	@return ArrayCollection|false  -  false when album not found
	 */
	public function getAlbumImages($album, $page = 1)
	{
		if (!($album instanceof Album)){
			$album = $this->doctrine
						->getRepository('AppBundle:Album')
		        		->findOneById($album);
		}

	    if (!$album){
	    	return false;
	    }

		return $this->doctrine->getRepository('AppBundle:Album')->getAlbumImagesWithPage($album->getId(), $page);
	}

	/**
	 *	Get albums
	 *
	 *	@return ArrayCollection
	 */
	public function getAlbums()
	{
		return $this->doctrine
					->getRepository('AppBundle:Album')
	        		->findAll();
	}

	public function getAlbumImagesCount($albumId){
		return $this->doctrine
					->getRepository('AppBundle:Album')
	        		->countImagesCount($albumId);
	}
}
