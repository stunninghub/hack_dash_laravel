@extends('base')

@section('title')
Home
@endsection

@section('content')
<div class="card shadow m-auto" style="max-width:400px;">
    <div class="card-header pt-4 border-0 pb-0 bg-transparent">
        <h2>Login</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut vero distinctio, recusandae nemo tenetur.</p>
    </div>
    <div class="card-body pt-0">
        <div class="my-3">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="my-3">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="my-3 d-grid gap-0">
            <input type="submit" value="Login" class="btn btn-primary">
        </div>
        <p>Don't have an account? <a href="javascript:;">SingUp</a>.</p>
    </div>
</div>
@endsection