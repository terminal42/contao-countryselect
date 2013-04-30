<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  terminal42 gmbh 2009-2013
 * @author     Andreas Schempp <andreas.schempp@terminal42.ch>
 * @author     Kamil Kuźmiński <kamil.kuzminski@terminal42.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */


class FormCountrySelectMenu extends FormSelectMenu
{

	public function __set($strKey, $varValue)
	{
		switch ($strKey)
		{
			case 'options':
				$arrOptions = array(array('label'=>($this->placeholder == '' ? '-' : $this->placeholder), 'value'=>''));
				$arrCountries = $this->getCountries();

				foreach( $arrCountries as $short => $name )
				{
					$arrOptions[] = array('label'=>$name, 'value'=>$short);
				}

				$this->arrOptions = $arrOptions;
				break;

			default:
				parent::__set($strKey, $varValue);
				break;
		}
	}
}
