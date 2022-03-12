<?PHP exit('Powered by Unicorn');?>
<div class="q_bm" style="background:#f2f2f2; padding:15px; margin-top:10px;">
	<div class="q_bm_h cl">
		<h2>{lang forum_subforums}</h2>
	</div>
    
    <div id="subforum_{$_G[forum][fid]}" class="qing_baklist cl" style="margin-bottom:10px;">
    <ul>
		<!--{loop $sublist $sub}-->
		<!--{eval $forumurl = !empty($sub['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$sub['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$sub['fid'];}-->
        <li onMouseOver="this.className='lihover cl'" onmouseout="this.className='cl'" style="margin-left:0px; margin-right:10px; width:300px;">
            <div class="item"><!--{if $sub[icon]}-->$sub[icon]<!--{else}--><a href="$forumurl"><img src="{$_G['style']['styleimgdir']}/logo.png" /></a><!--{/if}--></div>
            <a href="$forumurl"{if $forum[redirect]} target="_blank"{/if}{if $forum[extra][namecolor]} style="color: {$forum[extra][namecolor]};"{/if} class="name {if !$forum[description]}name1{/if}"><span>$sub[name]</span></a>
            <!--{if $sub[todayposts] && !$forum['redirect']}--><em class="newpost">$sub[todayposts]</em><!--{/if}-->
            <!--{if $sub[description]}--><span class="desc">$sub[description]</span><!--{/if}-->
            <!--{if empty($sub[redirect])}--><span class="abstract" style="width:280px;">{lang forum_threads} <em><!--{echo dnumber($forum[threads])}--></em>, {lang forum_posts} <em><!--{echo dnumber($sub[posts])}--></em><a href="$forumurl" class="q_enter">{lang nav_forum}</a></span><!--{/if}-->
        </li>
		<!--{/loop}-->
	</ul>
</div>

  
</div>
