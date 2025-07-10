<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ApiExceptionListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        // Domyślny kod błędu
        $statusCode = 500;
        $message = 'Internal Server Error';

        if ($exception instanceof HttpExceptionInterface) {
            $statusCode = $exception->getStatusCode();
            $message = $exception->getMessage() ?: $message;
        }

        $response = new JsonResponse([
            'status' => $statusCode,
            'error' => $message,
        ], $statusCode);

        $event->setResponse($response);
    }
}