<script>
 
$(document).ready(function() {

    $("#detailTable").DataTable( {
        processing: true,
        
        ajax: "{{ route($prefix.'.dt')}}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'entry_date', name: 'entry_date'},
            {data: 'amount', name: 'amount'},
            {data: 'action_id', name: 'action'},
        ],
        columnDefs: [
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




