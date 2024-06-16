$(document).ready(function () {
    cart_item()
    wish_item()
})

function addtocart (id) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to add this item to your cart?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    }).then(result => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/add/cart/' + id,
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        cart_item();
                        Lobibox.notify('success', {
                            pauseDelayOnHover: true,
                            continueDelayOnInactiveTab: false,
                            position: 'top right',
                            icon: 'bx bx-check-circle',
                            msg: response.message
                        });
                    } else {
                        Lobibox.notify('error', {
                            pauseDelayOnHover: true,
                            continueDelayOnInactiveTab: false,
                            position: 'top right',
                            icon: 'bx bx-check-circle',
                            msg: response.message
                        })                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText)
                    toastr.error(
                        'Error occurred while processing your request.'
                    )
                },
                complete: function () {
                    // Re-enable the button after AJAX request is completed
                    $('.product__actions-item--wishlist').prop(
                        'disabled',
                        false
                    )
                }
            })
        }
    })
}

function addwishlist (id) {
    $.ajax({
        url: '/wishlist/add/' + id,
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                Lobibox.notify('success', {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    icon: 'bx bx-check-circle',
                    msg: response.message
                });
                wish_item();
            } else {
                Lobibox.notify('error', {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    icon: 'bx bx-check-circle',
                    msg: response.message
                });
            }
        },
        error: function (xhr, status, error) {
            Lobibox.notify('error', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                icon: 'bx bx-check-circle',
                msg: response.message
            })
        }
    })
}

function cart_item() {
    $.ajax({
        url: '/getcart',
        method: 'GET',
        success: function (response) {
            $('#dropcart__item').empty();
            $('#totaldiv').empty(); // Clear existing table content
            var subtotal2 = 0;
            var shipping2 = 0;
            var maintotal2 = 0;
            var baseUrl = 'http://127.0.0.1:8000'; // Base URL of your server

            $.each(response.html, function (index, cartItem) {
                var count = response.html.length;
                $('#head_cartcount').html(count);             

                var total2 = cartItem.discount_price * cartItem.cart_quantity; // Calculate total for current item
                subtotal2 += total2;
                var ship2 = parseFloat(cartItem.product.shipping_price);
                if (!isNaN(ship2)) {
                    shipping2 += ship2;
                }
                maintotal2 = subtotal2 + shipping2;

                var imageUrl = cartItem.product.product_image;

                var htmls = `    
                                <li>
                                    <div class="shopping-cart-img">
                                        <a href="shop-product-right.html"><img alt="Nest" src="/${imageUrl}"></a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="shop-product-right.html">${cartItem.product.tag_name}</a></h4>
                                        <h4><span>${cartItem.cart_quantity} × </span>${cartItem.product.selling_price}</h4>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="javascript:;" onclick="deletecart(${cartItem.id});"><i class="fi-rs-cross-small"></i></a>
                                    </div>
                                </li>
                                                         
                `
                $('#dropcart__item').append(htmls);
            });

            var totaldiv = 
            `<div class="shopping-cart-total">
                                            <h4>Total <span id="headmain2">0</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a class='outline' href='/cart'>View cart</a>
                                            <a href='/checkout/cart'>Checkout</a>
                                        </div>`

                                        $('#totaldiv').append(totaldiv);

            $('#headmain2').html(`&#8377; ${maintotal2.toFixed(2)}`);
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        }
    });
}



function wish_item () {
    $.ajax({
        url: '/getwishlist',
        method: 'GET',
        success: function (response) {
            $('.dropwish__list').empty() // Clear existing table content

            $.each(response.html, function (index, wishItem) {
                var count = response.html.length
                $('#head_wishcount').html(count)
                $('#wishcount').html(`${count}`)

                // Construct the URLs correctly
                var productDetailUrl = `${wishItem.product.id}` // Adjust this URL as per your routing
                var productImageUrl = `${wishItem.product.product_image}`

                let stockStatus = ''
                if (wishItem.product.current_stock > 10) {
                    stockStatus =
                        '<span class="stock-status in-stock mb-0">In Stock</span>'
                } else if (wishItem.product.current_stock > 0) {
                    stockStatus = `<span class="stock-status out-stock mb-0">Only ${wishItem.product.current_stock} left</span>`
                } else {
                    stockStatus =
                        '<span class="stock-status out-stock mb-0">Out Of Stock</span>'
                }

                let addcart = ''
                if (wishItem.product.current_stock != 0) {
                    addcart = `<button onclick="addtocart(${wishItem.product.id})" class="btn btn-sm">Add to cart</button>`
                } else {
                    addcart =
                        '<button class="btn btn-sm btn-secondary">Request</button>'
                }

                var html = `
                <tr class="pt-30">
                                <td class="custome-checkbox pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                    <label class="form-check-label" for="exampleCheckbox1"></label>
                                </td>
                                <td class="image product-thumbnail pt-40"><img src="${productImageUrl}" alt="#" /></td>
                                <td class="product-des product-name">
<h6><a class='product-name mb-10' href='/product/detail/${productDetailUrl}'>${wishItem.product.product_name}</a></h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                </td>
                                <td class="price" data-title="Price">
                                    <h3 class="text-brand">&#8377; ${wishItem.product.selling_price}</h3>
                                </td>
                                <td class="text-center detail-info" data-title="Stock">
                                    ${stockStatus}
                                </td>
                                <td class="text-right" data-title="Cart">
                                ${addcart}
                                </td>
                                <td class="action text-center" data-title="Remove">
                                    <a href="javasript:;" onclick="addwishlist(${wishItem.product.id});" class="text-body"><i class="fi-rs-trash"></i></a>
                                </td>
                            </tr>  
                `
                $('.dropwish__list').append(html)
            })
        },
        error: function (xhr, status, error) {
            console.error('Error:', error)
        }
    })
}

function deletecart(id) {
    // Show confirmation dialog
    swal.fire({
        title: 'Are you sure?',
        text: 'Confirm to remove this item from the cart?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    }).then(willDelete => {
        if (willDelete.value) {
            // Check if the user clicked the confirm button
            $.ajax({
                url: '/deletecartitem',
                method: 'GET',
                data: {
                    cart_id: id
                },
                success: function (response) {
                    cart_item();
                    if(response.success) {
                        
                        Lobibox.notify('success', {
                            pauseDelayOnHover: true,
                            continueDelayOnInactiveTab: false,
                            position: 'top right',
                            icon: 'bx bx-check-circle',
                            msg: response.message
                        }); 
                        
                    }
                    
                },
                error: function (xhr, status, error) {
                    console.error('Error while deleting:', error)
                    Lobibox.notify('error', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        icon: 'bx bx-check-circle',
                        msg: response.message
                    });
                }
            })
        }
    })
}