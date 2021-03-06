<?php if (!defined('THINK_PATH')) exit();?>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge">    
<title>NDST.APP安全审计报告</title>
</head>
<style type="text/css">
	body{font-family:"微软雅黑",tahoma; margin:0 auto; padding: 0; text-align:center; background-color:#F4F4F4;}
	a{color:#3888E2;text-decoration: none;}
	.left{text-align: left;}
	.separate-head{margin: 0;padding: 0;height:2px;}
	.separate{margin: 0;padding: 0;height:10px;}
	.tb-main{width:880px;text-align:center; margin:0 auto;padding:0; border:1px solid #E4E4E4;border-collapse: collapse;background-color:#FFF;}
	/*.tb-main td{padding:26px 39px;}*/

	.tb-header,.tb-footer{width: 880px;margin:0 auto;border:0; border-collapse:collapse;text-align:left;}
	.tb-header td,.tb-footer td{background-color:##FFFFFF;color:##F43C58;}
	.tb-header td{height:82px;font-size:28px;}
	.tb-footer td{height:28px;font-size:16px;padding-right:10px;}
    .abc{width:30px;height:20px;font-size:14px;}

	.tb-comm{margin:0px 40px;width:800px; border:none; border-collapse: collapse; text-align:left;}
	.tb-comm tr,.tb-comm td {height:36px;line-height:36px; vertical-align: middle; border-bottom:1px dashed #E6E6E6;color:#2A2A2A;}
	.tb-comm thead td{padding:0 0 0 13px;border-bottom:1px solid #E6E6E6;font-size: 20px}
	.tb-comm td{padding:0 0 0 39px;font-size:14px;}
	.tb-hole-detail td{padding: 0 0 0 32px;}
	.tb-comm .td-first{width:86px}
	.tb-comm .td-first-2{width:518px}
	.tb-comm .no-border{border: none;}
	.tb-comm .icon{margin-right:0px;}

	.font-level-1,.font-level-2,.font-level-3,.font-level-4,.font-level-5{width:8px;height:8px;margin-right: 2px;display: inline-block;}
	.font-level-1{background-color:#8CDC1E;width:8px;height:8px;}
	.font-level-2{background-color:#56ACE2;width:8px;height:8px;}
	.font-level-3{background-color:#FFC600;}
	.font-level-4{background-color:#FD681F;}
	.font-level-5{background-color:#DC1E1E;}
	.font-holenum{color:#F50909;font-size:16px;font-weight:bold;}
	.font-risknum{color:#FF8A00;font-size:16px;font-weight:bold;}
	.font-judge{height:22px;width: 30px;color:#FFF;font-size:13px;background-color:#FF8A00;}

	.font-high-level td{color:#F50909;}
	.font-middle-level td{color:#FF8A00;}
	.font-high-tips{color:#C36666;}

	.font-sortnum{color:#3888E2;font-size:30px;font-weight:bold;}
	.font-safe{color:#FFF;background-color:#419945;padding:1px 5px;}
	.font-danger{color:#FFF;background-color:#FF8A00;padding:2px 5px;}
	
	.collapse-show{display:none;}
	.collapse-show td{padding-left:61px;}
	.collapse{background:url(/Public/img/ico_collapse.png) no-repeat 8px 8px;}
	.expand{background:url(/Public/img/ico_expand.png) no-repeat 8px 8px;}

	.expand-title{font-weight:bold;}
	.expand-title,.expand-content{float:left;}
	.expand-content{margin-left:0px;max-width:665px;}
	.collapse-show div{}

</style>
<script src="/Public/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {		
		$(".td-collapse").click(function(event) {			
			/* Act on the event */

			var $this = $(this);
			var $showHtml = $this.parent().next();
			if($this.hasClass('collapse'))
			{
				$this.removeClass('collapse');
				$this.addClass('expand');
				$showHtml.show();
			}
			else
			{
				$this.removeClass('expand');
				$this.addClass('collapse');
				$showHtml.hide();
			}
									
		});
	});
</script>
<body lang="ZH-CN" link="blue" vlink="purple">
	<table class="tb-main" style=";">
		<tr><td style="">
		<table class="tb-header">
			<tr>
			<td style="border-radius:3px 3px 0 0; padding-left:39px;padding-top:9px;" width="35px">
				<img class="icon"   src="/Public/img/newlogo.jpg">&nbsp;</td>
				<td style="border-radius:3px 3px 0 0; vertical-align:middle;">
					NDST.App安全审计报告
				</td>
			</tr>
		</table>
		<p class="separate-head">&nbsp;</p>
	<table class="tb-comm" style="border:none;">
	<thead>
		<tr>
			<td colspan="2" ><img class="icon" src="/Public/img/ico_scan_con.png">&nbsp;扫描结论</td>
		</tr>
	</thead>
	<tbody>
		<tr class="no-border">
			<td class="no-border" style="width:506px;padding:0px;">
				<table>
					<tr>
						<td class="td-first">威胁等级</td>
						<td class="left">
							<?php if($riskNumber > 10): ?><font color=red>高</font>
							<?php elseif($riskNumber > 5): ?>
							<font color=orange>中</font>
							<?php else: ?>
							<font color=green>低</font><?php endif; ?>
						</td>										
					</tr>
					<tr><td>漏洞概述</td>
						<td class="left">
							共审计出<span class="font-risknum"><?php echo ($riskNumber); ?></span>个风险
						</td>										
					</tr>
					
				</table>
			</td>
		</tr>
		
	</tbody>
</table>	
<div class="separate">&nbsp;</div><!-- 基本信息 -->
<table class="tb-comm">
	<thead>
		<tr ><td colspan="3" ><img class="icon" src="/Public/img/ico_basic_info.png">&nbsp;基本信息</td></tr>
	</thead>
	<tbody>
		<tr>
			<td class="td-first" style="height:36px;">文件名</td>
			<td style="height:36px;"><?php echo ($info["name"]); ?></td>				
		</tr>
		<tr>
			<td>文件大小</td>
			<td><?php echo ($info["size"]); ?>MB</td>
		</tr>
		<tr>
			<td>MD5</td>
			<td><?php echo ($info["md5"]); ?></td>
		</tr>				
		<tr>
			<td>上传时间</td>
			<td><?php echo ($info["createtime"]); ?></td>
		</tr>
		<tr>
			<td>审计耗时</td>
			<td><?php echo ($info["h"]); ?>小时<?php echo ($info["m"]); ?>分钟<?php echo ($info["s"]); ?>秒</td>
		</tr>
	</tbody>
</table>
<div class="separate">&nbsp;</div><table class="tb-comm">
	<thead>
		<tr><td colspan="2" ><img class="icon" src="/Public/img/ico_hole_detail.png">&nbsp;风险漏洞审计</td></tr>
	</thead>
	<tbody class="tb-hole-detail">
		<?php if(is_array($vul)): $i = 0; $__LIST__ = $vul;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vulid): $mod = ($i % 2 );++$i;?><tr>
				<td class="collapse td-collapse">
					<?php $_RANGE_VAR_=explode(',',"8,10");if($vulid["risklevel"]>= $_RANGE_VAR_[0] && $vulid["risklevel"]<= $_RANGE_VAR_[1]):?><font color=red>【高危】</font><?php echo ($vulid["riskname"]); endif; ?>
					<?php $_RANGE_VAR_=explode(',',"5,7");if($vulid["risklevel"]>= $_RANGE_VAR_[0] && $vulid["risklevel"]<= $_RANGE_VAR_[1]):?><font color=orange>【中危】</font><?php echo ($vulid["riskname"]); endif; ?>
					<?php $_RANGE_VAR_=explode(',',"1,4");if($vulid["risklevel"]>= $_RANGE_VAR_[0] && $vulid["risklevel"]<= $_RANGE_VAR_[1]):?><font color=green>【低危】</font><?php echo ($vulid["riskname"]); endif; ?>
				</td>
				<td>
		 			<?php if($vulid["verdict"] == 2): ?><font color=red>风险</font>
		  			<?php else: ?>
		  				<font color=green>安全</font><?php endif; ?>
				</td>				
			</tr>
			<tr class="collapse-show">
				<td colspan="2" >
				<div style="clear:both;">
					
					<div class="expand-title">漏洞描述：</div>
					<div class="expand-content"><?php echo ($vulid["riskdetail"]); ?></div>
				</div>
				<div style="clear:both;">
					<div class="expand-title">详细内容：</div>
					<div class="expand-content"><font color=red><?php echo ($vulid["result"]); ?></font></div>
				</div>
				<div style="clear:both;">
					<div class="expand-title">修复建议：</div>
					<div class="expand-content"><?php echo ($vulid["fixes"]); ?></div>
				</div>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</tbody>
</table>
<div class="separate">&nbsp;</div>
<table class="tb-comm">
	<thead>
		<tr><td colspan="2" ><img class="icon" src="/Public/img/ico_danger_detail.png">&nbsp;组件安全审计</td></tr>
	</thead>
	<tbody class="">
			<?php if(is_array($risk)): $i = 0; $__LIST__ = $risk;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$riskid): $mod = ($i % 2 );++$i;?><tr>
				<td class="collapse td-collapse">
					<?php $_RANGE_VAR_=explode(',',"8,10");if($riskid["risklevel"]>= $_RANGE_VAR_[0] && $riskid["risklevel"]<= $_RANGE_VAR_[1]):?><font color=red>【高危】</font><?php echo ($riskid["riskname"]); endif; ?>
					<?php $_RANGE_VAR_=explode(',',"5,7");if($riskid["risklevel"]>= $_RANGE_VAR_[0] && $riskid["risklevel"]<= $_RANGE_VAR_[1]):?><font color=orange>【中危】</font><?php echo ($riskid["riskname"]); endif; ?>
					<?php $_RANGE_VAR_=explode(',',"1,4");if($riskid["risklevel"]>= $_RANGE_VAR_[0] && $riskid["risklevel"]<= $_RANGE_VAR_[1]):?><font color=green>【低危】</font><?php echo ($riskid["riskname"]); endif; ?>
				</td>
				<td>
		 			<?php if($riskid["verdict"] == 2): ?><font color=red>有风险</font>
		  			<?php else: ?>
		  				<font color=green>安全</font><?php endif; ?>
				</td>				
			</tr>
			<tr class="collapse-show">
				<td colspan="2" >
				<div style="clear:both;">
					
					<div class="expand-title">漏洞描述：</div>
					<div class="expand-content"><?php echo ($riskid["riskdetail"]); ?></div>
				</div>
				<div style="clear:both;">
					<div class="expand-title">详细内容：</div>
					<div class="expand-content"><font color=red><?php echo ($riskid["result"]); ?></font></div>
				</div>
				<div style="clear:both;">
					<div class="expand-title">修复建议：</div>
					<div class="expand-content"><?php echo ($riskid["fixes"]); ?></div>
				</div>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</tbody>
</table>
<div class="separate">&nbsp;</div><table class="tb-comm">
	<thead>
		<tr><td colspan="2" ><img class="icon" src="/Public/img/ico_safe_tip.png">&nbsp;敏感信息与权限审计</td></tr>
	</thead>
	<tbody class="">
				<?php if(is_array($tips)): $i = 0; $__LIST__ = $tips;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tipsid): $mod = ($i % 2 );++$i;?><tr>
				<td class="collapse td-collapse">
					<?php $_RANGE_VAR_=explode(',',"8,10");if($tipsid["risklevel"]>= $_RANGE_VAR_[0] && $tipsid["risklevel"]<= $_RANGE_VAR_[1]):?><font color=red>【高危】</font><?php echo ($tipsid["riskname"]); endif; ?>
					<?php $_RANGE_VAR_=explode(',',"5,7");if($tipsid["risklevel"]>= $_RANGE_VAR_[0] && $tipsid["risklevel"]<= $_RANGE_VAR_[1]):?><font color=orange>【中危】</font><?php echo ($tipsid["riskname"]); endif; ?>
					<?php $_RANGE_VAR_=explode(',',"1,4");if($tipsid["risklevel"]>= $_RANGE_VAR_[0] && $tipsid["risklevel"]<= $_RANGE_VAR_[1]):?><font color=green>【低危】</font><?php echo ($tipsid["riskname"]); endif; ?>
				</td>
				<td>
		 			<?php if($tipsid["verdict"] == 2): ?><font color=red>有风险</font>
		  			<?php else: ?>
		  				<font color=green>安全</font><?php endif; ?>
				</td>				
			</tr>
			<tr class="collapse-show">
				<td colspan="2" >
				<div style="clear:both;">
					
					<div class="expand-title">漏洞描述：</div>
					<div class="expand-content"><?php echo ($tipsid["riskdetail"]); ?></div>
				</div>
				<div style="clear:both;">
					<div class="expand-title">详细内容：</div>
					<div class="expand-content"><font color=red><?php echo ($tipsid["result"]); ?></font></div>
				</div>
				<div style="clear:both;">
					<div class="expand-title">修复建议：</div>
					<div class="expand-content"><?php echo ($tipsid["fixes"]); ?></div>
				</div>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</tbody>
</table>
<div class="separate">&nbsp;</div><table class="tb-comm">
<div class="separate">&nbsp;</div><div class="separate">&nbsp;</div>
</td></tr></table></body></html>