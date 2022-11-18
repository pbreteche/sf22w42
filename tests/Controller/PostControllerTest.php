<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

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
        $form['post[body]'] = 'Corps de test';

        $crawler = $client->submit($form);

        $this->assertResponseStatusCodeSame(Response::HTTP_UNPROCESSABLE_ENTITY);
        $titleField = $crawler->filter('[name="post[title]"]');
        $errorMsg = $titleField->nextAll()->text();
        $this->assertEquals('This value should not be blank.', $errorMsg);

        $form['post[title]'] = 'Titre de test';

        $client->submit($form);

        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertSelectorTextContains('h1', 'Titre de test');

    }
}
