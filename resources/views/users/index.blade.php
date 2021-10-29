@extends('layouts.main')

@section('content-1')
<div class="row p-8">
    <div class="card mr-6">
        <div class="card-body">
            <div class="col">
                <form method="POST" action="{{ route('users.store') }}">
                     @csrf
                     <div class="form-group row">
                         <div class="card-title">
                           <h4>Create User</h4>  
                         </div>
                         
                     </div>
                     @if (session()->has('message'))
                         <div class="alert alert-success">
                             {{session('message')}}
                         </div>
                     @endif
                     
                     <div class="form-group row">
                         <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>
         
                         <div class="col-md-6">
                             <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
         
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
                             <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="name" autofocus>
         
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
                             <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="name" autofocus>
         
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
                             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
         
                             @error('email')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>
         
                     <div class="form-group row">
                         <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
         
                         <div class="col-md-6">
                             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
         
                             @error('password')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>
         
                     <div class="form-group row">
                         <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
         
                         <div class="col-md-6">
                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                         </div>
                     </div>
         
                     <div class="form-group row mb-0">
                         <div class="col-md-6 offset-md-4">
                             <button type="submit" class="btn btn-primary">
                                 {{ __('Add User') }}
                             </button>
                         </div>
                     </div>
                 </form>
               
            
        </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="col">
                <h4>Users List</h4>
                <div class="input-group mb-3">

                    <form method="GET" action="{{ route('users.index') }}" class="form-inline m-2">
                    <label id="searched"  class="form-label m-1" for="form1">Search</label>  
                    <input for="searched" name="searched" type="text" class="form-control m-1" autofocus>
                    <div class="input-group-prepend m-1 ">
                     <button type="submit" class="btn btn-outline-secondary">
                        <i class="fas fa-search"></i>
                     </button> 
                    </div>
                    </form>
                </div>
            
                    <table class="table">
                        <thead>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </thead>
                        <tbody>
                        @foreach ($users as $user )
                
                            <tr>
                                <th scope="row">{{ $user->id}}</th>
                                <td>{{ $user->username }}</td>
                                <td><a class="btn btn-info" href="{{ route('users.edit',$user->id) }}">Edit</i></a></td>
                                <td>
                                    <form action="{{ route('users.destroy',$user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>    
    </div>     

</div>
       @endsection

    
