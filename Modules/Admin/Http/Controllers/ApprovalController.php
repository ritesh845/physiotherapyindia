<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ApprovalController extends Controller
{
    public function qualifications(){

        return view('admin::approval.qualification');
    }
    public function qualification_show($id){

        return $id;
    }
}
