<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HelloControllerTest extends WebTestCase
{
    public function testHelloManyTimes()
    {
        $client = static::createClient();

        $client->request('GET', '/hello/bob');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertCount(11, $client->getCrawler()->filter('h1'));
    }
}
