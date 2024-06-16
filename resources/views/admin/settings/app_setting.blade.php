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

            <form action="{{ route('business.setup') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="company_name_id" value="{{ $company_name->id ?? null }}">
                <input type="hidden" name="phone_number_id" value="{{ $phone_number->id ?? null }}">
                <input type="hidden" name="company_address_id" value="{{ $company_address->id ?? null }}">
                <input type="hidden" name="business_footer_id" value="{{ $business_footer->id ?? null }}">
                <input type="hidden" name="business_favicon_id" value="{{ $business_favicon->id ?? null }}">
                <input type="hidden" name="business_logo_id" value="{{ $business_logo->id ?? null }}">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">General Settings</h4>

                            </div>
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div>
                                            <div class="mb-5">
                                                <label for="example-text-input" class="form-label">Company Name</label>
                                                <input class="form-control form-control-lg" name="company_name"
                                                    type="text" value="{{ $company_name->value ?? null }}"
                                                    id="example-text-input" placeholder="Company Name">
                                            </div>
                                            <div class="mb-5">
                                                <label for="example-search-input" class="form-label">Address</label>
                                                <textarea class="form-control form-control-lg" name="company_address">{{ $company_address->value ?? null }}</textarea>
                                            </div>



                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <div class="mb-5">
                                                <label for="example-search-input" class="form-label">Phone Number</label>
                                                <input class="form-control form-control-lg" name="contact_number"
                                                    type="number" value="{{ $phone_number->value ?? null }}"
                                                    id="example-search-input" placeholder ="Phone Number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Business Settings</h4>

                            </div>
                            <div class="card-body p-4">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div>
                                            <div class="mb-5">
                                                <label for="example-text-input" class="form-label">Business Logo</label>
                                                <input class="form-control form-control-lg" name="business_logo"
                                                    type="file" value="" id="example-text-input">
                                                @error('business_logo')
                                                    <span class="text-danger fw-bold">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-5 text-center ">
                                                <img src="{{ asset($business_logo->value ?? null) }}" height="150"
                                                    width="400">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <div class="mb-5">
                                                <label for="example-search-input" class="form-label">Business Favicon
                                                    Logo</label>
                                                <input class="form-control form-control-lg" name="business_favicon"
                                                    type="file" value="" id="example-search-input">
                                                @error('business_favicon')
                                                    <span class="text-danger fw-bold">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-5 text-center">
                                                <img src="{{ asset($business_favicon->value ?? null) }}" height="150"
                                                    width="">
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Footer Settings</h4>

                            </div>
                            <div class="card-body p-4">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-5">
                                            <label for="example-search-input" class="form-label">Footer Text</label>
                                            <textarea class="form-control form-control-lg" name="footer">{{ $business_footer->value ?? null }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
                <div class="text-end me-5 ">
                    <button class="btn btn-primary " type="submit">Save</button>
                </div>
            </form>



        </div>
    </div>
    <!--end breadcrumb-->
@endsection
