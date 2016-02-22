<?php

namespace Terminal42\Form;

class CountrySelectMenu extends \FormSelectMenu
{
    public function addAttributes($arrAttributes)
    {
        parent::addAttributes($arrAttributes);

        $arrOptions = [
            [
                'label' => ($this->placeholder == '' ? '-' : $this->placeholder),
                'value' => '',
            ],
        ];

        $arrCountries = $this->getCountries();

        foreach ($arrCountries as $short => $name) {
            $arrOptions[] = [
                'label' => $name, 'value' => $short,
            ];
        }

        $this->arrOptions = $arrOptions;
    }
}
