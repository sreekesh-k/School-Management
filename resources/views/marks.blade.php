<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MARKS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('marks') }}">{{ $name }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('studentlogout') }}">Logout</a>
                    </li>
                </ul>
                <span clas="navbar-text">
                </span>
            </div>
        </div>
    </nav>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">StudentName</th>
                    <th scope="col">OR</th>
                    <th scope="col">Java</th>
                    <th scope="col">ASE</th>
                    <th scope="col">DAA</th>
                    <th scope="col">AI</th>
                    <th scope="col">TotalMarks<br>(out of 500)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $student->id }}</td>
                    <td> {{ $student->name }}</td>
                    <td> {{ $student->OR }}</td>
                    <td> {{ $student->Java }}</td>
                    <td> {{ $student->ASE }}</td>
                    <td> {{ $student->DAA }}</td>
                    <td> {{ $student->AI }}</td>
                    <td>{{ $student->totalMarks }}</td>
                </tr>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
