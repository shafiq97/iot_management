<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Welcome!</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
        }

        .loader {
            color: rgb(0, 6, 83);
            font-family: Consolas, Menlo, Monaco, monospace;
            font-weight: bolder;
            font-size: 10vh;
            opacity: 0.8;
        }

        .loader span {
            display: inline-block;
            -webkit-animation: pulse 0.3s alternate infinite ease-in;
            animation: pulse 0.3s alternate infinite ease-in;
        }

        .loader span:nth-child(odd) {
            -webkit-animation-delay: 0.7s;
            animation-delay: 0.7s;
        }

        @-webkit-keyframes pulse {
            to {
                transform: scale(0.7);
                opacity: 0.5;
            }
        }

        @keyframes pulse {
            to {
                transform: scale(0.7);
                opacity: 0.5;
            }
        }

    </style>

    <script>
        window.console = window.console || function(t) {};
    </script>



    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>


</head>

<body translate="no">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-3 text-center">
                <div class="loader">
                    IOT Managemenent System
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm text-center">
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg" style="margin-right: 10px;">Login</a>
                <a href="{{ route('register') }}" class="btn btn-dark btn-lg">Register</a>
            </div>
        </div>
    </div>
</body>

</html>
