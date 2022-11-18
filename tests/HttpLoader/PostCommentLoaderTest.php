<?php

namespace App\Tests\HttpLoader;

use App\Entity\Post;
use App\HttpLoader\PostCommentLoader;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Contracts\Cache\CacheInterface;

class PostCommentLoaderTest extends KernelTestCase
{
    public function testLoadForPost()
    {
        static::bootKernel();
        $container = static::getContainer();

        $cache = $this->createMock(CacheInterface::class);
        $cache->expects(self::once())
            ->method('get')
            ->willReturn([
                'test data 1',
                'test data 2',
            ]);

        $container->set('cache.app', $cache);

        $instance = $container->get(PostCommentLoader::class);

        $result = $instance->loadForPost(new Post());

        $this->assertIsArray($result);
    }
}
