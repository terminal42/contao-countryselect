<?php

declare(strict_types=1);

namespace Terminal42\CountryselectBundle\EventListener;

use Contao\CoreBundle\Intl\Countries;
use Contao\CoreBundle\ServiceAnnotation\Callback;

/**
 * @Callback(table="tl_form_field", target="fields.countryselect_important.options")
 * @Callback(table="tl_form_field", target="fields.countryselect_exclude.options")
 */
class CountryOptionsListener
{
    private Countries $countries;

    public function __construct(Countries $countries)
    {
        $this->countries = $countries;
    }

    public function __invoke(): array
    {
        return $this->countries->getCountries();
    }
}
