<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>show</title>

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
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title">
            <form action="sign" method="post">
                {{ csrf_field() }}
                <table border="1">
                    <h1>登录</h1>
                    <tr>
                        <td>用户名</td>
                        <td><input type="text" name="name" style="height:45px;"></td>
                    </tr>
                    <tr>
                        <td>密码</td>
                        <td><input type="text" name="pwd" style="height:45px;"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="登录"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
</body>
</html>