<?PHP exit('Powered by Unicorn');?>
<script type="text/javascript">
var postminchars = parseInt('$_G['setting']['minpostsize']');
var postmaxchars = parseInt('$_G['setting']['maxpostsize']');
var disablepostctrl = parseInt('{$_G['group']['disablepostctrl']}');
</script>

<div id="f_pst" class="pl{if empty($_GET[from])} bm{/if}">
<form method="post" autocomplete="off" id="fastpostform" action="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&extra=$_GET[extra]&replysubmit=yes{if $_GET['ordertype'] != 1}&infloat=yes&handlekey=fastpost{/if}{if $_GET[from]}&from=$_GET[from]{/if}"{if $_GET['ordertype'] != 1} onSubmit="return fastpostvalidate(this)"{/if}>
	<!--{if empty($_GET[from])}-->
	<table cellspacing="0" cellpadding="0">
		<tr>
			<td class="pls">
				<!--{if $_G['uid']}--><div class="avatar avtm"><!--{echo avatar($_G['uid'])}--></div><!--{else}--><div class="avatar avtm"><img src="uc_server/images/noavatar_middle.gif" /></div><!--{/if}-->
				<!--{hook/viewthread_fastpost_side}-->
			</td>
			<td class="plc">
	<!--{/if}-->
	<!--{hook/viewthread_fastpost_content}-->

	<span id="fastpostreturn"></span>

	<!--{if $_G[forum_thread][special] == 5 && empty($firststand)}-->
	<div class="pbt cl">
		<div class="ftid sslt">
			<select id="stand" name="stand">
				<option value="">{lang debate_viewpoint}</option>
				<option value="0">{lang debate_neutral}</option>
				<option value="1">{lang debate_square}</option>
				<option value="2">{lang debate_opponent}</option>
			</select>
		</div>
		<script type="text/javascript">simulateSelect('stand');</script>
	</div>
	<!--{/if}-->

	<div class="cl">
		<!--{if empty($_GET[from]) && $_G[setting][fastsmilies]}--><div id="fastsmiliesdiv" class="y"><div id="fastsmiliesdiv_data"><div id="fastsmilies"></div></div></div><!--{/if}-->
		<div{if empty($_GET[from]) && $_G[setting][fastsmilies]} class="hasfsl"{/if} id="fastposteditor">
			<div class="tedt{if !($_G[forum_thread][special] == 5 && empty($firststand))} mtn{/if}">
				<div class="bar">
					<span class="y">
						<!--{hook/viewthread_fastpost_func_extra}-->
						<a href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]{if $_GET[from]}&from=$_GET[from]{/if}" onclick="return switchAdvanceMode(this.href)">{lang post_advancemode}</a>
					</span>
					<!--{eval $seditor = array('fastpost', array('at', 'bold', 'color', 'img', 'link', 'quote', 'code', 'smilies'), !$allowfastpost ? 1 : 0, $allowpostattach && $_GET['from'] != 'preview' && $allowfastpost ? '<span class="pipe z">|</span><span id="spanButtonPlaceholder">'.lang('template', 'upload').'</span>' : '');}-->
					<!--{hook/viewthread_fastpost_ctrl_extra}-->
					<!--{subtemplate common/seditor}-->
				</div>
				<div class="area">
					<!--{if $allowfastpost}-->
						<textarea rows="6" cols="80" name="message" id="fastpostmessage" onKeyDown="seditor_ctlent(event, {if $_GET['ordertype'] != 1}'fastpostvalidate($(\'fastpostform\'))'{else}'$(\'fastpostform\').submit()'{/if});" tabindex="4" class="pt"{eval echo getreplybg($_G['forum']['replybg']);}></textarea>
					<!--{else}-->
						<div class="pt hm">
							<!--{if !$_G['uid']}-->
								<!--{if !$_G['connectguest']}-->
									{lang login_to_reply} <a href="member.php?mod=logging&action=login" onclick="showWindow('login', this.href)" class="xi2">{lang login}</a> | <a href="member.php?mod={$_G[setting][regname]}" class="xi2">$_G['setting']['reglinkname']</a>
								<!--{else}-->
									{lang connect_fill_profile_to_post}
								<!--{/if}-->
							<!--{else}-->
								{lang no_permission_to_post}<a href="javascript:;" onclick="$('fastpostform').submit()" class="xi2">{lang click_to_show_reason}</a>
							<!--{/if}-->
							<!--{hook/global_login_text}-->
						</div>
					<!--{/if}-->
				</div>
			</div>
		</div>
	</div>
	<div id="seccheck_fastpost">
		<!--{if $allowpostreply && ($secqaacheck || $seccodecheck)}-->
			<!--{subtemplate forum/seccheck_post}-->
		<!--{/if}-->
	</div>

	<!--{if $allowpostattach && $_GET['from'] != 'preview'}-->
		<script type="text/javascript">
		var editorid = '';
		var ATTACHNUM = {'imageused':0,'imageunused':0,'attachused':0,'attachunused':0}, ATTACHUNUSEDAID = new Array(), IMGUNUSEDAID = new Array();
		</script>

		<input type="hidden" name="posttime" id="posttime" value="{TIMESTAMP}" />
		<div class="upfl{if empty($_GET[from]) && $_G[setting][fastsmilies]} hasfsl{/if}">
			<table cellpadding="0" cellspacing="0" border="0" id="attach_tblheader" style="display: none;">
				<tr>
					<td>{lang e_attach_insert}</td>
					<td class="atds">{lang description}</td>
					<!--{if $_G['group']['allowsetattachperm']}-->
					<td class="attv">
						{lang readperm}
						<img src="{IMGDIR}/faq.gif" alt="Tip" class="vm" onmouseover="showTip(this)" tip="{lang post_select_usergroup_readacces}" />
					</td>
					<!--{/if}-->
					<!--{if $_G['group']['maxprice']}--><td class="attpr">{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]}</td><!--{/if}-->
					<td class="attc"></td>
				</tr>
			</table>
			<div class="fieldset flash" id="attachlist"></div>
			<!--{if empty($_G['setting']['pluginhooks']['viewthread_fastpost_upload_extend'])}-->
				<!--{subtemplate common/upload}-->
				<script type="text/javascript">
					var upload = new SWFUpload({
						upload_url: "{$_G[siteurl]}misc.php?mod=swfupload&action=swfupload&operation=upload&fid=$_G[fid]",
						post_params: {"uid" : "$_G[uid]", "hash":"$swfconfig[hash]"},
						file_size_limit : "$swfconfig[max]",
						file_types : "$swfconfig[attachexts][ext]",
						file_types_description : "$swfconfig[attachexts][depict]",
						file_upload_limit : $swfconfig['limit'],
						file_queue_limit : 0,
						swfupload_preload_handler : preLoad,
						swfupload_load_failed_handler : loadFailed,
						file_dialog_start_handler : fileDialogStart,
						file_queued_handler : fileQueued,
						file_queue_error_handler : fileQueueError,
						file_dialog_complete_handler : fileDialogComplete,
						upload_start_handler : uploadStart,
						upload_progress_handler : uploadProgress,
						upload_error_handler : uploadError,
						upload_success_handler : uploadSuccess,
						upload_complete_handler : uploadComplete,
						button_image_url : "{IMGDIR}/uploadbutton_small.png",
						button_placeholder_id : "spanButtonPlaceholder",
						button_width: 17,
						button_height: 25,
						button_cursor:SWFUpload.CURSOR.HAND,
						button_window_mode: "transparent",
						custom_settings : {
							progressTarget : "attachlist",
							uploadSource: 'forum',
							uploadType: 'attach',
							<!--{if $swfconfig['maxsizeperday']}-->
							maxSizePerDay: $swfconfig['maxsizeperday'],
							<!--{/if}-->
							<!--{if $swfconfig['maxattachnum']}-->
							maxAttachNum: $swfconfig['maxattachnum'],
							<!--{/if}-->
							uploadFrom: 'fastpost'
						},
						debug: false
					});
				</script>
			<!--{else}-->
				<!--{hook/viewthread_fastpost_upload_extend}-->
			<!--{/if}-->
		</div>
	<!--{/if}-->

	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<input type="hidden" name="usesig" value="$usesigcheck" />
	<input type="hidden" name="subject" value="  " />
	<p class="ptm pnpost q_fastpost">
		<a href="home.php?mod=spacecp&ac=credit&op=rule&fid=$_G[fid]" class="y" target="_blank">{lang post_credits_rule}</a>
		<button {if $allowpostreply}type="submit" {elseif !$_G['uid']}type="button" onclick="showWindow('login', 'member.php?mod=logging&action=login&guestmessage=yes')" {/if}{if !$seccodecheck}onmouseover="checkpostrule('seccheck_fastpost', 'ac=reply');this.onmouseover=null" {/if}name="replysubmit" id="fastpostsubmit" class="" value="replysubmit" tabindex="5"><strong>&nbsp;&nbsp;&nbsp;{lang published}</strong></button>
		<!--{hook/viewthread_fastpost_btn_extra}-->
		<!--{if helper_access::check_module('follow')}-->
		<label class="lb"><input type="checkbox" name="adddynamic" class="pc" value="1" />{lang post_reply_relay}</label>
		<!--{/if}-->
		<!--{if $_GET['ordertype'] != 1 && empty($_GET[from])}-->
		<label for="fastpostrefresh"><input id="fastpostrefresh" type="checkbox" class="pc" />{lang post_fastreply_gotolast}</label>
		<script type="text/javascript">if(getcookie('fastpostrefresh') == 1) {$('fastpostrefresh').checked=true;}</script>
		<!--{/if}-->
	</p>
	<!--{if empty($_GET[from])}-->
			</td>
		</tr>
	</table>
	<!--{/if}-->
</form>
</div>
