<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <style>
        table,
        th,
        td {
            border: 1px solid violet;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            text-align: center;
        }

        th {
            color: #b22222
        }

        table {
            margin: auto;
            width: 80%;
            border: 3px solid green;
            padding: 10px;
        }

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

        h1 {
            text-align: center;
            color: #6595ED;
            font-size: 45px;
        }

        h3 {
            color: teal;
        }

        h2 {
            color: #d2691e
        }

        a.bouncy {
            animation: bouncy 5s infinite linear;
            position: relative;
            display: inline-block;
            padding: 0.3em 1.2em;
            margin: 0 0.1em 0.1em 0;
            border: 0.16em solid rgba(255, 255, 255, 0);
            border-radius: 2em;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Roboto', sans-serif;
            font-weight: 300;
            color: #FFFFFF;
            text-shadow: 0 0.04em 0.04em rgba(0, 0, 0, 0.35);
            text-align: center;
            transition: all 0.2s;
        }

        a.bouncy:hover {
            border-color: rgba(255, 255, 255, 1);
        }

        @keyframes bouncy {
            0% {
                top: 0em
            }

            40% {
                top: 0em
            }

            43% {
                top: -0.9em
            }

            46% {
                top: 0em
            }

            48% {
                top: -0.4em
            }

            50% {
                top: 0em
            }

            100% {
                top: 0em;
            }
        }

        button {
            background-color: #ff1493;
            border-radius: 30px;
            color: white;
            font-size: 18px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #20b2aa;
        }

        li {
            float: left;
            border-right: 1px solid #bbb;
        }

        li:last-child {
            border-right: none;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #ddd;
        }

        .active:hover {
            background-color: #6a5acd;
        }

        /* Search bar */
        .cf:before,
        .cf:after {
            content: "";
            display: table;
        }

        .cf:after {
            clear: both;
        }

        .cf {
            zoom: 1;
        }

        .form-wrapper {
            width: 450px;
            padding: 15px;
            margin: 10px auto 50px 800px;
            background: #444;
            background: rgba(0, 0, 0, .2);
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border-radius: 10px;
            -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, .4) inset, 0 1px 0 rgba(255, 255, 255, .2);
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .4) inset, 0 1px 0 rgba(255, 255, 255, .2);
            box-shadow: 0 1px 1px rgba(0, 0, 0, .4) inset, 0 1px 0 rgba(255, 255, 255, .2);
        }

        .form-wrapper input {
            width: 330px;
            height: 20px;
            padding: 10px 5px;
            float: left;
            font: bold 15px 'lucida sans', 'trebuchet MS', 'Tahoma';
            border: 0;
            background: #eee;
            -moz-border-radius: 3px 0 0 3px;
            -webkit-border-radius: 3px 0 0 3px;
            border-radius: 3px 0 0 3px;
        }

        .form-wrapper button {
            overflow: visible;
            position: relative;
            float: right;
            border: 0;
            padding: 0;
            cursor: pointer;
            height: 40px;
            width: 110px;
            font: bold 15px/40px 'lucida sans', 'trebuchet MS', 'Tahoma';
            color: #fff;
            text-transform: uppercase;
            background: #d83c3c;
            -moz-border-radius: 0 3px 3px 0;
            -webkit-border-radius: 0 3px 3px 0;
            border-radius: 0 3px 3px 0;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, .3);
        }

        .form-wrapper button:hover {
            background: #e54040;
        }

        .form-wrapper button:active,
        .form-wrapper button:focus {
            background: #c42f2f;
        }

        .form-wrapper button:before {
            content: '';
            position: absolute;
            border-width: 8px 8px 8px 0;
            border-style: solid solid solid none;
            border-color: transparent #d83c3c transparent;
            top: 12px;
            left: -6px;
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
