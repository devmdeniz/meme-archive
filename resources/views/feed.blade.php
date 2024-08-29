<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feed - {{ env('WEBSITE_TITLE') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.css"
        integrity="sha512-QPZjpT373lOJheWW3zuNJscevKKYE2Gdt57/oSPRtQFcZ9pM6AOuTKeVaEfqW6G/kPl9c24+S3OlaRN5OhxkgQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                @endphp
                <div class="col-md-4">
                    <div class="card mb-3">
                        @if ($memeType == 0 || $memeType == 2)
                            <img src="{{ $imageURL }}" class="card-img-top" alt="...">
                        @elseif ($memeType == 1)
                            <iframe class="card-img-top"
                                src="https://www.youtube.com/embed/{{ $imageURL }}?si=2U6ryEf8iGCt7LY1"
                                allowfullscreen></iframe>
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
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <img src="https://media1.giphy.com/media/v1.Y2lkPTc5MGI3NjExdWY3Z21rZTN3dGlrejhqcjBvdGZsZjloM3Q3NWhweTFudHQwNXhhaiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/IArfvsrvQt5JF4KPhR/giphy.webp" alt="">
{{-- Image --}}
                            <div class="card-body">
                                <h5 class="card-title">Taytil</h5>
                                <p class="card-text">
                                    Desc
                                </p>
                                <p class="card-text"><small class="text-muted">Date</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.js"
            integrity="sha512-usm+JyA4pcZ0mPqWsJugUq63sbcD1jNUZhFwTDs5rb/9R8xApGaayJaY6BK3rPulS2p3adXTQXCWU68SVE4Epw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
