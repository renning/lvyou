<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_portal_category.php 27876 2012-02-16 04:28:02Z zhengqingpeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_yuexiamen_place extends discuz_table
{
	public function __construct() {

		$this->_table = 'yuexiamen_place';
		$this->_pk    = 'id';
		

		parent::__construct();
	}
	
	public function fetch_all() {
		return DB::fetch_all('SELECT * FROM '.DB::table($this->_table));
	}
	
	public function fetch_all_by_id($id) {
		return DB::fetch_all('SELECT * FROM '.DB::table($this->_table).' where id='.$id);
	}
	
	public function fetch_all_by_areaid($areaid) {
		return DB::fetch_all('SELECT * FROM '.DB::table($this->_table).' where areaid='.$areaid);
	}
	public function update($sql, $id) {
		DB::query("UPDATE ".DB::table($this->_table)." SET ".implode(',', $sql)." WHERE id=".$id);
	}
	}
	
	?>