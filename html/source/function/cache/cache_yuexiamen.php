<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: cache_stamps.php 25773 2011-11-22 04:22:39Z zhengqingpeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

function build_cache_yuexiamen() {
	$data = array();

	
	foreach(C::t('yuexiamen_poi')->fetch_all() as $yuexiamen) {

		$data['yuexiamen_poi'] = array('area' => $yuexiamen['area'], 'areaid' => $yuexiamen['areaid'],'name' => $yuexiamen['name'],'introduction' => $yuexiamen['introductiong'],'dateline' => $yuexiamen['dateline']);
	}

	savecache('yuexiamen', $data);
}

?>