<?php

namespace App\EventListener;

use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\HttpFoundation\RequestStack;

class JWTCreatedListener
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * @param JWTCreatedEvent $event
     *
     * @return void
     */
    public function onJWTCreated(JWTCreatedEvent $event)
    {
        $request = $this->requestStack->getCurrentRequest();
        /**
         * @var User $user
         */
        $user = $event->getUser();

        $payload       = $event->getData();
        $payload['user_uuid'] = $user->getUuid();
        $payload['token_type'] = "access";
        // Unikalne id dla tokena, dla django 
        $payload['jti'] = bin2hex(random_bytes(16)); // generujemy unikalny id
        $event->setData($payload);

        // $header        = $event->getHeader();
        // $header['cty'] = 'JWT';
        // $event->setHeader($header);
    }
}