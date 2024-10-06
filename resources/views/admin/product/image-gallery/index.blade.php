@extends('admin.layouts.master')
@section('content')
<!-- Main Content -->
<section class="section">
    <div class="section-header">
      <h1>Product-image-Gallary</h1>
    </div>
<div class="mb-3">
  <a href="{{route('products.index')}}" class="btn btn-primary">Back</a>

</div>
    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            {{-- هون اعملنا عرض للبرودكيت فقط اسم وصورتو ولح نحط الصوره التابعه الو --}}
            <div class="card-header">
              <h4>Product:{{$product->name}}</h4>
            </div>
            <div class="card-body">
            <form action="{{route('products-image-gallery.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="">Image<code>Multiple image supported</code></label>
                <input type="file" name="image[]" class="form-control" multiple>
                <input type="hidden" name="product" value="{{$product->id}}">
                <br>
                <button type="submit" class="btn btn-primary">Upload</button>
              </div>
            </form>
            </div>

          </div>
        </div>

      </div>


      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>All-Images</h4>
              <div class="card-header-action"></div>
            </div>
            <div class="card-body">
              {{$dataTable->table()}}
            </div>

          </div>
        </div>

      </div>



      </div>

  </section>
@endsection
@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
