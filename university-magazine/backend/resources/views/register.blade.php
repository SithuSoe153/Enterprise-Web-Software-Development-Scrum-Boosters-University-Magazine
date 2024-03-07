<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="card-title text-center">Guest Registration</h1>
                        <form action="/register" method="post">
                            @csrf
                            <input type="hidden" name="role" value="5">

                            <div class="form-group">
                                <label for="guestName">Name</label>
                                <input type="text" id="guestName" class="form-control" name="name"
                                    placeholder="Name" required>
                            </div>

                            <div class="form-group">
                                <label for="guestEmail">Email</label>
                                <input type="email" id="guestEmail" class="form-control" name="email"
                                    placeholder="Email" required>
                            </div>

                            <div class="form-group">
                                <label for="guestPassword">Password</label>
                                <input type="password" id="guestPassword" class="form-control" name="password"
                                    placeholder="Password" required>
                            </div>

                            <div class="form-group">
                                <label for="guestPasswordConfirmation">Confirm Password</label>
                                <input type="password" id="guestPasswordConfirmation" class="form-control"
                                    name="password_confirmation" placeholder="Confirm Password" required>
                            </div>

                            <div class="form-group">
                                <label for="facultySelect">Select Faculty</label>
                                <select id="facultySelect" name="faculty_id" class="form-control" required>
                                    <option value="">Select Faculty</option>
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
