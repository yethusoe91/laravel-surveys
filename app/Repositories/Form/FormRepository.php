<?php namespace App\Repositories\Form;

use App\Repositories\Form\FormRepositoryInterface;

use App\Models\Form;
use Illuminate\Http\Request;

/**
 * Class FormRepository
 * @package App\Repositories\Form
 */
class FormRepository implements FormRepositoryInterface
{
    protected $form;

    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    public function getAllForms()
    {
        return $this->form->with('inputs');
    }

    public function getFormById($id)
    {
        return $this->form->find($id);
    }

    public function createForm(array $data)
    {
        return $this->form->create($data);
    }

    public function updateForm($id, array $data)
    {
        $form = $this->form->findOrFail($id);
        $form->update($data);
        return $form;
    }

    public function deleteForm($id)
    {
        $form = $this->form->findOrFail($id);
        $form->delete();
    }
}