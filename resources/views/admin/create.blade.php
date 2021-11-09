@extends('admin.layouts.index')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="card-title">Add User</div>
        <hr>
        <form method="post" action="{{ $urlAction }}">
            @csrf
            <div class="form-group">
                <label for="input-1">Name</label>
                <input value="{{ isset($user) ? $user->name : '' }}" type="text" class="form-control" name="name" id="input-1" placeholder="Enter Your Name">
            </div>
            <div class="form-group">
                <label for="input-2">Email</label>
                <input value="{{ isset($user) ? $user->email : '' }}" type="text" class="form-control" name="email" id="input-2" placeholder="Enter Your Email Address">
            </div>
            <div class="form-group">
                <label for="input-4">Password</label>
                <input type="password" class="form-control" name="password" id="input-4" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label for="input-5">role</label>
                <select value="{{ isset($user) ? $user->role : '' }}" class="form-control" name="role">
                    <option value="admin">Admin</option> 
                    <option value="guest">Guest</option>
                </select>
            </div>
            <div style="color: firebrick; text-align: center">{{isset($error) ? $error : ""}}</div>
            <div class="form-group">
                @if(isset($user))
                    @method('PUT')
                @endif
                <button type="submit" class="btn btn-light px-5"><i class="icon-user"></i> Add</button>
            </div>
        </form>
    </div>
</div>

@endsection
