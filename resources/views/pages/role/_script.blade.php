<script>
 
$(document).ready(function() {

    $("#detailTable").DataTable( {
        processing: true,
        
        ajax: "{{ route($prefix.'.dt')}}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'guard_name', name: 'guard_name'},
            {data: 'action_id', name: 'action'},
        ],
        columnDefs: [
            { targets: [0, 1], visible: true},

        { 

            targets: -1, 
            visible: true,
            render: function (data, type, row) {
                if(row.action_id != 1){
                    return btnAction('edit', '{{url($prefix."/edit")}}/'+row.action_id, data);
                }else{
                    return '';
                }
            }
        },

 ]
       
    
    } );
} );
</script>




