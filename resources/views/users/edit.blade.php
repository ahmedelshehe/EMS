@extends('layouts.main')
@section('content-1')

<div>
    <form method="POST" action="{{ route('users.update',$user) }}">
    @method('PUT')
        @csrf

     <div class="form-group row">
         <h4>Edit  User</h4>
        
     </div>
            <h3><b>{{ $user->username }}</b></h5>
     @if (session()->has('messagge'))
     <div class="alert alert-succsess"></div>
         {{ session('message') }}
     @endif
     <div class="form-group row">
         <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

         <div class="col-md-6">
             <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="username" autofocus>

             @error('username')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
         </div>
     </div>
     <div class="form-group row">
         <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

         <div class="col-md-6">
             <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{$user->first_name }}" required autocomplete="name" autofocus>

             @error('first_name')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
         </div>
     </div>
     <div class="form-group row">
         <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

         <div class="col-md-6">
             <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{$user->last_name }}" required autocomplete="name" autofocus>

             @error('last_name')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
         </div>
     </div>

     <div class="form-group row">
         <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

         <div class="col-md-6">
             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email }}" required autocomplete="email">

             @error('email')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
         </div>
     </div>
     <div class="form-group row mb-0">
         <div class="col-md-6 offset-md-4">
             <button type="submit" class="btn btn-primary">
                 {{ __('Edit User') }}
             </button>
         </div>
     </div>
 </form>
</div>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('users.change.password', $user->id) }}">
            @csrf
            <div class="form-group row">
                <label for="password"
                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password"
                        autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm"
                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control"
                        name="password_confirmation" autocomplete="new-password">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update Password') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection