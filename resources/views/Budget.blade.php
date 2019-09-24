@extends('layouts.app')

@section('alerts')
    @include('layouts.alerts')
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
               
            </div>
            
           
            <div class="portlet-body">
                <form method="post" action="{{ url('/budget/store') }}" name="addBudgetList" id="addBudgetList">
                @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                            <a  href="/home" type="button" class="btn btn-primary" id=" "><i class="fa fa-plus"></i> Back</a>
                            </div>
                                <div class="col-md-4 text-center">
                                <label for="basic-url">Enter Budget Amount</label><input type="text" class="form-control" id="Amount" name="Amount" aria-describedby="basic-addon3">
                                </div>
                            <div class="col-md-4"></div>
                        </div>
                        <br>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                       
                                        <div class="card-header"><b> <label for="reference" class="control-label">Budget Title<span class="required">*</span>
                                        </label><input name="budget" id="budget" type="text" row="0" class="form-control" value='budget00.{{$ldate}}'></b></div>

                                        <div class="card-body">
                                                <label for="reference" class="control-label">Select Items<span class="required">*</span></label>
                                                <div class="col-md-12">
                                                        <div class="col-md-3">
                                                            <input type="checkbox" name="checkbox" id="checkbox" description="income tax" value="tax"> <b>Tax<b>
                                                        </div> <div class="col-md-3">
                                                            <input type="checkbox" name="checkbox" id="checkbox" value="Insurance"> <b>Insurance<b>
                                                        </div>
                                                       
                                                        <div class="col-md-3">
                                                            <input type="checkbox" name="checkbox" id="checkbox" value="Shopping"> <b>Shopping<b>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="checkbox" name="checkbox" id="checkbox"value="Health"> <b>Health<b>
                                                        </div>
                                                 </div>  
                                                <div class="col-md-12">
                                                        <div class="col-md-3">
                                                            <input type="checkbox" name="checkbox" id="checkbox" value="Investments"> <b>Investments<b>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="checkbox" name="checkbox" id="checkbox" value="Rent"> <b>Rent<b>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="checkbox" name="checkbox" id="checkbox" value="Baby"> <b>Baby<b>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="checkbox" name="checkbox" id="checkbox" value="pet" on> <b>pet<b>
                                                        </div>
                                                 </div>       
                                            <br>    
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="reference" class="control-label">Add Your Items<span class="required">*</span></label>
                                                    <div class="table-responsive">
                                                
                                                        <table class="table table-stripped table-bordered" id="invoice">
                                                            <thead>
                                                                <th>Item <span class="required">*</span></th>
                                                                <th>Description </th>
                                                                <th>Priority <span class="required">*</span></th>
                                                                <th>Action </th>
                                                            </thead>
                                                            <tbody>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>    
                                                </div> 
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-success" id="add-row"><i class="fa fa-plus"></i> Add
                                                        Item</button>
                                                </div>
                                            </div>       
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                        <br>
                        
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-10 text-right">
                                <a href="{{ url('/home') }}" class="btn btn-danger" ><i class="fa fa-close"></i> Cancel</a>
                                <button class="btn btn-primary" name="save" value="1"><i class="fa fa-save"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>   
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
     $(document).ready(function(){
            $("#add-row").click(function(){
                let rows = +($('table tbody tr.itemRows').length) + Math.floor(1000 + Math.random() * 9000);
                let markup ="<tr class='itemRows' row='"+ rows +"'><td><input name='item[]' id='item' type='text' row='"+rows+"' class='form-control' value='' required></td><td><input name='description[]' id='description' type='text' row='"+ rows +"' class='form-control' value='' ></td><td><div class='input-group'><select name='priorities[]' class='form-control' id='priority_id' row='"+rows+"' '>  @foreach($priority as $data)<option value='{{ $data->id }}' percentage='{{ $data->percent }}'>{{ $data->priority }}</option>@endforeach</select></td><td><button type='button' onclick=' return deleteRow(this)' class='btn btn-danger' style='width:100%;'><i class='fa fa-trash'></i>Delete Item</button></td></tr>";
                 $("table tbody").append(markup);
            });

            $('input[name=checkbox]').change(function(){
                if($(this).is(':checked')) {
                    let rows = +($('table tbody tr.itemRows').length) + Math.floor(1000 + Math.random() * 9000);
                    let v =$(this)[0].value;
                    console.log(v);
                    let markup ="<tr class='itemRows' row='"+ rows +"'><td><input name='item[]' id='item' type='text' row='"+rows+"' class='form-control' value='"+v+"' required></td><td><input name='description[]' id='description' type='text' row='"+ rows +"' class='form-control' value='' ></td><td><div class='input-group'><select name='priorities[]' class='form-control' id='priority_id' row='"+rows+"' '>  @foreach($priority as $data)<option value='{{ $data->id }}' percentage='{{ $data->percent }}'>{{ $data->priority }}</option>@endforeach</select></td><td><button type='button' onclick=' return deleteRow(this)' class='btn btn-danger' style='width:100%;'><i class='fa fa-trash'></i>Delete Item</button></td></tr>";
                    $("table tbody").append(markup);
                } else {
                   //
                }
                
            });

        });    

        function deleteRow(r) {
            let i = r.parentNode.parentNode.rowIndex;
            document.getElementById("invoice").deleteRow(i);
        }

        
</script>
@stop