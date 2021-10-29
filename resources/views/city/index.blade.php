@extends('layouts.main')
@section('content-1')
    <div class="card">
        <div class="card-header">
            City Panel
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-header">
                    Add City
                </div>
                <div class="card-body m-3 p-3">
                    <form class="" action="{{ route('cities.index') }}" method="post">
                        @csrf
                        <div >
                            <input placeholder="City Name" class="form-control"  type="text" name="name" id="name">
                        </div>
                        <hr class="">
                        
                        <div class="form-group"> 
                            <select name="country_id" class="form-control" aria-label="Default select example">
                                <option selected>Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ucfirst($country->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <div class="form-group "> 
                            <select name="state_id" class="form-control" aria-label="Default select example">
                                <option selected><b> Select State</b></option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ ucfirst($state->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-danger mb-2">Add City</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Cities List
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">City</th>
                      <th scope="col">State</th>
                      <th scope="col">Country</th>
                      <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cities as $city)
                    <tr>
                      <th scope="row">{{ $city->id }}</th>
                      <td>{{ Str::ucfirst($country->name) }}</td>
                      <td>{{ Str::ucfirst($city->state->name) }}</td>
                      <td>{{ Str::ucfirst($city->state->country->name) }}</td>
                      <td>
                        <form action="{{ route('cities.destroy',$city->id) }}" method="post">
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
@endsection