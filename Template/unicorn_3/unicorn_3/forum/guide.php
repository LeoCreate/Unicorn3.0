<?PHP exit('Powered by Unicorn');?>
<!--{template common/header}-->
<style type="text/css">
	.xl2 { background: url({IMGDIR}/vline.png) repeat-y 50% 0; }
		.xl2 li { width: 49.9%; }
			.xl2 li em { padding-right: 10px; }
				.xl2 .xl2_r em { padding-right: 0; }
			.xl2 .xl2_r i { padding-left: 10px; }
			.ttp a, .ttp strong {padding: 6px 20px 8px; font-size:14px;}
</style>
<div id="pt" class="bm cl">
	<div class="z">
		<a href="./" class="nvhm" title="{lang homepage}">$_G[setting][bbname]</a><!--{if helper_access::check_module('guide')}--><em>&raquo;</em><a href="forum.php?mod=guide&view=index">{lang guide}</a><!--{/if}-->$navigation
	</div>
</div>
<div class="boardnav">
	<div id="ct" class="wp cl{if $_G['forum']['allowside']} ct2{/if}"{if $leftside} style="margin-left:{$_G['leftsidewidth_mwidth']}px"{/if}>
		<div class="mn">

			<ul id="thread_types" class="ttp bm cl" style="padding:10px 10px 0 10px;">
				<li $currentview['hot']><a href="forum.php?mod=guide&view=hot">{lang guide_hot}</a></li>
				<li $currentview['digest']><a href="forum.php?mod=guide&view=digest">{lang guide_digest}</a></li>
				<li $currentview['new']><a href="forum.php?mod=guide&view=new">{lang guide_new}</a></li>
				<li $currentview['newthread']><a href="forum.php?mod=guide&view=newthread">{lang guide_newthread}</a></li>
				<li $currentview['sofa']><a href="forum.php?mod=guide&view=sofa">{lang guide_sofa}</a></li>
				<li $currentview['my']><a id="filter_special" href="forum.php?mod=guide&view=my" onmouseover="showMenu(this.id)">{lang guide_my}</a></li>
				<!--{hook/guide_nav_extra}-->
			</ul>
			<!--{hook/guide_top}-->
			<!--{if $view == 'index'}-->
				<!--{loop $data $key $list}-->
				<div class="bm bmw">
					<div class="bm_h">
						<a href="forum.php?mod=guide&view=$key" class="y xi2">{lang more} &raquo;</a>
						<h2>
							<!--{if $key == 'hot'}-->{lang guide_hot}<!--{elseif $key == 'digest'}-->{lang guide_digest}<!--{elseif $key == 'newthread'}-->{lang guide_newthread}<!--{elseif $key == 'new'}-->{lang guide_new}<!--{elseif $key == 'my'}-->{lang guide_my}<!--{/if}-->
						</h2>
					</div>
					 <div class="bm_c">
					 	<div class="xl xl2 cl">
					 		<!--{if $list['threadcount']}-->
					 			<!--{eval $i=0;}-->
					 			<!--{loop $list['threadlist'] $thread}-->
					 			<!--{eval $i++;$newtd=$i%2;}-->
					 			<li{if !$newtd} class="xl2_r"{/if}>
						 			<em>
							 			<!--{if $key == 'hot'}--><span class="xi1">$thread['heats']{lang guide_attend}</span><!--{/if}-->
							 			<!--{if $key == 'new'}-->$thread['lastpost']<!--{/if}-->
						 			</em>
						 			
						 			<i>&middot; <a href="forum.php?mod=viewthread&tid=$thread[tid]&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra"$thread[highlight] target="_blank">$thread[subject]</a></i>&nbsp;<span class="xg1"><a href="forum.php?mod=forumdisplay&fid=$thread[fid]" target="_blank">$list['forumnames'][$thread[fid]]['name']</a></span>
					 			</li>
					 			<!--{/loop}-->
					 		<!--{else}-->
					 				<p class="emp">{lang guide_nothreads}</p>
					 		<!--{/if}-->
					 	</div>
					</div>
				</div>
				<!--{/loop}-->
			<!--{else}-->
				<!--{loop $data $key $list}-->
				<div id="threadlist" class="tl bm bmw"{if $_G['uid']} style="position: relative;"{/if}>
					<div class="th qth">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <th colspan="{if !$_GET['archiveid'] && $_G['forum']['ismoderator']}3{else}2{/if}">
                                    <div class="tf">
                                        {lang author}&nbsp;&nbsp;&nbsp;{lang thread}{lang title} ( <!--{if $key == 'hot'}-->{lang guide_hot}<!--{elseif $key == 'digest'}-->{lang guide_digest}<!--{elseif $key == 'newthread'}-->{lang guide_newthread}<!--{elseif $key == 'new'}-->{lang guide_new}<!--{elseif $key == 'my'}-->{lang guide_my}<!--{else}-->{lang guide_sofa}<!--{/if}--> ) 
                                    </div>
                                </th>
                
                                    <!--{if CURMODULE == 'guide'}-->
                                        <td class="by">{lang forum_group}</td>
                                    <!--{/if}-->
                                <td class="by"></td>
                                <td class="by">{lang lastpost}</td>
                                <td class="num">{lang views}</td>
                            </tr>
                        </table>
                    </div>
					<div class="bm_c">
						<div id="forumnew" style="display:none"></div>
							<table cellspacing="0" cellpadding="0">
							<!--{subtemplate forum/guide_list_row}-->
							</table>
					</div>
				</div>
				<!--{/loop}-->
				<div class="bm bw0 pgs cl">
					$multipage
					<span class="pgb y"><a href="forum.php?mod=guide">{lang guide_index}</a></span>
				</div>
			<!--{/if}-->
			<!--{hook/guide_bottom}-->
		</div>
	</div>
</div>
<!--{if !IS_ROBOT}-->
	<div id="filter_special_menu" class="p_pop" style="display:none">
		<ul>
			<li><a href="home.php?mod=space&do=poll&view=me" target="_blank">{lang thread_poll}</a></li>
			<li><a href="home.php?mod=space&do=trade&view=me" target="_blank">{lang thread_trade}</a></li>
			<li><a href="home.php?mod=space&do=reward&view=me" target="_blank">{lang thread_reward}</a></li>
			<li><a href="home.php?mod=space&do=activity&view=me" target="_blank">{lang thread_activity}</a></li>
		</ul>
	</div>
<!--{/if}-->
<!--{template common/footer}-->
