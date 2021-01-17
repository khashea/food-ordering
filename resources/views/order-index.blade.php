
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">orders
                    <div class="float-right">
                        <a href="{{route('order.create',$first_item->id)}}" class="btn btn-outline-primary">New order</a>
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
                                <th scope="col">User</th>
                                <th scope="col">Item</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Notes</th>
                                <th scope="col">Response</th>
                                <th scope="col">Status</th>
                                <th scope="col">Price</th>
                                <th scope="col">Time</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $counter = 1 ; ?>
                            @foreach($orders as $order)

                            <tr>
                                <th scope="row">{{$counter}}</th>
                                <td>{{$order->user->name}}</td>
                                <td>
                                    <img src="{{url('storage')}}/{{$order->items()->pluck('img')->first()}}" style="width: 10rem; height: 10rem"/>
                                    <br>
                                    {{$order->items()->pluck('name')->first()}}
                                </td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->notes}}</td>
                                <td>{{$order->response}}</td>
                                <td >

                                    <span class="label label-primary">{{$order->status}}</span>
                                </td>
                                <td >
                                    {{$order->price . '$'}}
                                </td>
                            
                                <td>{{$order->created_at}}</td>

                                    <td >
                                        @if( !auth()->user()->hasRoles('customer'))
                                    <div>
                                        <a href="{{route('order.edit',$order->id)}}" class="btn btn-success" style="width: 5rem;height: 2.5rem" >Edit</a>

                                    </div>
                                    <div class="float-right ">
                                        <form action="{{route('order.destroy',$order->id)}}" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-danger" style="width: 5rem;height: 2.5rem">Delete</button>
                                        </form>
                                    </div>
                                        @endif
                                        @if($order->status == "Received" && auth()->user()->hasRoles('customer'))
                                            <div class="float-right ">
                                                <form action="{{route('order.destroy',$order->id)}}" method="POST">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button class="btn btn-danger" style="width: 5rem;height: 2.5rem">Cancel</button>
                                                </form>
                                            </div>
                                        @endif
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
