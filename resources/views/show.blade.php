<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 实例</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery.js"></script>
    <script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
    <script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script>
</head>
<body>

<div class="container">
    <h2>新建任务</h2>
    <form id="from" method="post">
        @csrf
        <div class="form-group">
            <label for="email">任务名称:</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="email">负责人:</label>
            <select name="user_id" id="">
                @foreach($data as $val)
                <option value="{{$val->id}}">{{$val->username}}</option>
                @endforeach
            </select>
        </div>
        <script src="/laydate/laydate/laydate.js"></script> <!-- 改成你的路径 -->
        <div class="form-group">
            <label for="pwd">开始时间:</label>
            <input type="datetime-local" class="form-control" id="test1" name="create_at">
        </div>
        <div class="form-group">
            <label for="pwd">结束时间:</label>
            <input type="datetime-local" class="form-control" id="test2" name="end_at">
        </div>
        <div class="form-group">
            <label for="pwd">优先级:</label>
            <input type="radio" value="高" name="is_show">高
            <input type="radio" value="高" name="is_show">中
            <input type="radio" value="高" name="is_show">低
            <input type="radio" value="高" name="is_show">无
        </div>
        <div class="form-group">
            <label for="pwd">任务描述:</label>
            <textarea name="desc" id="" cols="120" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">提交</button>
    </form>
</div>

</body>
</html>
<script>
    //执行一个laydate实例
    laydate.render({
        elem: '#test1' ,//指定元素
    });
    laydate.render({
        elem: '#test2' //指定元素
    });
    $(".btn-primary").click(function () {
        var _token = "{{csrf_token()}}"
        $("#from").validate({
            rules:{
                name:{
                    required:true,
                },
                user_id:{
                    required:true,
                },
                desc:{
                    required:true,
                }
            },
            messages:{
                name:{
                    required:'任务名称必选',
                },
                user_id:{
                    required:'请选择执行用户',
                },
                desc:{
                    required:'请填写任务描述',
                }
            }
        })
        var data = $('#from').serialize()
        $.ajax({
            type:"POST",
            url:"{{route('save')}}",
            data:{
                data,
                _token
            },
            dataType:"json",
        }).then((res)=>{
            
        })
    })

</script>
