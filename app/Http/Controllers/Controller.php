<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use Illuminate\Session\Store;
use Illuminate\Auth\SessionGuard;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Session\SessionManager;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;

use DB;
use Auth;

class Controller extends BaseController
{
	use AuthenticatesUsers;
	
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct(Request $request)
    {
        $this->middleware('web',['except' => 'logout']);
    }
	
    public function index(Request $request)
    {
		 $response = ['user_email' => 'wii@gmail.com','user_password' => 'wii'];
                        Auth::guard('web')->attempt($response); 
						dd( Auth::guard()->user());
        return view('welcome');
    }

    public function roles(Request $request)
    {
        return view('roles');
    }
	
	public function addrolesprocess(Request $request)
    {
		$result = Array();
		
		DB::table('roles')->insert([
			'display_name'	 =>  $request->display_name,
			'description'    =>  $request->description,
		]);
		
        return redirect()->back()->with('success',"Added Role Successfully!");
    }
	
	public function updaterolesprocess(Request $request)
    {
		$result = Array();
		
		DB::table('roles')->where('id',$request->id)->update([
			'display_name'	 =>  $request->display_name,
			'description'    =>  $request->description,
		]);
		
        return redirect()->back()->with('success',"Updated Role Successfully!");
    }
	
	public function deleterolesprocess(Request $request)
    {
		$result = Array();
		
		DB::table('roles')->where('id',$request->id)->delete();
		
        return redirect()->back()->with('success',"Deleted Role Successfully!");
    }
	
	public function users(Request $request)
    {
        return view('users');
    }
	
	public function addusersprocess(Request $request)
    {
		$result = Array();
		
		DB::table('users')->insert([
			'user_name'	 =>  $request->user_name,
			'user_email'	 =>  $request->user_email,
			'user_role'	 =>  $request->user_role,
		]);
		
        return redirect()->back()->with('success',"Added User Successfully!");
    }
	
	public function updateusersprocess(Request $request)
    {
		$result = Array();
		
		DB::table('users')->where('id',$request->id)->update([
			'user_name'	 =>  $request->user_name,
			'user_email' =>  $request->user_email,
			'user_role'	 =>  $request->user_role,
		]);
		
        return redirect()->back()->with('success',"Updated User Successfully!");
    }
	
	public function deleteusersprocess(Request $request)
    {
		$result = Array();
		
		DB::table('users')->where('id',$request->id)->delete();
		
        return redirect()->back()->with('success',"Deleted User Successfully!");
    }
	
	public function expense_cat(Request $request)
    {
        return view('expense_categories');
    }
	
	public function addexpense_catprocess(Request $request)
    {
		$result = Array();
		
		DB::table('expense_categories')->insert([
			'display_name'	 =>  $request->display_name,
			'description'    =>  $request->description,
		]);
		
        return redirect()->back()->with('success',"Added User Successfully!");
    }
	
	public function updateexpense_catprocess(Request $request)
    {
		$result = Array();
		
		DB::table('expense_categories')->where('id',$request->id)->update([
			'display_name'	 =>  $request->display_name,
			'description'    =>  $request->description,
		]);
		
        return redirect()->back()->with('success',"Updated User Successfully!");
    }
	
	public function deleteexpense_catprocess(Request $request)
    {
		$result = Array();
		
		DB::table('expense_categories')->where('id',$request->id)->delete();
		
        return redirect()->back()->with('success',"Deleted User Successfully!");
    }
	
	public function expenses(Request $request)
    {
        return view('expenses');
    }
	
	public function addexpensesprocess(Request $request)
    {
		$result = Array();
		
		DB::table('expenses')->insert([
			'expense_category'	 =>  $request->expense_category,
			'amount'    		 =>  $request->amount,
			'entry_date'    	 =>  $request->entry_date,
		]);
		
        return redirect()->back()->with('success',"Added User Successfully!");
    }
	
	public function updateexpensesprocess(Request $request)
    {
		$result = Array();
		
		DB::table('expenses')->where('id',$request->id)->update([
			'expense_category'	 =>  $request->expense_category,
			'amount'    	 	 =>  $request->amount,
			'entry_date'    	 =>  $request->entry_date,
		]);
		
        return redirect()->back()->with('success',"Updated User Successfully!");
    }
	
	public function deleteexpensesprocess(Request $request)
    {
		$result = Array();
		
		DB::table('expenses')->where('id',$request->id)->delete();
		
        return redirect()->back()->with('success',"Deleted User Successfully!");
    }
}
