//datatable id
var tableRoles;

$('#tableRoles').DataTable();


function openModal() {

    document.querySelector('#idRol').value = "";
    document.querySelector('.modal-header').classList.replace('headerUpdate','headerRegister');
    document.querySelector('#btnActionForm').classList.replace('btn-info','btn-primary');
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = 'Nuevo Rol';
    document.querySelector('#formRol').reset();

    $('#modalFormRol').modal('show');
}

//Function to show the data into the datatable
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
        var name = document.querySelector('#nameRol').value;
        var description = document.querySelector('#descriptionRol').value;
        var status = document.querySelector('#statusRol').value;
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

//Funtion to load editRol function
window.addEventListener("load", function() {
    setTimeout(() => {
        editRol();
    }, 500);
}, false);

//function to open edit modal form
function editRol() {
    var btnEditRol = document.querySelectorAll(".btnEditRol");
    btnEditRol.forEach(function (bntEditRol) {
        bntEditRol.addEventListener('click',function () {

            //change color and text to rol form
            document.querySelector('#titleModal').innerHTML = 'Actualizar Rol';
            document.querySelector('.modal-header').classList.replace('headerRegister','headerUpdate');
            document.querySelector('#btnActionForm').classList.replace('btn-primary','btn-info');
            document.querySelector('#btnText').innerHTML = 'Actualizar';

            //Process ajax request
            var idRol = this.getAttribute('rl');
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() :new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = baseUrl+'/roles/getRol/'+idRol;
            request.open('GET',ajaxUrl,true);
            request.send();

            //Validate response
            request.onreadystatechange = function (){
                if (request.readyState === 4 && request.status === 200){

                    var objData = JSON.parse(request.responseText);

                    if (objData.status){
                        document.querySelector('#idRol').value = objData.data.idrol;
                        document.querySelector('#nameRol').value = objData.data.nombrerol;
                        document.querySelector('#descriptionRol').value = objData.data.descripcion;

                        if(objData.data.status == 1){
                            var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
                        }else{
                            var optionSelect = '<option value="2" selected class="notBlock">Inactivo</option>';
                        }

                        //var htmlSelect = '${optionSelected} <option value="1">Activo</option> <option value="2">Inactivo</option>';
                        var htmlSelect = `${optionSelect}
											<option value="1">Activo</option>
											<option value="2">Inactivo</option>
											`;
                        document.querySelector('#statusRol').innerHTML = htmlSelect;
                        $('#modalFormRol').modal('show');

                    }else{
                        swal('Error', objData.msg,'Error');
                    }
                }
            }
        });
    });
}
