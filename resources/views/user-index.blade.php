
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">users
                    <div class="float-right">
                        <a href="{{route('user.create')}}" class="btn btn-outline-primary">New user</a>
                    </div>
                </div>
                <div class="card-body">
                @if(session('msg'))
                        <div class="alert alert-success">
                            {{session('msg')}}
                        </div>
                 @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    @endif
                 <div class="table-responsive">
                <table class="table ">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Ceated Time</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $counter = 1 ; ?>
                    @foreach($users as $user)

                    <tr>
                        <th scope="row">{{$counter}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->roles->pluck('name')->first()}}</td>
                        <td>{{$user->created_at}}</td>
                        <td >
                        <a href="{{route('user.edit',$user->id)}}" class="btn btn-success" >Edit</a>
                        <div class="float-right ">
                        <form action="{{route('user.destroy',$user->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button class="btn btn-danger">Delete</button>
                        </form>
                        </div>
                        </td>
                    </tr>
                    <?php $counter++ ; ?>

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
