
<form class="layui-form" action="">

  <div class="layui-form-item">
    <label class="layui-form-label">分类名称</label>
    <div class="layui-input-block">
      <input type="text" name="title" id="title" required   lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>


  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>

</form>
 
<script>
//Demo
layui.use(['form','jquery','layer'], function(){
  var form = layui.form;
  var $ = layui.jquery;
  var layer = layui.layer;
  
  //监听提交
  form.on('submit(formDemo)', function(data){
 
    $.post('pages/class1_add_do.php',data.field,function(data){

        if (data == 'success'){
            layer.msg('创建成功！',{shift:-1,time:1000},function(){

                //清空表单
                $("#title").val('');

            });
        } else {
            layer.msg(data);
        }

    })

    return false;
  });

});
</script>