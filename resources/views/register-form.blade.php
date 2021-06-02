<title>Register|User Auth</title>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<style>
    span.error-text {
        color: red;
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
            <li class="breadcrumb-item active" aria-current="page">Register</li>
        </ol>
    </nav>
</div>
<div class="center-content">
    <h1>Register Here</h1>
    <span class="error-block">
        {{session('error')}}
    </span>

    <br>
    <form method="post" action="registerSubmit">
        {{@csrf_field()}}
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Enter Name">
            <small id="emailHelp" class="form-text text-muted">
                <span class="error-text">
                    @error('name')
                    {{$message}}
                    @enderror
                </span>
            </small>
        </div>
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

        <button type="submit" class="btn btn-primary">SUBMIT</button>

    </form>
    <div class="d-flex justify-content-end" style="font-size:medium;">
        <a href="login"><u>Login</u></a>
    </div>
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