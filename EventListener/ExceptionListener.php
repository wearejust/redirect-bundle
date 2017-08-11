<?php

namespace Wearejust\RedirectBundle\EventListener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Wearejust\RedirectBundle\Repository\RedirectRepository;

class ExceptionListener
{
    /**
     * @var \Wearejust\RedirectBundle\Repository\RedirectRepository
     */
    private $redirectRepository;

    /**
     * @param \Wearejust\RedirectBundle\Repository\RedirectRepository $redirectRepository
     */
    public function __construct(RedirectRepository $redirectRepository)
    {
        $this->redirectRepository = $redirectRepository;
    }

    /**
     * @param \Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent $event
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        if (! $exception instanceof HttpExceptionInterface) {
            return;
        }

        $path = $event->getRequest()->getRequestUri();
        $host = $event->getRequest()->getHttpHost();

        $redirect = $this->redirectRepository->getByFrom([
            'http://' . $host . $path,
            'https://' . $host . $path,
            ltrim($path, '/'),
            $path,
        ]);

        if (null === $redirect) {
            return;
        }

        $uri = $redirect->getToUrl();
        if (! preg_match('/^https?:\/\//', $uri)) {
            $uri = $event->getRequest()->getUriForPath($uri);
        }

        $event->setResponse(new RedirectResponse($uri));
    }
}
