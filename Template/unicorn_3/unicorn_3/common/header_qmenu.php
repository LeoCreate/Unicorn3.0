<?PHP exit('Powered by Unicorn');?>
<div id="qmenu_menu" class="animate p_pop {if !$_G['uid']}blk{/if}" style="display: none;">
	<!--{hook/global_qmenu_top}-->
	<!--{if $_G['uid']}-->
		<ul class="cl nav">
			<!--{loop $_G['setting']['mynavs'] $nav}-->
				<!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}-->
					<li>$nav[code]</li>
				<!--{/if}-->
			<!--{/loop}-->
		</ul>
	<!--{elseif $_G[connectguest]}-->
		<div class="ptm pbw hm">
			{lang connect_fill_profile_to_visit}
		</div>
	<!--{else}-->
		<div class="ptm pbw hm">
			<a href="member.php?mod=logging&amp;action=login&amp;referer=" onclick="showWindow('login', this.href);return false;">{lang login}</a><span class="pipe">|</span>
		<a href="member.php?mod={$_G[setting][regname]}">$_G['setting']['reglinkname']</a>
		</div>
	<!--{/if}-->
	<!--{hook/global_qmenu_bottom}-->
</div>
