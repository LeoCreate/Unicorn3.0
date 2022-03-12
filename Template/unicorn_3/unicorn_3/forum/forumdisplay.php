<?PHP exit('Powered by Unicorn');?>
<!--{template common/header}-->


<!--{if $_G['forum']['ismoderator']}-->
	<script type="text/javascript" src="{$_G[setting][jspath]}forum_moderate.js?{VERHASH}"></script>
<!--{/if}-->
<style id="diy_style" type="text/css"></style>
<!--[diy=diynavtop]--><div id="diynavtop" class="area"></div><!--[/diy]-->
<div id="pt" class="bm cl">
	<div class="z">
		<a href="./" class="nvhm" title="{lang homepage}">$_G[setting][bbname]</a><em>&raquo;</em><a href="forum.php">{$_G[setting][navs][2][navname]}</a>$navigation
	</div>
    <div class="y">
        <!--{if !empty($_G['forum']['picstyle'])}-->
            <!--{if empty($_G['cookie']['forumdefstyle'])}-->
            <style>
            .qth{display:none;}
            .pgs{margin-bottom:10px;}
            </style>
            &nbsp;&nbsp;<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&forumdefstyle=yes" class="chked">{lang thread_mod}</a>
            <!--{else}-->
            &nbsp;&nbsp;<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&forumdefstyle=no" class="unchk">{lang view_thread_imagemode}</a>
            <!--{/if}-->
        <!--{/if}-->
				
		<!--{if !$_GET['archiveid']}--><a href="javascript:;" id="newspecial" {if !$_G['forum']['allowspecialonly'] && empty($_G['forum']['picstyle']) && !$_G['forum']['threadsorts']['required']} onclick="showWindow('newthread', 'forum.php?mod=post&action=newthread&fid=$_G[fid]')"{else} onclick="location.href='forum.php?mod=post&action=newthread&fid=$_G[fid]';return false;"{/if} title="{lang send_posts}"><img src="{IMGDIR}/pn_post.png" alt="{lang send_posts}" /></a><!--{/if}-->
	<!--{hook/forumdisplay_postbutton_top}-->
    </div>
					
</div>

<!--{ad/text/wp a_t}-->
<div class="wp">
	<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>
<div class="boardnav">
	<div id="ct" class="wp cl">
    	<div class="bm bml pbn" style="border-bottom:1px solid #eee; margin-bottom:0;">
				<div class="bm_h cl">
					<span class="y">
						<a href="home.php?mod=spacecp&ac=favorite&type=forum&id=$_G[fid]&handlekey=favoriteforum&formhash={FORMHASH}" id="a_favorite" class="fa_fav" onclick="showWindow(this.id, this.href, 'get', 0);">{lang forum_favorite} <strong class="xi1" id="number_favorite" {if !$_G[forum][favtimes]} style="display:none;"{/if}>(<span id="number_favorite_num">$_G[forum][favtimes]</span>)</strong></a>
						<!--{if rssforumperm($_G['forum']) && $_G[setting][rssstatus] && !$_GET['archiveid'] && !$subforumonly}--><span class="pipe">|</span><a href="forum.php?mod=rss&fid=$_G[fid]&auth=$rssauth" class="fa_rss" target="_blank" title="RSS">{lang rss_subscribe_this}</a><!--{/if}-->
						<!--{if !empty($forumarchive)}-->
							<span class="pipe">|</span><a id="forumarchive" href="javascript:;" class="fa_achv" onmouseover="showMenu(this.id)"><!--{if $_GET['archiveid']}-->$forumarchive[$_GET['archiveid']]['displayname']<!--{else}-->{lang forum_archive}<!--{/if}--></a>
						<!--{/if}-->
						<!--{hook/forumdisplay_forumaction}-->

						<!--{if $_G['forum']['ismoderator']}-->
						<!--{if $_G['forum']['recyclebin']}-->
							<span class="pipe">|</span><a href="{if $_G['adminid'] == 1}admin.php?mod=forum&action=recyclebin&frames=yes{elseif $_G['forum']['ismoderator']}forum.php?mod=modcp&action=recyclebin&fid=$_G[fid]{/if}" class="fa_bin" target="_blank">{lang forum_recyclebin}</a>
						<!--{/if}-->
						<!--{if $_G['forum']['ismoderator'] && !$_GET['archiveid']}-->
							<span class="pipe">|</span><strong>
							<!--{if $_G['forum']['status'] != 3}-->
								<a href="forum.php?mod=modcp&fid=$_G[fid]">{lang modcp}</a>
							<!--{else}-->
								<a href="forum.php?mod=group&action=manage&fid=$_G[fid]">{lang modcp}</a>
							<!--{/if}-->
							</strong>
						<!--{/if}-->
						<!--{hook/forumdisplay_modlink}-->
						<!--{/if}-->
					</span>
					<h1 class="xs2">
						<a href="forum.php?mod=forumdisplay&fid=$_G[fid]" style="font-size:16px;">$_G['forum'][name]</a>
						<!--{if !$subforumonly}--><span class="xs1 xw0 i">{lang index_today}: <strong class="xi1">$_G[forum][todayposts]</strong><!--{if $_G[forum][todayposts]}--><!--{if $_G[forum][todayposts] < $_G[forum][yesterdayposts]}--><b class="ico_fall">&nbsp;</b><!--{else}--><b class="ico_increase">&nbsp;</b><!--{/if}--><!--{/if}--><span class="pipe">|</span>{lang index_threads}: <strong class="xi1">$_G[forum][threads]</strong><!--{if $_G[forum][rank]}--><span class="pipe">|</span>{lang rank}: <strong class="xi1" title="{lang previous_rank}:$_G[forum][oldrank]">$_G[forum][rank]</strong><!--{if $_G[forum][rank] <= $_G[forum][oldrank]}--><b class="ico_increase">&nbsp;</b><!--{else}--><b class="ico_fall">&nbsp;</b><!--{/if}--><!--{/if}--></span><!--{/if}-->
					</h1>
				</div>
				<!--{if (!empty($_G[forum][domain]) && !empty($_G['setting']['domain']['root']['forum'])) || $moderatedby || ($_G['page'] == 1 && $_G['forum']['rules'])}-->
					<div class="bm_c cl pbn">
						<!--{if !empty($_G[forum][domain]) && !empty($_G['setting']['domain']['root']['forum'])}-->
							<div class="pbn">{lang forum_domain}: <a href="http://{$_G[forum][domain]}.{$_G['setting']['domain']['root']['forum']}" id="group_link">http://{$_G[forum][domain]}.{$_G['setting']['domain']['root']['forum']}</a></div>
						<!--{/if}-->
						<!--{if $moderatedby}--><div>{lang forum_modedby}: <span class="xi2">$moderatedby</span></div><!--{/if}-->
						<!--{if $_G['page'] == 1 && $_G['forum']['rules']}-->
							<div id="forum_rules_{$_G[fid]}" style="$collapse['forum_rules'];">
								<div class="ptn xg2">$_G['forum'][rules]</div>
							</div>
						<!--{/if}-->
					</div>
				<!--{/if}-->
				<!--{if !empty($forumarchive)}-->
					<div id="forumarchive_menu" class="p_pop" style="display:none">
						<ul>
							<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]">{lang threads_all}</a></li>
							<!--{loop $forumarchive $id $info}-->
							<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&archiveid=$id">{$info['displayname']} ({$info['threads']})</a></li>
							<!--{/loop}-->
						</ul>
					</div>
				<!--{/if}-->
			</div>
    	<div class="sd cl">
        	<div class="q-forum-d">
            <!--{if $subexists && $_G['page'] == 1}--><!--{template forum/forumdisplay_subforum}--><!--{/if}-->
            <!--{if ($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) || count($_G['forum']['threadsorts']['types']) > 0}-->
            <div class="q_bm">
                <div class="q_bm_c">	
					<ul id="thread_types" class="ttp cl">
						<li id="ttp_all" {if !$_GET['typeid'] && !$_GET['sortid']}class="xw1 a"{/if}><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_G['forum']['threadsorts']['defaultshow']}&filter=sortall&sortall=1{/if}{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang forum_viewall}</a></li>
                        <li class="xi2{if $_GET['filter'] == 'lastpost'} a{/if}"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=lastpost&orderby=lastpost$forumdisplayadd[lastpost]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang latest}</a>&nbsp;</li>
						<li class="xi2{if $_GET['filter'] == 'hot'} a{/if}"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=hot">{lang hot_thread}</a>&nbsp;</li>
						<li class="xi2{if $_GET['filter'] == 'digest'} a{/if}"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=digest&digest=1$forumdisplayadd[digest]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang digest_posts}</a>&nbsp;</li>
						<!--{hook/forumdisplay_threadtype_inner}-->
						
						<!--{if $_G['forum']['threadtypes']}-->
							<!--{loop $_G['forum']['threadtypes']['types'] $id $name}-->
								<!--{if $_GET['typeid'] == $id}-->
								<li class="xw1 a"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['sortid']}&filter=sortid&sortid=$_GET['sortid']{/if}{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}"><!--{if $_G[forum][threadtypes][icons][$id] && $_G['forum']['threadtypes']['prefix'] == 2}--><img class="vm" src="$_G[forum][threadtypes][icons][$id]" alt="" /> <!--{/if}-->$name</a></li>
								<!--{else}-->
								<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=typeid&typeid=$id$forumdisplayadd[typeid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}"><!--{if $_G[forum][threadtypes][icons][$id] && $_G['forum']['threadtypes']['prefix'] == 2}--><img class="vm" src="$_G[forum][threadtypes][icons][$id]" alt="" /> <!--{/if}-->$name</a></li>
								<!--{/if}-->
							<!--{/loop}-->
						<!--{/if}-->

						<!--{if $_G['forum']['threadsorts']}-->
							<!--{if $_G['forum']['threadtypes']}--><li><span class="pipe">|</span></li><!--{/if}-->
							<!--{loop $_G['forum']['threadsorts']['types'] $id $name}-->
								<!--{if $_GET['sortid'] == $id}-->
								<li class="xw1 a"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['typeid']}&filter=typeid&typeid=$_GET['typeid']{/if}{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">$name</a></li>
								<!--{else}-->
								<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=sortid&sortid=$id$forumdisplayadd[sortid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">$name</a></li>
								<!--{/if}-->
							<!--{/loop}-->
						<!--{/if}-->
						<!--{hook/forumdisplay_filter_extra}-->
                        
					</ul>
				
                </div>
			</div>
            <!--{/if}-->
		
			
			<!--{hook/forumdisplay_side_bottom}-->
		</div>
        </div>
		<div class="mn cl">

			<!--{hook/forumdisplay_top}-->

			<div class="drag">
				<!--[diy=diy4]--><div id="diy4" class="area"></div><!--[/diy]-->
			</div>

			<!--{hook/forumdisplay_middle}-->

			<!--{if !$subforumonly}-->

				<!--{if $threadmodcount}--><div class="bm"><div class="ntc_l hm xi2"><strong>{lang forum_moderate_unhandled}</strong></div></div><!--{/if}-->

				<!--{if $livethread}-->
					<div id="livethread" class="tl bm bmw cl" style="padding:10px 15px;">
						<div class="livethreadtitle vm">
							<span class="replynumber xg1">{lang reply} <span id="livereplies" class="xi1">$livethread[replies]</span></span>
							<a href="forum.php?mod=viewthread&tid=$livethread[tid]" target="_blank">$livethread[subject]</a> <img src="{IMGDIR}/livethreadtitle.png" />
						</div>
						<div class="livethreadcon">$livemessage</div>
						<div id="livereplycontentout">
							<div id="livereplycontent">
							</div>
						</div>
						<div id="liverefresh">{lang forum_live_newreply_refresh}</div>
						<div id="livefastreply">
							<form id="livereplypostform" method="post" action="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$livethread[tid]&replysubmit=yes&infloat=yes&handlekey=livereplypost&inajax=1" onsubmit="return livereplypostvalidate(this)">
								<div id="livefastcomment">
									<textarea id="livereplymessage" name="message" style="color:gray;<!--{if !$liveallowpostreply}-->display:none;<!--{/if}-->">{lang forum_live_fastreply_notice}</textarea>
									<!--{if !$liveallowpostreply}-->
										<div>
											<!--{if !$_G[uid]}-->
												{lang login_to_reply} <a href="member.php?mod=logging&action=login" onclick="showWindow('login', this.href)" class="xi2">{lang login}</a> | <a href="member.php?mod={$_G[setting][regname]}" class="xi2">$_G['setting']['reglinkname']</a>
											<!--{else}-->
												{lang no_permission_to_post}<a href="javascript:;" onclick="ajaxpost('livereplypostform', 'livereplypostreturn', 'livereplypostreturn', 'onerror', $('livereplysubmit'));" class="xi2">{lang click_to_show_reason}</a>
											<!--{/if}-->
										</div>
									<!--{/if}-->
								</div>
								<div id="livepostsubmit" style="display:none;">
								<!--{if $secqaacheck || $seccodecheck}-->
									<!--{block sectpl}--><sec> <span id="sec<hash>" onclick="showMenu(this.id)"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div><!--{/block}-->
									<div class="mtm sec" style="text-align:right;"><!--{subtemplate common/seccheck}--></div>
								<!--{/if}-->
								<p class="ptm pnpost" style="margin-bottom:10px;">
								<button type="submit" name="replysubmit" class="pn pnc vm" style="float:right;" value="replysubmit" id="livereplysubmit">
									<strong>{lang forum_live_post}</strong>
								</button>
								</p>
								</div>
								<input type="hidden" name="formhash" value="{FORMHASH}">
								<input type="hidden" name="subject" value="  ">
							</form>
						</div>
						<span id="livereplypostreturn"></span>
					</div>
					<script type="text/javascript">
						var postminchars = parseInt('$_G['setting']['minpostsize']');
						var postmaxchars = parseInt('$_G['setting']['maxpostsize']');
						var disablepostctrl = parseInt('{$_G['group']['disablepostctrl']}');
						var replycontentlist = new Array();
						var addreplylist = new Array();
						var timeoutid = timeid = movescrollid = waitescrollid = null;
						var replycontentnum = 0;
						getnewlivepostlist(1);
						timeid = setInterval(getnewlivepostlist, 5000);
						$('livereplycontent').style.position = 'absolute';
						$('livereplycontent').style.width = ($('livereplycontentout').clientWidth - 50) + 'px';
						$('livereplymessage').onfocus = function() {
							if(this.style.color == 'gray') {
								this.value = '';
								this.style.color = 'black';
								$('livepostsubmit').style.display = 'block';
								this.style.height = '56px';
								$('livefastcomment').style.height = '57px';
							}
						};
						$('livereplymessage').onblur = function() {
							if(this.value == '') {
								this.style.color = 'gray';
								this.value = '{lang forum_live_fastreply_notice}';
							}
						};

						$('liverefresh').onclick = function() {
							$('livereplycontent').style.position = 'absolute';
							getnewlivepostlist();
							this.style.display = 'none';
						};

						$('livereplycontentout').onmouseover = function(e) {

							if($('livereplycontent').style.position == 'absolute' && $('livereplycontent').clientHeight > 215) {
								$('livereplycontent').style.position = 'static';
								this.scrollTop = this.scrollHeight;
							}

							if(this.scrollTop + this.clientHeight != this.scrollHeight) {
								clearInterval(timeid);
								clearTimeout(timeoutid);
								clearInterval(movescrollid);
								timeid = timeoutid = movescrollid = null;

								if(waitescrollid == null) {
									waitescrollid = setTimeout(function() {
										$('liverefresh').style.display = 'block';
									}, 60000 * 10);
								}
							} else {
								clearTimeout(waitescrollid);
								waitescrollid = null;
							}
						};

						$('livereplycontentout').onmouseout = function(e) {
							if(this.scrollTop + this.clientHeight == this.scrollHeight) {
								$('livereplycontent').style.position = 'absolute';
								clearInterval(timeid);
								timeid = setInterval(getnewlivepostlist, 10000);
							}
						};

						function getnewlivepostlist(first) {
							var x = new Ajax('JSON');
							x.getJSON('forum.php?mod=misc&action=livelastpost&fid=$livethread[fid]', function(s, x) {
								var count = s.data.count;
								$('livereplies').innerHTML = count;
								var newpostlist = s.data.list;
								for(i in newpostlist) {
									var postid = i;
									var postcontent = '';
									postcontent += newpostlist[i].authorid ? '<dt><a href="home.php?mod=space&uid=' + newpostlist[i].authorid + '" target="_blank">' + newpostlist[i].avatar + '</a></dt>' : '<dt></dt>';
									postcontent += newpostlist[i].authorid ? '<dd><a href="home.php?mod=space&uid=' + newpostlist[i].authorid + '" target="_blank">' + newpostlist[i].author + '</a></dd>' : '<dd>' + newpostlist[i].author + '</dd>';
									postcontent += '<dd>' + newpostlist[i].message + '</dd>';
									postcontent += '<dd class="dateline">' + newpostlist[i].dateline + '</dd>';
									if(replycontentlist[postid]) {
										$('livereply_' + postid).innerHTML = postcontent;
										continue;
									}
									addreplylist[postid] = '<dl id="livereply_' + postid + '">' + postcontent + '</dl>';
								}
								if(first) {
									for(i in addreplylist) {
										replycontentlist[i] = addreplylist[i];
										replycontentnum++;
										var div = document.createElement('div');
										div.innerHTML = addreplylist[i];
										$('livereplycontent').appendChild(div);
										delete addreplylist[i];
									}
								} else {
									livecontentfacemove();
								}
							});
						}

						function livecontentfacemove() {
							//note 从队列中取出数据
							var reply = '';
							for(i in addreplylist) {
								reply = replycontentlist[i] = addreplylist[i];
								replycontentnum++;
								delete addreplylist[i];
								break;
							}
							if(reply) {
								var div = document.createElement('div');
								div.innerHTML = reply;
								var oldclientHeight = $('livereplycontent').clientHeight;
								$('livereplycontent').appendChild(div);
								$('livereplycontentout').style.overflowY = 'hidden';
								$('livereplycontent').style.bottom = oldclientHeight - $('livereplycontent').clientHeight + 'px';

								if(replycontentnum > 20) {
									$('livereplycontent').removeChild($('livereplycontent').firstChild);
									for(i in replycontentlist) {
										delete replycontentlist[i];
										break;
									}
									replycontentnum--;
								}

								if(!movescrollid) {
									movescrollid = setInterval(function() {
										if(parseInt($('livereplycontent').style.bottom) < 0) {
											$('livereplycontent').style.bottom =
												((parseInt($('livereplycontent').style.bottom) + 5) > 0 ? 0 : (parseInt($('livereplycontent').style.bottom) + 5)) + 'px';
										} else {
											$('livereplycontentout').style.overflowY = 'auto';
											clearInterval(movescrollid);
											movescrollid = null;
											timeoutid = setTimeout(livecontentfacemove, 1000);
										}
									}, 100);
								}
							}
						}

						function livereplypostvalidate(theform) {
							var s;
							if(theform.message.value == '' || $('livereplymessage').style.color == 'gray') {
								s = '{lang forum_live_nocontent_error}';
							}
							if(!disablepostctrl && ((postminchars != 0 && mb_strlen(theform.message.value) < postminchars) || (postmaxchars != 0 && mb_strlen(theform.message.value) > postmaxchars))) {
								s = {lang forum_live_nolength_error};
							}
							if(s) {
								showError(s);
								doane();
								$('livereplysubmit').disabled = false;
								return false;
							}
							$('livereplysubmit').disabled = true;
							theform.message.value = theform.message.value.replace(/([^>=\]"'\/]|^)((((https?|ftp):\/\/)|www\.)([\w\-]+\.)*[\w\-\u4e00-\u9fa5]+\.([\.a-zA-Z0-9]+|\u4E2D\u56FD|\u7F51\u7EDC|\u516C\u53F8)((\?|\/|:)+[\w\.\/=\?%\-&~`@':+!]*)+\.(jpg|gif|png|bmp))/ig, '$1[img]$2[/img]');
							theform.message.value = parseurl(theform.message.value);
							ajaxpost('livereplypostform', 'livereplypostreturn', 'livereplypostreturn', 'onerror', $('livereplysubmit'));
							return false;
						}

						function succeedhandle_livereplypost(url, msg, param) {
							$('livereplymessage').value = '';
							$('livereplycontent').style.position = 'absolute';
							if(param['sechash']) {
								updatesecqaa(param['sechash']);
								updateseccode(param['sechash']);
							}
							getnewlivepostlist();
						}
					</script>
				<!--{/if}-->


				<!--{hook/forumdisplay_threadtype_extra}-->
				<!--{if empty($_G['forum']['sortmode'])}-->
					<!--{subtemplate forum/forumdisplay_list}-->
				<!--{else}-->
					<!--{subtemplate forum/forumdisplay_sort}-->
				<!--{/if}-->
			<!--{/if}-->
			<!--[diy=diyfastposttop]--><div id="diyfastposttop" class="area"></div><!--[/diy]-->
			<!--{if $fastpost}-->
				<!--{template forum/forumdisplay_fastpost}-->
			<!--{/if}-->

			<!--{hook/forumdisplay_bottom}-->
			<!--[diy=diyforumdisplaybottom]--><div id="diyforumdisplaybottom" class="area"></div><!--[/diy]-->
		</div>

	</div>
</div>
<!--{if $_G['group']['allowpost'] && ($_G['group']['allowposttrade'] || $_G['group']['allowpostpoll'] || $_G['group']['allowpostreward'] || $_G['group']['allowpostactivity'] || $_G['group']['allowpostdebate'] || $_G['setting']['threadplugins'] || $_G['forum']['threadsorts'])}-->
	<ul class="p_pop" id="newspecial_menu" style="display: none">
		<!--{if !$_G['forum']['allowspecialonly']}--><li><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]">{lang post_newthread}</a></li><!--{/if}-->
		<!--{if $_G['forum']['threadsorts'] && !$_G['forum']['allowspecialonly']}-->
			<!--{loop $_G['forum']['threadsorts']['types'] $id $threadsorts}-->
				<!--{if $_G['forum']['threadsorts']['show'][$id]}-->
					<li class="popupmenu_option"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&extra=$extra&sortid=$id">$threadsorts</a></li>
				<!--{/if}-->
			<!--{/loop}-->
		<!--{/if}-->
		<!--{if $_G['group']['allowpostpoll']}--><li class="poll"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=1">{lang post_newthreadpoll}</a></li><!--{/if}-->
		<!--{if $_G['group']['allowpostreward']}--><li class="reward"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=3">{lang post_newthreadreward}</a></li><!--{/if}-->
		<!--{if $_G['group']['allowpostdebate']}--><li class="debate"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=5">{lang post_newthreaddebate}</a></li><!--{/if}-->
		<!--{if $_G['group']['allowpostactivity']}--><li class="activity"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=4">{lang post_newthreadactivity}</a></li><!--{/if}-->
		<!--{if $_G['group']['allowposttrade']}--><li class="trade"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=2">{lang post_newthreadtrade}</a></li><!--{/if}-->
		<!--{if $_G['setting']['threadplugins']}-->
			<!--{loop $_G['forum']['threadplugin'] $tpid}-->
				<!--{if array_key_exists($tpid, $_G['setting']['threadplugins']) && @in_array($tpid, $_G['group']['allowthreadplugin'])}-->
					<li class="popupmenu_option"{if $_G['setting']['threadplugins'][$tpid][icon]} style="background-image:url(source/plugin/$tpid/$_G[setting][threadplugins][$tpid][icon])"{/if}><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&specialextra=$tpid">{$_G[setting][threadplugins][$tpid][name]}</a></li>
				<!--{/if}-->
			<!--{/loop}-->
		<!--{/if}-->
	</ul>
<!--{/if}-->

<!--{if $_G['setting']['visitedforums'] && $_G['forum']['status'] != 3}-->
	<div id="visitedforums_menu" class="p_pop blk cl" style="display: none;">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<td id="v_forums">
					<h3 class="mbn pbn bbda xg1">{lang viewed_forums}</h3>
					<ul class="xl xl1">
						$_G['setting']['visitedforums']
					</ul>
				</td>
			</tr>
		</table>
	</div>
<!--{/if}-->
<!--{if $_G['setting']['threadmaxpages'] > 1 && $page && !$subforumonly}-->
	<script type="text/javascript">document.onkeyup = function(e){keyPageScroll(e, <!--{if $page > 1}-->1<!--{else}-->0<!--{/if}-->, <!--{if $page < $_G['setting']['threadmaxpages'] && $page < $_G['page_next']}-->1<!--{else}-->0<!--{/if}-->, 'forum.php?mod=forumdisplay&fid={$_G[fid]}&filter={$filter}&orderby={$_GET[orderby]}{$forumdisplayadd[page]}&{$multipage_archive}', $page);}</script>
<!--{/if}-->

<!--{if empty($_G['forum']['picstyle']) && $_GET['orderby'] == 'lastpost' && empty($_GET['filter']) }-->
	<script type="text/javascript">checkForumnew_handle = setTimeout(function () {checkForumnew($_G[fid], lasttime);}, checkForumtimeout);</script>
<!--{/if}-->
<div class="wp mtn">
	<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>
<div style="display:none">
<!--{hook/forumdisplay_leftside_top}-->

<!--{hook/forumdisplay_leftside_bottom}-->

<!--{hook/forumdisplay_side_top}-->
</div>
<!--{if empty($_G['setting']['disfixednv_forumdisplay']) }--><script>fixed_top_nv();</script><!--{/if}-->
<!--{template common/footer}-->

