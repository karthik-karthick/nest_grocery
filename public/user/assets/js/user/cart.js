$(document).ready(function () {
    cart()
})

// Assuming you have a route named 'cart' that returns cart data

function cart() {
    $.ajax({
        url: '/getcart',
        method: 'GET',
        success: function (response) {
            $('.cart-table__body').empty(); // Clear existing table content
            var subtotal = 0;
            var shipping = 0;
            var maintotal = 0;

            $.each(response.html, function (index, cartItem) {
                var count = response.html.length;
                $('#cartcount').html(count);
                // $('#cartcount').html(`Shopping Cart (${count})`);

                var total = cartItem.discount_price * cartItem.cart_quantity; // Calculate total for current item
                subtotal += total;
                var ship = parseFloat(cartItem.product.shipping_price);
                if (!isNaN(ship)) {
                    shipping += ship;
                }
                maintotal = subtotal + shipping;

                var html = `
                    <tr class="pt-30">
                        <td class="custome-checkbox pl-30">
                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox${index}" value="">
                            <label class="form-check-label" for="exampleCheckbox${index}"></label>
                        </td>
                        <td class="image product-thumbnail pt-40"><img src="${cartItem.product.product_image}" alt="#"></td>
                        <td class="product-des product-name">
                            <h6 class="mb-5"><a class='product-name mb-10 text-heading' href='/prod/detail/${cartItem.product.id}'>${cartItem.product.product_name}</a></h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width:90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                        </td>
                        <td class="price" data-title="Price">
                            <h4 class="text-body">&#8377; ${cartItem.product.selling_price}</h4>
                        </td>
                        <td class="text-center detail-info" data-title="Stock">
                            <div class="detail-extralink mr-15">
                                <div class="detail-qty border radius">
                                    <a href="javascript:;" onclick="cartDecrease(${cartItem.id})" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <input type="text" name="quantity" class="qty-val" value="${cartItem.cart_quantity}" min="1">
                                    <a href="javascript:;" onclick="cartIncrease(${cartItem.id})" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                            </div>
                        </td>
                        <td class="price" data-title="Price">
                            <h4 class="text-brand">&#8377; ${total}</h4>
                        </td>
                        <td class="action text-center" data-title="Remove">
                            <a href="javascript:;" onclick="deletecart(${cartItem.id});" class="text-body"><i class="fi-rs-trash"></i></a>
                        </td>
                    </tr>`;
                
                $('.cart-table__body').append(html); // Append row to the table body
            });

            var html2 = `
                <tr>
                    <td class="cart_total_label">
                        <h6 class="text-muted">Subtotal</h6>
                    </td>
                    <td class="cart_total_amount">
                        <h4 id="subtotal" class="text-brand text-end">&#8377; ${subtotal}</h4>
                    </td>
                </tr>
                <tr>
                    <td scope="col" colspan="2">
                        <div class="divider-2 mt-10 mb-10"></div>
                    </td>
                </tr>
                <tr>
                    <td class="cart_total_label">
                        <h6 class="text-muted">Shipping</h6>
                    </td>
                    <td class="cart_total_amount">
                        <h5 id="shipping" class="text-heading text-end">&#8377; ${shipping}</h5>
                    </td>
                </tr>
                <tr>
                    <td class="cart_total_label">
                        <h6 class="text-muted">Packing fees</h6>
                    </td>
                    <td class="cart_total_amount">
                        <h5 class="text-heading text-end">Free</h5>
                    </td>
                </tr>
                <tr>
                    <td scope="col" colspan="2">
                        <div class="divider-2 mt-10 mb-10"></div>
                    </td>
                </tr>
                <tr>
                    <td class="cart_total_label">
                        <h6 class="text-muted">Total</h6>
                    </td>
                    <td class="cart_total_amount">
                        <h4 id="cart_main" class="text-brand text-end">&#8377; ${maintotal}</h4>
                    </td>
                </tr>`;
                
            $('#pricelist').html(html2);
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        }
    });
}


function cartDecrease(id) {
    $.ajax({
        url: '/cartdecrease',
        method: 'GET',
        data: {
            cart_id: id
        },
        success: function (response) {
            cart()
            cart_item()
        },
        error: function (xhr, status, error) {
            // Handle error response
            console.error('Error while decreasing:', error)
        }
    })
}

function cartIncrease(id) {
    $.ajax({
        url: '/cartincrease',
        method: 'Get',
        data: {
            cart_id: id
        },
        success: function (responce) {
            cart()
            cart_item()
        },
        error: function (xhr, status, error) {
            console.error('Error while increaseing', error)
        }
    })
}

// function deletecart(id) {
//     // Show confirmation dialog
//     swal.fire({
//         title: 'Are you sure?',
//         text: 'Confirm to remove this item from the cart?',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonText: 'Yes',
//         cancelButtonText: 'No'
//     }).then(willDelete => {
//         if (willDelete.value) {
//             // Check if the user clicked the confirm button
//             $.ajax({
//                 url: '/deletecartitem',
//                 method: 'GET',
//                 data: {
//                     cart_id: id
//                 },
//                 success: function (response) {
//                     if(response.success) {
//                         toastr.success(response.message); 
//                     }
//                     cart()
//                     cart_item()
//                 },
//                 error: function (xhr, status, error) {
//                     console.error('Error while deleting:', error)
//                 }
//             })
//         }
//     })
// }

