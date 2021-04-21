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
