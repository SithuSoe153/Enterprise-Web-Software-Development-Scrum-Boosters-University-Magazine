<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contribution Submitted</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom styles for email -->
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-weight: bold;
            color: #007bff;
        }

        p {
            color: #333;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        li {
            margin-bottom: 10px;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="mb-4">New Contribution Submitted</h2>

        <p>Hello Marketing Coordinator "{{ $coordinatorName }}",</p>

        <p>A new contribution has been submitted by a student:</p>

        <ul>
            <li><strong>Student Name:</strong> {{ $userName->name }}</li>
            <li><strong>Faculty:</strong> {{ $facultyName }}</li>
            <!-- Add more details here if needed -->
        </ul>

        <p>Please review the submission and take appropriate action.</p>

        <p>Thank you,<br>Scrum Boosters MMS</p>
    </div>
</body>

</html>
