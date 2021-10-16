<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function payment($package)
    {
      return view('user.package.payment')->with('package',$package);
    }
}
