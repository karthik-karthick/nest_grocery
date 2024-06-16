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
        <div class="col-xl-6">
            <form class="needs-validation" action="{{ route('razorpay.status') }}" method="POST" novalidate>
                @csrf

                <input type="hidden" name="razorpay_id_id" value="{{ $razorpay_id->id ?? null }}">
                <input type="hidden" name="status_id" value="{{ $razorpay_status->id ?? null }}">
                <input type="hidden" name="secret_key_id" value="{{ $secret_key->id ?? null }}">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('admin/assets/images/razorpay.png') }}" width="350">
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <div class="form-check form-switch form-switch-lg" dir="ltr">
                                    @php
                                        $statuss = $razorpay_status->value ?? null;
                                    @endphp
                                    <input type="checkbox" class="form-check-input" name="status" value="1"
                                        id="customSwitchsizelg" <?php echo $statuss == 1 ? 'checked' : ''; ?>>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row justify-content-center mt-3">
                            <div class="col-12 mx-auto">
                                <div class="mb-4">
                                    <label class="form-label h5 " for="validationCustom01">RazorPay Id</label>
                                    <input class="form-control form-control-lg" type="text" name="razorpay_id"
                                        id="form-lg-input" value="{{ $razorpay_id->value ?? null }}"
                                        placeholder="Enter RazorPay Id">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 mx-auto ">
                                <div class="mb-5">
                                    <label class="form-label h5" for="validationCustom02">Secret Key</label>
                                    <input class="form-control form-control-lg" type="text" name="secret_key"
                                        id="form-lg-input" value="{{ $secret_key->value ?? null }}"
                                        placeholder="Enter Secret Key">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
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
