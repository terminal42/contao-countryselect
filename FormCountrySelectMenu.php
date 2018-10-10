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
        
        // Replace insert tags
        if (strpos($this->varValue, '{{') !== false) {
            $this->varValue = \Controller::replaceInsertTags($this->value);
        }

        }

        foreach ($countries as $short => $name) {
            $options[] = ['label' => $name, 'value' => $short];
        }

        $this->arrOptions = $options;
    }
}
