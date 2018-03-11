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

            .full-width{
                width: 100vw;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
                flex-direction: column;
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
                flex: 0 0 auto;
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
            <div class="flex-center section signup">
                <label>name</label>
                <input type="text" name="name" />
                <label>email</label>
                <input type="email" name="email" />
                <label>password</label>
                <input type="password" name="password" />
                <label>confirm</label>
                <input type="password" name="password_confirmation" />
                <button onClick="handleSignup()">Sign Up</button>
            </div>
            <div class="flex-center section auth">                
                <label>email</label>
                <input type="email" name="email" />
                <label>password</label>
                <input type="password" name="password" />                
                <button onClick="handleAuth()">Authenticate</button>
            </div>
            <div class="flex-center section reset">                
                <label>email</label>
                <input type="email" name="email" />
                <label>password</label>
                <input type="password" name="password" />
                <label>new password</label>
                <input type="password" name="new_password" />
                <label>confirm</label>
                <input type="password" name="new_password_confirmation" />
                <button onClick="handleReset()">Sign Up</button>
            </div>
            <div class="flex-center section reset">                
                <button onClick="makeRequest()">Fetch Request</button>
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
    function handleSignup(){
        console.log('pressed');
        var data = {
            name: $('.signup input[name="name"]').val(),
            email: $('.signup input[name="email"]').val(),
            password: $('.signup input[name="password"]').val(),
            password_confirmation: $('.signup input[name="password_confirmation"]').val(),
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

    function handleAuth(){
        var data = {            
            email: $('.auth input[name="email"]').val(),
            password: $('.auth input[name="password"]').val(),          
        }

        axios({
            method: 'post',
            url: '/api/authenticate',
            data: data
        })
        .then((res)=>{
            console.log(res);
            
        })
    }

    function handleReset(){
        var data = {            
            email: $('.reset input[name="email"]').val(),
            password: $('.reset input[name="password"]').val(),   
            new_password: $('.reset input[name="new_password"]').val(),
            new_password_confirmation: $('.reset input[name="new_password_confirmation"]').val(),   
        }


        axios({
            method: 'post',
            url: '/api/reset-password',
            data: data
        })
        .then((res)=>{
            console.log(res);
            
        })
    }

    function makeRequest(){
        axios({
            headers: {
                Authorization: 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjFjNGFmYjg3Y2UyOGRhYTFiNDE1MWQxZjBlMzc1YzBiOWRiMDY4MzI3YWFhNzliZWZjNWI4ODY5MDY5MDliNGFlMTU1YTI5YzBhZjA5OTZkIn0.eyJhdWQiOiI1IiwianRpIjoiMWM0YWZiODdjZTI4ZGFhMWI0MTUxZDFmMGUzNzVjMGI5ZGIwNjgzMjdhYWE3OWJlZmM1Yjg4NjkwNjkwOWI0YWUxNTVhMjljMGFmMDk5NmQiLCJpYXQiOjE1MTg5NTMxNTgsIm5iZiI6MTUxODk1MzE1OCwiZXhwIjoxNTUwNDg5MTU4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.oSSKEUP3L4puaRY2hnXj8RWVijrRHg9nGfrwcWdL5LkgcDodEbjxFEsuXQ8NhYFjbN6DqFcxAPN2ll-JKu4A0XyMuux55mibxI9XidRmNVZTcPNTJZB17CF34sAnmSPQhttV8eLrAwNNBrhHApJeG2em0J438Z7Rrn28wPKcvgl63Btcnm0FX4AjDVHx8SBPtDS3FqtjTdxxlN3yIiBi9i7ACHFpRkRhN34gAxeijpFSroWjGsyaL0iZuzUik17PMQ-VJBRzlEvAesrC1HxXnLwOGbUP2r2ex1Fhf5dmCoVgq3P3ZVtXvHukPvuqgYZ8bQgnrYuac5tlf_IVhnfTfW3kuy-6dtuN_QiMonlBp_yY6Xi2656nJUMhhgvlmroQ0wcuRB_c4J_0lHR1sGvaoxoDHBtqGlg3zE_gccsagH6xQMIzwuHAig9xgREL39UKU63C7VyUvj57wBhYntfzkzLn16uv4RQ85lQNJ9AhDjoI0q2BKwhysSz7JyqVaWfRb8gfdZ56ML0yVCdrf7x_-_qUeK83YeyZ5IAjzLFyydsi9mgpQUFhlaJSknGyQGJWdi8Y3dF1X1c6CGot5jO80xI7THWDFVMpPy9mPWRmpDaWcy0bndNr342Xh7RueFawdUU3_VrqKRSNUSNYfTfgrQ0Ia9OHWE-V28MBZwkLlWk'
            },
            method: 'get',
            url: '/api/users',            
        })
        .then((res)=>{
            console.log(res);
            
        })
    }
</script>