
@if(isset($data))
<div class="row">

    <div class="col-lg-12 ml-5">
        {!! Form::model($data, ['route'=>[$prefix.'.update', $data->id], 'class'=>'form-horizontal', 'name'=>'frm-update', 'id'=>'frm-update']) !!}  
        
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
    <label class="col-lg-2 col-form-label">Entry Date</label>


    {{$data->entry_date}}
    <div class="col-sm-6">
        <div class="input-group date" data-provide="datepicker">
            <input type="text" class="form-control" name="entry_date" id="datepicker">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
    </div>
    <p>Note: cencya na sa datepicker nagmamadali kc. thanks</p>
</div>

    <div class="form-group m-form__group row">
        <label class="col-lg-2 col-form-label">Expense Category</label>
        <div class="col-lg-6">
        {!! Form::select('category', $category, null, array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group m-form__group row">
        <label class="col-lg-2 col-form-label">amount</label>
        <div class="col-lg-6">
            {!! Form::text('amount', null, ['class'=>'form-control m-input', 'required']) !!} 
        </div>  
    </div>
</div>
                                      
        
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
                <div class="row">
                    <div class="col-lg-2"></div>
                        <div class="col-lg-6">
                            <a class="btn btn-default" href="{{ route($prefix.'.index') }}">Cancel</a>
                            <button type="submit" onclick="doAction('post', 'frm-update', '{{$prefix}}-dt'); return false;" class="btn btn-success">Save </button>
                        </div>
                    </div>
                </div>
            </div>            
            <br>      
   
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endif
