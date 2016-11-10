<?php

namespace AppBundle\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Filesystem\Filesystem;

class ImageUploader
{
	protected $imageDefaultDimension = 460;

	protected $kernel;
	protected $fs;

	public function __construct ($kernel){
		$this->kernel = $kernel;
		$this->fs = new Filesystem();
	}

	/**
	 *	Uploader file to folder
	 *
	 *	@var $file File - file from client
	 *	@var $folder string - relative folder path from %root%/web directory (e.g. $folder = upload/images/ -> %root%/web/upload/images/)
	 *	@var $filename string - client filename
	 */
	public function uploadFile(File $file, $folder, $filename){
		if ($folder[0] == '/'){
			$folder = substr($folder, 1);
		}

		$rootDir = $this->kernel->getRootDir() . '/../web/' . $folder;

		if (!$this->fs->exists($rootDir)){
			$this->fs->mkdir($rootDir);
		}

		$file->move($rootDir, $filename);
	}
	
	/**
	 *	Album image
	 *
	 *	@var $file UploadedFile - file
	 *	@return File
	 */
	public function albumImage(UploadedFile $file)
	{
		$idd = $this->imageDefaultDimension;

		$imagick = new \Imagick($file->getPathname());

		// $imagick->resizeImage($width, $height, $filterType, $blur, $bestFit);

		$width = $imagick->getImageWidth();
		$height = $imagick->getImageHeight();

		if ($width > $idd && $height > $idd){ // need crop image and resize
			// resize
			if ($width < $height){
				$a = $idd / $width;
				$newH = $height * $a;
				$newW = $idd;
			} else {
				$a = $idd / $height;
				$newW = $width * $a;
				$newH = $idd;
			}

			$imagick->adaptiveResizeImage($newW, $newH);
			
			// crop
			if ($width > $height){
				$imagick->cropimage (
					$idd,
					$idd,
					($newW - $idd) / 2,
					0
				);
			} else {
				$imagick->cropimage (
					$idd,
					$idd,
					0,
					($newH - $idd) / 2
				);
			}

			$imagick->writeImage();
		}

		return $file;
	}
}
