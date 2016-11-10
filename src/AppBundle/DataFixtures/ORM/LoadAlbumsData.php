<?php

use AppBundle\Entity\Album;
use AppBundle\Entity\Image;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadAlbumsData implements FixtureInterface
{
    public function load(ObjectManager $em)
    {
        $dogs = new Album();
        $dogs->setSrc('http://magazine.foxnews.com/sites/magazine.foxnews.com/files/styles/700_image/public/petfeather_0.jpg');
        $dogs->setName('Dogs');
            
        $dog1 = new Image();
        $dog1->setSrc('http://magazine.foxnews.com/sites/magazine.foxnews.com/files/styles/700_image/public/petfeather_0.jpg');
        $dog1->setAlbum($dogs);

        $dog2 = new Image();
        $dog2->setSrc('http://www.warriors.myewebsite.com/img/mid/19/spottedleaf.jpg');
        $dog2->setAlbum($dogs);

        $dog3 = new Image();
        $dog3->setSrc('https://s-media-cache-ak0.pinimg.com/564x/a2/e2/9f/a2e29fb5d8c48a072426326a50f90f5b.jpg');
        $dog3->setAlbum($dogs);

        $dog4 = new Image();
        $dog4->setSrc('https://s-media-cache-ak0.pinimg.com/736x/3b/d4/9b/3bd49b61a30cf6dad75226501d2d2266.jpg');
        $dog4->setAlbum($dogs);

        $dog5 = new Image();
        $dog5->setSrc('http://m5.paperblog.com/i/46/462574/dogs-and-music-a-harmonious-pair-L-Ctjc8z.jpeg');
        $dog5->setAlbum($dogs);

        $dogs->addImage($dog1)
             ->addImage($dog2)
             ->addImage($dog3)
             ->addImage($dog4)
             ->addImage($dog5);

        $em->persist($dogs);
        $em->persist($dog1);
        $em->persist($dog2);
        $em->persist($dog3);
        $em->persist($dog4);
        $em->persist($dog5);


        $cats = new Album();
        $cats->setSrc('https://s-media-cache-ak0.pinimg.com/736x/3b/d4/9b/3bd49b61a30cf6dad75226501d2d2266.jpg');
        $cats->setName('cats');

        $em->persist($cats);

        $em->flush();
    }
}