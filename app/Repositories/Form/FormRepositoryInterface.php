<?php namespace App\Repositories\Form;


interface FormRepositoryInterface
{
    public function getAllForms();

    public function getFormById($id);

    public function createForm(array $data);

    public function updateForm($id, array $data);

    public function deleteForm($id);
}