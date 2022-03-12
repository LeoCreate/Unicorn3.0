<?PHP exit('Powered by Unicorn');?>
<!--{subtemplate common/header_common}-->
	<meta name="application-name" content="$_G['setting']['bbname']" />
	<meta name="msapplication-tooltip" content="$_G['setting']['bbname']" />
	<!--{if $_G['setting']['portalstatus']}--><meta name="msapplication-task" content="name=$_G['setting']['navs'][1]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['portal']) ? 'http://'.$_G['setting']['domain']['app']['portal'] : $_G[siteurl].'portal.php'};icon-uri={$_G[siteurl]}{IMGDIR}/portal.ico" /><!--{/if}-->
	<meta name="msapplication-task" content="name=$_G['setting']['navs'][2]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['forum']) ? 'http://'.$_G['setting']['domain']['app']['forum'] : $_G[siteurl].'forum.php'};icon-uri={$_G[siteurl]}{IMGDIR}/bbs.ico" />
	<!--{if $_G['setting']['groupstatus']}--><meta name="msapplication-task" content="name=$_G['setting']['navs'][3]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['group']) ? 'http://'.$_G['setting']['domain']['app']['group'] : $_G[siteurl].'group.php'};icon-uri={$_G[siteurl]}{IMGDIR}/group.ico" /><!--{/if}-->
	<!--{if helper_access::check_module('feed')}--><meta name="msapplication-task" content="name=$_G['setting']['navs'][4]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['home']) ? 'http://'.$_G['setting']['domain']['app']['home'] : $_G[siteurl].'home.php'};icon-uri={$_G[siteurl]}{IMGDIR}/home.ico" /><!--{/if}-->
	<!--{if $_G['basescript'] == 'forum' && $_G['setting']['archiver']}-->
		<link rel="archives" title="$_G['setting']['bbname']" href="{$_G[siteurl]}archiver/" />
	<!--{/if}-->
	<!--{if !empty($rsshead)}-->$rsshead<!--{/if}-->
	<!--{if widthauto()}-->
		<link rel="stylesheet" id="css_widthauto" type="text/css" href='{$_G['setting']['csspath']}{STYLEID}_widthauto?{VERHASH}' />
		<script type="text/javascript">HTMLNODE.className += ' widthauto'</script>
	<!--{/if}-->
	<!--{if $_G['basescript'] == 'forum' || $_G['basescript'] == 'group'}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}forum.js?{VERHASH}"></script>
	<!--{elseif $_G['basescript'] == 'home' || $_G['basescript'] == 'userapp'}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}home.js?{VERHASH}"></script>
	<!--{/if}-->
	<!--{if $_G['basescript'] != 'portal' || $_GET['diy'] == 'yes' && check_diy_perm($topic)}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}portal.js?{VERHASH}"></script>
	<!--{/if}-->
	<!--{if $_GET['diy'] == 'yes' && check_diy_perm($topic)}-->
		<link rel="stylesheet" type="text/css" id="diy_common" href="{$_G['setting']['csspath']}{STYLEID}_css_diy.css?{VERHASH}" />
	<!--{/if}-->
    <script type="text/javascript">window.onerror=function(){return true;}</script>
	<script src="{$_G['style']['styleimgdir']}/js/jquery.SuperSlide.js" type="text/javascript"></script>
</head>

<body id="nv_{$_G[basescript]}" class="pg_{CURMODULE}{if $_G['basescript'] === 'portal' && CURMODULE === 'list' && !empty($cat)} {$cat['bodycss']}{/if}" onkeydown="if(event.keyCode==27) return false;">
	<div id="append_parent"></div><div id="ajaxwaitid"></div>
	<!--{if $_GET['diy'] == 'yes' && check_diy_perm($topic)}-->
		<!--{template common/header_diy}-->
	<!--{/if}-->
	<!--{if check_diy_perm($topic)}-->
		<!--{template common/header_diynav}-->
	<!--{/if}-->
	<!--{if CURMODULE == 'topic' && $topic && empty($topic['useheader']) && check_diy_perm($topic)}-->
		$diynav
	<!--{/if}-->
	<!--{if empty($topic) || $topic['useheader']}-->
		<!--{if $_G['setting']['mobile']['allowmobile'] && (!$_G['setting']['cacheindexlife'] && !$_G['setting']['cachethreadon'] || $_G['uid']) && ($_GET['diy'] != 'yes' || !$_GET['inajax']) && ($_G['mobile'] != '' && $_G['cookie']['mobile'] == '' && $_GET['mobile'] != 'no')}-->
			<div class="xi1 bm bm_c">
			    {lang your_mobile_browser}<a href="{$_G['siteurl']}forum.php?mobile=yes">{lang go_to_mobile}</a> <span class="xg1">|</span> <a href="$_G['setting']['mobile']['nomobileurl']">{lang to_be_continue}</a>
			</div>
		<!--{/if}-->
		<!--{if $_G['setting']['shortcut'] && $_G['member'][credits] >= $_G['setting']['shortcut']}-->
			<div id="shortcut">
				<span><a href="javascript:;" id="shortcutcloseid" title="{lang close}">{lang close}</a></span>
				{lang shortcut_notice}
				<a href="javascript:;" id="shortcuttip">{lang shortcut_add}</a>

			</div>
			<script type="text/javascript">setTimeout(setShortcut, 2000);</script>
		<!--{/if}-->
        <div class="animate-layer">
        	<s class="a-bird a-bird-01"></s>
            <s class="a-bird a-bird-02"></s>
            <s class="a-bird a-bird-03"></s>
            <s class="a-bird a-bird-04"></s>
            <s class="a-bird a-bird-05"></s>
            <s class="a-bird a-bird-06"></s>
        	<s class="a-cloud a-cloud-01"></s>
            <s class="a-cloud a-cloud-02"></s>
            <s class="a-cloud a-cloud-03"></s>
            <s class="a-cloud a-cloud-04"></s>
            <s class="a-cloud a-cloud-05"></s>
            <s class="a-cloud a-cloud-06"></s>
            <s class="a-balloon a-balloon-01"></s>
            <s class="a-balloon a-balloon-02"></s>
            <s class="a-meteor a-meteor-01"></s>
            <s class="a-meteor a-meteor-02"></s>
            <s class="a-meteor a-meteor-03"></s>
            <s class="a-meteor a-meteor-04"></s>
            <s class="a-star a-star-01"></s>
            <s class="a-star a-star-02"></s>
            <s class="a-star a-star-03"></s>
            <s class="a-star a-star-04"></s>
            <s class="a-star a-star-05"></s>
		</div>
        <!--{if !empty($_G['style']['extstyle'])}--><a class="q_qiehuan" href="javascript:;" title="{lang changestyle}" id="change_theme_btn">{lang changestyle}</a><!--{/if}-->
        <div id="change_theme_btn_menu" class="q_qiehuan_menu">
        	<h2>
				<a class="dialog-handle" href="javascript:void(0)" onClick="qout()"></a>
			</h2>
            <div style="padding:15px 0 0 0;">
					<!--{if !$_G[style][defaultextstyle]}--><span onMouseOut="this.className='cl'" onMouseOver="this.className='cl q_sslct_btn'" onClick="extstyle('')"><img src="template/unicorn_3/style/t0-bg.jpg" /><em>{lang default}</em></span><!--{/if}-->
					<!--{loop $_G['style']['extstyle'] $extstyle}-->
						<span onMouseOut="this.className='cl'" onMouseOver="this.className='cl q_sslct_btn'" onClick="extstyle('$extstyle[0]')"><img src="$extstyle[2]"/><em>$extstyle[1]</em></span>
					<!--{/loop}-->
			</div>
		</div>
<script>
jQuery(function(){
	jQuery('#change_theme_btn').click(function(){
		if(!jQuery('#change_theme_btn_menu').is(':visible')){
			jQuery('#change_theme_btn_menu').css({display:'block', top:'-100px'}).animate({top: '+100'}, 500);
				}
			});
		});
	  function qout(){
		  jQuery('#change_theme_btn_menu').animate({top:'0'}, 500, function(){
		  jQuery(this).css({display:'none', top:'-100px'});
		});
	}
</script>
		<div id="ainuotoptb" class="cl">
			<!--{hook/global_cpnav_top}-->
			<div class="wp">
				<div class="z">
                	<div class="alogo cl"><a href="{if $_G['setting']['domain']['app']['default']}http://{$_G['setting']['domain']['app']['default']}/{else}./{/if}">{$_G['style']['boardlogo']}</a></div>
					<!--{loop $_G['setting']['topnavs'][0] $nav}-->
						<!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}-->$nav[code]<!--{/if}-->
					<!--{/loop}-->
					<!--{hook/global_cpnav_extra1}-->
				</div>
				<div class="y">
					<!--{hook/global_cpnav_extra2}-->
					<!--{loop $_G['setting']['topnavs'][1] $nav}-->
						<!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}-->$nav[code]<!--{/if}-->
					<!--{/loop}-->
                    <!--{template common/header_userstatus}-->
				</div>
			</div>
		</div>
        <div class="qing_changestyle"></div>

		<!--{if !IS_ROBOT}-->
			<!--{if $_G['uid']}-->
			<ul id="myprompt_menu" class="p_pop" style="display: none;">
				<li><a href="home.php?mod=space&do=pm" id="pm_ntc" style="background-repeat: no-repeat; background-position: 0 50%;"><em class="prompt_news{if empty($_G[member][newpm])}_0{/if}"></em>{lang pm_center}</a></li>
				<li><a href="home.php?mod=follow&do=follower"><em class="prompt_follower{if empty($_G[member][newprompt_num][follower])}_0{/if}"></em><!--{lang notice_interactive_follower}-->{if $_G[member][newprompt_num][follower]}($_G[member][newprompt_num][follower]){/if}</a></li>
				<!--{if $_G[member][newprompt] && $_G[member][newprompt_num][follow]}-->
					<li><a href="home.php?mod=follow"><em class="prompt_concern"></em><!--{lang notice_interactive_follow}-->($_G[member][newprompt_num][follow])</a></li>
				<!--{/if}-->
				<!--{if $_G[member][newprompt]}-->
					<!--{loop $_G['member']['category_num'] $key $val}-->
						<li><a href="home.php?mod=space&do=notice&view=$key"><em class="notice_$key"></em><!--{echo lang('template', 'notice_'.$key)}-->(<span class="rq">$val</span>)</a></li>
					<!--{/loop}-->
				<!--{/if}-->
				<!--{if empty($_G['cookie']['ignore_notice'])}-->
					<li class="ignore_noticeli"><a href="javascript:;" onClick="setcookie('ignore_notice', 1);hideMenu('myprompt_menu')" title="{lang temporarily_to_remind}"><em class="ignore_notice"></em></a></li>
				<!--{/if}-->
			</ul>
			<!--{/if}-->

			<!--{if $_G['uid']}-->
				<ul id="myitem_menu" class="p_pop" style="display: none;">
					<li><a href="forum.php?mod=guide&view=my">{lang mypost}</a></li>
					<li><a href="home.php?mod=space&do=favorite&view=me">{lang favorite}</a></li>
					<li><a href="home.php?mod=space&do=friend">{lang friends}</a></li>
					<!--{hook/global_myitem_extra}-->
				</ul>
			<!--{/if}-->
			<!--{subtemplate common/header_qmenu}-->
		<!--{/if}-->

		
	<!--{/if}-->
<div style="margin-bottom:300px;"></div>
	<div id="wp" class="wp">
    	<div class="ainuo_wrapmain cl">
        <div class="a_mn cl">
    	<!--{eval $mnid = getcurrentnav();}-->
				<div id="qing_nv">
					<ul>
						<!--{loop $_G['setting']['navs'] $nav}-->
							<!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}--><li {if $mnid == $nav[navid]}class="a" {/if}$nav[nav]><!--{eval $navlogo = DB::result_first("SELECT logo FROM %t WHERE name LIKE %s", array('common_nav','%'.$nav['navname'].'%'));}-->{eval preg_match_all('/<img.*?src=[\"|\']?(.*?)[\"|\']?\s.*?>/i', $_G['setting']['navlogos'][$nav[navid]], $img_array);}{if $img_array[1][0]}<img src="$img_array[1][0]" />{else}<img src="{$_G['style']['styleimgdir']}/nav.png" />{/if}</li><!--{/if}-->
						<!--{/loop}-->
					</ul>
					<!--{hook/global_nav_extra}-->
				</div>
                <div class="ainuo_qmenutop cl"></div>
                <a href="javascript:;" id="qmenu" class="animate" onMouseOver="showMenu({'ctrlid':'qmenu','pos':'34!','ctrlclass':'a','duration':2})"><img src="{$_G['style']['styleimgdir']}/menu.png" />{lang my_nav}</a>
				<!--{if !empty($_G['setting']['plugins']['jsmenu'])}-->
					<ul class="p_pop h_pop" id="plugin_menu" style="display: none">
					<!--{loop $_G['setting']['plugins']['jsmenu'] $module}-->
						 <!--{if !$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])}-->
						 <li>$module[url]</li>
						 <!--{/if}-->
					<!--{/loop}-->
					</ul>
				<!--{/if}-->
                
				
        </div>
        <div class="ainuopopup cl">$_G[setting][menunavs]</div>
        <div class="a_sd cl">
				<!--{ad/headerbanner/wp a_h}-->
				<!--{hook/global_header}-->
                <!--{ad/subnavbanner/a_mu}-->    
	
