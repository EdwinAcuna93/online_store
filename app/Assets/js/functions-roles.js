var tableRoles;

document.addEventListener('DOMContentLoaded', function(){
    console.log('hola');

    tableRoles = $('#tableRoles').DataTable({ /*ID de la tabla*/
        "aProcessing":true,
        "aServerside":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json" /*Datatable language*/
        },
        "ajax":{
            "url": " "+baseUrl+"/Roles/getRoles",/* Method getRoles route*/
            "dataSrc":""
        },
        "columns":[/* Database fields */
            {"data":"idrol"},
            {"data":"nombrerol"},
            {"data":"descripcion"},
            {"data":"status"}
        ],
        "responsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10, /*Show first 10 registers*/
        "order":[[0,"desc"]]

    });
});










alert('ajjsjdadasd');


$('#tableRoles').DataTable();

function openModal(){
    $('#modalFormRol').modal('show');
}
