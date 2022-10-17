<?php

namespace App\EventListener;

use App\Event\PostShowEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

#[AsEventListener]
class PostShowListener
{
    private EntityManagerInterface $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function __invoke(PostShowEvent $event): void
    {
        $post = $event->getPost();
        $post->incViewCount();

        $this->manager->flush($post);
    }
}