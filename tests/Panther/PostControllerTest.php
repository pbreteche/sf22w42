<?php

namespace App\Tests\Panther;

use Symfony\Component\Panther\PantherTestCase;

class PostControllerTest extends PantherTestCase
{
    public function testShow()
    {
        $client = static::createPantherClient(['browser' => static::FIREFOX]);

        $crawler = $client->request('GET', '/post/1');
        $this->assertPageTitleContains('Premier article');
        $btn = $crawler->selectButton('Load');
        $btn->getLocationOnScreenOnceScrolledIntoView();
        $btn->click();
        $this->assertSelectorWillContain('#demo', 'Hello world');
    }
}