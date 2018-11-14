<?php

/**
 * countryselect Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2009-2018, terminal42 gmbh
 * @author     terminal42 gmbh <info@terminal42.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       http://github.com/terminal42/contao-countryselect
 */

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['countryselect'] = '{type_legend},type,name,label;{fconfig_legend},mandatory,multiple,placeholder,countryselect_important,countryselect_exclude;{expert_legend:hide},value,class,accesskey,tabindex;{template_legend:hide},customTpl;{submit_legend},addSubmit';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_form_field']['fields']['countryselect_important'] = [
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['countryselect_important'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => function() {
        return \System::getCountries();
    },
    'eval'                    => ['multiple'=>true, 'chosen'=>true, 'csv'=>',', 'includeBlankOption'=>true, 'tl_class'=>'clr'],
    'sql'                     => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['countryselect_exclude'] = [
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['countryselect_exclude'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => function() {
        return \System::getCountries();
    },
    'eval'                    => ['multiple'=>true, 'chosen'=>true, 'csv'=>',', 'includeBlankOption'=>true, 'tl_class'=>'clr'],
    'sql'                     => "varchar(255) NOT NULL default ''"
];
