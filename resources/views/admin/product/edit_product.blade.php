@extends('admin.layouts.layout')
@section('admin_layout')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">eCommerce</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button"
                            class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                                link</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Edit Product</h5>
                    <hr />
                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">
                                    <form action="{{route('product.submit')}}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                                       @csrf
                                       <input type="hidden" name="product_id" value="{{ $product->id }}">
                                      <div class="col-md-3 ">                                            
                                            <label for="bsValidation1" class="form-label">Product Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('product_name') is-invalid @enderror"
                                                name="product_name" id="bsValidation1" placeholder="Enter Category Name"
                                                value="{{$product->product_name}}" required>
                                            @error('product_name')
                                                <span class="text-danger fw-bold">{{ $message }}</span>
                                            @enderror
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please enter a Product name.
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="bsValidation1" class="form-label">Select Category <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select @error('category_id') is-invalid @enderror"
                                                name="category_id" id="categorySelect" data-placeholder="Choose one thing"
                                                required>
                                                <option></option>
                                                @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}"
                                                    {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                                    {{ $cat->category_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="text-danger fw-bold">{{ $message }}</span>
                                            @enderror
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please Select a category name.
                                            </div>
                                        </div>
                                        <div class="col-md-3 my-3">
                                            <label for="bsValidation1" class="form-label">Select Subcategory <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select @error('subcategory_id') is-invalid @enderror"
                                                id="subCategorySelect" name="subcategory_id"
                                                aria-label="Default select example" data-select2-id="SubCategory" required>
                                                <option value="">Select Subcategory</option>
                                                @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}"
                                            {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                                            {{ $subcategory->subcategory_name }}
                                        </option>
                                    @endforeach
                                            </select>
                                            @error('subcategory_id')
                                                <span class="text-danger fw-bold">{{ $message }}</span>
                                            @enderror
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please Select a Subcategory.
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="formFile" class="form-label">Product Image <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control  @error('product_thumbnail') is-invalid @enderror"
                                                name="product_thumbnail" type="file" id="formfile" >
                                            @error('product_thumbnail')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please choose a image.
                                            </div>
                                        </div>

                                        <div class="col-md-3  my-3">
                                            <label for="bsValidation1" class="form-label">Tag <span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('tag_name') is-invalid @enderror" name="tag_name"
                                                id="" placeholder="Tag Name" value="{{$product->tag_name}}"
                                                required>
                                            @error('tag_name')
                                                <span class="text-danger fw-bold">{{ $message }}</span>
                                            @enderror
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please enter a Tag name.
                                            </div>
                                        </div>

                                        <div class="col-md-3  my-3">
                                          <label for="bsValidation1" class="form-label">Sku <span
                                                  class="text-danger">*</span></label>
                                          <input type="text"
                                              class="form-control @error('sku') is-invalid @enderror" name="sku"
                                              id="subCategorySku" placeholder="SKKU Name" value="{{$product->sku}}"
                                              required>
                                          @error('sku')
                                              <span class="text-danger fw-bold">{{ $message }}</span>
                                          @enderror
                                          <div class="valid-feedback">
                                              Looks good!
                                          </div>
                                          <div class="invalid-feedback">
                                              Please enter a Tag name.
                                          </div>
                                      </div>

                                        <div class="col-md-3">
                                            <label for="color" class="form-label">Select Color <span
                                                    class="text-danger">*</span></label>
                                            <select name="colors[]" id="countries"
                                                class="form-control @error('colors[]') is-invalid @enderror" multiple
                                                required>
                                                <option value="">Select Color</option>
                                                @foreach ($colors as $color)
                                                <option value="{{ $color->id }}"
                                                    {{ $product->color_id == $color->id ? 'selected' : '' }}>
                                                    {{ $color->color_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('colors[]')
                                                <span class="text-danger fw-bold">{{ $message }}</span>
                                            @enderror
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">
                                                Please Select a color name.
                                            </div>
                                        </div>

                                        <div class="col-md-3 my-3">
                                            <label for="bsValidation1" class="form-label">Select Brand <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select @error('brand_id') is-invalid @enderror"
                                                name="brand_id" id="brandSelect" data-placeholder="Choose one thing" 
                                                required>
                                                <option></option>
                                                @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->brand_name }}
                                                </option>                                                @endforeach
                                            </select>
                                            @error('brand_id')
                                                <span class="text-danger fw-bold">{{ $message }}</span>
                                            @enderror
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please Select a Brand name.
                                            </div>
                                        </div>

                                        <div class="col-md-3 my-3">
                                            <label for="bsValidation1" class="form-label">Product Price <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('mrp_price') is-invalid @enderror" name="mrp_price"
                                                id="bsValidation1" placeholder="Enter Product Price" value="{{$product->product_price}}"
                                                required>
                                            @if ($errors->has('mrp_price'))
                                                <span class="text-danger">{{ $errors->first('mrp_price') }}</span>
                                            @endif
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please enter a Product price.
                                            </div>
                                        </div>

                                        <div class="col-md-3 my-3">
                                            <label for="formFile" class="form-label">Discount Price <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('selling_price') is-invalid @enderror"
                                                name="selling_price" type="number" id="bsValidation2"
                                                placeholder="Enter Discount price" value="{{$product->selling_price }}" required>
                                            @if ($errors->has('selling_price'))
                                                <span class="text-danger">{{ $errors->first('selling_price') }}</span>
                                            @endif
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please Enter a Discount Price.
                                            </div>
                                        </div>
                                        <div class="col-md-3 my-3">
                                            <label for="bsValidation1" class="form-label">Shipping Price <span
                                                    class="text-danger">*</span></label>
                                            <input type="number"
                                                class="form-control @error('shiping_price') is-invalid @enderror"
                                                name="shiping_price" id="bsValidation1"
                                                placeholder="Enter Shipping Price" value="{{$product->shipping_price}}" required>
                                            @if ($errors->has('shiping_price'))
                                                <span class="text-danger">{{ $errors->first('shiping_price') }}</span>
                                            @endif
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please enter a Shipping Price.
                                            </div>
                                        </div>
                                        <div class="col-md-3 my-3">
                                            <label for="bsValidation1" class="form-label">Product Quantity <span
                                                    class="text-danger">*</span></label>
                                            <input type="number"
                                                class="form-control @error('current_stock') is-invalid @enderror"
                                                name="current_stock" id="bsValidation1" placeholder="Enter Quantity"
                                                value="{{ $product->current_stock }}" required>
                                            @if ($errors->has('current_stock'))
                                                <span class="text-danger">{{ $errors->first('current_stock') }}</span>
                                            @endif
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please enter a Product Quantity.
                                            </div>
                                        </div>

                                        <div class="col-md-3 my-3">
                                          <label for="bsValidation1" class="form-label">Short Description <span
                                                  class="text-danger">*</span></label>
                                          <input type="text"
                                              class="form-control @error('short_description') is-invalid @enderror"
                                              name="short_description" id="bsValidation1" placeholder="Enter short Description"
                                              value="{{$product->short_description}}" required>
                                          @if ($errors->has('short_description'))
                                              <span class="text-danger">{{ $errors->first('short_description') }}</span>
                                          @endif
                                          <div class="valid-feedback">
                                              Looks good!
                                          </div>
                                          <div class="invalid-feedback">
                                              Please enter a Description.
                                          </div>
                                      </div>

                                        <div class="col-md-3 my-3">
                                            <label for="bsValidation1" class="form-label">Description <span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('preorder_description') is-invalid @enderror"
                                                name="preorder_description" id="bsValidation1" placeholder="Enter Description"
                                                value="{{ $product->preorder_description }}" required>
                                            @if ($errors->has('preorder_description'))
                                                <span class="text-danger">{{ $errors->first('preorder_description') }}</span>
                                            @endif
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please enter a Description.
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-3 ms-5 ">
                                            <div>
                                                <img class=" ms-3"id="product-image-preview" src="" alt="Product Image" style="display: none; width: 80px; height: auto;">
                                            </div>
                                            <div style="position: relative;" class="w-25">
                                                <img class="ms-3" id="oldproduct-image-preview"
                                                    src="{{ asset($product->product_image) }}" alt="Product Image"
                                                    style="display: block; width: 80px; height: auto;">
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-5 ">
                                            <div class="d-md-flex d-grid align-items-center gap-3">
                                                <button type="submit" class="btn btn-primary px-4">Update</button>
                                                <button type="reset" id="reset"
                                                    class="btn btn-light px-4">Reset</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                            </div>

                        </div><!--end row-->
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.getElementById('formfile').addEventListener('change', function(event) {
            var input = event.target;
            var preview = document.getElementById('product-image-preview');
            var subcategoryPreview = document.getElementById('oldproduct-image-preview');

            // Clear existing preview images
            preview.src = '';
            preview.style.display = 'none';
            subcategoryPreview.style.display = 'block'; // Show the subcategory image

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Display the preview image
                    subcategoryPreview.style.display = 'none'; // Hide the subcategory image
                }

                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <script src="{{ asset('admin/assets/js/admin/products.js') }}"></script>
@endsection
