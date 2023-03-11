<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class PatientService
{
    public function store($form)
    {
        DB::beginTransaction();
        $user = $this->createAccount($form['first_name'], $form['email']);
        $user->patient()->create($form);


        DB::commit();
    }

    public function update($patient, $form)
    {
        DB::beginTransaction();
        $patient->update($form);
        $this->updateAccount($form['first_name'], $form['email'], $patient->user_id);
        DB::commit();
    }

    public function destroy($patient)
    {
        $patient->user()->delete();
        $patient->delete();
    }

    protected function createAccount($name, $email)
    {
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('Patient');
        return $user;
    }

    protected function updateAccount($name, $email, $userId)
    {
        User::findOrFail($userId)->update([
            'name' => $name,
            'email' => $email,
        ]);
    }


    


}
