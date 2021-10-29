@extends('layouts.main')

@section('content-1')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6>Country System</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <form action="{{ route('countries.store') }}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">Add Country</div>
                            <div class="form-group card-body"> 
                                <input class="form-control" placeholder="Country Name" type="text" name="name" id="name">
                            </div>
                            <div class="form-group card-body"> 
                                <input class="form-control" placeholder="Country Code" type="text" name="country_code" id="country_code" >
                            </div>
                            <button type="submit" class="btn btn-danger mb-2">Add Country</button>
                        </div>
                        
                    </form>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">Countries List</div>
                        <div class="card-body">
                            <form method="GET" action="{{ route('countries.index') }}" class="form-inline m-2">
                                <input id="search" name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                            <table class="table">
                                <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Country</th>
                                      <th scope="col">Code</th>
                                      <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($countries as $country)
                                    <tr>
                                      <th scope="row">{{ $country->id }}</th>
                                      <td>{{ $country->name }}</td>
                                      <td>{{ $country->country_code }}</td>
                                      <td>
                                        <form action="{{ route('countries.destroy',$country->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-google">
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
        </div>
        
    </div>
    
    
</div>

@endsection