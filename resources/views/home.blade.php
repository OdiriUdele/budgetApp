@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You have {{$budgetCount}} Budget Plan(s)

                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a type="button" href="/budget" class="btn btn-primary" name="save" value="1"><i class="fa fa-save"></i> Create Budget</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container">  
    @foreach($budget as $b)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{$b->budget_id}}</div>

                        <div class="card-body">
                            <div class="card-header">Budget Total = {{$b->Amount}}</div>
                            <table class="table table-stripped table-bordered" id="invoice">
                                <thead>
                                    <th>Item <span class="required">*</span></th>
                                    <th>Budget (#) </th>
                                </thead>
                                <tbody>
                                    
                                    
                                    <tr class="itemRows" row="0">
                                        <td style="min-width:170px;">
                                            @foreach ($budgetDetails as $bdetails)
                                                @if ($bdetails->budget_id==$b->budget_id)
                                                    <input name="item[]" id="item" type="text" row="0"
                                                    class="form-control" value='{{$bdetails->item}}' disabled>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td style="min-width:110px;">
                                        @foreach ($budgetDetails as $bdetails)
                                            @if ($bdetails->budget_id==$b->budget_id)
                                                <input name="description[]" id="description" type="text" row="0"
                                                class="form-control" value='{{$bdetails->itemAmount}}' disabled>
                                            @endif
                                         @endforeach
                                        </td>
                                    </tr>    
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $budget->links() }}
    </div>
</div>    
@endsection
