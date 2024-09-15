<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feed - {{ env('WEBSITE_TITLE') }}</title>
    @include("packages.tailwind")
    @include("packages.bootstrap")
    @include("packages.fontawesome")
    <style>
        #message {
            position: fixed;
            top: 0;
            right: 0;
            width: 15vw;
            z-index: 1;
        }

        #alert {
            margin: 0 auto;
            border: 3px solid black;
        }

        @keyframes shake {
            0% {
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translateX(-10px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(10px);
            }

            100% {
                transform: translateX(0);
            }
        }

        .shake {
            animation: shake 0.5s ease-in-out;
            animation-iteration-count: 1;
        }
    </style>
</head>

<body>
    @if (session('message'))
        <div id="message">
            <div style="padding: 5px;">
                <div id="alert" class="alert alert-success" role="alert">
                    <button type="button" class="close" data-bs-dismiss="alert">&times;</button>
                    {{ session('message') }}
                </div>
            </div>
        </div>
    @endif
    @include('templates.header')
    <div class="container mt-5">
        <div class="row">
            @foreach ($meme as $item)
                @php
                    $title = $item->title;
                    $keywords = $item->keywords;
                    $imageURL = $item->imageURL;
                    $memeType = $item->postType;
                    $userId = $item->userID;
                    $time = $item->time;
                @endphp
                <div class="col-md-4">
                    <div class="card mb-3">
                        @if ($userId == $sessionid)
                        <button class="btn btn-warning position-absolute top-10 start-0">
                            <a href="{{ route("EditMemePost",["id"=>$item->id]) }}"><i class="fas fa-pen-square text-dark"></i></a>
                        </button>
                        <button class="btn btn-danger position-absolute top-0 start-0">
                            <a href="{{ route("DeleteMeme",["id"=>$item->id]) }}"><i class="fas fa-trash text-dark"></i></a>
                        </button>
                        @endif
                        @if ($memeType == 0 || $memeType == 2)
                            <img src="{{ $imageURL }}" class="card-img-top" alt="...">
                        @elseif ($memeType == 1)
                            <iframe class="card-img-top"
                                src="https://www.youtube.com/embed/{{ $imageURL }}?si=2U6ryEf8iGCt7LY1&start={{ $time }}"
                                allowfullscreen></iframe>
                        @elseif($memeType == 7)
                        <video src="{{ $imageURL }}" class="card-img-top" autoplay muted loop></video>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $title }}</h5>
                            <p class="card-text">
                                @foreach (explode(',', $keywords) as $keyword)
                                    <span class="badge bg-primary">{{ $keyword }}</span>
                                @endforeach
                            </p>
                            <p class="card-text"><small class="text-muted">Date</small></p>
                        </div>
                    </div>
                </div>
            @endforeach


        <script>
            function applyShakeEffect() {
                var element = document.getElementById("alert");
                element.classList.add("shake");

                setTimeout(function() {
                    element.classList.remove("shake");
                }, 500);
            }

            applyShakeEffect();

            setInterval(applyShakeEffect, 5000);
        </script>

</body>

</html>
