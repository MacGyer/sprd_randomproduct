<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
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
 * @copyright  pluspunkt coding 2012 
 * @author     pluspunkt coding <info@pluspunkt-coding.de> 
 * @package    sprd 
 * @license    GNU/GPL 
 * @filesource
 */


/**
 * Class ModuleSprdRandomproduct 
 *
 * @copyright  pluspunkt coding 2012 
 * @author     pluspunkt coding <info@pluspunkt-coding.de> 
 * @package    Controller
 */
class ModuleSprdRandomproduct extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_sprd_randomproduct';


	/**
	 * Generate module
	 */
	protected function compile()
	{
		$shopId = $this->sprd_shop_id;
		$shopUrl = $this->sprd_shop_url;
		$shopName = $this->sprd_shop_name;
		$shopCurrency = $this->sprd_shop_currency;
		$imgWidth = $this->sprd_img_width;
		$imgHeight = $this->sprd_img_height;
				
		// get Product List
		$xmlString = file_get_contents('http://api.spreadshirt.net/api/v1/shops/'.$shopId.'/articles?limit=300');

		// Load XML String into XML Object
		$_articlesXML = simplexml_load_string($xmlString);
		$_articles = array();

		$i = 1;

		foreach($_articlesXML->article as $a){
			$_articles[$i]['id'] = $a->attributes()->id;
			$_articles[$i]['name'] = $a->name;
			$_articles[$i]['price'] = $a->price->vatIncluded;
			$_articles[$i]['image'] = $a->resources->resource->attributes('xlink', 1)->href;
			
			$i++;
		}
		
		$key = mt_rand(1, count($_articles));
		
		// Compute Image Width/Height String
		$imgSize = '';
		
		if(!empty($imgWidth) and empty($imgHeight)) $imgSize = 'width="'.$imgWidth.'"';
		elseif(!empty($imgHeight) and empty($imgWidth)) $imgSize = 'height="'.$imgHeight.'"';
		elseif(!empty($imgWidth) and !empty($imgHeight)) $imgSize = 'width="'.$imgWidth.'" height="'.$imgHeight.'"';
		
		/* Fill the Template */
		$this->Template->shopUrl = $shopUrl;
		$this->Template->shopName = $shopName;
		$this->Template->shopCurrency = $shopCurrency;
		$this->Template->shopLink = sprintf($GLOBALS['TL_LANG']['MSC']['sprd_shop_link'], $shopName);
		
		$this->Template->articlePrice = str_replace('.', ',', $_articles[$key]['price'][0]);
		$this->Template->articleImage = $_articles[$key]['image'][0];
		$this->Template->articleName = $_articles[$key]['name'][0];
		$this->Template->articleId = $_articles[$key]['id'][0];
		
		$this->Template->imgSize = $imgSize;
	}
}

?>