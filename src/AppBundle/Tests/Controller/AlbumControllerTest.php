<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AlbumControllerTest extends WebTestCase
{
    public function testAlbumlist()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'albums');
    }

}
