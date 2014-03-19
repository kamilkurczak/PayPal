<?php

namespace Tokk\Paypal\Request;

interface Factory
{
    public static function make($type, $values = array(), $requestClassess = array());
}