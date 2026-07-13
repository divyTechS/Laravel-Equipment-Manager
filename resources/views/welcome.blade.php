<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background: #3490dc;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }

        a:hover {
            background: #2779bd;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Welcome to Laravel</h1>
        <p>Your Laravel application is running successfully!</p>

        <a href="{{ url('/') }}">Home</a>
    </div>

</body>
</html>