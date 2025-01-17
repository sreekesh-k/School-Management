<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Add Student</span>
        </div>
    </nav>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="container">
        <form class="ms-auto me-auto" style="width:400px;" action="{{ route('create.confirm') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Student Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">OR</label>
                <input type="number" class="form-control" name ="OR" placeholder="Max: 100">
            </div>
            <div class="mb-3">
                <label class="form-label">JAVA</label>
                <input type="number" class="form-control" name ="Java" placeholder="Max: 100">
            </div>
            <div class="mb-3">
                <label class="form-label">ASE</label>
                <input type="number" class="form-control" name ="ASE" placeholder="Max: 100">
            </div>
            <div class="mb-3">
                <label class="form-label">DAA</label>
                <input type="number" class="form-control" name ="DAA" placeholder="Max: 100">
            </div>
            <div class="mb-3">
                <label class="form-label">AI</label>
                <input type="number" class="form-control" name ="AI" placeholder="Max: 100">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
