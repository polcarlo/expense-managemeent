function btnAction(btn, url, dtId, Title)
{
    if(btn == 'edit') {
        _btn = '<a href="#" onclick="loadDetail(\''+url+'\', \'Update\'); return false;" class="text-warning"><small><ins><i class="fa fa-pencil"></i> Edit</ins></small></a>';
        
    }
    if(btn == 'delete') {
        _btn = '<a href="#" class="btn btn-danger btn-link btn-icon btn-sm remove" onclick="deleteData(\''+url+'\', \''+dtId+'\'); return false;"><i class="fa fa-times"></i></a>';
    }

    return _btn;
}


function loadDetail(url, _title) {
    $('#modal-container .modal-title').text(_title);
    $('#modal-container .modal-body').load(url, function(){
        $('#modal-container').modal({show:true});

       
    });
}


function doAction(method, formId, reloadDataTable, requestValidation, redirectUrl)
{
    var form_id = $('#'+formId),
        form_url = form_id.attr('action');
    
    if (typeof requestValidation === 'function') {
        if (requestValidation() !== true) return false;
    }        

    /* form_id.children('.ibox-content')
           .addClass('sk-loading'); */           
    
    $.ajax({
      method: method,
      url: form_url,
      data: form_id.serialize()
    })
    .fail(function(data) {
        
        switch(data.status) {            
            case 422:            
                errorMessage = JSON.parse(data.responseText);
                ul = '<ul>';
                for (var msg in errorMessage['errors']) {
                    ul += '<li>'+errorMessage['errors'][msg]+'</li>';
                }
                ul += '</ul>';
                makeAlert('danger', 'Required Fields : <br>' + ul);                
                break;
            
            case 433:
                makeAlert('danger', data.responseText);
                break;
                
            default:
                makeAlert('danger', 'Error ('+data.status+'): ' + data.statusText);
        }
        
        $('#modal-container').animate({ scrollTop: 0 }, "fast");
    })
    .done(function(data) {
    
        var table = $("#detailTable").DataTable();
        table.ajax.reload();


        $("#transactionBtn").attr("disabled", true);
        
        $('#close-modal').trigger('click');           
        
        setTimeout(function() {
            makeAlert('success', data);
        }, 500);        
    });    
    
    /* $(document).ajaxComplete(function() {
        setTimeout(function() {
            form_id.children('.ibox-content')
                   .removeClass('sk-loading');
        }, 500);               
    }); */    
    
    return false;
}


function makeAlert(type, message)
{
    alertContent = '<div class="alert alert-'+type+' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>\
                            '+message+'\
                    </div>';
    $('.alert-message').html(alertContent);
}


function deleteData(url, tableId, message)
{
    _message = message ? message : "Once deleted, you will not be able to recover this record!";
    
    swal({
      title: "Are you sure?",
      text: _message,
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {        
        $.post(url, function(data) {
            console.log(data);
            swal(data, {
              icon: 'success'
            });
            
            var table = $("#detailTable").DataTable();
        table.ajax.reload();         
        });
      } else {
        //swal("Your imaginary file is safe!");
      }
    });    
}