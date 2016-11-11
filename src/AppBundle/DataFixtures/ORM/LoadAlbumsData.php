<?php

use AppBundle\Entity\Album;
use AppBundle\Entity\Image;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadAlbumsData implements FixtureInterface
{
    private function createImages(ObjectManager $em, $srcs, $album){
        for ($i = 0; $i < count($srcs); $i++){
            $image = new Image();
            $image->setSrc($srcs[$i]);
            $image->setAlbum($album);

            $em->persist($image);
        }
    }

    private function loadDogs(ObjectManager $em){
        $dogs = new Album();
        $dogs->setSrc('/upload/images/albums/18/200_pexels-photo-67660.jpeg');
        $dogs->setName('Dogs');
        
        $srcs = array (
            '/upload/images/albums/18/200_pexels-photo-67660.jpeg',
            '/upload/images/albums/18/193_cute and funny puppies small dog animals dogs high definition wallpaper.jpg',
            '/upload/images/albums/18/192_Cavalier_King_Charles_Spaniel_wvectl.jpg',
            '/upload/images/albums/18/191_$_32.jpeg',
            '/upload/images/albums/18/190_cute-best-small-dogs-for-apartments-as-well-as-best-dog-breeds-for-apartments-paws-and-tails-supplies-blog.jpg',
            '/upload/images/albums/18/189_image_1473804075_85258678.jpg',
            '/upload/images/albums/18/188_dog-music.jpg',
            '/upload/images/albums/18/187_Dog-Exorcism-Pet-Dogs-in-China-Possessed-at-Certain-Age.jpg',
            '/upload/images/albums/18/186_image.jpg',
            '/upload/images/albums/18/185_Сибирский хаски (23).jpg',
            '/upload/images/albums/18/184_4.jpg',
            '/upload/images/albums/18/183_Manuka-Honey-Benefits-For-Dogs-.jpg',
            '/upload/images/albums/18/181_Köpek.jpg',
            '/upload/images/albums/18/180_too-cute-doggone-it-video-playlist.jpg',
            '/upload/images/albums/18/179_dog-and-cat-meat-legal-in-united-states-2.jpg',
            '/upload/images/albums/18/178_1468242027742.jpg',
            '/upload/images/albums/18/177_enhanced-10568-1446560079-2.jpg',
            '/upload/images/albums/18/176_ct-hunting-dogs-killed-by-wolves-wisconsin-20161012.jpg',
            '/upload/images/albums/18/194_NuVet-Plus-SmallDogs.jpg',
            '/upload/images/albums/16/47_Cute-Small-Dogs.jpg',
            '/upload/images/albums/16/44_Retail-High-Quality-Snowflake-Winter-Large-Dog-Clothes-Fleece-Warn-Pet-Clothing-Coat-Golden-Retriever-Samoyed.jpg',
            '/upload/images/albums/16/45_wonderful-bear-hunting-dog-caucasian-as-caucasian-shepherd-dog-big-dogs-big-dog-breeds-types-of-big.jpg',
            '/upload/images/albums/16/46_names-and-pics-of-big-dogs-wallpaper.jpg',
            '/upload/images/albums/16/48_huge-dogs-feel-small-dancing1.jpg',
            '/upload/images/albums/18/182_Common-dog-behaviors-explained.jpg',
            '/upload/images/albums/16/43_barnard-face.jpg',
            '/upload/images/albums/18/195_adorable-grey-dog-graphic.jpg',
            '/upload/images/albums/18/196_60603W_Dogs.jpg',
            '/upload/images/albums/18/199_3e9c5ad3af07e573b0e74bdb0a1dce3e.jpg',
            '/upload/images/albums/18/197_160506_SCI_pit-bull.jpg.CROP.promo-xlarge2.jpg',
            '/upload/images/albums/18/198_dogpedals.jpg'
        );

        $this->createImages($em, $srcs, $dogs);
        $em->persist($dogs);
    }

    private function loadCats(ObjectManager $em){
        $cats = new Album();
        $cats->setSrc('/upload/images/albums/19/175_kittens-cat-cat-puppy-rush-45170.jpeg');
        $cats->setName('Cats');
        
        $srcs = array (
            '/upload/images/albums/19/157_cat-face-close-view-115011.jpeg',
            '/upload/images/albums/19/158_cat-sweet-kitty-animals-57416.jpeg',
            '/upload/images/albums/19/159_cat-animal-cat-portrait-mackerel.jpg',
            '/upload/images/albums/19/160_pexels-photo-129861.jpeg',
            '/upload/images/albums/19/161_pexels-photo-31025.jpg',
            '/upload/images/albums/19/162_pexels-photo-26511.jpg',
            '/upload/images/albums/19/163_pexels-photo (3).jpg',
            '/upload/images/albums/19/156_pexels-photo-140134.jpeg',
            '/upload/images/albums/19/155_tabby-cat-close-up-portrait-69932.jpeg',
            '/upload/images/albums/19/154_pexels-photo-167773.jpeg',
            '/upload/images/albums/19/153_siamese-blue-eyes-cute-feline-39283.jpeg',
            '/upload/images/albums/19/152_animal-pet-close-up-view-hairs.jpg',
            '/upload/images/albums/19/151_pexels-photo-165752.jpeg',
            '/upload/images/albums/19/150_pexels-photo-125451.jpeg',
            '/upload/images/albums/19/149_cat-tokyo-japan-japanese.jpg',
            '/upload/images/albums/19/148_tiger-snarling-close-up-head-67860.jpeg',
            '/upload/images/albums/19/173_pexels-photo-96428.jpeg',
            '/upload/images/albums/19/165_pexels-photo-65006.jpeg',
            '/upload/images/albums/19/164_cat-silhouette-cats-silhouette-cat-s-eyes.jpg',
            '/upload/images/albums/15/42_pet-animal-6d-canon-73467.jpeg',
            '/upload/images/albums/15/41_pexels-photo-134060.jpeg',
            '/upload/images/albums/15/39_cat-eyes-face-cat-face-40994.jpeg',
            '/upload/images/albums/15/38_cat-cute-yellow-sitting-53558.jpeg',
            '/upload/images/albums/15/37_pexels-photo-105295.jpeg',
            '/upload/images/albums/15/40_pexels-photo-62460.jpeg',
            '/upload/images/albums/19/175_kittens-cat-cat-puppy-rush-45170.jpeg',
            '/upload/images/albums/19/174_pexels-photo-126407.jpeg',
            '/upload/images/albums/19/166_pexels-photo-127028.jpeg',
            '/upload/images/albums/19/167_pexels-photo (2).jpg',
            '/upload/images/albums/19/168_pexels-photo-171227.jpeg',
            '/upload/images/albums/19/169_pexels-photo (1).jpg',
            '/upload/images/albums/19/170_pexels-photo.jpg',
            '/upload/images/albums/19/171_cat-pet-animal-domestic-104827.jpeg',
            '/upload/images/albums/19/172_kittens-cats-foster-playing-160755.jpeg'
        );

        $this->createImages($em, $srcs, $cats);
        $em->persist($cats);
    }

    private function loadCity(ObjectManager $em){
        $city = new Album();
        $city->setSrc('/upload/images/albums/20/147_skyline-buildings-new-york-skyscrapers.jpg');
        $city->setName('City');
        
        $srcs = array (
            '/upload/images/albums/20/135_pexels-photo-93019.jpeg',
            '/upload/images/albums/20/136_city-cars-traffic-lights.jpeg',
            '/upload/images/albums/20/137_pexels-photo-169647.jpeg',
            '/upload/images/albums/20/138_pexels-photo (1).jpg',
            '/upload/images/albums/20/139_pexels-photo-30773.jpg',
            '/upload/images/albums/20/140_city-road-street-buildings.jpg',
            '/upload/images/albums/20/141_pexels-photo-173427.jpeg',
            '/upload/images/albums/20/142_city-skyline-skyscrapers-top.jpg',
            '/upload/images/albums/20/143_pexels-photo.jpg',
            '/upload/images/albums/20/144_pexels-photo-30732.jpg',
            '/upload/images/albums/20/145_pexels-photo-30360.jpg',
            '/upload/images/albums/20/146_pexels-photo-47426.jpeg',
            '/upload/images/albums/20/147_skyline-buildings-new-york-skyscrapers.jpg',
            '/upload/images/albums/20/134_city-people-street-sun.jpg',
            '/upload/images/albums/17/49_pexels-photo-92012.jpeg',
            '/upload/images/albums/20/114_city-cars-road-houses.jpg',
            '/upload/images/albums/20/113_pexels-photo-186537.jpeg',
            '/upload/images/albums/20/112_pexels-photo-116139.jpeg',
            '/upload/images/albums/20/111_pexels-photo (4).jpg',
            '/upload/images/albums/20/110_pexels-photo (5).jpg',
            '/upload/images/albums/20/109_pexels-photo-115070.jpeg',
            '/upload/images/albums/20/108_pexels-photo-110241.jpeg',
            '/upload/images/albums/20/107_pexels-photo-27031.jpg',
            '/upload/images/albums/20/106_pexels-photo-26698.jpg',
            '/upload/images/albums/20/105_pexels-photo-29390.jpg',
            '/upload/images/albums/17/50_pexels-photo-115553.jpeg',
            '/upload/images/albums/17/51_city-houses-village-buildings.jpg',
            '/upload/images/albums/17/52_pexels-photo-37839.jpeg',
            '/upload/images/albums/17/53_city-sun-hot-child.jpg',
            '/upload/images/albums/17/54_pexels-photo-99589.jpeg',
            '/upload/images/albums/20/115_pexels-photo-109919.jpeg',
            '/upload/images/albums/20/116_pexels-photo-134685.jpeg',
            '/upload/images/albums/20/117_pexels-photo-28477.jpg',
            '/upload/images/albums/20/133_pexels-photo-196667.jpeg',
            '/upload/images/albums/20/132_pexels-photo-93001.jpeg',
            '/upload/images/albums/20/131_pexels-photo-28221.jpg',
            '/upload/images/albums/20/130_pexels-photo-97906.jpeg',
            '/upload/images/albums/20/129_pexels-photo-30469.jpg',
            '/upload/images/albums/20/128_pexels-photo-185662.jpeg',
            '/upload/images/albums/20/127_pexels-photo-26165.jpg',
            '/upload/images/albums/20/126_pexels-photo-96414.jpeg',
            '/upload/images/albums/20/125_pexels-photo-165888.jpeg',
            '/upload/images/albums/20/118_pexels-photo-25926.jpg',
            '/upload/images/albums/20/119_pexels-photo-25349.jpg',
            '/upload/images/albums/20/120_black-and-white-city-skyline-buildings.jpg',
            '/upload/images/albums/20/121_pexels-photo (3).jpg',
            '/upload/images/albums/20/122_pexels-photo (2).jpg',
            '/upload/images/albums/20/123_pexels-photo-28184.jpg',
            '/upload/images/albums/20/124_pexels-photo-27406.jpg'
        );

        $this->createImages($em, $srcs, $city);
        $em->persist($city);
    }

    private function loadNature(ObjectManager $em){
        $nature = new Album();
        $nature->setSrc('/upload/images/albums/21/104_nature-forest-industry-rails.jpg');
        $nature->setName('Nature');
        
        $srcs = array (
            '/upload/images/albums/21/85_pexels-photo-132982.jpeg',
            '/upload/images/albums/21/83_pexels-photo-116191.jpeg',
            '/upload/images/albums/21/82_pexels-photo (2).jpg',
            '/upload/images/albums/21/81_pexels-photo (3).jpg',
            '/upload/images/albums/21/80_sunrise-phu-quoc-island-ocean.jpg',
            '/upload/images/albums/21/79_pexels-photo (4).jpg',
            '/upload/images/albums/14/36_beach-beautiful-blue-coast-40976.jpeg',
            '/upload/images/albums/14/35_pexels-photo-173465.jpeg',
            '/upload/images/albums/14/34_pexels-photo-25943.jpg',
            '/upload/images/albums/14/33_nature-sky-twilight-grass-9198.jpg',
            '/upload/images/albums/14/32_thailand-elephant-sunset-nature-68550.jpeg',
            '/upload/images/albums/21/84_pexels-photo-92997.jpeg',
            '/upload/images/albums/14/31_pexels-photo-128963.jpeg',
            '/upload/images/albums/21/86_pexels-photo-105221.jpeg',
            '/upload/images/albums/21/103_fall-autumn-red-season.jpg',
            '/upload/images/albums/21/102_wood-nature-sunny-forest.jpg',
            '/upload/images/albums/21/101_dawn-landscape-mountains-nature.jpg',
            '/upload/images/albums/21/100_pexels-photo.jpg',
            '/upload/images/albums/21/99_nature-forest-trees-fog.jpeg',
            '/upload/images/albums/21/98_pexels-photo-26750.jpg',
            '/upload/images/albums/21/97_pexels-photo-39811.jpeg',
            '/upload/images/albums/21/96_dawn-nature-sunset-trees.jpg',
            '/upload/images/albums/21/95_cairn-fog-mystical-background-158607.jpeg',
            '/upload/images/albums/21/94_pexels-photo-58557.jpeg',
            '/upload/images/albums/21/93_pexels-photo-38136.jpeg',
            '/upload/images/albums/21/92_spring-tree-flowers-meadow-60006.jpeg',
            '/upload/images/albums/21/91_pexels-photo-29426.jpg',
            '/upload/images/albums/21/90_pexels-photo-167699.jpeg',
            '/upload/images/albums/21/89_pexels-photo (1).jpg',
            '/upload/images/albums/21/88_kinzig-shore-trees-mirroring-black-forest-158361.jpeg',
            '/upload/images/albums/21/87_pexels-photo-186985.jpeg',
            '/upload/images/albums/21/104_nature-forest-industry-rails.jpg'
        );

        $this->createImages($em, $srcs, $nature);
        $em->persist($nature);
    }

    public function load(ObjectManager $em)
    {
        $this->loadDogs($em);
        $this->loadCats($em);
        $this->loadCity($em);
        $this->loadNature($em);

        $em->flush();
    }
}