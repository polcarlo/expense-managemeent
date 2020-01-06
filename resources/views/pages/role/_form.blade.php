
@include('elements.form_error')
@include('elements.alert')
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                </span>
            <h3 class="m-portlet__head-text">
   
            </h3>
        </div>
    </div>
</div>

<div class="m-portlet__body">
    <div class="form-group m-form__group row">
        <label class="col-lg-2 col-form-label">Role Name</label>
        <div class="col-lg-6">
            {!! Form::text('name', null, ['class'=>'form-control m-input', 'required']) !!} 
        </div>  
    </div>
    <div class="form-group m-form__group row">
        <label class="col-lg-2 col-form-label">Guard Name</label>
        <div class="col-lg-6">
            {!! Form::text('guard_name', 'web', ['class'=>'form-control m-input', 'required']) !!} 
        </div>
        
    </div>
</div>
                                      