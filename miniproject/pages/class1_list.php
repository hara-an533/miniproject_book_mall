<?php
$html = '';

require_once('../include/common.in.php');

$sql = "SELECT id,c1name FROM {$pre}class1";

$msql->execute($sql);

while ($res = $msql->fetch()) {

    $html .= '<tr>
        <td>' . $res['id'] . '</td>
        <td>' . $res['c1name'] . '</td>
        <td>修改 | <a href="javascript:;" id="' . $res['id'] . '" class="del">删除</a></td>
      </tr>';
}

?>

<div style="text-align: right;"><button type="button" class="layui-btn layui-btn-sm layui-btn-radius" id="class1_add">新增分类</button></div>

<table class="layui-table">
    <colgroup>
        <col width="150">
        <col width="200">
        <col>
    </colgroup>
    <thead>
        <tr>
            <th>ID</th>
            <th>分类名称</th>
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
        $("#class1_add").click(function(){

            $("#showBody").load('pages/class1_add.php');

        })

        //删除
        $(".del").click(function() {

            //获取要删除的ID
            let id = $(this).attr('id');

            //询问
            layer.confirm('确定要删除吗？', {
                btn: ['确定', '取消'] //按钮
            }, function() {
                $.get('pages/class1_del.php',{id},function(data){

                    if (data == 'success'){
                        layer.msg('删除成功！',{shift:-1,time:1000},function(){

                            //重载数据
                            $("#showBody").load('pages/class1_list.php');


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