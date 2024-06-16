@extends('admin.layouts.layout')
@section('admin_layout')


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
                        <li class="breadcrumb-item active" aria-current="page">Add New Category</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

      <div class="card">
          <div class="card-body p-4">
              <h5 class="card-title">Add New Sub Category</h5>
              <hr/>
               <div class="form-body mt-4">
                <div class="row">
                   <div class="col-lg-12">
                   <div class="border border-3 p-4 rounded">
                    <form action="{{route('add.subcategory')}}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                        @csrf
                        <input type="hidden" name="subcategory_id" id="subcategory_id">

						<div class="col-md-3">
							<label for="single-select-field" class="form-label">Select Category Type <span class="text-danger">*</span></label>
						<select class="form-select" name="category_id" id="bsValidation1" data-placeholder="Choose one thing" required>
							<option></option>
							@foreach ($category as $cat)
								<option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
							@endforeach
						</select>
						@error('category_id')
							<span class="text-danger fw-bold ">{{ $message }}</span>
						@enderror						
						</div>
                        <div class="col-md-3 mb-3">
                            <label for="bsValidation1" class="form-label">Sub Category Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="subcategory_name" id="bsValidation1" placeholder="Subcategory Name" value="{{ old('subcategory_name') }}" required>
                            <div class="valid-feedback">
                                Looks good!
                              </div><div class="invalid-feedback">
                                Please enter a category name.
                              </div>
							  @error('subcategory_name')
                                <span class="text-danger fw-bold ">{{ $message }}</span>
                              @enderror
                        </div>
                       
                        <div class="col-md-3">
                            <label for="formFile" class="form-label">Sub Category Image <span class="text-danger">*</span></label>
                            <input class="form-control" name="subcategory_image" type="file" id="bsValidation2" required>
                            @error('subcategory_image')
                               <span class="text-danger fw-bold">{{ $message }}</span>
                            @enderror
                            <div class="valid-feedback">
                                Looks good!
                              </div><div class="invalid-feedback">
                                Please choose a image.
                              </div>							  
                        </div>   

						<div class="col-md-3">
							<div>							
									<label for="example-text-input" class="form-label">Code <span
											class="text-danger  ">*</span></label>
									<input class="form-control text-uppercase " name="code" type="text"
										id="example-text-input" placeholder ="SKU" value="{{ old('code') }}"
										required>
									@error('code')
										<span class="text-danger fw-bold">{{ $message }}</span>
									@enderror								
							</div>
						</div> 
						<div class="col-md-3 text-center">
							<img class="p-1" id="subcategory-image-preview" style="cursor: pointer; display:none"
								src="" 
								alt="Product Thumbnail Preview" style="width: 100;"
								height="80">
							<span class="position-absolute bg-danger rounded px-1 text-white top-0"
								id="closeIcon" style="cursor: pointer; display:none">&#10006;</span>
						</div>                   
                       
                        <div class="col-md-12 mt-5">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary px-4 submit-btn">Submit</button>
                                <button type="reset" id="reset" class="btn btn-light px-4">Reset</button>
                            </div>
                        </div>
                    
                    </form>                    
                    </div>
                    <div class="border border-3 p-4 rounded mt-3">
                        <h6 class="mb-0 text-uppercase">Subcategory List</h6>
                        <hr/>
                        <div class="card">
                            <div class="card-body">
                                {{-- <div class="table-responsive"> --}}
                                    <table id="tblsubCategoryList" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S.no</th>
                                                <th>Subcategory Image</th>
                                                <th>Category Name</th>
                                                <th>Subcategory Name</th>
                                                <th>Code</th>                                                            
                                                <th>Status</th> 
                                             <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>                                                      
                                           
                                        </tbody>
                                        
                                    </table>
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                   </div>
                  
               </div><!--end row-->
            </div>
          </div>
      </div>

    </div>
</div>

<script src="{{asset('admin/assets/js/admin/subcategory.js')}}"></script>
@endsection 