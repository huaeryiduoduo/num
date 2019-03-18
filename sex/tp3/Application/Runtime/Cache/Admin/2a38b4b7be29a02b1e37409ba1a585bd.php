<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
    <base href="/tp3/Public/Admin/"/>
	<link href="styles/general.css" rel="stylesheet" type="text/css" />
	<link href="styles/main.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/utils.js"></script>
	<script type="text/javascript" src="js/selectzone.js"></script>
	<script type="text/javascript" src="js/colorselector.js"></script>
	<script type="text/javascript" src="js/calendar.php?lang="></script>
</head>
<body>
<h1>
	<span class="action-span"><a href="goods.php?act=list">商品列表</a></span>
	<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心 </a> </span><span id="search_id" class="action-span1"> - 编辑商品信息 </span>
	<div style="clear:both"></div>
</h1>
<form action="<?php echo U('phone/index');?>" method="post" enctype="multipart/form-data">
<table id="general-table" style="display: table;" width="90%" align="center">
			<tbody>
				<tr>
					<td class="">商品名称：</td>
					<td><input name=label"goods_name" size="30" type="text"><span class="require-field">*</span></td>
				</tr>
			
			<tr>
				<td class="label">商品分类：</td>
				<td>
					<select name="cat_id" onchange="hideCatDiv()">
						<option value="0">请选择...</option>
						<option value="1">手机类型</option>
						<option value="5">&nbsp;&nbsp;&nbsp;&nbsp;双模手机</option>
						<option value="2">&nbsp;&nbsp;&nbsp;&nbsp;CDMA手机</option>
						<option value="3" selected="ture">&nbsp;&nbsp;&nbsp;&nbsp;GSM手机</option>
						
					</select>
                 </td>
			</tr>

			<tr>
				<td class="label">商品品牌：</td>
				<td>
					<select name="brand_id" onchange="hideBrandDiv()">
						<option value="0">请选择...</option>
						<option value="1" selected="">诺基亚</option>
						<option value="10">金立</option>
						<option value="9">联想</option>
						<option value="8">LG</option>
						
				</td>
			</tr>
            
            <tr>
				<td class="label">本店售价：</td>
				<td><input name="shop_price" value="3010.00" size="20" onblur="priceSetted()" type="text">
				<input value="按市场价计算" onclick="marketPriceSetted()" type="button">
				<span class="require-field">*</span></td>
			</tr>
			

      
          <tr>
            <td class="label">上传商品图片：</td>
            <td>
              <input name="goods_img" size="35" type="file">        
            </td>
          </tr>

           <tr>
           	<td>简单描述</td>
           	<td><input type="text" name="goods_brief" /></td>
           </tr>

           <tr>
           	<td>商品详情：</td>
           	<td><textarea name="goods_desc" id="" cols="30" rows="10"></textarea></td>
           </tr>
			<tr><td colspan="2" align="center"><input type="submit"  value="添加"/></td></tr>
        </tbody></table>
</form>
</body>

</html>