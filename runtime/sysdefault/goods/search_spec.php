<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理后台</title>
<link rel="stylesheet" href="<?php echo $this->getWebSkinPath()."css/admin.css";?>" />
<script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/jquery/jquery-1.11.3.min.js"></script><script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/artdialog/artDialog.js"></script><script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/artdialog/plugins/iframeTools.js"></script><link rel="stylesheet" type="text/css" href="/iwebshop/runtime/_systemjs/artdialog/skins/aero.css" />
<script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/form/form.js"></script>
<script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/autovalidate/validate.js"></script><link rel="stylesheet" type="text/css" href="/iwebshop/runtime/_systemjs/autovalidate/style.css" />
<script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/artTemplate/artTemplate.js"></script><script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/artTemplate/artTemplate-plugin.js"></script>
<script type='text/javascript' src="<?php echo $this->getWebViewPath()."javascript/admin.js";?>"></script>
</head>
<body style="width:700px;min-height:400px;">
<div class="pop_win">
	<p>
		<button type="button" class="btn f_r" onclick="addSpec()"><span class="add">增加规格项</span></button>
		1、增加规格项或选择规格标签 >> 2、添加需要的规格值 >> 保存
	</p>

	<!--规格按钮-->
	<ul class="tab"></ul>

	<!--规格标签按钮-->
	<script type='text/html' id='specButtonTemplate'>
		<%for(var item in templateData){%>
			<%include('specButtonLiTemplate',{'item':templateData[item]})%>
		<%}%>
	</script>

	<!--规格标签按钮-->
	<script type='text/html' id='specButtonLiTemplate'>
		<li id="specButton<%=item['id']%>">
			<a href="javascript:void(0);" style="display:inline;padding-right:8px;" onclick="selectTab(<%=item['id']%>);" hidefocus="true"><%=item['name']%></a>
			<label class="radio"><img src="<?php echo $this->getWebSkinPath()."images/admin/icon_del.gif";?>" class="delete" title="删除" onclick="delSpec(<%=item['id']%>,this);" /></label>
		</li>
	</script>

	<table class="spec" width="95%" cellspacing="0" cellpadding="0" border="0">

		<!--全部的规格,水平样式规格-->
		<tr>
			<td id="horizontalBox"></td>

			<!--水平规格列表-->
			<script type='text/html' id='horizontalSpecTemplate'>
			<%for(var item in templateData){%>
				<%include('horizonalSpecDlTemplate',{'item':templateData[item]})%>
			<%}%>
			</script>

			<!--水平规格单行-->
			<script type='text/html' id='horizonalSpecDlTemplate'>
			<%var className = item['type']==1 ? 'w_27':'w_45'%>
			<dl class="summary clearfix" id="horizontal_<%=item['id']%>" style='display:none'>
				<dt><label class="red">点击选择</label>下列《<%=item['name']%>》：如果没有您需要的《<%=item['name']%>》？请到规格列表中编辑<%=item['name']%></dt>
				<dd class="<%=className%>">
					<%var valueList = parseJSON(item['value']);%>
					<%for(var result in valueList){%>
					<div class="item">
						<a href="javascript:selectSpec({'id':<%=item['id']%>,'value':'<%=valueList[result]%>','name':'<%=item['name']%>','type':<%=item['type']%>});">
						<%if(item['type']==1){%>
							<%=valueList[result]%>
						<%}else{%>
							<img src="<?php echo IUrl::creatUrl("")."";?><%=valueList[result]%>" width="30px" height="30px"/>
						<%}%>
						</a>
					</div>
					<%}%>
				</dd>
			</dl>
			</script>
		</tr>

		<!--已存在的规格,垂直样式规格-->
		<tr>
			<td>
				<div class="cont" id="verticalBox" style='display:none'>
					<table class="border_table" width="100%" style="margin-top:0px;">
						<thead>
							<tr>
								<th>规格值</th>
								<th>操作</th>
							</tr>
						</thead>

						<!--垂直规格列表-->
						<script type='text/html' id='verticalSpecTemplate'>
						<%for(var item in templateData){%>
						<%item = templateData[item]%>
						<tbody id="vertical_<%=item['id']%>" style='display:none'>
							<%var tempSpecArray = item['value'].split(',')%>
							<%for(var result in tempSpecArray){%>
							<%result = tempSpecArray[result]%>
								<%if(result){%>
									<%include('verticalRowTemplate',{'id':item['id'],'name':item['name'],'type':item['type'],'value':result})%>
								<%}%>
							<%}%>
						</tbody>
						<%}%>
						</script>

						<!--垂直规格单行-->
						<script type='text/html' id='verticalRowTemplate'>
						<tr class='td_c'>
							<td>
								<input type="hidden" name="specJson" value='{"id":"<%=id%>","name":"<%=name%>","type":"<%=type%>","value":"<%=value%>"}' />
								<%if(type == 1){%><%=value%><%}else{%><img width="30px" height="30px" src="<?php echo IUrl::creatUrl("")."<%=value%>";?>" class="img_border" /><%}%>
							</td>
							<td>
								<img class="operator" src="<?php echo $this->getWebSkinPath()."images/admin/icon_asc.gif";?>" onclick="positionUp($(this).parent().parent(),$(this).parent().parent().parent());" alt="向上" />
								<img class="operator" src="<?php echo $this->getWebSkinPath()."images/admin/icon_desc.gif";?>" onclick="positionDown($(this).parent().parent(),$(this).parent().parent().parent());" alt="向下" />
								<img class="operator" src="<?php echo $this->getWebSkinPath()."images/admin/icon_del.gif";?>" onclick="itemRemove($(this).parent().parent());" alt="删除" />
							</td>
						</tr>
						</script>
					</table>
				</div>
			</td>
		</tr>
	</table>
</div>

<script language="javascript">
//DOM加载完毕
$(function()
{
	//规格按钮标签
	<?php if(isset($specData)){?>
	var specButtonHtml = template.render('specButtonTemplate',{'templateData':<?php echo JSON::encode($specData);?>});
	$('.tab').html(specButtonHtml);

	//规格水平列表展示
	var horizontalSpecHtml = template.render('horizontalSpecTemplate',{'templateData':<?php echo JSON::encode($specData);?>});
	$('#horizontalBox').html(horizontalSpecHtml);
	<?php }?>

	//规格垂直列表显示
	<?php if(isset($goodsSpec)){?>
	var verticalSpecHtml = template.render('verticalSpecTemplate',{'templateData':<?php echo JSON::encode($goodsSpec);?>});
	$('#verticalBox .border_table').append(verticalSpecHtml);
	<?php }?>

	//默认激活一个规格按钮
	defaultHoverSpecButton();
});

/**
 * 从已有的规格进行点选
 * @param specJson js对象 id,name,value,type
 */
function selectSpec(specJson)
{
	$('#verticalBox').show();

	//某规格小容器是否存在
	var specTbody = $('#vertical_'+specJson.id);
	if(specTbody.length == 0)
	{
		var verticalSpecHtml = template.render('verticalSpecTemplate',{'templateData':[specJson]});
		$('#verticalBox .border_table').append(verticalSpecHtml);
	}
	else
	{
		//规格值是否已经存在
		var matchValue = '"value":"'+specJson.value+'"';
		if(specTbody.find('input:hidden[value*=\''+matchValue+'\']').length > 0)
		{
			alert('此规格值已经添加过了');
			return;
		}

		var verticalRowHtml = template.render('verticalRowTemplate',specJson);
		specTbody.append(verticalRowHtml);
	}
	$('#vertical_'+specJson.id).show();
}

/**
 * 选择当前Tab
 * @param spec_id 规格ID
 * @param _self 按钮本身
 */
function delSpec(spect_id,_self)
{
	art.dialog.confirm('确定要删除么？',function(){
		//移除tab规格标签按钮
		$(_self).parent().parent().remove();

		//移除水平规格
		$('#horizontal_'+spect_id).remove();

		//移除垂直规格
		$('#vertical_'+spect_id).remove();

		defaultHoverSpecButton();
	});
}

//默认激活规格按钮
function defaultHoverSpecButton()
{
	//已经没有待选择规格
	if($('.tab>li').length == 0)
	{
		$('#verticalBox').hide();
	}
	else
	{
		//默认激活第一个规格
		$('.tab>li:first a').trigger('click');
	}
}

//添加模型规格
function addSpec()
{
	<?php $seller_id = IFilter::act(IReq::get('seller_id'))?>
	art.dialog.open('<?php echo IUrl::creatUrl("/goods/select_spec/seller_id/".$seller_id."");?>', {
		title: '选择规格',
		okVal:'保存',
		ok:function(iframeWin, topWin){
			var specChecked = $(iframeWin.document).find('[name="spec"]:checked');
			if(specChecked.length == 1)
			{
				var specJson = $.parseJSON(specChecked.val());

				//监测规格是否已经存在
				if($('#horizontal_'+specJson.id).length > 0)
				{
					alert('规格已经被添加，不能重复添加');
					return false;
				}

				//规格按钮标签
				var specButtonLiHtml = template.render('specButtonLiTemplate',{'item':specJson});
				$('.tab').append(specButtonLiHtml);

				//规格水平列表展示
				var horizonalSpecDlHtml = template.render('horizonalSpecDlTemplate',{'item':specJson});
				$('#horizontalBox').append(horizonalSpecDlHtml);

				//激活新添加的规格
				$('.tab>li:last a').trigger('click');
			}
		}
	});
}

/**
 * 选择当前Tab
 * @param spec_id 规格ID
 */
function selectTab(spec_id)
{
	//隐藏垂直规格外部
	if($('.tab>li').length == 0)
	{
		$('#verticalBox').hide();
	}
	else
	{
		$('#verticalBox').show();
	}

	//按钮高亮
	$('.tab>li').removeClass('selected');
	$('#specButton'+spec_id).addClass('selected');

	//水平规格展示
	$('[id^="horizontal_"]').hide();
	$('#horizontal_'+spec_id).show();

	//垂直规格展示
	$('[id^="vertical_"]').hide();
	$('#vertical_'+spec_id).show();
}

//项上升
function positionUp(_self,container)
{
	var childrenIndex = container.children().index(_self);
	if(childrenIndex == 0)
	{
		return;
	}
	_self.insertBefore(container.children().get(childrenIndex-1));
}

//项下降
function positionDown(_self,container)
{
	var childrenIndex = container.children().index(_self);
	if(childrenIndex == container.children().length - 1)
	{
		return;
	}
	_self.insertAfter(container.children().get(childrenIndex+1));
}

//项删除
function itemRemove(_self)
{
	art.dialog.confirm('确定要删除么？',function(){_self.remove()});
}
</script>
</body>
</html>