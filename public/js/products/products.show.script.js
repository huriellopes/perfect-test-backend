const ProductsShow = function () {
    let showProduct = () => {
        $('#productshow').on('show.bs.modal', function (e) {
            let id = $(e.relatedTarget).data('id')
            let obj_modal = $(this).closest('.modal')

            $(this).find('.modal-header h5.modal-title').text('Detalhes do Produto')

            request('POST', `products/api/show`, {'id': id}).then(response => {
                if (response.status === 200) {
                    obj_modal.find('.modal-body').html('')
                    obj_modal.find('.modal-body').html(response.data)
                }
            }).catch(error => {
                if (error.response.status === 400) {
                    setTimeout($.unblockUI, 2000);
                    swal('Atenção.', error.response.data.message, 'error')
                } else {
                    setTimeout($.unblockUI, 2000);
                    swal('Atenção.', 'Houve um error.', 'error')
                }
            })
        })
    }

    let deleteProduct = () => {
        $("#deleteButton").on('click', function (e) {
            e.preventDefault()
            let id = $(this).data('id')

            request('POST', `products/api/delete/${id}`).then(response => {
                if (response.status === 200) {
                    swal({
                        title: "Ótimo!",
                        text: `${response.data.message}`,
                        type: "success",
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'OK',
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }, function (isConfirm) {
                        if (isConfirm) {
                            location.reload()
                        }
                    })
                }
            })
        })
    }

    return {
        init: function () {
            showProduct()
            deleteProduct()
        }
    }
}()


$(document).ready(function () {
    ProductsShow.init()
});
