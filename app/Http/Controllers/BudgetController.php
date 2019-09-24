<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Priorities;
use App\Models\BudgetDet;
use App\Models\Budget;

use Illuminate\Http\Request;

class BudgetController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priority = Priorities::all();
        $categories = Categories::all();
        $ldate = mt_rand(15,30);

        // dd(auth()->user()->name);
        // dd($ldate);
        return view('Budget',compact('priority','categories','ldate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'item.*' => 'required|string',
            'item_description.*' => 'nullable|string',
           
            
        ]);
         
         
            $item = $request->item;
            $desc = $request->description;
            $priority = $request->priorities;
            $budgetid = $request->budget;
            $username = auth()->user()->name;
            $Amount = $request->Amount;
            $i=0;
            $tot = 0;

            foreach ($priority as $pr){
                $tot = $tot + $pr ;
            } 
            //  dd($item);
         try{
            foreach ($item as $it) {
                     $itemAmount = ($priority[$i]/$tot)*$Amount;
                             $BudgetDetails = [
                                 'budget_id' => $budgetid,
                                 'item' => $it,
                                 'itemAmount'=>$itemAmount,
                                 'item_description' => $desc[$i],
                                 'priority' => $priority[$i],
                             ];
                             BudgetDet::create($BudgetDetails);
                    $i++;
                }
        
         $BudgetInfo = [
            'budget_id' => $budgetid,
            'username' => $username,
            'Amount'=>$Amount,
        ];

         Budget::insert($BudgetInfo);

         return back()->with('success', "Budget Generated!");
        }
         catch(\Exception $e){
            // dd($e);
            $error_mssg =  $e->getMessage();    
            dd($error_mssg);    
            return back()->with('error', "Something went wrong... unable to setup budget plan");
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
