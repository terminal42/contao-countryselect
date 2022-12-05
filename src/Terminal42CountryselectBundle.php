<?php

declare(strict_types=1);

namespace Terminal42\CountryselectBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class Terminal42CountryselectBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
