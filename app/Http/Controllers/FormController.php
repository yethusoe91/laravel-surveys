<?php

namespace App\Http\Controllers;

use App\Repositories\Form\FormRepository;
use Illuminate\Http\Request;
use App\Http\Requests\FormCreateEditRequest;
use App\Http\Resources\FormResource;

class FormController extends Controller
{
    public function __construct(protected FormRepository $repo ){
        $this->repo = $repo;
    }
    
    public function getAllForms(Request $request){
        $forms = $this->repo->getAllForms($request);
        
        return FormResource::collection($forms->paginate());
    } 
    
    public function createForm(FormCreateEditRequest $request){
        
        $form = $this->repo->createForm($request->validationData());
        
        return new FormResource($form);
    }
    
    public function updateForm($id, FormCreateEditRequest $request){
        
        $form = $this->repo->updateForm($id, $request->validationData());
        
        return new FormResource($form);
    }

    public function deleteForm($id){
        $this->repo->deleteForm($id);

        return response()->json(['message' =>'successfully Delete','code' => 200]);
    }
}
