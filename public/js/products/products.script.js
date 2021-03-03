const Products = function () {
    let initPlugin = () => {
        mascara_money('#price')
    }

    let createProduct = () => {
        let formProduct = $('#formProduct')

        rules = {
            name: {
                required: true,
            },
            description: {
                required: true,
            },
            price: {
                required: true,
            }
        }

        messages = {
            name: {
                required: 'Campo nome é obrigatório.',
            },
            description: {
                required: 'Campo descrição é obrigatório.',
            },
            price: {
                required: 'Campo valor é obrigatório.',
            }
        }

        formValidate(formProduct, rules, messages, create)

        function create () {
            request('POST', formProduct.attr('action'), formProduct.serialize()).then(response => {
                if (response.status === 201) {
                    swal({
                        title: "Ótimo!",
                        text: `${response.data.message}`,
                        type: "success",
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'OK',
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },function(isConfirm){
                        if (isConfirm) {
                            location.reload()
                            window.location = '/'
                        }
                    })
                }
            }).catch(error => {
                if (error.response.status === 400) {
                    setTimeout($.unblockUI, 2000);
                    swal('Atenção', error.response.data.message, 'error')
                } else {
                    setTimeout($.unblockUI, 2000);
                    swal('Atenção', 'Houve um problema ao realizar o cadastro do produto.', 'error')
                }
            })
        }
    }

    return {
        init: function () {
            initPlugin()
            createProduct()
        }
    }
}()

$(document).ready(function () {
    Products.init()
});
