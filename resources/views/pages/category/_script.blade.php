<script>
 
$(document).ready(function() {

    $("#detailTable").DataTable( {
        processing: true,
        
        ajax: "{{ route($prefix.'.dt')}}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'description', name: 'descrption'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action_id', name: 'action'},
        ],
        columnDefs: [
            { targets: [0, 1, 2], visible: true},

        { 

            targets: -1, 
            visible: true,
            render: function (data, type, row) {
                return btnAction('edit', '{{url($prefix."/edit")}}/'+row.action_id, data);
            }
        },

 ]
       
    
    } );
} );
</script>




