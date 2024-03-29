<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <?php

    try {
        DB::connection()->getPdo();
        echo 'Connected successfully.';
    } catch (\Exception $e) {
        die('Could not connect to the database. Error: ' . $e->getMessage());
    }

    ?>



    {{-- <form action="http://localhost:8000/api/login" method="POST"> --}}
    <form action="/login" method="POST">
        @csrf
        @method('POST')

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" value="Submit">
    </form>


</body>

</html>
