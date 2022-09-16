$(document).ready(function ()
{
    $("#fileuploader_parceiros").uploadFile({
        url: BASE_URL + "restrita/parceiros/upload",
        fileName: "logo",
        returnType: "json",
        onSuccess: function (files, data) {

            if (data.erro == 0) {
                $("#uploaded_image_parceiros").append('<ul style="list-style: none; display: inline-block"><li><img src="' + BASE_URL + 'uploads/empreendimentos/parceiros/' + data.uploaded_data['file_name'] + '" width="80" class="img-thumbnail mb-2 mr-1"><input type="hidden" name="logo" value="' + data.foto_caminho + '"><a href="javascript:(void)" type="button" class="btn bg-danger d-block btn-icon text-white p-2 mx-auto mb-30 btn-remove" style="width:50px;"><i class="fas fa-times"></i></a></li></ul>');
            } else {

                $("#erro_uploaded_parceiros").html(data.mensagem);
            }

        },
    });


    $('#uploaded_image_parceiros').on('click', '.btn-remove', function () {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn bg-danger text-white',
                cancelButton: 'btn bg-blue text-white mr-2'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Tem certeza da exclusão?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-exclamation-circle"></i> Excluir!',
            cancelButtonText: '<i class="fas fa-arrow-circle-left"></i> Cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $(this).parent().remove();
            } else {
                return false;
            }
        })
    });

});