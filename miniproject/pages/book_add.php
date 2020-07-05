<?php

//公用文件
require_once('../include/common.in.php');

//获取分类
$sql = "SELECT id, c2name FROM {$pre}class2 WHERE c1id=" . BID . " ORDER BY id ASC";
$msql->execute($sql);

?>

<form class="layui-form" action="">

    <div class="layui-form-item">
        <label class="layui-form-label">选择分类</label>
        <div class="layui-input-block">
            <select name="city" lay-verify="required">
                <option value=""></option>

                <?php

                while ($res = $msql->fetch()) {

                    echo '<option value="' . $res['id'] . '">' . $res['c2name'] . '</optin>';
                }

                ?>

            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">图书名称</label>
        <div class="layui-input-block">
            <input type="text" name="title" required lay-verify="required" placeholder="请输入书名" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">作者</label>
        <div class="layui-input-block">
            <input type="text" name="author" required lay-verify="required" placeholder="请输入作者" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">出版社</label>
        <div class="layui-input-block">
            <input type="text" name="publicer" required lay-verify="required" placeholder="请输入出版社" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">价格</label>
        <div class="layui-input-inline">
            <input type="number" name="price" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">元</div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">封面</label>
        <div class="layui-input-block">
            <input type="file" name="poster" id="poster" accept="image/*" required lay-verify="required" placeholder="请输入标题" autocomplete="off">
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">缩略图</label>
        <div class="layui-input-block">
            <input type="file" name="photos" id="photos" multiple accept="image/*" placeholder="请输入标题" autocomplete="off">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">是否包邮</label>
        <div class="layui-input-block">
            <input type="checkbox" name="isfree" lay-skin="switch" value="1">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">是否推荐</label>
        <div class="layui-input-block">
            <input type="checkbox" name="isrecommend" lay-skin="switch" value="1">
        </div>
    </div>


    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">描述</label>
        <div class="layui-input-block">
            <textarea name="descript" placeholder="请输入内容" class="layui-textarea" id="descript" style="display: none;"></textarea>
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
    layui.use(['form', 'jquery', 'layedit'], function() {
        var form = layui.form;
        var $ = layui.jquery;
        var layedit = layui.layedit;

        //重载表单
        form.render();

        //图片接口
        layedit.set({
            uploadImage: {
                url: '<?php echo $host?>/pages/book_upload.php' //接口url
                ,type:'post'
            }
        });

        //建立编辑器
        var index = layedit.build('descript');


        //监听提交
        form.on('submit(formDemo)', function(data) {

            //获取描述
            let descript = layedit.getContent(index);
            console.log(index, descript);

            //获取缩略图
            let photos = $("#photos")[0].files;

            //封面
            let poster = $("#poster")[0].files[0];

            //创建FormData
            let formData = new FormData();

            //把表单值附加到formData
            formData.append('title', data.field.title);
            formData.append('c2id', data.field.city);
            formData.append('price', data.field.price);
            formData.append('descript', descript);
            formData.append('author', data.field.author);
            formData.append('publicer', data.field.publicer);
            formData.append('isfree', data.field.isfree);
            formData.append('isrecommend', data.field.isrecommend);
            formData.append('poster', poster);

            //遍历缩略图，并附加到formData
            for (let i = 0; i < photos.length; i++) {
                formData.append('photos[]', photos[i]);
            }

            $.ajax({
                url: 'pages/book_add_do.php',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {

                    if (data == 'success') {

                        // 提示
                        layer.msg('产品入库成功！')

                        //重置表单
                        $("form")[0].reset()

                        //清空描述
                        layedit.build('descript')

                    } else {

                        // 提示
                        layer.msg('产品入库失败！')
                    }

                }

            })



            return false;
        });
    });
</script>