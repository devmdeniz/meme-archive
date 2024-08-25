<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feed</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.css"
        integrity="sha512-QPZjpT373lOJheWW3zuNJscevKKYE2Gdt57/oSPRtQFcZ9pM6AOuTKeVaEfqW6G/kPl9c24+S3OlaRN5OhxkgQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-light bg-light justify-content-evenly">
        <a class="navbar-brand" href="/feed">Meme Archive</a>
        <div class="d-flex justify-content-around w-50">
            {{-- If User has admin role --}}
            @if ($role == 1)
                <a href="" class="btn btn-success"><i class="fa-solid fa-plus"></i> Add Meme</a>
            @endif
            <a href="" class="btn btn-secondary"><i class="fa-solid fa-magnifying-glass"></i> Search Meme</a>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-regular fa-face-smile"></i> Profile
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">My Memes</a></li>
                    <li><a class="dropdown-item" href="{{ route("logout") }}">LogOut</a></li>
                </ul>
            </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            {{-- @foreach ($memes as $meme) --}}
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="https://i.kym-cdn.com/entries/icons/mobile/000/030/659/ben.jpg" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Title</h5>
                        <p class="card-text">Desc</p>
                        <p class="card-text"><small class="text-muted">Create</small></p>
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="https://i.kym-cdn.com/entries/icons/mobile/000/042/253/upper_decky_zynnies.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Title</h5>
                        <p class="card-text">Desc</p>
                        <p class="card-text"><small class="text-muted">Create</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="https://i.kym-cdn.com/photos/images/newsfeed/002/889/708/79a.jpg" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Title</h5>
                        <p class="card-text">Desc</p>
                        <p class="card-text"><small class="text-muted">Create</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="https://i.kym-cdn.com/entries/icons/mobile/000/029/268/cover5.jpg" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Title</h5>
                        <p class="card-text">Desc</p>
                        <p class="card-text"><small class="text-muted">Create</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.js"
        integrity="sha512-usm+JyA4pcZ0mPqWsJugUq63sbcD1jNUZhFwTDs5rb/9R8xApGaayJaY6BK3rPulS2p3adXTQXCWU68SVE4Epw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
