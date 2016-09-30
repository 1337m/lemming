<?php

use Lemming\Helper\Exception\TranslationNotFound;

require_once 'application.php';
require_once 'env.php';

function findTranslation($lang, $key)
{
    return app()->getTranslation($lang . '.' . $key);
}

function trans($key, $locale = null, ...$args)
{
    if (!$locale) {
        $envLang = explode('_', env('LANG', 'en_US.utf-8'));
        $locale = $envLang[0];
    }

    if (is_string($phase = findTranslation($locale, $key))) {
        return sprintf($phase, ...$args);
    }

    throw new TranslationNotFound();
}