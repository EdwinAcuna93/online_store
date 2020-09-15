var tableRoles;

document.addEventListener('DOMContentLoaded', function () {

    tableRoles = $('#tableRoles').DataTable({ /*ID de la tabla*/
        "aProcessing": true,
        "aServerside": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json" /*Datatable language*/
        },
        "ajax": {
            "url": " " + baseUrl + "/Roles/getRoles",/* Method getRoles route*/
            "dataSrc": ""
        },
        "columns": [/* Database fields */
            {"data": "idrol"},
            {"data": "nombrerol"},
            {"data": "descripcion"},
            {"data": "status"},
            {"data": "options"}
        ],
        "responsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10, /*Show first 10 registers*/
        "order": [[0, "desc"]]
    });

    //Function to process new rol form
    var formRol = document.querySelector("#formRol");

    formRol.onsubmit = function (e) {
        e.preventDefault();

        //Get data from the form
        var name = document.querySelector('#rolName').value;
        var description = document.querySelector('#rolDescription').value;
        var status = document.querySelector('#rolStatus').value;
        if (name == '' || description == '' || status == '') {

            swal("Atención", "Todos los campos son obligatorios", "error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTPP');
        var ajaxUrl = baseUrl + '/Roles/setRol';
        var formData = new FormData(formRol);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function (){
            if(request.readyState == 4 && request.status == 200){

                var objData = JSON.parse(request.responseText);

                if(objData.status){
                    $('#modalFormRol').modal('hide');
                    formRol.reset();
                    swal("Roles de usuario",objData.msg,'success');

                    //tableRoles.api().ajax.reload(function () {});
                    tableRoles.ajax.reload(function(){});

                }else {
                    swal("Error",objData.msg,'error');
                }

            }//End request  if

        }//end onready

    }//end onsubmit function

});


$('#tableRoles').DataTable();

function openModal() {
    $('#modalFormRol').modal('show');
}
