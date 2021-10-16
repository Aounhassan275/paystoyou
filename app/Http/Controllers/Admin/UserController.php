<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showDetail($id)
    {
      $user = User::find($id);
      return view('admin.user.detail',compact('user'));
    }
    public function delete($id){
      User::find($id)->delete();
      toastr()->success('User  is Deleted Successfully');
      return redirect()->route('admin.user.index');
  }
  public function activation($id)
  {
      $user = User::find($id);
      $user->update([
          'status' => 'active',
      ]);     
      toastr()->success('User is active Now');
      return redirect()->back();
  } 
  public function block($id)
  {
      $user = User::find($id);
      $user->update([
          'status' => 'block',
      ]);     
      toastr()->success('User is block Now');
      return redirect()->back();
  }
  public function update(Request $request)
  {
      $user = User::find($request->id);
      $user->update($request->all());
      toastr()->success('User is Updated Successfully');
      return redirect()->back();
  }
}
