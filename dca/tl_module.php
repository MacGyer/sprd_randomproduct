<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

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
 * @copyright  Leo Feyer 2005-2012
 * @author     Leo Feyer <http://www.contao.org>
 * @package    Newsletter
 * @license    LGPL
 * @filesource
 */
 
$GLOBALS['TL_DCA']['tl_module']['palettes']['sprd_randomproduct'] = '{title_legend},name,headline,type;{sprd_shop_legend},sprd_shop_id,sprd_shop_url,sprd_shop_name,sprd_shop_currency;{sprd_img_legend},sprd_img_width,sprd_img_height;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
 
 /**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['sprd_shop_id'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sprd_shop_id'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'rgxp'=>'digit', 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['sprd_shop_url'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sprd_shop_url'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'rgxp'=>'url', 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['sprd_shop_name'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sprd_shop_name'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['sprd_shop_currency'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sprd_shop_currency'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50', 'rgxp' => 'extnd')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['sprd_img_width'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sprd_img_width'],
	'exclude'                 => false,
	'default'				  => 190,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>false, 'rgxp'=>'digit', 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['sprd_img_height'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sprd_img_height'],
	'exclude'                 => false,
	'default'				  => 190,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>false, 'rgxp'=>'digit', 'tl_class'=>'w50')
);
 ?>