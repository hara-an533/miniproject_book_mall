<?php
$html = '';

require_once('../include/common.in.php');

$sql = "SELECT c2.id,c1name,c2name FROM {$pre}class2 as c2 LEFT JOIN {$pre}class1 as c1 ON (c2.c1id=c1.id) ORDER BY c2.id DESC";

$msql->execute($sql);

while ($res = $msql->fetch()) {

    $html .= '<tr>
        <td>' . $res['id'] . '</td>
        <td>' . $res['c1name'] . '</td>
        <td>' . $res['c2name'] . '</td>
        <td>修改 | <a href="javascript:;" id="' . $res['id'] . '" class="del">删除</a></td>
      </tr>';
}

?>

<div style="text-align: right;"><button type="button" class="layui-btn layui-btn-sm layui-btn-radius" id="class2_add">新增分类</button></div>

<table class="layui-table">
    <colgroup>
        <col width="150">
        <col width="200">
        <col width="200">
        <col>
    </colgroup>
    <thead>
        <tr>
            <th>ID</th>
            <th>一级分类</th>
            <th>二级分类</th>
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
        $("#class2_add").click(function(){

            $("#showBody").load('pages/class2_add.php');

        })

        //删除
        $(".del").click(function() {

            //获取要删除的ID
            let id = $(this).attr('id');

            //询问
            layer.confirm('确定要删除吗？', {
                btn: ['确定', '取消'] //按钮
            }, function() {
                $.get('pages/class2_del.php',{id},function(data){

                    if (data == 'success'){
                        layer.msg('删除成功！',{shift:-1,time:1000},function(){

                            //重载数据
                            $("#showBody").load('pages/class2_list.php');


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