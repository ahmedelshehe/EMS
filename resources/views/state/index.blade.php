@extends('layouts.main')
@section('content-1')
    <div class="row">

        <div class="card col">
            <div class="card-header">
                State Panel
            </div>
            <div class="card-body">
                <div class="col">
                    <div class="card m-3 p-lg-1">
                        <form action="{{ route('states.store') }}" method="post">
                            @csrf
                            <div class="card-header">Add State</div>
                            <div class="form-group card-body"> 
                                <input class="form-control" placeholder="State Name" type="text" name="name" id="name">
                            </div>
                            <div class="form-group card-body"> 
                                <select name="country_id" class="form-control" aria-label="Default select example">
                                    <option selected>select country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Add State</button>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            States List
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">State</th>
                                      <th scope="col">Country</th>
                                      <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($states as $state)
                                    <tr>
                                      <th scope="row">{{ $state->id }}</th>
                                      <td>{{ $state->name }}</td>
                                      <td>{{ $state->country->name }}</td>
                                      <td>
                                        <form action="{{ route('states.destroy',$state->id) }}" method="post">
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
        </div>
    </div>

@endsection