<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Priorities;
use App\Models\BudgetDet;
use App\Models\Budget;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $budget = Budget::where(['username'=>auth()->user()->name])->paginate(1);
            // dd($budget);
         $budgetCount = Budget::where(['username'=>auth()->user()->name])->count();
        //  dd($budgetCount);
        $budgetDetails = BudgetDet::all();
        // dd($budgetDetails);
        return view('home',compact('budgetDetails','budgetCount','budget'));
    }
}
