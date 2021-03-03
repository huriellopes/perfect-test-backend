const Sales = function () {
    let initPlugin = () => {
        masks('#cpf', '000.000.000-00')
        mascara_money('#discount')
    }

    let createSales = () => {
        let formSales = $('#formSales')

        rules = {
            client_name: {
                required: true,
            },
            client_email: {
                required: true,
                email: true,
            },
            client_cpf: {
                required: true,
                validaCpf: true
            },
            product_id: {
                required: true,
            },
            saled_at: {
                required: true,
            },
            quantity: {
                required: true,
            },
            discount: {
                required: true,
            },
            status_id: {
                required: true,
            }
        }

        messages = {
            client_name: {
                required: 'Campo nome obrigatório.',
            },
            client_email: {
                required: 'Campo email obrigatório.',
            },
            client_cpf: {
                required: 'Campo cpf obrigatório.',
            },
            product_id: {
                required: 'Campo produto obrigatório.',
            },
            saled_at: {
                required: 'Campo data obrigatório.',
            },
            quantity: {
                required: 'Campo quantidade obrigatório.',
            },
            discount: {
                required: 'Campo desconto obrigatório.',
            },
            status_id: {
                required: 'Campo status obrigatório.',
            }
        }

        formValidate(formSales, rules, messages, createSale)

        function createSale () {
            request('POST', formSales.attr('action'), formSales.serialize()).then(response => {
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
                    swal('Atenção', 'Houve um problema ao realizar o cadastro da venda.', 'error')
                }
            })
        }
    }

    $.validator.addMethod("validaCpf", function (value, element) {
        const cpf = value.replace(/[^\d]+/g, '');

        let soma = 0;
        let resto = 0;

        if (cpf === '00000000000' ||
            cpf === '11111111111' ||
            cpf === '22222222222' ||
            cpf === '33333333333' ||
            cpf === '44444444444' ||
            cpf === '55555555555' ||
            cpf === '66666666666' ||
            cpf === '77777777777' ||
            cpf === '88888888888' ||
            cpf === '99999999999') {
            return false;
        }

        for (let i = 1; i <= 9; i++) {
            soma = soma + parseInt(cpf.substring(i-1, i)) * (11 - i);
        }
        resto = (soma * 10) % 11;

        if ((resto === 10) || (resto === 11)) {
            resto = 0;
        }

        if (resto !== parseInt(cpf.substring(9, 10))) {
            return false;
        }

        soma = 0;

        for (let i = 1; i <= 10; i++) {
            soma = soma + parseInt(cpf.substring(i-1, i)) * (12 - i);
        }

        resto = (soma * 10) % 11;

        if ((resto === 10) || (resto === 11)) {
            resto = 0;
        }

        return resto === parseInt(cpf.substring(10, 11));

    }, "O CPF informado é inválido.");

    return {
        init: function () {
            initPlugin()
            createSales()
        }
    }
}()

$(document).ready(function () {
    Sales.init()
});
