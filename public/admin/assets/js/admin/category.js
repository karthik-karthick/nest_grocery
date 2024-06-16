// Category Data Table
var table
$(document).ready(function () {
    table = $('#tblCategoryList').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/categories',
        columns: [
            {
                data: 'id'
            },
            {
                data: 'category_image',
                render: function (data, type, row) {
                    return (
                        '<img src="/' +
                        data +
                        '" class="avatar" width="50" height="50"/>'
                    )
                }
            },
            {
                data: 'category_name'
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

// Category Status Update
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
        url: '/change/category/status',
        data: {
            status_update: newData,
            category_id: id,
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

// Remove Image Field Required
$('.submit-btn').on('click', function () {
    $('#imageview').removeAttr('required')
})

// Form Reset
$(document).on('click', '#reset', function () {
    $('#category-image-preview').hide()
    $('.submit-btn').text('Submit')
    $('#category_id').val(null)
})

// Edit Category
$(document).on('click', '.edit-category', function (e) {
    e.preventDefault()
    var categoryId = $(this).data('id')
    $.ajax({
        url: '/get-category',
        type: 'GET',
        data: {
            id: categoryId
        },
        success: function (response) {
            $('input[name="category_name"]').val(response.category_name)
            $('#category_id').val(response.id)
            if (response.category_image) {
                var imageUrl = '/' + response.category_image
                $('#category-image-preview').attr('src', imageUrl).show()
            }
            $('.submit-btn').text('Update')
        },
        error: function (xhr) {
            console.log(xhr.responseText)
        }
    })
})

// Category Image Preview
document
    .getElementById('imageview')
    .addEventListener('change', function (event) {
        var file = event.target.files[0]
        var reader = new FileReader()

        reader.onload = function (e) {
            var imgElement = document.getElementById('category-image-preview')
            imgElement.src = e.target.result
            imgElement.style.display = 'block'
        }
        reader.readAsDataURL(file)
    })

// Delete Category
function del_category () {
    $(document).on('click', '.delete-category-btn', function (e) {
        e.preventDefault()
        var categoryId = $(this).data('id')
        var deleteUrl = $(this).data('url')
        var csrfToken = $('meta[name="csrf-token"]').attr('content')

        // Customized Swal.fire options
        var swalOptions = {
            title: 'Are you sure?',
            text: 'You will not be able to recover this category!',
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
                        category_id: categoryId
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
                        })

                        table.ajax.reload()
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
