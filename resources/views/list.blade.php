@extends('layouts.app')
@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Product Description</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ( $product_list as $key=>$list)
                                <tr>
                                    <th scope="row">{{$list->id}}</th>
                                    <td>{{ $list->product_name }}</td>
                                    <td>{{ $list->product_price }}</td>
                                    <td>{{ $list->product_description }}</td>
                                    <td><a href="{{ url('/edit/' . $list->id ) }}" class="btn btn-xs btn-info pull-right" type="submit">Edit</a><?php echo "  ";?><a href="{{ url('/delete/' . $list->id ) }}" class="btn btn-danger">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

@endsection



