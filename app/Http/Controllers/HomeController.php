<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class HomeController extends Controller
{


   public function landingpage()
   {
      return view('landing');
   }

   public function homePage()
   {
      $members = Member::all();
      return view('home', compact('members'));
   }
}
