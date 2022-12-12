<?php

$GLOBALS['TL_DCA']['tl_form_field']['palettes']['countryselect'] = '{type_legend},type,name,label;{fconfig_legend},mandatory,multiple,placeholder,countryselect_important,countryselect_exclude;{expert_legend:hide},value,class,accesskey,tabindex;{template_legend:hide},customTpl;{invisible_legend:hide},invisible';

$GLOBALS['TL_DCA']['tl_form_field']['fields']['countryselect_important'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'clr w50'],
    'sql' => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['countryselect_exclude'] = [
    'exclude' => true,
    'inputType' => 'select',
    'eval' => ['multiple' => true, 'chosen' => true, 'csv' => ',', 'includeBlankOption' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(255) NOT NULL default ''",
];
