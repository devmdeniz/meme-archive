<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    @if ($request->session()->has("jwt"))
    <?php
    echo redirect()->route('feed');
    ?>
    @endif
    @if ($errors->has('error'))
    <div class="error-box">
        <h1>Error</h1>
        {{ $errors->first('error') }}
    </div>
@endif
    @if ( $request->session()->get('stage') == 'stage2')
        <div class="blurred-box">
            <form class="user-login-box" action="{{ route('loginPage') }}" method="POST">
                @csrf
                <span class="user-icon"></span>
                <div class="user-name">Password</div>
                <input class="user-password" type="password" name="password"/>
                <input type="hidden" name="stage" value="stage2">
                <button type="submit">Submit</button>
            </form>
        </div>
    @else
        <div class="blurred-box">
            <form class="user-login-box" action="{{ route('loginPage') }}" method="POST">
                @csrf
                <span class="user-icon"></span>
                <div class="user-name">Username</div>
                <input class="user-password" type="text" name="username" />
                <input type="hidden" name="stage" value="stage1">
                <button type="submit">Submit</button>
            </form>
        </div>
    @endif

</body>

</html>
