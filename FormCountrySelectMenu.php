<?php

/**
 * countryselect Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2009-2018, terminal42 gmbh
 * @author     terminal42 gmbh <info@terminal42.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       http://github.com/terminal42/contao-countryselect
 */

class FormCountrySelectMenu extends FormSelectMenu
{
    public function addAttributes($arrAttributes)
    {
        parent::addAttributes($arrAttributes);

        $options = [['label' => ($this->placeholder == '' ? '-' : $this->placeholder), 'value' => '']];
        $countries = \System::getCountries();

        // Exclude some countries
        if ($this->countryselect_exclude) {
            $countries = array_diff_key($countries, array_flip(explode(',', $this->countryselect_exclude)));
        }

        // Replace insert tags
        if (strpos($this->varValue, '{{') !== false) {
            $this->varValue = \Controller::replaceInsertTags($this->value);
        }

        // Support for important countries
        $importantCountries = [];
        if ($this->countryselect_important) {
            foreach (explode(',', $this->countryselect_important) as $short) {
                if (isset($countries[$short])) {
                    $importantCountries[$short] = $countries[$short];
                    $options[] = ['label' => $countries[$short], 'value' => $short];
                }
            }

            if (count($importantCountries) > 0) {
                $options[] = ['label' => '---', 'value' => ''];
            }
        }

        foreach ($countries as $short => $name) {

            if (isset($importantCountries[$short])) {
                continue;
            }

            $options[] = ['label' => $name, 'value' => $short];
        }

        $this->arrOptions = $options;
    }
}
