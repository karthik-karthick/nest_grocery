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
                        <li class="breadcrumb-item active" aria-current="page">Orders List</li>
                    </ol>
                </nav>
            </div>
            
        </div>
        <!--end breadcrumb-->

      <div class="card">
          <div class="card-body p-4">
              <h5 class="card-title">Orders List</h5>
              <hr/>
               <div class="form-body mt-4">
                <div class="row">
                   <div class="col-lg-12">                   
                    <div class="border border-3 p-4 rounded mt-3">
                    <h6 class="mb-0 text-uppercase">Orders List</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="tblOrderList" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>S.no</th>
										<th>Product Image</th>
										<th>Order Id</th>
										<th>User Id</th>
										<th>Quantity</th>
										<th>Subtotal</th>
										<th>shiping </th>
										<th>Quantity</th>
										<th>Total</th>
										<th>Payment Type</th>
										<th>Payment Id</th>
										<th>Payment Status</th>
										<th>Status</th>
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
<script src="{{asset('admin/assets/js/admin/order.js')}}"></script>
@endsection