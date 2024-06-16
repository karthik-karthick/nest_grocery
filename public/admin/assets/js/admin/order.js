// Category Data Table
var table;
$(document).ready(function () {
    table = $("#tblOrderList").DataTable({
        processing: true,
        serverSide: true,
        ajax: "/orders",
        columns: [{
                data: "id"
            },
            {
                data: "product.product_image",
                render: function(data, type, row) {
                    if(data){
                    return '<img src="/' + data +
                        '" alt="Cart Order" class="avatar" width="50" height="50" />';
                    } else{
                        return '<img src="/admin/assets/images/cart.png" class="avatar" width="45" height="45" />';                    }
                },
            },
            {
                data: "order_id"
            },
            {
                data: "user_id",
                
            },
            {
                data: "product_id"
            },{
                data: "subtotal"
            },{
                data: "shiping"
            },{
                data: "quantity"
            },{
                data: "grandtotal"
            },{
                data: "payment_method"
            },{
                data: "razorpay_id"
            },{
                data: "payment_status"
            },{
                data: "status"
            },
            
            // {
            //     data: "status",
            //     render: function(data, type, row) {
            //         var isChecked = data == 1 ? 'checked' : '';
            //         return '<div class="form-check form-switch" dir="ltr">' +
            //             '<input type="checkbox" class="form-check-input" id="customSwitch' +
            //             row.id + '" ' + isChecked + ' onclick="toggleStatus(' + row.id + ', this)">' +
            //             '<label class="form-check-label" for="customSwitch' +
            //             row.id + '"></label>' +
            //             '</div>';
            //     }
            // },
            {
                data: "action"
            },
        ]
    });
});