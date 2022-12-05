<?php

declare(strict_types=1);

namespace Terminal42\CountryselectBundle\Widget;

use Contao\FormSelect;
use Contao\FormSelectMenu;
use Contao\System;

// Backwards compatibility for Contao 4.13
// The FormSelectMenu class was renamed to FormSelect in Contao 5.0
if (!class_exists(FormSelect::class)) {
    class_alias(FormSelectMenu::class, FormSelect::class);
}

class FormCountrySelect extends FormSelect
{
    public function addAttributes($arrAttributes): void
    {
        parent::addAttributes($arrAttributes);

        $options = [['label' => ($this->placeholder ?? '-'), 'value' => '']];
        $countries = System::getContainer()->get('contao.intl.countries')->getCountries();

        // Exclude some countries
        if ($this->countryselect_exclude) {
            $countries = array_diff_key($countries, array_flip(explode(',', $this->countryselect_exclude)));
        }

        // Replace insert tags
        if (str_contains($this->varValue, '{{')) {
            $this->varValue = System::getContainer()->get('contao.insert_tag.parser')->parse($this->varValue);
        }

        // Support for important countries
        $importantCountries = [];

        if ($this->countryselect_important) {
            foreach (explode(',', $this->countryselect_important) as $code) {
                if (isset($countries[$code])) {
                    $importantCountries[$code] = $countries[$code];
                    $options[] = ['label' => $countries[$code], 'value' => $code];
                }
            }

            if (\count($importantCountries) > 0) {
                $options[] = ['label' => '---', 'value' => ''];
            }
        }

        foreach ($countries as $code => $label) {
            if (isset($importantCountries[$code])) {
                continue;
            }

            $options[] = ['label' => $label, 'value' => $code];
        }

        $this->arrOptions = $options;
    }
}
