// Product Data Table
var table;
$(document).ready(function() {
   table = $("#productlist").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "/products",
            type: "GET",
            dataType: "json",
            data: function(d) {
                d.custom_param = "value";
            }
        },
        columns: [{
                data: "id"
            },
            {
                data: "product_image",
                render: function(data, type, row) {
                    return '<img src="/' +data +
                        '" class="avatar" width="50" height="50"/>';
                }
            },
            {
                data: "product_name"
            },
            {
                data: "category.category_name"
            },
            {
                data: "subcategory.subcategory_name"
            },
            {
                data: "tag_name"
            },
            {
                data: "current_stock"
            },
            {
                data: "sku"
            },
            {
                data: "product_price"
            },
            {
                data: "selling_price"
            },
            {
                data: "preorder_description"
            },
            {
                data: "short_description"
            },
            {
                data: "action"
            }
        ]
    });
});

// Product Image Preview
$('#imageview').change(function (event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    reader.onload = function (e) {
        $('#product-image-preview').attr('src', e.target.result).show();
    };
    reader.readAsDataURL(file);
});

// Form Image hide On Update Form
$(document).on('click', '#reset', function () {
    $('#product-image-preview').hide()
});

// Product Image Preview
$(document).ready(function() {
    $('#product-image').change(function(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#product-image-preview').attr('src', e.target.result).show();
        };
        reader.readAsDataURL(file);
    });


    // Get Sub Category based on Category Id
    $('#categorySelect').change(function() {
        var categoryId = $(this).val();
        if (categoryId !== '') {
            $.ajax({
                type: "GET",
                url: "/get-subcategories",
                data: {
                    category_id: categoryId
                },
                success: function(result) {
                    $("#subCategorySelect").html(
                        '<option value="">Select Subcategory</option>');
                    
                    $.each(result, function(id, name) {
                        $("#subCategorySelect").append(
                            '<option value="' + id + '">' + name +
                            "</option>"
                        );
                    });                   
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            $('#subCategorySelect').empty().append('<option value="">Select Subcategory</option>');
        }
    });

});

// Random Genarete SKU
$(document).ready(function() {
    $('#subCategorySelect').change(function() {
        var subcategoryId = $(this).val();
        $.ajax({
            type: "GET",
            url: "/get-subcategory-sku",
            data: {
                subcategory_id: subcategoryId
            },

            success: function(response) {
                var randomNum = Math.floor(10000 + Math.random() * 90000);
                var skuWithRandom = response.sku + randomNum;
                $('#subCategorySku').val(skuWithRandom);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});


// Delete Product 
function delproduct() {
    $(document).on('click', '.delete-product-btn', function (e) {
        e.preventDefault();
        
        var productId = $(this).data('id');
        var deleteUrl = $(this).data('url');
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        
        var swalOptions = {
            title: "Are you sure?",
            text: "You won't be able to revert this Product!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        };

        Swal.fire(swalOptions).then(result => {
            if (result.isConfirmed) {
                $.ajax({
                    url: deleteUrl,
                    type: 'POST',
                    data: {
                       product_id: productId
                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function (response) {
                        Swal.fire({
                            title: 'Success',
                            text: response.message,
                            icon: 'success',
                            confirmButtonColor: '#5156be'                        
                        });
                        table.ajax.reload();
                    },
                    error: function (xhr, status, error) {
                        var errorMessage = 'An error occurred while deleting the Product.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        Swal.fire({
                            title: 'Error',
                            text: errorMessage,
                            icon: 'error',
                            confirmButtonColor: '#5156be'
                        });
                    }
                });
            }
        });
    });
};

new MultiSelectTag('countries', {
    placeholder: 'Search',

    tagColor: {
        textColor: '#327b2c',
        borderColor: '#92e681',
        bgColor: '#eaffe6',
    },
    onChange: function(values) {
        console.log(values)
    }
})
