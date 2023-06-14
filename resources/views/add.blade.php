@extends('layouts.app')
@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form id = "product_form">
                    @csrf
                    <div class="form-group">
                      <label>Product Name</label>
                      <input type="text" class="form-control" id="product_name" name = "productname" placeholder="Enter product name">
                    </div><br>
                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="number" class="form-control" id="product_name" name = "productprice" placeholder="Enter product price">
                    </div><br>
                    <div class="form-group">
                        <label>Product Description</label>
                        <input type="text" class="form-control" id="product_description" name = "productdescription" placeholder="Enter product description">
                    </div><br>
                    <div class="upload__box">
                        <div class="upload__btn-box">
                          <label class="upload__btn">
                            <p>Product images</p>
                            <input type="file" multiple="" data-max_length="20" class="upload__inputfile" name = "product_image[]">
                          </label>
                        </div>
                        <div class="upload__img-wrap"></div>
                      </div><br>
                    <button type="submit" class="btn btn-primary" id ="form_submit">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#form_submit').click(function(e) {
        e.preventDefault();
        let form = document.querySelector('#product_form');
        var formData = new FormData(form);
        console.log("formData",formData);
        $.ajax({
            type:'POST',
            url:"add-product",
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



