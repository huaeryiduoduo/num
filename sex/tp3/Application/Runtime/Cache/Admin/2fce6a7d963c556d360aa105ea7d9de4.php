<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 品牌管理 </title>
    <base href="/tp3/Public/Admin/"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo U('index');?>">添加品牌</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品品牌 </span>
<div style="clear:both"></div>
</h1>

<div class="form-div">
  <form action="javascript:search_brand()" name="searchForm">
    <img src="images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH">
     <input type="text" name="brand_name" size="15">
    <input type="submit" value=" 搜索 " class="button">
  </form>
</div>

<form method="post" action="" name="listForm">
<!-- start brand list -->
<div class="list-div" id="listDiv">

  <table cellpadding="3" cellspacing="1">
    <tbody>
		<tr>
			<th>品牌名称</th>
			<th>品牌网址</th>
			<th>品牌描述</th>
			<th>排序</th>
			<th>是否显示</th>
			<th>操作</th>
		</tr>
        <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><tr>
			<td class="first-cell">
                <span style="float:right"><a href="../data/brandlogo/1240803062307572427.gif" target="_brank"><img src="/tp3/Public/<?php echo ($res["brand_logo"]); ?>" width="16" height="16" border="0" alt="品牌LOGO"></a></span>
			    <span class="dian" ><?php echo ($res["brand_name"]); ?></span>
              <input type="text" style="display: none" id="gai" gai="<?php echo ($res["brand_id"]); ?>" value="<?php echo ($res["brand_name"]); ?>"/>
			</td>
			<td><a href="http://www.nokia.com.cn/" target="_brank"></a><?php echo ($res["site_url"]); ?></td>
			<td align="left" ><?php echo ($res["brand_desc"]); ?></td>
			<td align="right"><span onclick="javascript:listTable.edit(this, 'edit_sort_order', 1)"><?php echo ($res["sort"]); ?></span></td>
            <?php if($res["is_show"] == 1): ?><td align="center"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_show', 1)"></td>
                <?php else: ?>
                <td align="center"><img src="images/no.gif" onclick="listTable.toggle(this, 'toggle_show', 1)"></td><?php endif; ?>

			<td align="center">
				<a href="brand.php?act=edit&amp;id=1" title="编辑">编辑</a> |
				<a href="javascript:;" title="编辑">移除</a>
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<!--start，这些都是显示代码，没有格式化，开发时会删除 -->


	<!--end，这些都是显示代码，没有格式化，开发时会删除 -->
    <tr>
		<td align="right" nowrap="true" colspan="6">
            <div id="turn-page">
			总计  <span id="totalRecords">11</span>
        个记录分为 <span id="totalPages">2</span>
        页当前第 <span id="pageCurrent">1</span>
        页，每页 <input type="text" size="3" id="pageSize" value="10" onkeypress="return listTable.changePageSize(event)">
        <span id="page-link">
          <a href="javascript:listTable.gotoPageFirst()">第一页</a>
          <a href="javascript:listTable.gotoPagePrev()">上一页</a>
          <a href="javascript:listTable.gotoPageNext()">下一页</a>
          <a href="javascript:listTable.gotoPageLast()">最末页</a>
          <select id="gotoPage" onchange="listTable.gotoPage(this.value)">
            <option value="1">1</option><option value="2">2</option>          </select>
        </span>
      </div>
      </td>
    </tr>
  </tbody></table>

<!-- end brand list -->
</div>
</form>


<div id="footer">
	版权所有 &copy; 2006-2013 软工教育 - 高级PHP - </div>
</div>

</body>
</html>
<script src="/tp3/Public/jquery.min.js"></script>
<script>
    $(document).on("click",".dian",function(){
     $(this).hide();
        var name=$(this).text();
        $(this).next().show();
        $(this).next().val("");
        $(this).next().val(name);
        $(this).next().focus();


    })
    $(document).on("blur","#gai",function(){
        var name=$(this).val();
        var id=$(this).attr("gai");
       var  _this=$(this);
        $.ajax({
            type:"post",
            url:"/tp3/index.php/Admin/Brand/upd",
            data:{name:name,id:id},
            dataType:"json",
            success:function(e){
                if(e.state==1){
                    _this.hide();
                    _this.prev().show();
                    _this.prev().text(name);

                }else{

                }
            }
        })

    })
</script>