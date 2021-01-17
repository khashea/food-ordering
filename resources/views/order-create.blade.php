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
                    <div class="card-header">Create New order</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('order.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('errors.errmsg')
                            @if(session('msg'))
                                <div class="alert alert-success">
                                    {{session('msg')}}
                                </div>
                            @endif
                            <div class="form-group row"  id="correct">
                                <label for="correct" class="col-md-4 col-form-label text-md-right">{{ __('Item') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control selectpicker"  name="item_selected">
                                        <option>{{$item_selected->name}}</option>

                                        @foreach($items as $item)
                                            <option data-thumbnail="1610495720.jpg">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        {{--<div class="form-group row"  id="correct">--}}
                            {{--<label for="correct" class="col-md-4 col-form-label text-md-right">{{ __('Item') }}</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<select class="form-control selectpicker"  name="item_selected">--}}
                                    {{--<option>Select...</option>--}}

                                {{--@foreach($items as $item)--}}
                                    {{--<option data-thumbnail="1610495720.jpg">{{$item->name}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        
                            <div class="form-group row">
                                <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('quantity') }}</label>

                                <div class="col-md-6">
                                    <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>

                                    @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('address') }}</label>

                                <div class="col-md-6">
                                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" cols="30" rows="3" value="{{ old('address') }}" autocomplete="address" autofocus></textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="notes" class="col-md-4 col-form-label text-md-right">{{ __('notes') }}</label>

                                <div class="col-md-6">
                                    <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" cols="30" rows="3" value="{{ old('notes') }}" autocomplete="notes" autofocus></textarea>
                                    @error('notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
