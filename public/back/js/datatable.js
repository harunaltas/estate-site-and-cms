$(document).ready( function () {
    var dataTable = $('.dtable').DataTable({
        "pageLength":7,
        "bLengthChange":false,
        "dom":'<"top">ct<"top"p><"clear">',
        dom: 'Bfrtip',
        responsive: true,
        autoFill: true,
        "order": [[ 0, "desc" ]],
        buttons: [
        'copy', 'excel', 'print',
         {
            extend:'pdf',
            alignment: "left",
            customize: function(doc) {
                doc.defaultStyle.fontSize = 10;
                doc.styles.tableHeader.fontSize = 10;
                doc.defaultStyle.alignment = 'left';
                doc.styles.tableHeader.alignment = 'left';
            } 
         }
         ],
         language: {
            url: '//cdn.datatables.net/plug-ins/1.13.1/i18n/tr.json'
         }
     });


     var dtable = $('.dtableSub').DataTable({
        "dom":'<"top">ct<"top"p><"clear">',
        "pageLength":7,
        "bLengthChange":false,
        responsive: true,
        autoFill: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.1/i18n/tr.json'
         }
     });





     $("#filterbox").keyup(function(){
         dataTable.search(this.value).draw();
     });



 });