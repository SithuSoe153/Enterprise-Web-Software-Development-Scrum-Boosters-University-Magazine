<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-top: 0;
        }

        p {
            color: #666;
            margin-bottom: 15px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        li strong {
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn.white-text {
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>New User Registration</h2>
        <p>Hello {{ $coordinatorName }},</p>
        <p>A new user has been registered in your faculty:</p>
        <ul>
            <li><strong>Name:</strong> {{ $user->name }}</li>
            <li><strong>Email:</strong> {{ $user->email }}</li>
            <li><strong>Faculty:</strong> {{ $facultyName }}</li>
            <!-- Add more user details here if needed -->
        </ul>
        <p>Please take appropriate action to onboard the new user.</p>
        <p><a href="http://localhost:8000/dashboard" class="btn white-text">Take Action</a></p>
        <p>Thank you,<br>System Admin</p>
    </div>
</body>

</html>
