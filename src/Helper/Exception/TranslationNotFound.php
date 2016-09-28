<?php

namespace Lemming\Helper\Exception;

class TranslationNotFound extends \Exception
{
    protected $message = 'Could not find the translation.';
}