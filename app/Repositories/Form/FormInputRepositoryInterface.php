<?php namespace App\Repositories\Form;


interface FormInputRepositoryInterface
{
    public function types();

    public function addInputToForm(array $data);

    public function deleteInput(string $id);
}