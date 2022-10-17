<?php

namespace App\Listener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\RequestEvent;

#[AsEventListener]
class PaginationListener
{
    public const DEFAULT_LIMIT = 10;
    public function __invoke(RequestEvent $event): void
    {
        $request = $event->getRequest();
        $page = intval($request->query->get('page', 1));
        if (1 > $page) {
            $page = 1;
        }

        $request->attributes->set('_page', $page);
        $request->attributes->set('_limit', self::DEFAULT_LIMIT);
        $request->attributes->set('_offset', ($page - 1) * self::DEFAULT_LIMIT);
    }
}