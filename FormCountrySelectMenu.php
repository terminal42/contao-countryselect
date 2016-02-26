<?php

/**
 * countryselect Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2009-2016, terminal42 gmbh
 * @author     terminal42 gmbh <info@terminal42.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       http://github.com/terminal42/contao-countryselect
 */

class FormCountrySelectMenu extends FormSelectMenu
{
    public function addAttributes($arrAttributes)
    {
        parent::addAttributes($arrAttributes);
        $arrOptions = array(array('label' => ($this->placeholder == '' ? '-' : $this->placeholder), 'value' => ''));
        $arrCountries = $this->getCountries();

        foreach ($arrCountries as $short => $name) {
            $arrOptions[] = array('label' => $name, 'value' => $short);
        }
        $this->arrOptions = $arrOptions;
    }
}
