<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-light border-right col-2" id="sidebar-wrapper">
            <div class="sidebar-heading">
                <h2>Project management</h2>
            </div>
            <div class="list-group list-group-flush">
                <a href="{{ route('project') }}" class="list-group-item list-group-item-action bg-light">Projects</a>
                <a href="{{ route('task') }}" class="list-group-item list-group-item-action bg-light">Tasks</a>
                <a href="{{ route('entry') }}" class="list-group-item list-group-item-action bg-light">Entry</a>
                <a href="{{ route('report') }}" class="list-group-item list-group-item-action bg-light">Report</a>
            </div>
        </div>

        <div id="page-content-wrapper" class="w-100">

            <div class="container-fluid mt-4">
                @yield('content')
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>