<form class="layui-form" action="">

  <div class="layui-form-item">
    <label class="layui-form-label">一级分类</label>
    <div class="layui-input-block">
      <select name="city" lay-verify="required">
        <option value=""></option>

        <?php

        //引入公用文件
        require_once('../include/common.in.php');

        $sql = "SELECT id,c1name FROM {$pre}class1";

        $msql->execute($sql);

        while ($res = $msql->fetch()) {

          echo '<option value="' . $res['id'] . '">' . $res['c1name'] . '</option>';
        }

        $msql->error();


        ?>

      </select>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">分类名称</label>
    <div class="layui-input-block">
      <input type="text" name="title" id="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">分类图标</label>
    <div class="layui-input-block">
      <input type="file" name="ico" id="ico" required lay-verify="required">
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
  layui.use(['form', 'jquery', 'layer'], function() {
    var form = layui.form;
    var $ = layui.jquery;
    var layer = layui.layer;

    //重新渲染
    form.render();

    //监听提交
    form.on('submit(formDemo)', function(data) {

      let formData = new FormData();
      formData.append('title', data.field.title)
      formData.append('c1id', data.field.city)
      formData.append('ico', $("#ico")[0].files[0])

      $.ajax({
        url: 'pages/class2_add_do.php',
        data: formData,
        method: 'POST',
        contentType: false,
        processData: false,
        success: function(data) {

          if (data == 'success') {
            layer.msg('创建成功！', {
              shift: -1,
              time: 1000
            }, function() {

              //清空表单
              $("form")[0].reset();


            });
          } else {
            layer.msg(data);
          }

        }

      })

      return false;
    });

  });
</script>