<title>Login|User Auth</title>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<style>
    span.error-text {
        color: red;
    }

    span.success {
        color: green;
        font-size: large;
    }

    span.error-block {
        border-radius: 2px;
        margin: 5px;
        font-size: large;
        padding: 2px;
        background-color: white;
        color: red;
    }

    div.center-content {
        padding-top: 5%;
        max-width: 500px;
        margin: auto;
    }
</style>
<div class="nav">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
    </nav>
</div>
<div class="center-content">
    <h1>Login Here</h1>
    <span class="error-block">
        {{session('error')}}
    </span>
    <span class="error-block">
        @error('error')
        {{$message}}
        @enderror
    </span>
    <span class="success">
        {{session('success')}}
    </span>
    <br>
    <form method="post" action="loginSubmit">
        {{@csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">
                <span class="error-text">
                    @error('email')
                    {{$message}}
                    @enderror
                </span>
            </small>
        </div>


        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            <small id="emailHelp" class="form-text text-muted">
                <span class="error-text">
                    @error('password')
                    {{$message}}
                    @enderror
                </span>
            </small>
        </div>



        <button type="submit" class="btn btn-primary">LOGIN</button>

    </form>
    <div class="d-flex justify-content-end" style="font-size:medium;">
        <a href="register"><u>Register</u></a>
    </div>
    <div class="below">
        <footer>&copy; Copyrights Sumant Kumar-2021| All Rights Reserved</footer>
    </div>
</div>
<style>
    div.below {
        position: absolute;
        bottom: 5px;
    }
</style>