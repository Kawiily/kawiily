<?php
if (!Session::has('name')) {
    echo '<script>alert("请登录");location.href="'.'login'.'";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>show</title>
    <script src="https://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/page.css') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 36px;
            padding: 20px;
        }
        a{
            text-decoration:none
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div>当前用户
            <b><?php echo Session::get('name');?></b>
            <a href="signOut" style="color:#c911ab;">退出登录</a>
        </div>
        <div class="title">
            <div>
                {{ csrf_field() }}
                <span>search
                    <input type="text" name="name" id="name">
                    <button type="submit" id="btn" value="search">search</button>
                </span>
                <script>
                    $(function(){
                        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                        $('#btn').click(function(){
                            var name = $('#name').val();
                            $.ajax({
                                url:'search',
                                type:'POST',
                                data:{'name':name},
                                success:function(obj){
                                   var yy = JSON.parse(obj);
                                    var html = '';
                                    for(var i=0;i<yy.length;i++){
                                        var data = yy[i];
                                        alert(data);
                                        html+='<tr><td>'+data.id+'</td><td>'+data.name+'</td><td>'+data.pwd+'</td><td><a href="upload?id="+data.id>upd</a></td><td><a href="delete?id="+data.id>del</a></td></tr>';//拼接html字符串
                                    }
                                    $("#s").html('');
                                    $("#s").html(html);
                                }
                            });
                        });
                    });
                </script>
            </div>
            <table border="1" cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th>名字</th>
                    <th>密码</th>
                    <th>操作</th>
                    <th><a href="home" style="color:#51c99b;">add</a></th>
                </tr>
                <?php foreach($data as $v){ ?>
                <div id="s">
                <tr>
                    <td><?php echo $v->id; ?> </td>
                    <td><?php echo $v->name; ?> </td>
                    <td><?php echo $v->pwd; ?> </td>
                    <td><a href="upload" style="color:#99c957;">upd</a></td>
                    <td><a href="delete?id=<?php echo $v->id; ?>"  style="color:#9465c9;">del</a></td>
                </tr>
                </div>
                <?php } ?>
            </table>
            <?php echo $data->links();?>
        </div>
    </div>
</div>
</body>
</html>