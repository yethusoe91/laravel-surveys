<?php

namespace App\Http\Controllers;

use App\Events\FormSubmitted;
use App\Models\Form;
use App\Repositories\Form\FormRepository;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function forms(Request $request){
        
        $forms = (new FormRepository(new Form))->getAllForms($request)->get();
        
        return view('forms', compact('forms'));
    }
    
    public function showForm($id,Request $request){
        
        $form = (new FormRepository(new Form))->getFormById($id, $request);
        
        return view('form', compact('form'));
    }
    
    public function formSubmit(Request $request)
    {    
        // TODO:Save form submission
        $submitData = $request->all();
        
        event(new FormSubmitted($submitData));
        
        return redirect()->route('forms');

    }
}
