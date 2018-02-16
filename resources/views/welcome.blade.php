<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .section{
                border: 1px solid #f475e3;
                padding: 10px;
                border-radius: 3px;
            }
            input{
                margin-right:2px;
            }
            button{
                background-color:#f475e3;
                padding: 10px 20px;
                color: #fafafa;
                font-size: 16px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="flex-center section">
                <label>name</label>
                <input type="text" name="name" />
                <label>email</label>
                <input type="email" name="email" />
                <label>password</label>
                <input type="password" name="password" />
                <label>confirm</label>
                <input type="password" name="password_confirmation" />
                <button onClick="handlePress()">Sign Up</button>
            </div>
        </div>
    </body>
</html>
<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script>
    function handlePress(){
        console.log('pressed');
        var data = {
            name: $('input[name="name"]').val(),
            email: $('input[name="email"]').val(),
            password: $('input[name="password"]').val(),
            password_confirmation: $('input[name="password_confirmation"]').val(),
        }

        axios({
            method: 'post',
            url: '/api/signup',
            data: data
        })
        .then((res)=>{
            console.log(res);
            
        })
    }
</script>