<?php declare(strict_types=1);

namespace VitesseCms\Linkedin\Listeners\Fields;

use Phalcon\Events\Event;
use VitesseCms\Content\Models\Item;
use VitesseCms\Form\Interfaces\AbstractFormInterface;

class SocialShareListener
{
    public function buildItemFormElement(Event $event, AbstractFormInterface $form, Item $item = null): void
    {
        if ($item !== null) :
            $form->addHtml('<a
                href="https://www.linkedin.com/sharing/share-offsite/?url='.$form->url->getBaseUri().$item->getSlug().'"
                target="_blank"
                class="btn btn-success offset-lg-3"
            >%LINKEDIN_SHARE_ITEM%</a>');
        endif;
    }

    private function getTextFromItem(Item $item): string
    {
        $text = '';
        if ($item->has('introtext')):
            $text = $item->_('introtext');
        endif;

        if (empty(trim($text)) && $item->has('bodytext')):
            $text = $item->_('bodytext');
        endif;

        $text = $item->getNameField().' : '.trim(strip_tags($text));
        $textChunks = str_split($text, 400);
        if(count($textChunks) > 1 ):
            $textChunks[0] .= '...';
        endif;

        return $text;
    }
}