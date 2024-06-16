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
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
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
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <form class="needs-validation" action="{{ route('app.status') }}" method="POST" novalidate>
                @csrf

                
                <input type="hidden" name="app_status_id" value="{{ $app_status->id ?? null }}">
                

                <div class="card row">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 text-center">
                               <h3 class="fw-bold p-3"> Maintenance Mode</h3>
                            </div>
                            <div class="col-md-6 d-flex justify-content-center p-3 ">
                                <div class="form-check form-switch form-switch-lg" dir="ltr">
                                    @php
                                        $statuss = $app_status->value ?? null;
                                    @endphp
                                   
                                    <input type="checkbox" class="form-check-input" style=" width: 4em !important;
                                            height: 2em !important;" name="app_status" value="1"
                                        id="customSwitchsizelg" <?php echo $statuss == 1 ? 'checked' : ''; ?> />
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-body" >
                        <div class=" text-center">
                        <img src="{{asset('admin/assets/images/2840523.jpg')}}" width="900" height="600">
                        </div>
                        <div class="col-md-12 text-center mt-2">
                            <button class="btn btn-primary text-center " type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- end card -->
        </div> <!-- end col -->
    </div>

    </div>
    </div>
@endsection
