<?php namespace App\Repositories\Form;

use App\Repositories\Form\FormInputRepositoryInterface;
use App\Models\FormInput;

/**
* Class FormRepository
* @package App\Repositories\Form
*/
class FormInputRepository implements FormInputRepositoryInterface
{
    public function __construct(protected FormInput $input)
    {
        $this->input = $input;
    }
    
    public function types()
    {
        return config('form.types');
    }
    
    public function addInputToForm($data){
        $data['required'] = boolval($data['required']);
        return $this->input->create($data);
    }

    public function updateInput($id, array $data)
    {
        $data['required'] = boolval($data['required']);
        $input = $this->input->findOrFail($id);
        $input->update($data);
        return $input;
    }

    public function deleteInput($id)
    {
        $input = $this->input->findOrFail($id);

        $input->delete();
    }
}