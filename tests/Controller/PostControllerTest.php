<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testShow()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/post/1');
        $this->assertSelectorTextContains('h1', 'Premier article');
    }

    public function testNew()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/post/new');

        $buttonElt = $crawler->selectButton('Save');
        $form = $buttonElt->form();
        $form['post[title]'] = 'Titre de test';
        $form['post[body]'] = 'Corps de test';

        $client->submit($form);

        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertSelectorTextContains('h1', 'Titre de test');

    }
}
