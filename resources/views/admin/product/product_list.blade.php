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
                        <li class="breadcrumb-item active" aria-current="page">Products List</li>
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
              <h5 class="card-title">Products List</h5>
              <hr/>
               <div class="form-body mt-4">
                <div class="row">
                   <div class="col-lg-12">                   
                    <div class="border border-3 p-4 rounded mt-3">
                    <h6 class="mb-0 text-uppercase">Product List</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="productlist" class="table table-bordered">
								<thead>
									<tr>
										<th>Id</th>
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Category Name</th>
                                                <th>Subcategory Name</th>
                                                <th>Tag Name</th>                        
                                                <th>current_stock</th>
                                                <th>sku</th>
                                                <th>product_price</th>
                                                <th>selling_price</th>
                                                <th>preorder_description</th> 
                                                <th>short_description</th> 												
                                                <th>Action</th>
                                                
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
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

<script src="{{asset('admin/assets/js/admin/products.js')}}"></script>
@endsection