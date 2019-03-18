<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 商品分类 </title><base href="/zhoukao/Public/admin/"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo U('index');?>">添加分类</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品分类 </span>
<div style="clear:both"></div>
</h1>

<form method="post" action="" name="listForm">
<!-- start ad position list -->
	<div class="list-div" id="listDiv">
		<table width="100%" cellspacing="1" cellpadding="2" id="list-table">
			<tbody>

            <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr align="center" class="0" id="0_1" parent_id="<?php echo ($val["parent_id"]); ?>"  cat_id="<?php echo ($val["cat_id"]); ?>">
                <td align="left" class="first-cell">
                    <!-- 缩进 -->
                    <?php  echo str_repeat('&nbsp;',substr_count($val['depath'],'-')*3) ?>
                    <img src="images/menu_minus.gif" class='imgs' cat_id='<?php echo ($val["cat_id"]); ?>' id="icon_0_1" width="9" height="9" border="0" style="margin-left:0em" >
                    <span><a href="goods.php?act=list&amp;cat_id=1"><?php echo ($val["cat_name"]); ?></a></span>
                </td>
                <td width="10%"><span><?php echo ($val["cat_desc"]); ?></span></td>

                <td width="10%"><?php echo ($val["is_show"]); ?></td>

                <td width="24%" align="center">
                    <a href="category.php?act=move&amp;cat_id=1">转移商品</a> |
                    <a href="category.php?act=edit&amp;cat_id=1">编辑</a> |
                    <a href="javascript:;" onclick="listTable.remove(1, '您确认要删除这条记录吗?')" title="移除">移除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	<!--  start 这些代码是显示使用，没有格式化 开发时可删除-->

  	<!--  end这些代码是显示使用，没有格式化 开发时可删除-->
	</tbody>
  </table>
</div>
</form>

  </table>
</div>
</form>


<div id="footer">
	版权所有 &copy; 2006-2013 软工教育 - 高级PHP - </div>
</div>

</body>
</html>