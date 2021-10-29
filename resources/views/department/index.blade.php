@extends('layouts.main')

@section('content-1')
    <div class="card col-sm-6">
        <div class="card-header">
            Departments Panel
        </div>
        <div class="card-body m-3 p-3">
            <form action="{{ route('departments.store') }}" method="post" class="form-inline">
                @csrf
                
                <div class="form-group">
                    <input class="form-control" type="text" name="name" id="name" placeholder="Depatrment Name">
                    <button class="form-control ml-3" type="submit" >
                        Add Depatrment
                    </button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Department</th>
                      <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                    <tr>
                      <th scope="row">{{ $department->id }}</th>
                      <td>{{ $department->name }}</td>
                      <td>
                        <form action="{{ route('departments.destroy',$department->id) }}" method="post">
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