<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 添加分类 </title><base href="/zhoukao/Public/admin/"/>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo U('add');?>">商品分类</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加分类 </span>
<div style="clear:both"></div>
</h1>
<!-- start add new category form -->
<div class="main-div">
  <form action="/zhoukao/index.php/Home/Cat/add" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
	 <table width="100%" id="general-table">
		<tbody>
			<tr>
				<td class="label">分类名称:</td>
				<td><input type="text" name="cat_name" maxlength="20" value="" size="27"> <font color="red">*</font></td>
			</tr>
			<tr>
				<td class="label">上级分类:</td>
				<td>
					<select name="parent_id">
                        <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i; if($res["parent_id"] == 0): ?><option value="1"><?php echo ($res["cat_name"]); ?></option>
                                <?php else: ?>
                                <option value="1">
                                    <?php echo '&nbsp;' ?>
                                    <?php echo '$nbsp;' ?>
                                    <?php echo ($res["cat_name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>


					</select>
				</td>
			</tr>



			<tr>
				<td class="label">是否显示:</td>
				<td><input type="radio" name="is_show" value="1" checked="true"> 是<input type="radio" name="is_show" value="0"> 否  </td>
			</tr>

      <tr>
        <td class="label">分类描述:</td>
        <td>
          <textarea name="cat_desc" rows="6" cols="48"></textarea>
        </td>
      </tr>
      </tbody></table>
      <div class="button-div">
        <input type="submit" value=" 确定 ">
        <input type="reset" value=" 重置 ">
      </div>
    <input type="hidden" name="act" value="insert">
    <input type="hidden" name="old_cat_name" value="">
  </form>
</div>


</div>

</body>
</html>