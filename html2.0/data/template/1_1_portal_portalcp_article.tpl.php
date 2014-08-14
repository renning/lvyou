<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('portalcp_article');
0
|| checktplrefresh('./template/default/portal/portalcp_article.htm', './template/default/common/seccheck.htm', 1400943867, '1', './data/template/1_1_portal_portalcp_article.tpl.php', './template/default', 'portal/portalcp_article')
;?><?php include template('common/header'); if($op == 'delete') { ?>

<h3 class="flb">
<em>删除文章</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_G['gp_handlekey'];?>');" class="flbc" title="关闭">关闭</a></span><?php } ?>
</h3>

<form method="post" autocomplete="off" action="portal.php?mod=portalcp&amp;ac=article&amp;op=delete&amp;aid=<?php echo $_GET['aid'];?>">
<div class="c">
<?php if($_G['group']['allowpostarticlemod'] && $article['status'] == 1) { ?>
确认要删除此文章吗？
<input type="hidden" name="optype" value="0" class="pc" />
<?php } else { ?>
<label class="lb"><input type="radio" name="optype" value="0" class="pc" />直接删除</label>
<label class="lb"><input type="radio" name="optype" value="1" class="pc" checked="checked" />放入回收站</label>
<?php } ?>
</div>
<p class="o pns">
<button type="submit" name="btnsubmit" value="true" class="pn pnc"><strong>确定</strong></button>
</p>
<input type="hidden" name="aid" value="<?php echo $_GET['aid'];?>" />
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="deletesubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
</form>
<?php } elseif($op == 'verify') { ?>
<h3 class="flb">
<em id="return_<?php echo $_G['gp_handlekey'];?>">审核文章</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_G['gp_handlekey'];?>');" class="flbc" title="关闭">关闭</a></span><?php } ?>
</h3>

<form method="post" autocomplete="off" id="aritcle_verify_<?php echo $aid;?>" action="portal.php?mod=portalcp&amp;ac=article&amp;op=verify&amp;aid=<?php echo $aid;?>">
<div class="c">
<label for="status_0" class="lb"><input type="radio" class="pr" name="status" value="0" id="status_0"<?php if($article['status']=='1') { ?> checked="checked"<?php } ?> />通过</label>
<label for="status_x" class="lb"><input type="radio" class="pr" name="status" value="-1" id="status_x" />删除</label>
<label for="status_2" class="lb"><input type="radio" class="pr" name="status" value="2" id="status_2"<?php if($article['status']=='2') { ?> checked="checked"<?php } ?> />忽略</label>
</div>
<p class="o pns">
<button type="submit" name="btnsubmit" value="true" class="pn pnc"><strong>确定</strong></button>
</p>
<input type="hidden" name="aid" value="<?php echo $aid;?>" />
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="handlekey" value="<?php echo $_G['gp_handlekey'];?>" />
<input type="hidden" name="verifysubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
</form>
<?php } elseif($op == 'related') { if($ra) { ?>
<li id="raid_li_<?php echo $ra['aid'];?>"><input type="hidden" name="raids[]" value="<?php echo $ra['aid'];?>" size="5">[ <?php echo $ra['aid'];?> ] <a href="portal.php?mod=view&amp;aid=<?php echo $ra['aid'];?>" target="_blank"><?php echo $ra['title'];?></a> <a href="javascript:;" onclick="raid_delete(<?php echo $ra['aid'];?>);">删除</a></li>
<?php } } elseif($op == 'pushplus') { ?>
<h3 class="flb">
<em>文章连载</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_G['gp_handlekey'];?>');" class="flbc" title="关闭">关闭</a></span><?php } ?>
</h3>
<form method="post" target="_blank" action="portal.php?mod=portalcp&amp;ac=article&amp;tid=<?php echo $tid;?>&amp;aid=<?php echo $aid;?>">
<div class="c">
<b><?php echo $pushcount;?></b> 个新帖将添加到文章连载。<a href="portal.php?mod=view&amp;aid=<?php echo $aid;?>" target="_blank" class="xi2">(查看文章)</a>
<?php if($pushedcount) { ?><br />提示：<?php echo $pushedcount;?> 个帖子已经在连载中了<?php } ?>
<div id="pushplus_list"><?php if(is_array($pids)) foreach($pids as $pid) { ?><input type="hidden" name="pushpluspids[]" value="<?php echo $pid;?>" />
<?php } ?>
</div>
</div>
<p class="o pns">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="pushplussubmit" value="1" />

<input type="hidden" name="toedit" value="1" />
<button type="submit" class="pn pnc vm"><span>提交</span></button>
</p>
</form>
<?php } elseif($op == 'add_success') { ?>
<div class="nfl">
<div class="f_c altw">
<div class="alert_right">
<p>发布文章成功</p>
<p class="alert_btnleft">
<?php if(!empty($article_add_page_url)) { ?>
<a href="<?php echo $article_add_page_url;?>">为该文章添加分页</a>
<span class="pipe">|</span>
<?php } ?>
<a href="<?php echo $article_add_url;?>">继续发布新文章</a>
<span class="pipe">|</span>
<a href="<?php echo $viewarticleurl;?>">查看文章</a>
</p>
</div>
</div>
</div>
<?php if(!empty($_G['cookie']['clearUserdata']) && $_G['cookie']['clearUserdata'] == 'home') { ?>
<script type="text/javascript">saveUserdata('home', '')</script>
<?php } } else { ?>

<div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="<?php echo $_G['setting']['navs']['1']['filename'];?>"><?php echo $_G['setting']['navs']['1']['navname'];?></a> <em>&rsaquo;</em>
<?php if($catid ) { ?>
<a href="<?php echo $portalcategory[$catid]['caturl'];?>"><?php echo $portalcategory[$catid]['catname'];?></a> <em>&rsaquo;</em>
<?php } if(!empty($aid)) { ?>
<a href="portal.php?mod=portalcp&amp;ac=article&amp;aid=<?php echo $article['aid'];?>">编辑文章</a>
<?php } else { ?>
<a href="portal.php?mod=portalcp&amp;ac=article&amp;catid=<?php echo $catid;?>">发布文章</a>
<?php } ?>
</div>
</div>

<div id="ct" class="ct2_a ct2_a_r wp cl">
<div class="mn" style="float: left;">
<div class="bm bw0">
<h1 class="mt"><?php if(!empty($aid)) { ?>编辑文章<?php } else { ?>发布文章<?php } ?></h1>
<script src="<?php echo $_G['setting']['jspath'];?>calendar.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<form method="post" autocomplete="off" id="articleform" action="portal.php?mod=portalcp&amp;ac=article<?php if($_G['gp_modarticlekey']) { ?>&amp;modarticlekey=<?php echo $_G['gp_modarticlekey'];?><?php } ?>" enctype="multipart/form-data">
<?php if(!empty($_G['setting']['pluginhooks']['portalcp_top'])) echo $_G['setting']['pluginhooks']['portalcp_top'];?>
<div class="dopt cl">
<span class="z mtn">标　　题:&nbsp;</span>
<input type="text" name="title" id="title" class="px" value="<?php echo $article['title'];?>" size="80" />
<input type="button" id="color_style" class="pn colorwd" title="点击选择颜色" fwin="eleStyle" onclick="change_title_color(this.id);" style="background-color:<?php echo $stylecheck['0'];?>" />
<input type="hidden" id="highlight_style_0" name="highlight_style[0]" value="<?php echo $stylecheck['0'];?>" />
<input type="hidden" id="highlight_style_1" name="highlight_style[1]" value="<?php echo $stylecheck['1'];?>" />
<input type="hidden" id="highlight_style_2" name="highlight_style[2]" value="<?php echo $stylecheck['2'];?>" />
<input type="hidden" id="highlight_style_3" name="highlight_style[3]" value="<?php echo $stylecheck['3'];?>" />
<a href="javascript:;" id="highlight_op_1" onclick="switchhl(this, 1)" class="dopt_b<?php if($stylecheck['1']) { ?> cnt<?php } ?>" style="text-decoration:none;font-weight:700" title="文字加粗">B</a>
<a href="javascript:;" id="highlight_op_2" onclick="switchhl(this, 2)" class="dopt_i<?php if($stylecheck['2']) { ?> cnt<?php } ?>" style="text-decoration:none;font-style:italic" title="文字斜体">I</a>
<a href="javascript:;" id="highlight_op_3" onclick="switchhl(this, 3)" class="dopt_l<?php if($stylecheck['3']) { ?> cnt<?php } ?>" style="text-decoration:underline" title="文字加下划线">U</a>
</div>
<div class="dopt mtn cl">
<span class="z mtn">分页标题:&nbsp;</span>
<input type="text" name="pagetitle" id="pagetitle" class="px" value="<?php echo $article_content['title'];?>" size="80" />
</div>
<div class="exfm pns cl">
<div class="sinf sppoll z">
<dl>
<?php if(empty($article['aid'])) { ?>
<dt>自动获取</dt>
<dd>
<span class="ftid">
<select name="from_idtype" id="from_idtype" class="ps">
<option value="tid"<?php echo $idtypes['tid'];?>>帖子 tid</option>
<option value="blogid"<?php echo $idtypes['blogid'];?>>日志 id</option>
</select>
</span>
<script type="text/javascript">simulateSelect('from_idtype', 81);</script>
<input type="text" name="from_id" id="from_id" value="<?php echo $_GET['from_id'];?>" size="8" class="px p_fre vm" />&nbsp;
<button type="button" name="from_button" class="pn vm" onclick="return from_get();"><em>获取</em></button>
<input type="hidden" name="id" value="<?php echo $_GET['from_id'];?>" />
<input type="hidden" name="idtype" value="<?php echo $_GET['from_idtype'];?>" />
</dd>
<?php } ?>
<dt>跳转URL</dt>
<dd><input type="text" class="px p_fre" name="url" value="<?php echo $article['url'];?>" size="30" /></dd>
<dt>原作者</dt>
<dd><input type="text" name="author" class="px p_fre" value="<?php echo $article['author'];?>" size="30" /></dd>
<?php if($_G['cache']['portalcategory'] && $categoryselect) { ?>
<dt>频道栏目</dt>
<dd><div class="ftid"><?php echo $categoryselect;?></div><script type="text/javascript">simulateSelect('catid', 158);</script></dd>
<?php } if($article['aid']) { ?>
<dt>分页管理</dt>
<dd>
<span class="z">保存为第 <?php echo $pageselect;?> 页</span>
<a href="portal.php?mod=portalcp&amp;ac=article&amp;op=addpage&amp;aid=<?php echo $aid;?>" class="y">添加新分页</a>
<?php if($article_content) { ?>
<a href="portal.php?mod=portalcp&amp;ac=article&amp;op=delpage&amp;aid=<?php echo $aid;?>&amp;cid=<?php echo $article_content['cid'];?>" class="y" style="padding-right:10px;">删除分页</a>
<?php } else { ?>
<a href="javascript:history.back();" class="y" style="padding-right:10px;">删除分页</a>
<?php } ?>
<a href=""></a>
<div class="pgm cl"><?php echo $multi;?></div>
</dd>
<?php } ?>
</dl>
</div>
<div class="sadd z">
<dl>
<dt>文章来源</dt>
<dd>
<input type="text" id="from" name="from" class="px p_fre" value="<?php echo $article['from'];?>" <?php if($from_cookie) { ?>size="10"<?php } else { ?>size="30"<?php } ?> />
<?php if($from_cookie) { ?>
<select name="from_cookie" id="from_cookie" class="ps" onchange="$('from').value=this.value;" style="width:96px;">
<option value="" selected>请选择</option><?php if(is_array($from_cookie)) foreach($from_cookie as $var) { ?><option value="<?php echo $var;?>"><?php echo $var;?></option>
<?php } ?>
</select>
<?php } ?>
</dd>
<dt>来源地址</dt>
<dd><input type="text" name="fromurl" class="px p_fre" value="<?php echo $article['fromurl'];?>" size="30" /></dd>
<dt>发布时间</dt>
<dd><input type="text" name="dateline" class="px p_fre" value="<?php echo $article['dateline'];?>" size="30" onclick="showcalendar(event, this, true)" /></dd>
<?php if($category[$catid]['allowcomment']) { ?>
<dt>评论设置</dt>
<dd><label for="ck_allowcomment"><input type="checkbox" name="forbidcomment" id="ck_allowcomment" class="pc" value="1"<?php if(isset($article['allowcomment']) && empty($article['allowcomment'])) { ?>checked="checked"<?php } ?> />禁止评论</label></dd>
<?php } ?>
</dl>
<div><input type="hidden" id="conver" name="conver" value="" /></div>
</div>
<?php if(!empty($_G['setting']['pluginhooks']['portalcp_extend'])) echo $_G['setting']['pluginhooks']['portalcp_extend'];?>
</div>

<div class="pbw">
<script src="<?php echo STATICURL;?>image/editor/editor_function.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<textarea class="userData" name="content" id="uchome-ttHtmlEditor" style="height: 100%; width: 100%; display: none; border: 0px"><?php echo $article_content['content'];?></textarea>
<iframe src="home.php?mod=editor&amp;charset=<?php echo CHARSET;?>&amp;allowhtml=1&amp;isportal=1" name="uchome-ifrHtmlEditor" id="uchome-ifrHtmlEditor" scrolling="no" border="0" frameborder="0" style="width:808px;height:400px;border:1px solid #C5C5C5;position:relative;"></iframe>
</div>

<?php if(!empty($_G['setting']['pluginhooks']['portalcp_middle'])) echo $_G['setting']['pluginhooks']['portalcp_middle'];?>

<div class="bm bml">
<div class="bm_h cl">
<h2>摘要</h2>
</div>
<div class="bm_c"><textarea name="summary" cols="80" class="pt" style="width: 98.7%; height: 51px;"><?php echo $article['summary'];?></textarea></div>
</div>

<div class="bm bml">
<div class="bm_h cl">
<h2>聚合标签</h2>
</div>
<div class="bm_c"><?php if(is_array($article_tags)) foreach($article_tags as $key => $tag) { ?><input type="checkbox" name="tag[<?php echo $key;?>]" id="article_tag_<?php echo $key;?>" class="pc"<?php if($article_tags[$key]) { ?> checked="checked"<?php } ?> />
<label for="article_tag_<?php echo $key;?>" class="lb"><?php echo $tag_names[$key];?></label>
<?php } ?>
</div>
</div>

<?php if($page<2 && $op != 'addpage') { ?>
<div class="exfm">
<h2>添加相关文章 <a id="related_article" href="portal.php?mod=portalcp&amp;ac=related&amp;aid=<?php echo $aid;?>" class="xi2" style="text-decoration: underline;" onclick="showWindow(this.id, this.href+'&catid='+$('catid').value, 'get', 0);return false;">选择</a></h2>
<ul id="raid_div" class="xl">
<?php if($article['related']) { if(is_array($article['related'])) foreach($article['related'] as $ra) { ?><li id="raid_li_<?php echo $ra['aid'];?>"><input type="hidden" name="raids[]" value="<?php echo $ra['aid'];?>" size="5"><a href="portal.php?mod=view&amp;aid=<?php echo $ra['aid'];?>" target="_blank"><?php echo $ra['title'];?></a> (文章 ID: <?php echo $ra['aid'];?>) <a href="javascript:;" onclick="raid_delete(<?php echo $ra['aid'];?>);" class="xg1">删除</a></li>
<?php } } ?>
</ul>
</div>
<?php } ?>

<?php if(!empty($_G['setting']['pluginhooks']['portalcp_bottom'])) echo $_G['setting']['pluginhooks']['portalcp_bottom'];?>

<?php if(checkperm('seccode') && ($secqaacheck || $seccodecheck)) { ?><?php
$sectpl = <<<EOF
<sec> <span id="sec<hash>" onclick="showMenu(this.id)"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div>
EOF;
?>
<div class="exfm pns"><?php $_G['sechashi'] = !empty($_G['cookie']['sechashi']) ? $_G['sechash'] + 1 : 0;
$sechash = 'S'.($_G['inajax'] ? 'A' : '').$_G['sid'].$_G['sechashi'];
$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');
$sectpldefault = $sectpl;
$sectplqaa = str_replace('<hash>', 'qaa'.$sechash, $sectpldefault);
$sectplcode = str_replace('<hash>', 'code'.$sechash, $sectpldefault);
$secshow = !isset($secshow) ? 1 : $secshow;
$sectabindex = !isset($sectabindex) ? 1 : $sectabindex;?><?php
$__STATICURL = STATICURL;$seccheckhtml = <<<EOF

<input name="sechash" type="hidden" value="{$sechash}" />

EOF;
 if($sectpl) { if($secqaacheck) { 
$seccheckhtml .= <<<EOF

{$sectplqaa['0']}验证问答{$sectplqaa['1']}<input name="secanswer" id="secqaaverify_{$sechash}" type="text" autocomplete="off" style="width:100px" class="txt px vm" onblur="checksec('qaa', '{$sechash}')" tabindex="{$sectabindex}" />
<a href="javascript:;" onclick="updatesecqaa('{$sechash}');doane(event);" class="xi2">换一个</a>
<span id="checksecqaaverify_{$sechash}"><img src="{$__STATICURL}image/common/none.gif" width="16" height="16" class="vm" /></span>
{$sectplqaa['2']}<span id="secqaa_{$sechash}"></span>

EOF;
 if($secshow) { 
$seccheckhtml .= <<<EOF
<script type="text/javascript" reload="1">updatesecqaa('{$sechash}');</script>
EOF;
 } 
$seccheckhtml .= <<<EOF

{$sectplqaa['3']}

EOF;
 } if($seccodecheck) { 
$seccheckhtml .= <<<EOF

{$sectplcode['0']}验证码{$sectplcode['1']}<input name="seccodeverify" id="seccodeverify_{$sechash}" type="text" autocomplete="off" style="
EOF;
 if($_G['setting']['seccodedata']['type'] != 1) { 
$seccheckhtml .= <<<EOF
ime-mode:disabled;
EOF;
 } 
$seccheckhtml .= <<<EOF
width:100px" class="txt px vm" onblur="checksec('code', '{$sechash}')" tabindex="{$sectabindex}" />
<a href="javascript:;" onclick="updateseccode('{$sechash}');doane(event);" class="xi2">换一个</a>
<span id="checkseccodeverify_{$sechash}"><img src="{$__STATICURL}image/common/none.gif" width="16" height="16" class="vm" /></span>
{$sectplcode['2']}<span id="seccode_{$sechash}"></span>

EOF;
 if($secshow) { 
$seccheckhtml .= <<<EOF
<script type="text/javascript" reload="1">updateseccode('{$sechash}');</script>
EOF;
 } 
$seccheckhtml .= <<<EOF

{$sectplcode['3']}

EOF;
 } } 
$seccheckhtml .= <<<EOF


EOF;
?><?php unset($secshow);?><?php if(empty($secreturn)) { ?><?php echo $seccheckhtml;?><?php } ?></div>
<?php } ?>

<div class="ptm pbm">
<button type="button" id="issuance" class="pn pnc" name="articlebutton" onclick="validate(this);"><strong>提交</strong></button>
<label><input type="checkbox" name="addpage" class="pc" value="1" />保存并添加新分页</label>
<?php if($article['contents']) { ?><span class="pipe">|</span><label for="ck_showinnernav"><input type="checkbox" name="showinnernav" id="ck_showinnernav" class="pc" value="1"<?php if(!empty($article['showinnernav'])) { ?>checked="checked"<?php } ?> />显示分页导航</label><?php } ?>
</div>

<input type="hidden" id="aid" name="aid" value="<?php echo $article['aid'];?>" />
<input type="hidden" name="cid" value="<?php echo $article_content['cid'];?>" />
<input type="hidden" id="attach_ids" name="attach_ids" value="0" />
<input type="hidden" name="articlesubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
</form>
</div>
</div>
<div class="appl posta">
<h3 class="mbm pbm bbs">上传附件</h3>
<div class="pbm xg1">为当前文章上传图片、文件附件资源。<br>上传完毕后，需要插入到文章内容中才可以显示。</div>
<div id="attachbodyhidden" style="display:none;">
<form method="post" autocomplete="off" id="upload" action="portal.php?mod=portalcp&amp;ac=upload&amp;aid=<?php echo $aid;?>&amp;catid=<?php echo $catid;?>" enctype="multipart/form-data" target="uploadframe">
<input type="file" name="attach" class="pf" size="6" />
<span id="localfile"></span>
<input type="hidden" name="uploadsubmit" id="uploadsubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
</form>
</div>
<div id="attachbody" class="bn"></div>

<script src="<?php echo $_G['setting']['jspath'];?>portal_upload.js?<?php echo VERHASH;?>" type="text/javascript" type="text/javascript"></script>
<iframe id="uploadframe" name="uploadframe" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank"></iframe>
<div class="posta_c">
<div id="attach_image_body" class="bn"><?php echo $article['attach_image'];?></div>
<div id="attach_file_body" class="bn"><?php echo $article['attach_file'];?></div>
</div>
</div>
</div>

<script type="text/javascript">
function from_get() {
var el = $('catid');
var catid = el ? el.value : 0;
window.location.href='portal.php?mod=portalcp&ac=article&from_idtype='+$('from_idtype').value+'&catid='+catid+'&from_id='+$('from_id').value;
return true;
}
function validate(obj) {
var title = $('title');
if(title) {
var slen = strlen(title.value);
if (slen < 1 || slen > 80) {
alert("标题长度(1~80字符)不符合要求");
title.focus();
return false;
}
}
var catObj = $("catid");
if(catObj) {
if (catObj.value < 1) {
alert("请选择系统分类");
catObj.focus();
return false;
}
}
edit_save();
window.onbeforeunload = null;
obj.form.submit();
return false;
}
function raid_add() {
var raid = $('raid').value;
if($('raid_li_'+raid)) {
alert('该文章已经添加过了');
return false;
}
var url = 'portal.php?mod=portalcp&ac=article&op=related&inajax=1&aid=<?php echo $article['aid'];?>&raid='+raid;
var x = new Ajax();
x.get(url, function(s){
s = trim(s);
if(s) {
$('raid_div').innerHTML += s;
} else {
alert('没有找到指定的文章');
return false;
}
});
}
function raid_delete(aid) {
var node = $('raid_li_'+aid);
var p;
if(p = node.parentNode) {
p.removeChild(node);
}
}
function switchhl(obj, v) {
if(parseInt($('highlight_style_' + v).value)) {
$('highlight_style_' + v).value = 0;
obj.className = obj.className.replace(/ cnt/, '');
} else {
$('highlight_style_' + v).value = 1;
obj.className += ' cnt';
}
}
function change_title_color(hlid) {
var showid = hlid;
if(!$(showid + '_menu')) {
var str = '';
var coloroptions = {'0' : '#000', '1' : '#EE1B2E', '2' : '#EE5023', '3' : '#996600', '4' : '#3C9D40', '5' : '#2897C5', '6' : '#2B65B7', '7' : '#8F2A90', '8' : '#EC1282'};
var menu = document.createElement('div');
menu.id = showid + '_menu';
menu.className = 'cmen';
menu.style.display = 'none';
for(var i in coloroptions) {
str += '<a href="javascript:;" onclick="$(\'highlight_style_0\').value=\'' + coloroptions[i] + '\';$(\'' + showid + '\').style.backgroundColor=\'' + coloroptions[i] + '\';hideMenu(\'' + menu.id + '\')" style="background:' + coloroptions[i] + ';color:' + coloroptions[i] + ';">' + coloroptions[i] + '</a>';
}
menu.innerHTML = str;
$('append_parent').appendChild(menu);
}
showMenu({'ctrlid':hlid + '_ctrl','evt':'click','showid':showid});
}
if($('title')) {
$('title').focus();
}
setConver('<?php echo $article['conver'];?>');
</script>

<?php } include template('common/footer'); ?>