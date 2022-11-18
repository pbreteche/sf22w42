<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $post = new Post();
        $post
            ->setTitle('Premier article')
            ->setBody('contenu numéro 1');
        $manager->persist($post);
        $post = new Post();
        $post
            ->setTitle('Deuxième article')
            ->setBody('contenu numéro 2');
        $manager->persist($post);

        $manager->flush();
    }
}
