<!DOCTYPE html>
<html lang="en">
<?php
$count = 0;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid" style="background-color: rgba(36, 179, 36, 0.666);">
            <a class="navbar-brand" href="#">STUDENT DETAILS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @endauth
                </ul>
                <span clas="navbar-text"> @auth
                        {{ auth()->user()->name }}
                    @endauth
                </span>
            </div>
        </div>
    </nav>
    <div>
        @if (session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SI</th>
                    <th scope="col">ID</th>
                    <th scope="col">StudentName</th>
                    <th scope="col">Marks</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <th scope="row">{{ ++$count }}</th>
                        <td> {{ $item->id }}</td>
                        <td> {{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td> <a href="{{ route('updating', ['item' => $item]) }}">Edit</a></td>
                        <td><a href="{{ route('deleting', ['item' => $item]) }}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('creating') }}">ADD STUDENT?</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
