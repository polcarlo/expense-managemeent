<div class="col-md-8">
@include('elements.form_error')
@include('elements.alert')
</div>
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
        <label class="col-lg-2 col-form-label">Name</label>
        <div class="col-lg-6">
            {!! Form::text('name', null, ['class'=>'form-control m-input', 'required']) !!} 
        </div>  
    </div>
    <div class="form-group m-form__group row">
        <label class="col-lg-2 col-form-label">Email</label>
        <div class="col-lg-6">
            {!! Form::text('email', null, ['class'=>'form-control m-input', 'required']) !!} 
        </div>
        
    </div>
    <div class="form-group m-form__group row">
        <label class="col-lg-2 col-form-label">Role</label>
        <div class="col-lg-6">
        @if(! isset($show))
                        
                        @if(! isset($assign))

                            {!! Form::select('role', $role, null, array('class' => 'form-control')) !!}

                        @else

                            {!! Form::select('role', $role, $assign, array('class' => 'form-control')) !!}

                        @endif
                        
                    @else
                        <p></p>
                    @endif
        </div>
        
    </div>
    
    <div class="form-group m-form__group row">
        <label class="col-lg-2 col-form-label">Password</label>
        <div class="col-lg-6">
        {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        
    </div>
    <div class="form-group m-form__group row">
        <label class="col-lg-2 col-form-label">Confirm Password</label>
        <div class="col-lg-6">
        {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
        </div>
        
    </div>
</div>
                                      