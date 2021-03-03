const Functions = function () {
    request = function (type, url, dados = null) {
        return axios({
            method: type,
            url: url,
            data: dados,
            dataType: 'JSON',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
    }

    mascara_money = function (field) {
        return $(`${field}`).maskMoney({
            prefix:'R$ ',
            decimal: ',',
            allowNegative: true,
            thousands: '.',
            affixesStay: false
        })
    }

    dateFormat = function (data, format = 'DD/MM/YYYY') {
        return dateFns.format(data, format, { timeZone: 'America/Sao_Paulo', })
    }

    masks = function (field, mask) {
        return $(`${field}`).mask(mask);
    }

    formValidate = function (form, rules, messages, callback) {
        form.on('submit', function (e) {
            e.preventDefault();
        }).validate({
            ignore: "",
            debug: false,
            rules: rules,
            messages: messages,
            errorElement: "div",
            validClass: 'is-valid',
            errorClass: 'is-invalid',
            errorPlacement: function (error, element) {
                error.addClass( "invalid-feedback");
                error.insertAfter(element);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass(errorClass).removeClass(validClass);
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass(validClass).removeClass(errorClass);
            },
            submitHandler: function () {
                $.blockUI({
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#ffffff'
                    },
                    message: 'Validando o Formulário!'
                });

                callback(form);
            }
        });
    }
}();
