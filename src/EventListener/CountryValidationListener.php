<?php

declare(strict_types=1);

namespace Terminal42\CountryselectBundle\EventListener;

use Contao\CoreBundle\Intl\Countries;
use Contao\CoreBundle\ServiceAnnotation\Callback;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @Callback(table="tl_form_field", target="fields.countryselect_important.save")
 */
class CountryValidationListener
{
    private Countries $countries;
    private TranslatorInterface $translator;

    public function __construct(Countries $countries, TranslatorInterface $translator)
    {
        $this->countries = $countries;
        $this->translator = $translator;
    }

    public function __invoke($value)
    {
        if (empty($value) || !\is_string($value)) {
            return $value;
        }

        $countries = $this->countries->getCountries();
        $options = array_map('trim', explode(',', strtoupper($value)));
        $diff = array_diff_key(array_flip($options), $countries);

        if (0 !== \count($diff)) {
            throw new \RuntimeException($this->translator->trans('ERR.countryselect_important', [implode(',', array_flip($diff))], 'contao_default'));
        }

        return implode(',', $options);
    }
}
