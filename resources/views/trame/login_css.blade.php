<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <style>
        .etat {
            text-align: center;
            font-size: 18px;
            color: red;
            font-weight: bold;
            background-color: #90ee90;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .error {
            color: red;
        }

        body {
            background: url('http://cdn.wallpapersafari.com/13/6/Mpsg2b.jpg');
            margin: 0px;
            font-family: 'Ubuntu', sans-serif;
            background-size: 100% 110%;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        a {
            margin: 0;
            padding: 0;
        }

        .login {
            margin: 0 auto;
            max-width: 500px;
        }

        .login-header {
            color: #fff;
            text-align: center;
            font-size: 300%;
        }

        .login-form {
            border: .5px solid #fff;
            background: #ffD700;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #000;
        }

        .login-form h3 {
            text-align: left;
            margin-left: 40px;
            color: #fff;
        }

        .login-form {
            box-sizing: border-box;
            padding-top: 15px;
            padding-bottom: 10%;
            margin: 5% auto;
            text-align: center;
        }

        .login input[type="text"],
        .login input[type="password"] {
            max-width: 400px;
            width: 80%;
            line-height: 3em;
            font-family: 'Ubuntu', sans-serif;
            margin: 1em 2em;
            border-radius: 5px;
            border: 2px solid #f2f2f2;
            outline: none;
            padding-left: 10px;
        }

        .login-form input[type="submit"] {
            height: 30px;
            width: 100px;
            background: #fff;
            border: 1px solid #f2f2f2;
            border-radius: 20px;
            color: slategrey;
            text-transform: uppercase;
            font-family: 'Ubuntu', sans-serif;
            cursor: pointer;
        }

        .sign-up {
            font-size: 13px;
            padding-top: 7px;
            padding-right: 7px;
            padding-left: 7px;
            padding-bottom: 7px;
            margin-left: -300px;
            background: #fff;
            border: 1px solid #f2f2f2;
            border-radius: 20px;
            color: slategrey;
            text-transform: uppercase;
            font-family: 'Ubuntu', sans-serif;
            cursor: pointer;
        }

        a:link,
        a:visited {
            text-decoration: none;
        }

    </style>
</head>

<body>
    @section('etat')
        @if (session()->has('etat'))
            <p class="etat">{{ session()->get('etat') }}</p>
        @endif
    @show

    @yield('contents')

</body>

</html>
