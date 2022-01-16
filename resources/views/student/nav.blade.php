@php
$user = Session::get('logged');
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="btn btn-primary me-4" aria-current="page" href="/auth/edit/{{$user['id']}}"><i
                        class="fas fa-user-edit"></i> Edit
                    Profile</a>
                <a class="btn btn-success" aria-current="page" href="courses/{{$user['id']}}"><i
                        class="fas fa-book-medical"></i> Add Courses</a>
            </div>
            <div class="navbar-nav">
                <a class="btn btn-success" aria-current="page" href={{url('/auth/logout')}}>Log Out</a>
            </div>
        </div>
    </div>
</nav>