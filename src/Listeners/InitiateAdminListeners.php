<?php
declare(strict_types=1);

namespace VitesseCms\Linkedin\Listeners;

use VitesseCms\Communication\Fields\SocialShare;
use VitesseCms\Core\Interfaces\InitiateListenersInterface;
use VitesseCms\Core\Interfaces\InjectableInterface;
use VitesseCms\Linkedin\Listeners\Fields\SocialShareListener;

class InitiateAdminListeners implements InitiateListenersInterface
{
    public static function setListeners(InjectableInterface $injectable): void
    {
        $injectable->eventsManager->attach(SocialShare::class, new SocialShareListener());
    }
}
