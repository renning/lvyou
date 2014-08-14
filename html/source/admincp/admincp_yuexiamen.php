<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: admincp_portalcategory.php 32945 2013-03-26 05:01:12Z zhangguosheng $
 */

if(!defined('IN_DISCUZ') || !defined('IN_DISCUZ')) {
	exit('Access Denied');
}

require_once libfile('function/portalcp');

$maparea = array('beijing'=>'1',
				'shanghai'=>'2',
				'qingdao'=>'3',
				'jinan'=>'3',
				'dezhou'=>'3',
				);

cpheader();
$area = in_array($operation, array('delete', 'move', 'perm', 'add', 'edit', 'list')) ? $area : $operation;

showsubmenu($area, array(
array('简介', 'yuexiamen&operation=list&area='.$area.'&do=poi', $do == 'poi'),
array('百科', 'yuexiamen&operation=list&area='.$area.'&do=poi', $do == 'poi'),
array('景区', 'yuexiamen&operation=list&area='.$area.'&do=poi', $do == 'poi'),
array('景点', 'yuexiamen&operation=list&area='.$area.'&do=place', $do == 'place'),
array('餐厅', 'yuexiamen&operation=list&area='.$area.'&do=place', $do == 'place'),
array('商场', 'yuexiamen&operation=list&area='.$area.'&do=traffic', $do == 'traffic' ),
array('娱乐场所', 'yuexiamen&operation=list&area='.$area.'&do=stay', $do == 'stay'),
array('飞机场,火车站,客运站', 'yuexiamen&operation=list&area='.$area.'&do=food', $do == 'food'),
array('交通', 'yuexiamen&operation=list&area='.$area.'&do=traffic', $do == 'traffic' ),
array('住宿', 'yuexiamen&operation=list&area='.$area.'&do=stay', $do == 'stay'),
array('美食', 'yuexiamen&operation=list&area='.$area.'&do=food', $do == 'food'),
array('购物', 'yuexiamen&operation=list&area='.$area.'&do=shopping', $do == 'shopping'),
array('娱乐', 'yuexiamen&operation=list&area='.$area.'&do=entertainment', $do == 'entertainment'),
));

if($operation == 'list' && $do=='poi') {

	echo '<iframe src="home.php?mod=editor&charset=utf-8&allowhtml=1&doodle=" name="uchome-ifrHtmlEditor" id="uchome-ifrHtmlEditor" scrolling="no" border="0" frameborder="0" ></iframe>';
	$yuexiamen = C::t('yuexiamen_poi')->fetch_all_by_areaid($maparea[$area]);

		echo '<div style="height:30px;line-height:30px;"><a href="admin.php?action=yuexiamen&operation=add&area='.$area.'&do=poi" >增加</a> |
				<a href="admin.php?action=yuexiamen&operation=list&area='.$area.'&do=poi">列表</a> </div>';


		$tdstyle = array('width="25"', 'width="60"', 'width="45"', 'width="55"');
		showformheader('portalcategory');
		showtableheader('', '', 'style="min-width:900px;*width:900px;"');
		showsubtitle(array('id', '名称', '简介',  '管理'), 'header', $tdstyle);
		foreach ($yuexiamen as $key=>$value) {
				echo '<tr class="hover" id="cat4">
						<td>'.$value['id'].'
						<td>
							<div class="parentboard">'.$value['name'].'</div>
						</td>
						<td>
							<div class="parentboard">'.$value['introduction'].'</div>
						</td>
						<td>
							<a href="admin.php?action=yuexiamen&operation=edit&area=beijing&do=poi&poiid='.$value['id'].'">编辑</a>&nbsp;
							<a href="admin.php?frames=yes&action=yuexiamen&operation=delete&area=beijing&do=poi&poiid='.$value['id'].'">删除</a>&nbsp;
						</td>
					</tr>';
		}
		showtablefooter();
		showformfooter();
}elseif($operation == 'list' && $do=='place') {
	$yuexiamen = C::t('yuexiamen_place')->fetch_all_by_areaid($maparea[$area]);

	echo '<div style="height:30px;line-height:30px;"><a href="admin.php?action=yuexiamen&operation=add&area='.$area.'&do=place" >增加</a> |
				<a href="admin.php?action=yuexiamen&operation=list&area='.$area.'&do=place">列表</a> </div>';

	$tdstyle = array('width="25"', 'width="60"', 'width="45"', 'width="55"');
	showtableheader('', '', 'style="min-width:900px;*width:900px;"');
	showsubtitle(array('id', '名称', '简介',  '管理'), 'header', $tdstyle);
	foreach ($yuexiamen as $key=>$value) {
		echo '<tr class="hover" id="cat4">
						<td>'.$value['id'].'
						<td>
							<div class="parentboard">'.$value['name'].'</div>
						</td>
						<td>
							<div class="parentboard">'.$value['introduction'].'</div>
						</td>
						<td>
							<a href="admin.php?action=yuexiamen&operation=edit&area='.$area.'&do=place&placeid='.$value['id'].'">编辑</a>&nbsp;
							<a href="admin.php?frames=yes&action=yuexiamen&operation=delete&area='.$area.'&do=place&placeid='.$value['id'].'">删除</a>&nbsp;
						</td>
					</tr>';
	}
	showtablefooter();
	showformfooter();

} elseif($operation == 'delete' && $do='poi') {
		C::t('yuexiamen_poi')->delete($poiid);
		$url = 'admin.php?frames=yes&action=yuexiamen&operation=list&area=beijing&do=poi';
		cpmsg('portalcategory_edit_succeed', $url, 'succeed');

} elseif(($operation == 'edit' || $operation == 'add') && $do=='place') {
	$anchor = in_array($_GET['anchor'], array('basic', 'html')) ? $_GET['anchor'] : 'basic';
	@include_once DISCUZ_ROOT.'./data/cache/cache_domain.php';
	echo '<div style="height:30px;line-height:30px;"><a href="admin.php?action=yuexiamen&operation=add&area='.$area.'&do="'.$do.' >增加</a> |
				<a href="admin.php?action=yuexiamen&operation=list&area='.$area.'&do='.$do.'">列表</a> </div>';
// 	$channeldomain = isset($rootdomain['channel']) && $rootdomain['channel'] ? $rootdomain['channel'] : array();
	if(!submitcheck('detailsubmit')) {
		$url = 'yuexiamen&operation='.$operation.'&do='.$do.'&placeid='.$placeid.'&area='.$area;
		$result = array();
		if($placeid) {
			$cate = C::t('yuexiamen_place')->fetch_all_by_id($placeid)[0];
		}
		showtagheader('div', 'basic', $anchor == 'basic');
		showformheader($url);
		showtableheader();
		$catemsg = '';

		showsetting('所属目的地', 'area', cplang($area), 'text');
		showsetting('名称', 'name', $cate['name'], 'text');
		showsetting('areaid', 'areaid', $maparea[$area], 'text');
		showsetting('类型', array('placetype', array(
			array(0, '景点'),
			array(1, '餐厅'),
			array(2, '商场(商店)'),
			array(3, '娱乐场所'),
			array(4, '火车站,飞机场,客运站'),)), $cate['placetype'], 'select');
		showsetting('地址', 'address', $cate['address'], 'textarea');
		showsetting('简介', 'introduction', $cate['introduction'], 'textarea');
		showsetting('电话', 'phone', $cate['phone'], 'text');
		showsetting('网址', 'site', $cate['site'], 'text');
		showsetting('价格', 'price', $cate['price'], 'text');
		showsetting('到达交通', 'traffic', $cate['traffic'], 'textarea');
		showsetting('开放时间', 'businesshours', $cate['businesshours'], 'textarea');

		showsubmit('detailsubmit');
		showtablefooter();
		showformfooter();

	} else {
		$editcat = array(
				'area'=>$_GET['area'],
				'name' => $_GET['name'],
				'areaid' => $_GET['areaid'],
				'placetype' => $_GET['placetype'],
				'address' => $_GET['address'],
				'introduction' => $_GET['introduction'],
				'phone' => $_GET['phone'],
				'site' => $_GET['site'],
				'price' => $_GET['price'],
				'traffic' => $_GET['traffic'],
				'businesshours' => $_GET['businesshours'],
				'areaid' => $_GET['areaid'],

		);

		$editcat['dateline'] = TIMESTAMP;
		$editcat['username'] = $_G['username'];

		if($operation == 'add') {
			$_GET['catid'] = C::t('yuexiamen_place')->insert($editcat, true);
		} elseif($operation == 'edit') {

				$sql = array();
				foreach($editcat as $key => $value) {
						array_push($sql, $key."='".$value."'");

				}
			C::t('yuexiamen_place')->update($sql, $placeid);
		}

		$url = $operation == 'add' ? 'action=yuexiamen#cat'.$_GET['catid'] : 'action=yuexiamen&operation=edit&catid='.$_GET['catid'];
		$url = 'yuexiamen&operation=list&area='.$area.'&do=place';
		cpmsg('portalcategory_edit_succeed', $url, 'succeed');
		}

} elseif(($operation == 'edit' || $operation == 'add') && $do=='poi') {
		$anchor = in_array($_GET['anchor'], array('basic', 'html')) ? $_GET['anchor'] : 'basic';

		@include_once DISCUZ_ROOT.'./data/cache/cache_domain.php';
		echo '<div style="height:30px;line-height:30px;"><a href="admin.php?action=yuexiamen&operation=add&area='.$area.'&do=poi" >增加</a> |
				<a href="admin.php?action=yuexiamen&operation=list&area='.$area.'&do=poi">列表</a> </div>';
// 		$channeldomain = isset($rootdomain['channel']) && $rootdomain['channel'] ? $rootdomain['channel'] : array();
		// 	print_r($channeldomain);exit;
		// 	var_dump(submitcheck('detailsubmit'));exit;
		// 	var_dump($_GET['formhash']) ;exit;
		if(!submitcheck('detailsubmit')) {

			$url = 'yuexiamen&operation='.$operation.'&do='.$do.'&poiid='.$poiid.'&area='.$area;
			$result = array();
			if($poiid) {
				$result = C::t('yuexiamen_poi')->fetch_all_by_id($poiid)[0];
			}
			showtagheader('div', 'basic', $anchor == 'basic');
			showformheader($url);
			showtableheader();
			$catemsg = '';
			showsetting('所属目的地', 'area', cplang($area), 'text');
			showsetting('名称', 'name', $result['name'], 'text');
			showsetting('area', 'areaid', $maparea[$area], 'text');
			showsetting('简介', 'introduction', $result['introduction'], 'textarea');
			showsetting('级别划分', 'level', $result['level'], 'text');
				
			showsubmit('detailsubmit');
			showtablefooter();
			showformfooter();

		} else {

			$editcat = array(
			'area'=>$_GET['area'],
			'introduction' => $_GET['introduction'],
			'name' => $_GET['name'],
			'areaid' => $_GET['areaid'],
			'level' => $_GET['level'],
			);

			$editcat['dateline'] = TIMESTAMP;
			$editcat['username'] = $_G['username'];

			if($operation == 'add') {
				$_GET['catid'] = C::t('yuexiamen_poi')->insert($editcat, true);
			} elseif($operation == 'edit') {

				$sql = array();
				foreach($editcat as $key => $value) {
						array_push($sql, $key."='".$value."'");

				}
				C::t('yuexiamen_poi')->update($sql, $poiid);
			}

			$url = $operation == 'add' ? 'action=yuexiamen#cat'.$_GET['catid'] : 'action=yuexiamen&operation=edit&catid='.$_GET['catid'];
			$url = 'yuexiamen&operation=list&area='.$area.'&do=poi';
			cpmsg('portalcategory_edit_succeed', $url, 'succeed');
		}
}

function showcategoryrow($key, $level = 0, $last = '') {
	global $_G;

	loadcache('yuexiamen');
	$value = $_G['cache']['yuexiamen'][$key];
	$return = '';

// 	include_once libfile('function/portalcp');
	$value['articles'] = category_get_num('portal', $key);
	$publish = '';
	if(empty($_G['cache']['portalcategory'][$key]['disallowpublish'])) {
		$publish = '&nbsp;<a href="portal.php?mod=portalcp&ac=article&catid='.$key.'" target="_blank">'.cplang('portalcategory_publish').'</a>';
	}
	if($level == 2) {
		$class = $last ? 'lastchildboard' : 'childboard';
		$return = '<tr class="hover" id="cat'.$value['catid'].'"><td>&nbsp;</td><td class="td25"><input type="text" class="txt" name="neworder['.$value['catid'].']" value="'.$value['displayorder'].'" /></td><td><div class="'.$class.'">'.
		'<input type="text" class="txt" name="name['.$value['catid'].']" value="'.$value['catname'].'" />'.
		'</div>'.
		'</td><td>'.$value['articles'].'</td>'.
		'<td>'.(empty($value['disallowpublish']) ? cplang('yes') : cplang('no')).'</td>'.
		'<td>'.(!empty($value['allowcomment']) ? cplang('yes') : cplang('no')).'</td>'.
		'<td>'.(empty($value['closed']) ? cplang('yes') : cplang('no')).'</td>'.
		'<td><input class="radio" type="radio" name="newsetindex" value="'.$value['catid'].'" '.($value['caturl'] == $_G['setting']['defaultindex'] ? 'checked="checked"':'').' /></td>'.
		'<td><a href="'.$value['caturl'].'" target="_blank">'.cplang('view').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=edit&catid='.$value['catid'].'">'.cplang('edit').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=move&catid='.$value['catid'].'">'.cplang('portalcategory_move').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=delete&catid='.$value['catid'].'">'.cplang('delete').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=diytemplate&operation=perm&targettplname=portal/list_'.$value['catid'].'&tpldirectory='.getdiydirectory($value['primaltplname']).'">'.cplang('portalcategory_blockperm').'</a></td>
		<td><a href="'.ADMINSCRIPT.'?action=article&operation=list&&catid='.$value['catid'].'">'.cplang('portalcategory_articlemanagement').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=perm&catid='.$value['catid'].'">'.cplang('portalcategory_articleperm').'</a>'.$publish.'</td></tr>';
	} elseif($level == 1) {
		$return = '<tr class="hover" id="cat'.$value['catid'].'"><td>&nbsp;</td><td class="td25"><input type="text" class="txt" name="neworder['.$value['catid'].']" value="'.$value['displayorder'].'" /></td><td><div class="board">'.
		'<input type="text" class="txt" name="name['.$value['catid'].']" value="'.$value['catname'].'" />'.
		'<a class="addchildboard" href="'.ADMINSCRIPT.'?action=portalcategory&operation=add&upid='.$value['catid'].'">'.cplang('portalcategory_addthirdcategory').'</a></div>'.
		'</td><td>'.$value['articles'].'</td>'.
		'<td>'.(empty($value['disallowpublish']) ? cplang('yes') : cplang('no')).'</td>'.
		'<td>'.(!empty($value['allowcomment']) ? cplang('yes') : cplang('no')).'</td>'.
		'<td>'.(empty($value['closed']) ? cplang('yes') : cplang('no')).'</td>'.
		'<td><input class="radio" type="radio" name="newsetindex" value="'.$value['catid'].'" '.($value['caturl'] == $_G['setting']['defaultindex'] ? 'checked="checked"':'').' /></td>'.
		'<td><a href="'.$value['caturl'].'" target="_blank">'.cplang('view').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=edit&catid='.$value['catid'].'">'.cplang('edit').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=move&catid='.$value['catid'].'">'.cplang('portalcategory_move').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=delete&catid='.$value['catid'].'">'.cplang('delete').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=diytemplate&operation=perm&targettplname=portal/list_'.$value['catid'].'&tpldirectory='.getdiydirectory($value['primaltplname']).'">'.cplang('portalcategory_blockperm').'</a></td>
		<td><a href="'.ADMINSCRIPT.'?action=article&operation=list&&catid='.$value['catid'].'">'.cplang('portalcategory_articlemanagement').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=perm&catid='.$value['catid'].'">'.cplang('portalcategory_articleperm').'</a>'.$publish.'</td></tr>';
		for($i=0,$L=count($value['children']); $i<$L; $i++) {
			$return .= showcategoryrow($value['children'][$i], 2, $i==$L-1);
		}
	} else {
		$childrennum = count($_G['cache']['portalcategory'][$key]['children']);
		$toggle = $childrennum > 25 ? ' style="display:none"' : '';
		$return = '<tbody><tr class="hover" id="cat'.$value['catid'].'"><td onclick="toggle_group(\'group_'.$value['catid'].'\')"><a id="a_group_'.$value['catid'].'" href="javascript:;">'.($toggle ? '[+]' : '[-]').'</a></td>'
		.'<td class="td25"><input type="text" class="txt" name="neworder['.$value['catid'].']" value="'.$value['displayorder'].'" /></td><td><div class="parentboard">'.
		'<input type="text" class="txt" name="name['.$value['catid'].']" value="'.$value['catname'].'" />'.
		'</div>'.
		'</td><td>'.$value['articles'].'</td>'.
		'<td>'.(empty($value['disallowpublish']) ? cplang('yes') : cplang('no')).'</td>'.
		'<td>'.(!empty($value['allowcomment']) ? cplang('yes') : cplang('no')).'</td>'.
		'<td>'.(empty($value['closed']) ? cplang('yes') : cplang('no')).'</td>'.
		'<td><input class="radio" type="radio" name="newsetindex" value="'.$value['catid'].'" '.($value['caturl'] == $_G['setting']['defaultindex'] ? 'checked="checked"':'').' /></td>'.
		'<td><a href="'.$value['caturl'].'" target="_blank">'.cplang('view').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=edit&catid='.$value['catid'].'">'.cplang('edit').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=move&catid='.$value['catid'].'">'.cplang('portalcategory_move').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=delete&catid='.$value['catid'].'">'.cplang('delete').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=diytemplate&operation=perm&targettplname=portal/list_'.$value['catid'].'&tpldirectory='.getdiydirectory($value['primaltplname']).'">'.cplang('portalcategory_blockperm').'</a></td>
		<td><a href="'.ADMINSCRIPT.'?action=article&operation=list&&catid='.$value['catid'].'">'.cplang('portalcategory_articlemanagement').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=perm&catid='.$value['catid'].'">'.cplang('portalcategory_articleperm').'</a>'.$publish.'</td></tr></tbody>
		<tbody id="group_'.$value['catid'].'"'.$toggle.'>';
		for($i=0,$L=count($value['children']); $i<$L; $i++) {
			$return .= showcategoryrow($value['children'][$i], 1, '');
		}
		$return .= '</tdoby><tr><td>&nbsp;</td><td colspan="9"><div class="lastboard"><a class="addtr" href="'.ADMINSCRIPT.'?action=portalcategory&operation=add&upid='.$value['catid'].'">'.cplang('portalcategory_addsubcategory').'</a></td></div>';
	}
	return $return;
}

function deleteportalcategory($ids) {
	global $_G;

	if(empty($ids)) return false;
	if(!is_array($ids) && $_G['cache']['portalcategory'][$ids]['upid'] == 0) {
		@require_once libfile('function/delete');
		deletedomain(intval($ids), 'channel');
	}
	if(!is_array($ids)) $ids = array($ids);

	require_once libfile('class/blockpermission');
	require_once libfile('class/portalcategory');
	$tplpermission = & template_permission::instance();
	$templates = array();
	foreach($ids as $id) {
		$templates[] = 'portal/list_'.$id;
		$templates[] = 'portal/view_'.$id;
	}
	$tplpermission->delete_allperm_by_tplname($templates);
	$categorypermission = & portal_category::instance();
	$categorypermission->delete_allperm_by_catid($ids);

	C::t('portal_category')->delete($ids);
	C::t('common_nav')->delete_by_type_identifier(4, $ids);

	$tpls = $defaultindex = array();
	foreach($ids as $id) {
		$defaultindex[] = $_G['cache']['portalcategory'][$id]['caturl'];
		$tpls[] = 'portal/list_'.$id;
		$tpls[] = 'portal/view_'.$id;
	}
	if(in_array($_G['setting']['defaultindex'], $defaultindex)) {
		C::t('common_setting')->update('defaultindex', '');
	}
	C::t('common_diy_data')->delete($tpls, NULL);
	C::t('common_template_block')->delete_by_targettplname($tpls);

}


function makecategoryfile($dir, $catid, $domain) {
	dmkdir(DISCUZ_ROOT.'./'.$dir, 0777, FALSE);
	$portalcategory = getglobal('cache/portalcategory');
	$prepath = str_repeat('../', $portalcategory[$catid]['level']+1);
	if($portalcategory[$catid]['level']) {
		$upid = $portalcategory[$catid]['upid'];
		while($portalcategory[$upid]['upid']) {
			$upid = $portalcategory[$upid]['upid'];
		}
		$domain = $portalcategory[$upid]['domain'];
	}

	$sub_dir = $dir;
	if($sub_dir) {
		$sub_dir = substr($sub_dir, -1, 1) == '/' ? '/'.$sub_dir : '/'.$sub_dir.'/';
	}
	$code = "<?php
chdir('$prepath');
define('SUB_DIR', '$sub_dir');
\$_GET['mod'] = 'list';
\$_GET['catid'] = '$catid';
require_once './portal.php';
?>";
	$r = file_put_contents($dir.'/index.php', $code);
	return $r;
}
function getportalcategoryfulldir($catid) {
	if(empty($catid)) return '';
	$portalcategory = getglobal('cache/portalcategory');
	$curdir = $portalcategory[$catid]['foldername'];
	$curdir = $curdir ? $curdir : '';
	if($catid && empty($curdir)) return FALSE;
	$upid = $portalcategory[$catid]['upid'];
	while($upid) {
		$updir = $portalcategory[$upid]['foldername'];
		if(!empty($updir)) {
			$curdir = $updir.'/'.$curdir;
		} else {
			return FALSE;
		}
		$upid = $portalcategory[$upid]['upid'];
	}
	return $curdir ? $curdir.'/' : '';
}

function delportalcategoryfolder($catid) {
	if(empty($catid)) return FALSE;
	$updatearr = array();
	$portalcategory = getglobal('cache/portalcategory');
	$children = $portalcategory[$catid]['children'];
	if($children) {
		foreach($children as $subcatid) {
			if($portalcategory[$subcatid]['foldername']) {
				$arr = delportalcategorysubfolder($subcatid);
				$updatearr = array_merge($updatearr, $arr);
			}
		}
	}

	$dir = getportalcategoryfulldir($catid);
	if(!empty($dir)) {
		unlink(DISCUZ_ROOT.$dir.'index.html');
		unlink(DISCUZ_ROOT.$dir.'index.php');
		rmdir(DISCUZ_ROOT.$dir);
		$updatearr[] = $catid;
	}
	if(dimplode($updatearr)) {
		C::t('portal_category')->update($updatearr, array('foldername'=>''));
	}
}

function delportalcategorysubfolder($catid) {
	if(empty($catid)) return FALSE;
	$updatearr = array();
	$portalcategory = getglobal('cache/portalcategory');
	$children = $portalcategory[$catid]['children'];
	if($children) {
		foreach($children as $subcatid) {
			if($portalcategory[$subcatid]['foldername']) {
				$arr = delportalcategorysubfolder($subcatid);
				$updatearr = array_merge($updatearr, $arr);
			}
		}
	}

	$dir = getportalcategoryfulldir($catid);
	if(!empty($dir)) {
		unlink(DISCUZ_ROOT.$dir.'index.html');
		unlink(DISCUZ_ROOT.$dir.'index.php');
		rmdir(DISCUZ_ROOT.$dir);
		$updatearr[] = $catid;
	}
	return $updatearr;
}

function remakecategoryfile($categorys) {
	if(is_array($categorys)) {
		$portalcategory = getglobal('cache/portalcategory');
		foreach($categorys as $subcatid) {
			$dir = getportalcategoryfulldir($subcatid);
			makecategoryfile($dir, $subcatid, $portalcategory[$subcatid]['domain']);
			if($portalcategory[$subcatid]['children']) {
				remakecategoryfile($portalcategory[$subcatid]['children']);
			}
		}
	}
}

function showportalprimaltemplate($pritplname, $type) {
	include_once libfile('function/portalcp');
	$tpls = array('./template/default:portal/'.$type=>getprimaltplname('portal/'.$type.'.htm'));
	foreach($alltemplate = C::t('common_template')->range() as $template) {
		if(($dir = dir(DISCUZ_ROOT.$template['directory'].'/portal/'))) {
			while(false !== ($file = $dir->read())) {
				$file = strtolower($file);
				if (fileext($file) == 'htm' && substr($file, 0, strlen($type)+1) == $type.'_') {
					$key = $template['directory'].':portal/'.str_replace('.htm','',$file);
					$tpls[$key] = getprimaltplname($template['directory'].':portal/'.$file);
				}
			}
		}
	}

	foreach($tpls as $key => $value) {
		echo "<input name=signs[$type][".dsign($key)."] value='1' type='hidden' />";
	}

	$pritplvalue = '';
	if(empty($pritplname)) {
		$pritplhide = '';
		$pritplvalue = ' style="display:none;"';
	} else {
		$pritplhide = ' style="display:none;"';
	}
	$catetplselect = '<span'.$pritplhide.'><select id="'.$type.'select" name="'.$type.'primaltplname">';
	$selectedvalue = '';
	if($type == 'view') {
		$catetplselect .= '<option value="">'.cplang('portalcategory_inheritupsetting').'</option>';
	}
	foreach($tpls as $k => $v){
		if($pritplname === $k) {
			$selectedvalue = $k;
			$selected = ' selected';
		} else {
			$selected = '';
		}
		$catetplselect .= '<option value="'.$k.'"'.$selected.'>'.$v.'</option>';
	}
	$pritplophide = !empty($pritplname) ? '' : ' style="display:none;"';
	$catetplselect .= '</select> <a href="javascript:;"'.$pritplophide.' onclick="$(\''.$type.'select\').value=\''.$selectedvalue.'\';$(\''.$type.'select\').parentNode.style.display=\'none\';$(\''.$type.'value\').style.display=\'\';">'.cplang('cancel').'</a></span>';

	if(empty($pritplname)) {
		showsetting('portalcategory_'.$type.'primaltplname', '', '', $catetplselect);
	} else {
		$tplname = getprimaltplname($pritplname.'.htm');
		$html = '<span id="'.$type.'value" '.$pritplvalue.'> '.$tplname.'<a href="javascript:;" onclick="$(\''.$type.'select\').parentNode.style.display=\'\';$(\''.$type.'value\').style.display=\'none\';"> '.cplang('modify').'</a></span>';
		showsetting('portalcategory_'.$type.'primaltplname', '', '', $catetplselect.$html);
	}
}

function remakediytemplate($primaltplname, $targettplname, $diytplname, $olddirectory){
	global $_G;
	if(empty($targettplname)) return false;
	$tpldirectory = '';
	if(strpos($primaltplname, ':') !== false) {
		list($tpldirectory, $primaltplname) = explode(':', $primaltplname);
	}
	$tpldirectory = ($tpldirectory ? $tpldirectory : $_G['cache']['style_default']['tpldir']);
	$newdiydata = C::t('common_diy_data')->fetch($targettplname, $tpldirectory);
	if($newdiydata) {
		return false;
	}
	$diydata = C::t('common_diy_data')->fetch($targettplname, $olddirectory);
	$diycontent = empty($diydata['diycontent']) ? '' : $diydata['diycontent'];
	if($diydata) {
		C::t('common_diy_data')->update($targettplname, $olddirectory, array('primaltplname'=>$primaltplname, 'tpldirectory'=>$tpldirectory));
	} else {
		$diycontent = '';
		if(in_array($primaltplname, array('portal/list', 'portal/view'))) {
			$diydata = C::t('common_diy_data')->fetch($targettplname, $olddirectory);
			$diycontent = empty($diydata['diycontent']) ? '' : $diydata['diycontent'];
		}
		$diyarr = array(
			'targettplname' => $targettplname,
			'tpldirectory' => $tpldirectory,
			'primaltplname' => $primaltplname,
			'diycontent' => $diycontent,
			'name' => $diytplname,
			'uid' => $_G['uid'],
			'username' => $_G['username'],
			'dateline' => TIMESTAMP,
			);
		C::t('common_diy_data')->insert($diyarr);
	}
	if(empty($diycontent)) {
		$file = $tpldirectory.'/'.$primaltplname.'.htm';
		if (!file_exists($file)) {
			$file = './template/default/'.$primaltplname.'.htm';
		}
		$content = @file_get_contents(DISCUZ_ROOT.$file);
		if(!$content) $content = '';
		$content = preg_replace("/\<\!\-\-\[name\](.+?)\[\/name\]\-\-\>/i", '', $content);
		file_put_contents(DISCUZ_ROOT.'./data/diy/'.$tpldirectory.'/'.$targettplname.'.htm', $content);
	} else {
		updatediytemplate($targettplname, $tpldirectory);
	}
	return true;
}

function getparentviewprimaltplname($catid) {
	global $_G;
	$tpl = 'view';
	if(empty($catid)) {
		return $tpl;
	}
	$cat = $_G['cache']['portalcategroy'][$catid];
	if(!empty($cat['upid']['articleprimaltplname'])) {
		$tpl = $cat['upid']['articleprimaltplname'];
	} else {
		$cat = $_G['cache']['portalcategroy'][$cat['upid']];
		if($cat && $cat['articleprimaltplname']) {
			$tpl = $cat['articleprimaltplname'];
		}
	}
	return $tpl;
}
?>
