<?php

namespace App\Http\Controllers\application\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Section;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{
    //
    public function sections(){
       // dd('gi');
         Session::put('page','sections');
         $sections = Section::get();
         return view('Admin-view.Sections.section')->with(compact('sections'));
         
    }
}
