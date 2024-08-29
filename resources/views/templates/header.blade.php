<nav class="navbar navbar-light bg-light justify-content-evenly">
    <a class="navbar-brand" href="/feed">Meme Archive</a>
    <div class="d-flex justify-content-around w-50">
        {{-- If User has admin role --}}
        @if ($role == 1)
            <a href="{{ route("createMeme") }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Add Meme</a>
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