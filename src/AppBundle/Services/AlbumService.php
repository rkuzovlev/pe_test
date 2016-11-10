<?php

namespace AppBundle\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Filesystem\Filesystem;
use AppBundle\Entity\Album;
use AppBundle\Entity\Image;

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
}
