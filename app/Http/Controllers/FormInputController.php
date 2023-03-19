<?php

namespace App\Http\Controllers;

use App\Http\Resources\FormInputResource;
use App\Repositories\Form\FormInputRepository;
use Illuminate\Http\Request;

class FormInputController extends Controller
{
    function __construct(FormInputRepository $repo)
    {
        $this->repo = $repo;
    }
    
    public function types(){
        return $this->repo->types();
    }
    
    public function addInputToForm(Request $request){
        
        $validated_data = $request->validate([
            'form_id'               => 'required',
            'name'                  => 'required',
            'type'                  => 'required',
            'sort_order_number'    =>'required',
            'required'              => 'required'
        ]);
        
        $input = $this->repo->addInputToForm($validated_data);
        
        return new FormInputResource($input);
    }
    
    public function updateInput($id, Request $request){
        
        $validated_data = $request->validate([
            'name'                  => 'required',
            'type'                  => 'required',
            'sort_order_number'    =>'required',
            'required'              => 'required|boolean'
        ]);
        
        $input = $this->repo->updateInput($id, $validated_data);
        
        return new FormInputResource($input);
    }

    public function deleteInput($id){
        $this->repo->deleteInput($id);

        return response()->json(['message' =>'successfully Delete','code' => 200]);
    }
}
