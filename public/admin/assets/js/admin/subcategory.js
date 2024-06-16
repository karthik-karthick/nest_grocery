// Subcategory Data Table
var table
$(document).ready(function () {
    table = $('#tblsubCategoryList').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/subcategories',
        columns: [
            {
                data: 'id'
            },
            {
                data: 'subcategory_image',
                render: function (data, type, row) {
                    return (
                        '<img src="/' +
                        data +
                        '" class="avatar" width="50" height="50"/>'
                    )
                }
            },
            {
                data: 'category.category_name'
            },
            {
                data: 'subcategory_name'
            },
            {
                data: 'code'
            },
            {
                data: 'status',
                render: function (data, type, row) {
                    var isChecked = data == 1 ? 'checked' : ''
                    return (
                        '<div class="form-check form-switch" dir="ltr">' +
                        '<input type="checkbox" class="form-check-input" id="customSwitch' +
                        row.id +
                        '" ' +
                        isChecked +
                        ' onclick="toggleStatus(' +
                        row.id +
                        ', this)">' +
                        '<label class="form-check-label" for="customSwitch' +
                        row.id +
                        '"></label>' +
                        '</div>'
                    )
                }
            },
            {
                data: 'action'
            }
        ]
    })
})
// Subcategory Status Update
function toggleStatus (id, checkbox) {
    var newData = checkbox.checked ? 1 : 0
    swal.fire({
        title: 'Confirm to Change Status',
        text: 'Are you sure you want to change the status ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    }).then(result => {
        if (result.isConfirmed) {
            sendDataToController(id, newData)
        } else {
            checkbox.checked = !checkbox.checked
        }
    })
}
function sendDataToController (id, newData) {
    var csrfToken = $('meta[name="csrf-token"]').attr('content')
    $.ajax({
        type: 'POST',
        url: '/change/subcategory/status',
        data: {
            status_update: newData,
            subcategory_id: id,
            _token: csrfToken
        },
        success: function (response) {
            if (response.success) {
                swal.fire({
                    title: 'Status Updated!',
                    text: response.message,
                    icon: 'success',
                    showConfirmButton: true
                })
                table.ajax.reload()
            }
        },
        error: function (xhr, status, error) {
            var errorMessage = 'An error occurred while deleting the category.'
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message
            }
            Swal.fire({
                title: 'Error',
                text: errorMessage,
                icon: 'error',
                confirmButtonColor: '#5156be'
            })
            table.ajax.reload()
        }
    })
}

// Edit SubCategory
$(document).on('click', '.edit-subcategory', function (e) {
    e.preventDefault()

    var categoryId = $(this).data('id')
    $.ajax({
        url: '/get-subcategory',
        type: 'GET',
        data: {
            id: categoryId
        },
        success: function (response) {
            $('select[name="category_id"]').val(response.category_id)
            $('input[name="subcategory_name"]').val(response.subcategory_name)
            $('input[name="code"]').val(response.code)
            $('#subcategory_id').val(response.id)

            if (response.subcategory_image) {
                var imageUrl = '/' + response.subcategory_image
                $('#subcategory-image-preview').attr('src', imageUrl).show()
            }
            $('.submit-btn').text('Update')
        },
        error: function (xhr) {
            console.log(xhr.responseText)
        }
    })
})

// Remove Image Field Required on Update Form
$('.submit-btn').on('click', function () {
    $('#bsValidation2').removeAttr('required')
})

// Category Form Reset on Update
$(document).on('click', '#reset', function () {
    $('#subcategory-image-preview').hide()
    $('.submit-btn').text('Submit')
    $('select[name="category_id"]').val(null)
})

// SubCategory Image Priview
$('#bsValidation2').change(function (event) {
    var file = event.target.files[0]
    var reader = new FileReader()
    reader.onload = function (e) {
        $('#subcategory-image-preview').attr('src', e.target.result).show()
    }
    reader.readAsDataURL(file)
})



// Delete SubCategory
function del_subcategory() {
    $(document).on('click', '.delete-subcategory-btn', function (e) {
        e.preventDefault()

        var subcategoryId = $(this).data('id')
        var deleteUrl = $(this).data('url')
        var csrfToken = $('meta[name="csrf-token"]').attr('content')
        $('#subcategory_id_input').val(subcategoryId)
        var swalOptions = {
            title: 'Are you sure?',
            text: "You won't be able to revert this Subcategory!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }
        Swal.fire(swalOptions).then(result => {
            if (result.isConfirmed) {
                $.ajax({
                    url: deleteUrl,
                    type: 'POST',
                    data: {
                        subcategory_id: subcategoryId
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
                        }).then(() => {
                            location.reload()
                        })
                    },
                    error: function (xhr, status, error) {
                        var errorMessage =
                            'An error occurred while deleting the category.'
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message
                        }
                        Swal.fire({
                            title: 'Error',
                            text: errorMessage,
                            icon: 'error',
                            confirmButtonColor: '#5156be'
                        })
                    }
                })
            }
        })
    })
}
