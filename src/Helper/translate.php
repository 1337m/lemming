<?php

use Lemming\Helper\Exception\TranslationNotFound;

require_once 'env.php';

function findTranslation($lang, $key)
{
    $phase = loadTranslation($lang);

    $keyPath = explode('.', $key);

    for ($i = 0; $i < count($keyPath); $i++) {
        if (!isset($phase[$keyPath[$i]])) {
            break;
        }

        $phase = $phase[$keyPath[$i]];
    }

    return $phase;
}

function loadTranslation($lang)
{
    if (!isset($_SERVER['translation'][$lang])) {
        $_SERVER['translation'][$lang] = require __DIR__ . '/../../locale/' . $lang . '.php';
    }

    return $_SERVER['translation'][$lang];
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