<?PHP exit('Powered by Unicorn');?>
<!--{template common/header}-->

<!--{if empty($gid)}-->
	<!--{ad/text/wp a_t}-->
<!--{/if}-->

	<style id="diy_style" type="text/css"></style>
<div id="chart" class="cl">
    <p class="chart z">{lang index_today}: <em>$todayposts</em><span class="pipe">|</span>{lang index_yesterday}: <em>$postdata[0]</em><span class="pipe">|</span>{lang index_posts}: <em>$posts</em><span class="pipe">|</span>{lang index_members}: <em>$_G['cache']['userstats']['totalmembers']</em><!--{if $_G['cache']['userstats']['newsetuser']}--><span class="pipe">|</span>{lang welcome_new_members}: <em><a href="home.php?mod=space&username={echo rawurlencode($_G['cache']['userstats']['newsetuser'])}" target="_blank" class="xi2">$_G['cache']['userstats']['newsetuser']</a></em><!--{/if}--></p>
    <div class="y">
        <!--{hook/index_nav_extra}-->
        <!--{if $_G['uid']}--><a href="forum.php?mod=guide&view=my" title="{lang my_posts}" class="xi2">{lang my_posts}</a><!--{/if}--><!--{if !empty($_G['setting']['search']['forum']['status'])}--><!--{if $_G['uid']}--><span class="pipe">|</span><!--{/if}--><a href="forum.php?mod=guide&view=new" title="{lang show_newthreads}" class="xi2">{lang show_newthreads}</a><!--{/if}-->
    </div>
</div>
      
<div class="qing_index_main wp cl">
    
<div class="q_bbs_top cl">
	<div class="q_bbs_topl cl">
    	<!--[diy=q_bbs_diy1]--><div id="q_bbs_diy1" class="area"></div><!--[/diy]-->
    </div>
    <div class="q_bbs_topm">
    	<!--[diy=q_bbs_diy2]--><div id="q_bbs_diy2" class="area"></div><!--[/diy]-->
    </div>
</div>

<script type="text/javascript">
q_jq(".q_topltslide").slide({titCell:".num li",mainCell:".pic",effect:"fold",autoPlay:true,trigger:"click",startFun:function(i){q_jq(".q_topltslide .txt li").eq(i).animate({"bottom":0}).siblings().animate({"bottom":-40})}});
</script>

<!--{if empty($gid) && $announcements}-->
<div class="qing_gonggao z cl">
    <div id="an">
        <dl class="cl">
            <dt class="z xw1">{lang announcements}:&nbsp;</dt>
            <dd>
                <div id="anc"><ul id="ancl">$announcements</ul></div>
            </dd>
        </dl>
    </div>
    <script type="text/javascript">announcement();</script>
</div>
<!--{/if}-->

	<div class="main_l cl">
    	<!--{hook/index_catlist_top}-->
        <!--{loop $catlist $key $cat}-->
        		<div class="bm_h qing_new_bmh cl">
					<!--{if $cat['moderators']}--><span class="y">{lang forum_category_modedby}: $cat[moderators]</span><!--{/if}-->
					<!--{eval $caturl = !empty($cat['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$cat['domain'].'.'.$_G['setting']['domain']['root']['forum'] : '';}-->
					<h2><a href="{if !empty($caturl)}$caturl{else}forum.php?gid=$cat[fid]{/if}" style="{if $cat[extra][namecolor]}color: {$cat[extra][namecolor]};{/if}">$cat[name]</a></h2>
				</div>
                <div class="qing_baklist cl" style="margin-bottom:20px;"><ul>
<!--{loop $cat[forums] $forumid}-->
						<!--{eval $forum=$forumlist[$forumid];}-->
						<!--{eval $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];}-->
        <li onMouseOver="this.className='lihover cl'" onmouseout="this.className='cl'">
            <div class="item"><!--{if $forum[icon]}-->$forum[icon]<!--{else}--><a href="$forumurl"><img src="{$_G['style']['styleimgdir']}/logo.png" /></a><!--{/if}--></div>
            <a href="$forumurl"{if $forum[redirect]} target="_blank"{/if}{if $forum[extra][namecolor]} style="color: {$forum[extra][namecolor]};"{/if} class="name {if !$forum[description]}name1{/if}"><span>$forum[name]</span></a>
            <!--{if $forum[todayposts] && !$forum['redirect']}--><em class="newpost">$forum[todayposts]</em><!--{/if}-->
            <!--{if $forum[description]}--><span class="desc">$forum[description]</span><!--{/if}-->
            <!--{if empty($forum[redirect])}--><span class="abstract">{lang forum_threads} <em><!--{echo dnumber($forum[threads])}--></em>, {lang forum_posts} <em><!--{echo dnumber($forum[posts])}--></em><a href="$forumurl" class="q_enter">{lang nav_forum}</a></span><!--{/if}-->
        </li>
<!--{/loop}-->
</ul></div>
<!--{/loop}-->
        
    </div>
    
</div>

<div>
	<!--[diy=diy_chart]--><div id="diy_chart" class="area"></div><!--[/diy]-->
	<div class="mn">
		<!--{hook/index_middle}-->
		<div class="wp mtn">
			<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
		</div>
        
        <!--{if empty($gid) && $_G['setting']['whosonlinestatus']}-->
			<div id="online" class="bm oll">
				<div class="bm_h">
				<!--{if $detailstatus}-->
					<span class="o"><a href="forum.php?showoldetails=no#online" title="{lang spread}"><img src="{IMGDIR}/collapsed_no.gif" alt="{lang spread}" /></a></span>
					<h3>
						<strong><a href="home.php?mod=space&do=friend&view=online&type=member">{lang onlinemember}</a></strong>
						<span class="xs1">- <strong>$onlinenum</strong> {lang onlines}
						- <strong>$membercount</strong> {lang index_members}(<strong>$invisiblecount</strong> {lang index_invisibles}),
						<strong>$guestcount</strong> {lang index_guests}
						- {lang index_mostonlines} <strong>$onlineinfo[0]</strong> {lang on} <strong>$onlineinfo[1]</strong>.</span>
					</h3>
				<!--{else}-->
					<!--{if empty($_G['setting']['sessionclose'])}-->
						<span class="o"><a href="forum.php?showoldetails=yes#online" title="{lang spread}"><img src="{IMGDIR}/collapsed_yes.gif" alt="{lang spread}" /></a></span>
					<!--{/if}-->
					<h3>
						<strong>
							<!--{if !empty($_G['setting']['whosonlinestatus'])}-->
								{lang onlinemember}
							<!--{else}-->
								<a href="home.php?mod=space&do=friend&view=online&type=member">{lang onlinemember}</a>
							<!--{/if}-->
						</strong>
						<span class="xs1">- {lang total} <strong>$onlinenum</strong> {lang onlines}
						<!--{if $membercount}-->- <strong>$membercount</strong> {lang index_members},<strong>$guestcount</strong> {lang index_guests}<!--{/if}-->
						- {lang index_mostonlines} <strong>$onlineinfo[0]</strong> {lang on} <strong>$onlineinfo[1]</strong>.</span>
					</h3>
				<!--{/if}-->
				</div>
			<!--{if $_G['setting']['whosonlinestatus'] && $detailstatus}-->
				<dl id="onlinelist" class="bm_c">
					<dt class="ptm pbm bbda">$_G[cache][onlinelist][legend]</dt>
					<!--{if $detailstatus}-->
						<dd class="ptm pbm">
						<ul class="cl">
						<!--{if $whosonline}-->
							<!--{loop $whosonline $key $online}-->
								<li title="{lang time}: $online[lastactivity]">
								<img src="{STATICURL}image/common/$online[icon]" alt="icon" />
								<!--{if $online['uid']}-->
									<a href="home.php?mod=space&uid=$online[uid]">$online[username]</a>
								<!--{else}-->
									$online[username]
								<!--{/if}-->
								</li>
							<!--{/loop}-->
						<!--{else}-->
							<li style="width: auto">{lang online_only_guests}</li>
						<!--{/if}-->
						</ul>
					</dd>
					<!--{/if}-->
				</dl>
			<!--{/if}-->
			</div>
		<!--{/if}-->

		<!--{if empty($gid) && ($_G['cache']['forumlinks'][0] || $_G['cache']['forumlinks'][1] || $_G['cache']['forumlinks'][2])}-->
		<div class="bm lk" style=" font-size:14px; border-top:1px solid #eee;">
			<div id="category_lk" class="bm_c ptm">
				<!--{if $_G['cache']['forumlinks'][0]}-->
					<ul class="m mbn cl">$_G['cache']['forumlinks'][0]</ul>
				<!--{/if}-->
				<!--{if $_G['cache']['forumlinks'][1]}-->
					<div class="mbn cl">
						$_G['cache']['forumlinks'][1]
					</div>
				<!--{/if}-->
				<!--{if $_G['cache']['forumlinks'][2]}-->
					<ul class="x mbm cl">
						$_G['cache']['forumlinks'][2]
					</ul>
				<!--{/if}-->
			</div>
		</div>
		<!--{/if}-->

		<!--{hook/index_bottom}-->
	</div>

	<!--{if $_G['setting']['forumallowside']}-->
		<div id="sd" class="sd">
			<!--{hook/index_side_top}-->
			<div class="drag">
				<!--[diy=diy2]--><div id="diy2" class="area"></div><!--[/diy]-->
			</div>
			<!--{hook/index_side_bottom}-->
		</div>
	<!--{/if}-->
</div>
<div style="display:none">
<!--{hook/index_status_extra}-->

<!--{hook/index_top}-->

<!--{hook/index_followcollection_extra $colletion[ctid]}-->

<!--{hook/index_favforum_extra $forum[fid]}-->

<!--{hook/index_favforum_extra $forum[fid]}-->

<!--{hook/index_catlist $cat[fid]}-->

<!--{hook/index_forum_extra $forum[fid]}-->

<!--{hook/index_forum_extra $forum[fid]}-->

<!--{hook/index_datacollection_extra $colletion[ctid]}-->
</div>
<!--{if $_G['group']['radminid'] == 1}-->
	<!--{eval helper_manyou::checkupdate();}-->
<!--{/if}-->
<!--{if empty($_G['setting']['disfixednv_forumindex']) }--><script>fixed_top_nv();</script><!--{/if}-->
<!--{template common/footer}-->

