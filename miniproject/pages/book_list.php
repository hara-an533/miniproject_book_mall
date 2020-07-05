<?php
$html = '';

require_once('../include/common.in.php');

$sql = "SELECT b.id,c1name,c2name,title,poster FROM {$pre}book as b,{$pre}class1 as c1,{$pre}class2 as c2 WHERE b.c1id=c1.id AND b.c2id=c2.id";

$msql->execute($sql);

while ($res = $msql->fetch()) {

    $res['poster'] = $host.'/upload/poster/'.$res['poster'];

    $html .= '<tr>
        <td>' . $res['id'] . '</td>
        <td>' . $res['c1name'] . '</td>
        <td>' . $res['c2name'] . '</td>
        <td>' . $res['title'] . '</td>
        <td><img src="'.$res['poster'].'"></td>
        <td>浏览 | 修改 | <a href="javascript:;" id="' . $res['id'] . '" class="del">删除</a></td>
      </tr>';
}

$msql -> error();

?>

<div style="text-align: right;"><button type="button" class="layui-btn layui-btn-sm layui-btn-radius" id="book_add">新增图书</button></div>

<table class="layui-table">
    <colgroup>
        <col width="150">
        <col width="200">
        <col width="200">
        <col width="400">
        <col width="200">
        <col>
    </colgroup>
    <thead>
        <tr>
            <th>ID</th>
            <th>一级分类</th>
            <th>二级分类</th>
            <th>产品名称</th>
            <th>封面</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>

        <?php echo $html; ?>

    </tbody>
</table>


<script>
    //Demo
    layui.use(['form', 'jquery', 'layer'], function() {
        var form = layui.form;
        var $ = layui.jquery;
        var layer = layui.layer;

        //新增
        $("#book_add").click(function(){

            $("#showBody").load('pages/book_add.php');

        })

        //删除
        $(".del").click(function() {

            //获取要删除的ID
            let id = $(this).attr('id');

            //询问
            layer.confirm('确定要删除吗？', {
                btn: ['确定', '取消'] //按钮
            }, function() {
                $.get('pages/book_del.php',{id},function(data){

                    if (data == 'success'){
                        layer.msg('删除成功！',{shift:-1,time:1000},function(){

                            //重载数据
                            $("#showBody").load('pages/book_list.php');


                        });
                    } else {
                        layer.msg('删除失败！');
                    }

                })
            }, function() {
                
            });

        })
    });
</script>