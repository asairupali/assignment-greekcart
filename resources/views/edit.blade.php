@extends('layouts.app')
@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form id = "product_edit">
                    <input type="hidden" class="form-control" id="product_id" name = "productid" value = {{ $product_list->id }}>
                    @csrf
                    <div class="form-group">
                      <label>Product Name</label>
                      <input type="text" class="form-control" id="product_name" name = "productname" value = {{ $product_list->product_name }} placeholder="Enter product name">
                    </div><br>
                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="number" class="form-control" id="product_name" name = "productprice" value = {{ $product_list->product_price }} placeholder="Enter product price">
                    </div><br>
                    <div class="form-group">
                        <label>Product Description</label>
                        <input type="text" class="form-control" id="product_description" name = "productdescription" value = {{ $product_list->product_description }} placeholder="Enter product description">
                    </div><br>
                    <div class="upload__box">
                        <div class="upload__btn-box">
                          <label class="upload__btn">
                            <p>Product images</p>
                            <input type="file" multiple="" data-max_length="20" class="upload__inputfile" name = "product_image[]"><br>
                            @foreach ( $product_image as $key=>$image)
                                <input type="hidden" class="form-control" id="old_image" name = "old_image" value = {{ $image->product_images }}>
                                <img width="80px" src="/images/{{ $image->product_images }}" class="img-circle" style="margin-left: 155px;border-radius:0px;">
                           @endforeach
                          </label>
                        </div>
                        <div class="upload__img-wrap"></div>
                      </div><br>
                    <button type="button" class="btn btn-primary" id ="form_update">Update</button>
                  </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#form_update').click(function(e) {
        e.preventDefault();
        let form = document.querySelector('#product_edit');
        var formData = new FormData(form);
        console.log("formData",formData);
        $.ajax({
            type:'GET',
            url:"update-product",
            data:formData,
            processData: false,
            dataType: 'json',
            contentType: false,
            success:function(data) {
                  window.location='list'
               }

        });
    });
</script>
@endsection



