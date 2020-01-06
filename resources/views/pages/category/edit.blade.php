
@if(isset($data))
<div class="row">
    <div class="col-lg-12 ml-5">
        {!! Form::model($data, ['route'=>[$prefix.'.update', $data->id], 'class'=>'form-horizontal', 'name'=>'frm-update', 'id'=>'frm-update']) !!}  
        
        @include($view.'_form', ['form_title' => $page_edit])
        
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
            </div>            
            <br>      
   
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endif
