<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class AcceptLanguageSubscriber implements EventSubscriberInterface
{
    private array $managedLocales;

    public function __construct(array $managedLocales)
    {
        $this->managedLocales = $managedLocales;
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();
        $locale = $request->getPreferredLanguage($this->managedLocales);

        if ($locale) {
            $request->setLocale($locale);
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 24],
        ];
    }
}
