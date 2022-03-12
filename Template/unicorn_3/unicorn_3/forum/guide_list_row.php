<?PHP exit('Powered by Unicorn');?>
				<!--{if $list['threadcount']}-->
						<!--{loop $list['threadlist'] $key $thread}-->
							<tbody id="$thread[id]"{if $_G['hiddenexists'] && $thread['hidden']} style='display:none'{/if}>
								<tr>
									<td class="icn">
										<a href="home.php?mod=space&uid=$thread[authorid]" class="q-favatar"><!--{avatar($thread[authorid], 'small')}--></a>
									</td>
									<th class="$thread[folder]">

										<!--{if !$thread['forumstick'] && $thread['closed'] > 1 && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])}-->
												<!--{eval $thread[tid]=$thread[closed];}-->
										<!--{/if}-->
										<!--{hook/forumdisplay_thread $key}-->
										$thread[typehtml] $thread[sorthtml]
										<!--{if $thread['moved']}-->
											{lang thread_moved}:<!--{eval $thread[tid]=$thread[closed];}-->
										<!--{/if}-->
										<a href="forum.php?mod=viewthread&tid=$thread[tid]&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra"$thread[highlight]{if $thread['isgroup'] == 1 || $thread['forumstick']} target="_blank"{else} onclick="atarget(this)"{/if} class="s xst">$thread[subject]</a>
										<!--{if $_G['setting']['threadhidethreshold'] && $thread['hidden'] >= $_G['setting']['threadhidethreshold']}--><span class="xg1">{lang hidden}</span>&nbsp;<!--{/if}-->
										
										<!--{if $thread['rushreply']}-->
											<img src="{IMGDIR}/rushreply_s.png" alt="{lang rushreply}" align="absmiddle" />
											<!--{if $rushinfo[$thread[tid]]}-->
											<span id="rushtimer_$thread[tid]"> {lang havemore_special} <span id="rushtimer_body_$thread[tid]"></span> <script language="javascript">settimer($rushinfo[$thread[tid]]['timer'], 'rushtimer_body_$thread[tid]');</script>{if $rushinfo[$thread[tid]]['timertype'] == 'start'} {lang header_start} {else} {lang over} {/if} {lang right_special}</span>
											<!--{/if}-->
										<!--{/if}-->
										<!--{if $stemplate && $sortid}-->$stemplate[$sortid][$thread[tid]]<!--{/if}-->
										<!--{if $thread['readperm']}--> - [{lang readperm} <span class="xw1">$thread[readperm]</span>]<!--{/if}-->
										<!--{if $thread['price'] > 0}-->
											<!--{if $thread['special'] == '3'}-->
											- <a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}&rewardtype=1" title="{lang show_rewarding_only}"><span class="xi1">[{lang thread_reward} <span class="xw1">$thread[price]</span> {$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][title]}]</span></a>
											<!--{else}-->
											- [{lang price} <span class="xw1">$thread[price]</span> {$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][title]}]
											<!--{/if}-->
										<!--{elseif $thread['special'] == '3' && $thread['price'] < 0}-->
											- <a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}&rewardtype=2" title="{lang show_rewarded_only}">[{lang reward_solved}]</a>
										<!--{/if}-->
										<!--{if $thread['attachment'] == 2}-->
											<img src="{IMGDIR}/image_s.gif" alt="attach_img" title="{lang attach_img}" align="absmiddle" />
										<!--{elseif $thread['attachment'] == 1}-->
											<img src="{STATICURL}image/filetype/common.gif" alt="attachment" title="{lang attachment}" align="absmiddle" />
										<!--{/if}-->
										<!--{if $thread['mobile']}-->
											<img src="{IMGDIR}/mobile-attach-$thread['mobile'].png" alt="{lang post_mobile}" align="absmiddle" />
										<!--{/if}-->
										<!--{if $thread['digest'] > 0 && $filter != 'digest'}-->
											<img src="{IMGDIR}/digest_$thread[digest].gif" align="absmiddle" alt="digest" title="{lang thread_digest} $thread[digest]" />
										<!--{/if}-->
										<!--{if $thread['displayorder'] == 0}-->
											<!--{if $thread[recommendicon] && $filter != 'recommend'}-->
												<img src="{IMGDIR}/recommend_$thread[recommendicon].gif" align="absmiddle" alt="recommend" title="{lang thread_recommend} $thread[recommends]" />
											<!--{/if}-->
											<!--{if $thread[heatlevel]}-->
												<img src="{IMGDIR}/hot_$thread[heatlevel].gif" align="absmiddle" alt="heatlevel" title="{lang heats}: {$thread[heats]}" />
											<!--{/if}-->
											<!--{if $thread['rate'] > 0}-->
												<img src="{IMGDIR}/agree.gif" align="absmiddle" alt="agree" title="{lang rate_credit_add}" />
											<!--{elseif $thread['rate'] < 0}-->
												<img src="{IMGDIR}/disagree.gif" align="absmiddle" alt="disagree" title="{lang posts_deducted}" />
											<!--{/if}-->
										<!--{/if}-->
										<!--{if $thread['replycredit'] > 0}-->
											- <span class="xi1">[{lang replycredit} <strong> $thread['replycredit']</strong> ]</span>
										<!--{/if}-->
										<!--{hook/forumdisplay_thread_subject $key}-->
										<!--{if $thread[multipage]}-->
											<span class="tps">$thread[multipage]</span>
										<!--{/if}-->
										<!--{if $thread['weeknew']}-->
											<img src="$_G['style']['styleimgdir']/icon_new.gif" alt="new" title="new" align="absmiddle" />
										<!--{/if}-->
										<!--{if !$thread['forumstick'] && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])}-->
											<!--{if $thread['related_group'] == 0 && $thread['closed'] > 1}-->
												<!--{eval $thread[tid]=$thread[closed];}-->
											<!--{/if}-->
											<!--{if $groupnames[$thread[tid]]}-->
												<span class="fromg xg1"> [{lang from}: <a href="forum.php?mod=group&fid={$groupnames[$thread[tid]][fid]}" target="_blank" class="xg1">{$groupnames[$thread[tid]][name]}</a>]</span>
											<!--{/if}-->
										<!--{/if}-->
									</th>
										<td class="by"><a href="forum.php?mod=forumdisplay&fid=$thread[fid]" target="_blank"><font style="font-size:14px;">$list['forumnames'][$thread[fid]]['name']</font></a></td>
									<td class="by">
										<!--{if $thread[icon] >= 0}-->
											<img src="$_G['style']['styleimgdir']/stamp/{$_G[cache][stamps][$thread[icon]][url]}" alt="{$_G[cache][stamps][$thread[icon]][text]}" align="absmiddle" />
										<!--{/if}-->
									</td>
									<td class="by">
										<cite><!--{if $thread['lastposter']}--><a href="{if $thread[digest] != -2}home.php?mod=space&username=$thread[lastposterenc]{else}forum.php?mod=viewthread&tid=$thread[tid]&page={echo max(1, $thread[pages]);}{/if}" c="1">$thread[lastposter]</a><!--{else}-->$_G[setting][anonymoustext]<!--{/if}--></cite>
										<em><a href="{if $thread[digest] != -2 && !$thread[ordertype]}forum.php?mod=redirect&tid=$thread[tid]&goto=lastpost$highlight#lastpost{else}forum.php?mod=viewthread&tid=$thread[tid]{if !$thread[ordertype]}&page={echo max(1, $thread[pages]);}{/if}{/if}">$thread[lastpost]</a></em>
									</td>
                                    <td class="num"><em><!--{if $thread['isgroup'] != 1}-->$thread[views]<!--{else}-->{$groupnames[$thread[tid]][views]}<!--{/if}--></em></td>
								</tr>
							</tbody>
							<!--{if $view == 'my' && $viewtype=='reply' && !empty($tids[$thread[tid]])}-->
								<tbody class="bw0_all">
									<tr>
										<td class="icn">&nbsp;</td>
										<td colspan="5">
											<!--{loop $tids[$thread[tid]] $pid}-->
											<!--{eval $post = $posts[$pid];}-->
											<div class="tl_reply pbm xg1"><a href="forum.php?mod=redirect&goto=findpost&ptid=$thread[tid]&pid=$pid" target="_blank"><!--{if $post[message]}-->{$post[message]}<!--{else}-->...<!--{/if}--></a></div>
											<!--{/loop}-->
										</td>
									</tr>
								</tbody>
								<tr><td colspan="6"></td></tr>
							<!--{/if}-->
							<!--{if $view == 'my' && $viewtype=='postcomment'}-->
								<tr>
									<td class="icn">&nbsp;</td>
									<td colspan="5" class="xg1">$thread[comment]</td>
								</tr>
							<!--{/if}-->
						<!--{/loop}-->
				<!--{else}-->
						<tbody class="bw0_all"><tr><th colspan="5"><p class="emp">{lang guide_nothreads}</p></th></tr></tbody>
				<!--{/if}-->
