<?PHP exit('Powered by Unicorn');?>
<script type="text/javascript">
jQuery(function()
{
	jQuery('#hov_btn').hover(function() 
	{
		jQuery('div.qing_lg_after ul').show();
	},function() 
	{
		jQuery('div.qing_lg_after ul').hide();
	});
});

</script>
<!--{if $_G['uid']}-->
<div id="um">
<div class="qing_lg_after cl" id="hov_btn">
    <h4 class="qing_br5">
        <!--{avatar($_G[uid],small)}--><a href="home.php?mod=space&uid=$_G[uid]">{$_G[member][username]}</a><em></em><!--{hook/global_usernav_extra3}-->
    </h4>    
    <ul style="display: none;">
    <div class="top-angle"></div>
        <div class="user-bottom cl">
        	<div class="user-line1">
            	{lang username} :<a href="home.php?mod=space&uid=$_G[uid]" target="_blank" title="{lang visit_my_space}">{$_G[member][username]}</a><!--{if $_G[member]['freeze']}--><!--{else}--><!--{/if}--><font color="#FFC000">（$_G[group][grouptitle]）</font><!--{if $_G[member]['freeze']}--><span class="xi1">({lang freeze})</span><!--{/if}-->
                <!--{if $_G['group']['allowinvisible']}-->
                <span id="loginstatus">
                    <a id="loginstatusid" href="member.php?mod=switchstatus" title="{lang login_switch_invisible_mode}" onclick="ajaxget(this.href, 'loginstatus');return false;" class="xi2"></a>
                </span>
                <!--{/if}-->
            </div>
            <div class="user-line2">
            	<div class="line2_l">{lang credits}: <font color="#FFC000">$_G[member][credits]</font></div>
                <div class="line2_r">魔力: <font color="#FFC000"><!--{eval echo getuserprofile('extcredits3');}--></font></div>
				<div class="line2_l">西可: <font color="#FFC000"><!--{eval echo getuserprofile('extcredits2');}--></font></div>
                <div class="line2_r">加隆: <font color="#FFC000"><!--{eval echo getuserprofile('extcredits4');}--></font></div>
            </div>
            <div class="user-line3">
            	<div class="line3_l"><a href="home.php?mod=space&do=pm" id="pm_ntc"{if $_G[member][newpm]} class="new"{/if}>{lang pm_center}</a></div>
                <div class="line3_r"><a href="home.php?mod=space&do=notice">{lang remind}<font color="#FFC000"><!--{if $_G[member][newprompt]}-->($_G[member][newprompt])<!--{/if}--></font></a></div>
            </div>
            <div class="user-line4">
                <!--{if check_diy_perm($topic)}--><div class="line4_l"><a href="javascript:openDiy();" title="{lang open_diy}"><font color="#ff0000">[{lang open_diy}]</font></a></div><!--{/if}-->
            </div>
			<div class="user-bottom-con">
			    <!--{eval $fd=DB::fetch_first("SELECT field7,field8 FROM `pre_common_member_profile` WHERE uid='".$_G['uid']."'"); }-->
                <!--{hook/global_usernav_extra1}-->
                <!--{hook/global_usernav_extra4}-->
                <a href="forum.php?mod=guide&view=my">{lang mypost}</a>
				<a href="home.php?mod=space&do=favorite&view=me">{lang favorite}</a>
				<a href="home.php?mod=space&do=friend">{lang friends}</a>    
				<a href={$fd['field7']}><li>演绎报备</li></a>
                <a href={$fd['field8']}><li>我的房屋</li></a>
				<a href="home.php?mod=spacecp">个人{lang setup}</a>
				<a href=member.php?mod=logging&action=logout&formhash={FORMHASH}><li>退出登录</li></a>
                <!--{if empty($_G['cookie']['ignore_notice']) && ($_G[member][newpm] || $_G[member][newprompt_num][follower] || $_G[member][newprompt_num][follow] || $_G[member][newprompt])}--><script language="javascript">delayShow($('myprompt'), function() {showMenu({'ctrlid':'myprompt','duration':3})});</script><!--{/if}-->
                <!--{if $_G['setting']['taskon'] && !empty($_G['cookie']['taskdoing_'.$_G['uid']])}--><a href="home.php?mod=task&item=doing" id="task_ntc" class="new">{lang task_doing}</a><!--{/if}-->
                <!--{if ($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))}-->
                    <a href="portal.php?mod=portalcp"><!--{if $_G['setting']['portalstatus'] }-->{lang portal_manage}<!--{else}-->{lang portal_block_manage}<!--{/if}--></a>
                <!--{/if}-->
                <!--{if $_G['uid'] && $_G['group']['radminid'] > 1}-->
                    <a href="forum.php?mod=modcp&fid=$_G[fid]" target="_blank">{lang forum_manager}</a>
                <!--{/if}-->
                <!--{if $_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)}-->
                    <a href="admin.php" target="_blank">{lang admincp}</a>
                <!--{/if}-->
                <!--{hook/global_usernav_extra2}-->
            </div>
        </div>
    </ul>
</div>

</div>
<!--{elseif !empty($_G['cookie']['loginuser'])}-->
<div id="um">
	<div class="qing_lg_after cl" id="hov_btn">
        <h4 class="qing_br5">
            <!--{avatar(0,small)}--><a href="home.php?mod=space&uid=$_G[uid]">no name</a><em>▼</em>
        </h4>
            <ul style="display: none;">
                <div class="top-angle">▲</div>
                    <div class="user-bottom cl">
                        <div class="user-line1">
                            {lang username} :<a href="home.php?mod=space&uid=$_G[uid]" target="_blank" title="{lang visit_my_space}"><!--{echo dhtmlspecialchars($_G['cookie']['loginuser'])}--></a>
                            <!--{if $_G['group']['allowinvisible']}-->
                            <span id="loginstatus">
                                <a id="loginstatusid" href="member.php?mod=switchstatus" title="{lang login_switch_invisible_mode}" onclick="ajaxget(this.href, 'loginstatus');return false;" class="xi2"></a>
                            </span>
                            <!--{/if}-->
                        </div>
                        <div class="user-line2">
                            <div class="line2_l"><a href="member.php?mod=logging&action=login" onclick="showWindow('login', this.href)">{lang activation}</a></div>
                            <div class="line2_r"><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a></div>
                        </div>
					</div>
				</ul>
	</div>
</div>
<!--{elseif !$_G[connectguest]}-->
	<!--{template member/login_simple}-->
<!--{else}-->
<div id="um">
	<div class="qing_lg_after cl" id="hov_btn">
        <h4 class="qing_br5">
            <!--{avatar(0,small)}--><a href="">{$_G[member][username]}</a><em>▼</em>
        </h4>
            <ul style="display: none;">
                <div class="top-angle">▲</div>
                    <div class="user-bottom cl">
                        <div class="user-line1">
                            {lang username} :<a href="home.php?mod=space&uid=$_G[uid]" target="_blank" title="{lang visit_my_space}">{$_G[member][username]}</a>
                            <!--{if $_G['group']['allowinvisible']}-->
                            <span id="loginstatus">
                                <a id="loginstatusid" href="member.php?mod=switchstatus" title="{lang login_switch_invisible_mode}" onclick="ajaxget(this.href, 'loginstatus');return false;" class="xi2"></a>
                            </span>
                            <!--{/if}-->
                        </div>
                        <div class="user-bottom-con">
                            <!--{hook/global_usernav_extra1}-->
                            <a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a>
                        </div>
					</div>
				</ul>
	</div>
</div>
<!--{/if}-->
