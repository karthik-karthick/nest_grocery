// Product Data Table
var table
$(document).ready(function () {
    table = $('#inStocklist').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/get/in/stock',
            type: 'GET',
            dataType: 'json',
            data: function (d) {
                d.custom_param = 'value'
            }
        },
        columns: [
            {
                data: function (row, type, set, meta) {
                    return meta.row + 1; 
                }
            },
            {
                data: 'product_image',
                render: function (data, type, row) {
                    return (
                        '<img src="/' +
                        data +
                        '" class="avatar" width="50" height="50"/>'
                    )
                }
            },
            {
                data: 'product_name'
            },
            // {
            //     data: 'category.category_name'
            // },
            // {
            //     data: 'subcategory.subcategory_name'
            // },
            // {
            //     data: 'tag_name'
            // },
            {
                data: 'current_stock'
            },
            // {
            //     data: 'sku'
            // },
            // {
            //     data: 'product_price'
            // },
            // {
            //     data: 'selling_price'
            // },
            // {
            //     data: 'preorder_description'
            // },
            // {
            //     data: 'short_description'
            // },
            // {
            //     data: 'long_description'
            // },
            {
                data: 'action'
            }
        ]
    })
})
// Product Data Table
var table
$(document).ready(function () {
    table = $('#outofStocklist').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/get/outof/stock',
            type: 'GET',
            dataType: 'json',
            data: function (d) {
                d.custom_param = 'value'
            }
        },
        columns: [
            {
                data: 'id'
            },
            {
                data: 'product_image',
                render: function (data, type, row) {
                    return (
                        '<img src="/' +
                        data +
                        '" class="avatar" width="50" height="50"/>'
                    )
                }
            },
            {
                data: 'product_name'
            },
            // {
            //     data: 'category.category_name'
            // },
            // {
            //     data: 'subcategory.subcategory_name'
            // },
            // {
            //     data: 'tag_name'
            // },
            {
                data: 'current_stock'
            },
            // {
            //     data: 'sku'
            // },
            // {
            //     data: 'product_price'
            // },
            // {
            //     data: 'selling_price'
            // },
            // {
            //     data: 'preorder_description'
            // },
            // {
            //     data: 'short_description'
            // },
            // {
            //     data: 'long_description'
            // },
            
            {
                data: 'action'
            }
        ]
    })
})