
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Items
                    @if( !auth()->user()->hasRoles('customer'))
                    <div class="float-right">
                        <a href="{{route('item.create')}}" class="btn btn-outline-primary">New Item</a>
                    </div>
                    @endif
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
                            <th scope="col">Price</th>
                            <th scope="col">Details</th>
                            <th scope="col">Image</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $counter = 1 ; ?>
                    @foreach($items as $item)

                    <tr>
                        <th scope="row">{{$counter}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->details}}</td>
                        <td>
                        <img src="{{url('storage')}}/{{$item->img}}" alt="{{$item->name}}" style="width: 10rem; height: 10rem"/>
                        </td>
                        <td >
                            @if( !auth()->user()->hasRoles('customer'))

                            <div >
                                <a href="{{route('item.edit',$item->id)}}" class="btn btn-success" style="width: 5rem;height: 2.5rem" >Edit</a>
                            </div>
                        <div >
                        <form action="{{route('item.destroy',$item->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button class="btn btn-danger" style="width: 5rem;height: 2.5rem">Delete</button>
                        </form>
                        </div>
                                @endif
                                <div >
                                    <a href="{{route('order.create',$item->id)}}" class="btn btn-primary" >Order Pizza</a>
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
