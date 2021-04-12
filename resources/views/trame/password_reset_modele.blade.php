<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <style>
        .error {
            color: red;
        }

        #signup {
            width: 550px;
            height: 450px;
            margin: 100px auto 50px auto;
            padding: 20px;
            position: relative;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        #signup::before,
        #signup::after {
            content: "";
            position: absolute;
            bottom: -3px;
            left: 2px;
            right: 2px;
            top: 0;
            z-index: -1;
            background: #fff;
            border: 1px solid #ccc;
        }

        #signup::after {
            left: 4px;
            right: 4px;
            bottom: -5px;
            z-index: -2;
            box-shadow: 0 8px 8px -5px rgba(0, 0, 0, .3);
        }

        #signup h1 {
            position: relative;
            font: italic 1em/3.5em 'trebuchet MS', Arial, Helvetica;
            color: #999;
            text-align: center;
            margin: 0 0 20px;
        }

        #signup h1::before,
        #signup h1::after {
            content: '';
            position: absolute;
            border: 1px solid rgba(0, 0, 0, .15);
            top: 10px;
            bottom: 10px;
            left: 0;
            right: 0;
        }

        #signup h1::after {
            top: 0;
            bottom: 0;
            left: 10px;
            right: 10px;
        }

        ::-webkit-input-placeholder {
            color: #bbb;
        }

        :-moz-placeholder {
            color: #bbb;
        }

        .placeholder {
            color: #bbb;
            /* polyfill */
        }

        #signup input {
            margin: 5px 0;
            padding: 15px;
            width: 100%;
            *width: 518px;
            /* IE7 and below */
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        #signup input:focus {
            outline: 0;
            border-color: #aaa;
            box-shadow: 0 2px 1px rgba(0, 0, 0, .3) inset;
        }

        #signup button {
            margin: 20px 0 0 0;
            padding: 15px 8px;
            width: 100%;
            cursor: pointer;
            border: 1px solid #2493FF;
            overflow: visible;
            display: inline-block;
            color: #fff;
            font: bold 1.4em arial, helvetica;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, .4);
            background-color: #2493ff;
            border-radius: 3px;
            box-shadow: 0 2px 1px rgba(0, 0, 0, .3),
                0 1px 0 rgba(255, 255, 255, .5) inset;
        }

        #signup button:hover {
            background-color: #7cbfff;
            border-color: #7cbfff;
        }

        #signup button:active {
            position: relative;
            top: 3px;
            text-shadow: none;
            box-shadow: 0 1px 0 rgba(255, 255, 255, .3) inset;
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

    @yield('contents')

</body>

</html>
