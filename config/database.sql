-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************


-- --------------------------------------------------------

-- 
-- Table `tl_module`
-- 

CREATE TABLE `tl_module` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `sprd_shop_id` int(10) unsigned NULL default NULL,
  `sprd_shop_url` varchar(1024) NULL default NULL,
  `sprd_shop_name` varchar(255) NULL default NULL,
  `sprd_shop_currency` varchar(10) NULL default 'EUR',
  `sprd_img_width` int(10) NULL default NULL,
  `sprd_img_height` int(10) NULL default NULL,
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
