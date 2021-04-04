@extends('layouts.dashboard')

@section('title')
    Store Dashboard Product Detail
@endsection

@section('content')
        <!-- Section Content -->
        <div class="section-content section-dashboard-home mb-5" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Shirup Marzan</h2>
                <p class="dashboard-subtitle">
                  Product Details
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                    <form action="{{ route('dashboard.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="category">Category</label>
                                <select name="categories_id" class="form-control" id="category">
                                    <option value="{{ $product->categories_id }}">{{ $product->category->name }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="editor">Description</label>
                                <textarea name="description" id="editor" class="form-control">
                                    {!! $product->description !!}
                                </textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <button type="submit" class="btn btn-success px-5 w-100">Update Product</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-12">
                    <div class="row">
                        @foreach ($product->galleries as $gallery)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="gallery-container">
                                        <img src="{{ Storage::url($gallery->photos ?? '') }}" alt="" class="w-100">
                                        <a href="{{ route('dashboard.products.gallery.delete', $gallery->id) }}" class="delete-gallery">
                                            <img src="/images/icon-delete.svg" alt="">
                                        </a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                  </div>
                  <div class="col-12">
                    <form action="{{ route('dashboard.products.gallery.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="products_id" value="{{ $product->id }}">
                        <input type="file" name="photos" id="file" class="d-none" onchange="form.submit()">
                        <button type="button" class="btn btn-secondary btn-block mt-3" onclick="thisFileUpload();">Add Photo</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
      function thisFileUpload() {
        document.getElementById("file").click();
      }
    </script>
    <script>
      CKEDITOR.replace('editor');
    </script>
@endpush
