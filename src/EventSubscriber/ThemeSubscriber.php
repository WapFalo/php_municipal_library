<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Environment;

class ThemeSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private RequestStack $requestStack,
        private Environment $twig
    ) {}

    public static function getSubscribedEvents(): array
    {
        return [ControllerEvent::class => 'onKernelController'];
    }

    public function onKernelController(ControllerEvent $event): void
    {
        $request = $this->requestStack->getCurrentRequest();
        $theme = $request?->cookies->get('theme_preference', 'light');

        // Ajoute une variable globale Twig
        $this->twig->addGlobal('theme', $theme);
    }
}