@extends('user.layouts.layouts')
@section('user_layout')
    <div class="container col-lg-12 mb-4 mb-lg-0 pt-2">
        <h2>Order Details</h2>
        <div class="card h-100  ">
            <div class="card-datatable table-responsive pt-0 ">
                <div class="container-fluid  pt-3">
                    <div class="row text-center ">
                        <div class="border col-6 pt-2 bg-light">
                            <img class="img" src="{{ asset('user/assets/imgs/theme/logo.svg') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 ps-5 pt-5 ">
                            <h4> Shipping Address</h4>
                            <br>
                            <ul class="list-unstyled">
                                <li><b>Name : </b> {{ $orders->address->first_name }}</li>
                                <li><b>Email : </b> {{ $orders->address->email }}</li>
                                <li><b>City : </b> {{ $orders->address->city }}</li>
                                <li><b>Landmark : </b> {{ $orders->address->landmark }}</li>
                                <li><b>Address : </b>
                                    {{ $orders->address->address }},{{ $orders->address->city }},{{ $orders->address->state }}
                                </li>
                                <li><b>Pin code : </b>{{ $orders->address->pincode }}</li>
                            </ul>
                        </div>

                        <div class=" dropdown col-4 px-5 pt-5 ">

                            <div>
                                <h4>Payment Deatils</h4>
                                <br>
                                <ul class="list-unstyled">
                                    <li><b>Payment type : </b> {{ $orders->payment_method }}</li>
                                    <li><b>Payment Status : </b> {{ $orders->status }}</li>
                                    <li><b>Razorpay payment Id : </b> </li>
                                    <li><b>Razorpay payment Status : </b> </li>

                                    <div class="pt-2  pb-4">
                                        @php
                                            function getStatusBadgeClass($status)
                                            {
                                                switch ($status) {
                                                    case 'Pending':
                                                        return 'text-bg-warning';
                                                    case 'Shipped':
                                                        return 'text-bg-primary';
                                                    case 'Delivered':
                                                        return 'text-bg-success';
                                                    case 'Cancelled':
                                                        return 'text-bg-danger';
                                                    default:
                                                        return 'text-bg-secondary';
                                                }
                                            }
                                        @endphp
                                        <li>
                                            <span class="badge rounded-pill {{ getStatusBadgeClass($orders->status) }}">
                                                {{ $orders->status }}</span>
                                        </li>
                                    </div>
                                    @if ($orders->status == 'Delivered')
                                        <li>
                                            <div class="row d-flex">
                                                <h5>Invoice :</h5>
                                                <div class="col-2">
                                                    <a class="btn btn-info btn-sm rounded text-light"
                                                        href="{{ route('invoice.view', ['id' => $orders->id]) }}"
                                                        title="view"><i class="bi bi-eye-fill text-dark "></i>view</a>
                                                </div>
                                                <div class="col-2">
                                                    <a class="btn btn-dark btn-sm rounded text-light"
                                                        href="{{ route('invoice.download', ['id' => $orders->id]) }}"
                                                        title="download"><i class="bi bi-download text-white ">download</i></a>
                                                </div>
                                            </div>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </div>

                    </div>
                    <hr style="border: 1px solid black">
                    <div class="row">
                        <div class="col-12">
                            <table id="tblProduct" class="table " aria-describedby="tblProduct_info" style="width: 100%;">
                                <thead class="border-bottom">
                                    <tr>
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 36px;"
                                            aria-label="S.No">S.No</th>
                                        <th class="sorting" tabindex="0" aria-controls="tblProduct" rowspan="1"
                                            colspan="1" style="width: 48px;"
                                            aria-label="Image: activate to sort column ascending">Image</th>
                                        <th class="sorting" tabindex="0" aria-controls="tblProduct" rowspan="1"
                                            colspan="1" style="width: 93px;"
                                            aria-label="Category: activate to sort column ascending">Date</th>
                                        <th class="sorting" tabindex="0" aria-controls="tblProduct" rowspan="1"
                                            colspan="1" style="width: 78px;"
                                            aria-label="Product Type: activate to sort column ascending">User name
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="tblProduct" rowspan="1"
                                            colspan="1" style="width: 54px;"
                                            aria-label="Brand: activate to sort column ascending">Order id</th>
                                        <th class="sorting" tabindex="0" aria-controls="tblProduct" rowspan="1"
                                            colspan="1" style="width: 97px;"
                                            aria-label="Product Name: activate to sort column ascending">Product
                                            Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="tblProduct" rowspan="1"
                                            colspan="1" style="width: 78px;"
                                            aria-label="New Can Deposit(₹): activate to sort column ascending">
                                            Quantity</th>

                                        <th class="sorting" tabindex="0" aria-controls="tblProduct" rowspan="1"
                                            colspan="1" style="width: 76px;"
                                            aria-label="Delivery Charge(₹): activate to sort column ascending">
                                            Price (₹)</th>
                                        <th class="sorting" tabindex="0" aria-controls="tblProduct" rowspan="1"
                                            colspan="1" style="width: 98px;"
                                            aria-label="New Can Deposit(₹): activate to sort column ascending">
                                            Shiping</th>
                                        <th class="sorting" tabindex="0" aria-controls="tblProduct" rowspan="1"
                                            colspan="1" style="width: 98px;"
                                            aria-label="New Can Deposit(₹): activate to sort column ascending">
                                            Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="tblProduct" rowspan="1"
                                            colspan="1" style="width: 98px;"
                                            aria-label="New Can Deposit(₹): activate to sort column ascending">
                                            Action</th>

                                    </tr>
                                </thead>

                                @foreach ($order as $orders)
                                    <tbody class="text-left">
                                        <tr class="odd">
                                            <td class="sorting_1">1</td>
                                            <td><img src="{{ optional($orders->product)->product_image ? asset($orders->product->product_image) : asset('/images/11697.jpg') }}"
                                                    width="50%" height="50%" alt="Product Image">
                                            </td>

                                            <td>{{ $orders->created_at->format('d-m-Y') }} </td>
                                            <td>
                                                {{ $orders->address->first_name }}

                                            </td>
                                            <td>{{ $orders->id }}</td>
                                            <td>{{ $orders->product_name }}</td>
                                            <td>{{ $orders->quantity }}</td>
                                            <td>{{ $orders->sub_total }}</td>
                                            <td>{{ $orders->shiping }}</td>
                                            <td>{{ $orders->status }}</td>
                                            <td>

                                                @if (
                                                    $orders->status !== 'Cancelled' &&
                                                        $orders->status !== 'Delivered' &&
                                                        $orders->status !== 'Return request' &&
                                                        $orders->status !== 'Returned')
                                                    <button class="float-right btn btn-danger" type="button"
                                                        onclick="showCancelAlert()">
                                                        <span>Cancel</span>
                                                    </button>

                                                    <form id="cancelOrderForm" action="{{ route('order.cancel') }}"
                                                        enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        @if ($order_count == 1)
                                                            <input type="hidden" name="iscart" value="">
                                                            <input type="hidden" name="status" value="Cancelled">
                                                            <input type ="hidden" name="order_id"
                                                                value="{{ $orders->id }}">
                                                        @else
                                                            <input type="hidden" name="iscart" value="is_cart">
                                                            <input type="hidden" name="order_id"
                                                                value="{{ $orders->order_id }}">
                                                            <input type="hidden" name="status" value="Cancelled">
                                                        @endif

                                                    </form>
                                                @endif


                                                @if ($orders->status === 'Delivered' || $orders->status === 'Return request')
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"><span>Return</span>
                                                    </button>

                                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Reason for returns</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form
                                                                    action="{{ route('order.return', ['id' => $orders->order_id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="mb-3">
                                                                            <label for="reasons"
                                                                                class="col-form-label">Reason :</label>
                                                                            <select name="reason"
                                                                                class="form-control selectpicker" required
                                                                                data-live-search="true">
                                                                                <option class="muted"> </option>
                                                                                <option
                                                                                    value="It’s different than described">
                                                                                    It’s different than described
                                                                                </option>
                                                                                <option value="It’s damaged">It’s
                                                                                    damaged </option>
                                                                                <option value="It arrived late"> It
                                                                                    arrived late</option>
                                                                                <option value="Other reason">
                                                                                    Others</option>
                                                                            </select>
                                                                        </div>
                                                                        <input type="hidden" value="Return request"
                                                                            name="status">
                                                                        <div class="mb-3">
                                                                            <label for="customReasonTextarea"
                                                                                class="col-form-label">Other
                                                                                Reasons:</label>
                                                                            <textarea name="custom_reason" class="form-control" required></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Confirm</button>
                                                                    </div>
                                                                </form>
                                                @endif


                        </div>
                    </div>
                </div>

                </td>

                </tr>
                </tbody>
                @endforeach

                </table>
            </div>
        </div>
        <div class="row pt-1 pe-4">
            <div class="col-9 ps-4"></div>

            <div class="col-3 pe-5 ">


                <h6 class="my-0 pb-4">Product Price Details</h6>
                <li class="pb-2  d-flex justify-content-between">
                    <div class="list-unstyled ">
                        <h6 class="my-0">Product Price :</h6>

                    </div>
                    @php
                        $totalSubtotal = 0;
                    @endphp
                    @foreach ($order as $orderDetail)
                        @php
                            $totalSubtotal += $orderDetail->sub_total;
                        @endphp
                    @endforeach
                    <span><i class="bi bi-currency-rupee"></i> {{ $totalSubtotal }}</span>
                </li>
                <li class="pb-2  d-flex justify-content-between">
                    <div class="list-unstyled ">
                        <h6 class="my-0">Quantity :</h6>

                    </div>
                    @php
                        $totalquantity = 0;
                        $total_shiping = 0;
                        $grand_price = 0;
                    @endphp
                    @foreach ($order as $orderDetail)
                        @php
                            $totalquantity += $orderDetail->quantity;
                            $total_shiping += $orderDetail->shiping;
                            $grand_price = $totalSubtotal + $total_shiping;
                        @endphp
                    @endforeach

                    <span><i class="bi bi-currency-rupee"></i> {{ $totalquantity }}</span>
                </li>
                <li class="pb-2  d-flex justify-content-between">
                    <div class="list-unstyled ">
                        <h6 class="my-0">Shipping Price :</h6>

                    </div>


                    <span><i class="bi bi-currency-rupee"></i> {{ $total_shiping }}</span>
                </li>
                <li class="pb-2  d-flex justify-content-between">
                    <div class="list-unstyled ">
                        <h6 class="my-0">Packing Fees :</h6>

                    </div>
                    <span>0</span>
                </li>
                <hr style="margin-top:9px !important; border:1px solid black;margin-bottom:9px !important;">
                <li class="pb-2  d-flex justify-content-between">
                    <div class="list-unstyled ">
                        <h6 class="my-0 fw-bold ">Total Price :</h6>
                    </div>
                    <span class="fw-bold"><i class="bi bi-currency-rupee"></i> {{ $grand_price }}</span>
                </li>
            </div>
            <hr>
        </div>
    </div>


    </div>


    </div>

    </div>

    <script>
        function showCancelAlert() {
            Swal.fire({
                title: "Are you sure?",
                text: "You want to Cancel this Order!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Cancel Order!",
                cancelButtonText: "No, cancel!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Trigger the form submission
                    document.getElementById('cancelOrderForm').submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire("Cancelled", "Your cancellation was cancelled :)", "info");
                }
            });
        }
    </script>
@endsection
