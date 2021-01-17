@extends('layouts.app')
@section('content')
    <script type="text/javascript">
        var added_items = [] ;
        function add_to_cart( id) {
            document.getElementById('done').value = "yes";
        }

    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit order {{$order->id}}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('order.update',$order->id) }}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}

                            @include('errors.errmsg')
                            @if(session('msg'))
                                <div class="alert alert-success">
                                    {{session('msg')}}
                                </div>
                            @endif
                            <div class="form-group row"  id="status">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control selectpicker"  name="status">
                                        <option selected>{{$order->status}}</option>
                                        <option data-thumbnail="1610495720.jpg">Confirmed</option>
                                        <option data-thumbnail="1610495720.jpg">Delievering</option>
                                        <option data-thumbnail="1610495720.jpg">Rejected</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row"  id="correct">
                                <label for="correct" class="col-md-4 col-form-label text-md-right">{{ __('Item') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control selectpicker"  name="item_selected">
                                        <option>{{$order->items()->first()->name}}</option>

                                        @foreach($items as $item)
                                            <option data-thumbnail="1610495720.jpg">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('quantity') }}</label>

                                <div class="col-md-6">
                                    <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $order->items()->first()->pivot->quantity }}" required autocomplete="quantity" autofocus>

                                    @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="notes" class="col-md-4 col-form-label text-md-right">{{ __('notes') }}</label>

                                <div class="col-md-6">
                                    <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" cols="30" rows="3" value="{{ $order->notes }}" autocomplete="notes" autofocus>{{ $order->notes }}</textarea>
                                    @error('notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="response" class="col-md-4 col-form-label text-md-right">{{ __('response') }}</label>

                                <div class="col-md-6">
                                    <textarea name="response" class="form-control @error('response') is-invalid @enderror" cols="30" rows="3" value="{{ $order->response }}" autocomplete="response" autofocus>{{ $order->response }}</textarea>
                                    @error('response')
                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
