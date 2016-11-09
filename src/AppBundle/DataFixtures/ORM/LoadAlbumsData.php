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
        $dogs->setName('Dogs');
            
        $dog1 = new Image();
        $dog1->setSrc('1.jpg');
        $dog1->setAlbum($dogs);

        $dog2 = new Image();
        $dog2->setSrc('2.jpg');
        $dog2->setAlbum($dogs);

        $dog3 = new Image();
        $dog3->setSrc('3.jpg');
        $dog3->setAlbum($dogs);

        $dog4 = new Image();
        $dog4->setSrc('4.jpg');
        $dog4->setAlbum($dogs);

        $dog5 = new Image();
        $dog5->setSrc('5.jpg');
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

        $em->flush();
    }
}