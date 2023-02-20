<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function store($form)
    {
        $user = User::create([
            'name' => $form['name'],
            'email' => $form['email'],
            'password' => bcrypt($form['password']),
        ]);
        $user->assignRole($form['role']);
    }

    public function update($form,$user)
    {
        $user->update([
            'name' => $form['name'],
            'email' => $form['email'],
        ]);
        $user->syncRoles($form['role']);
    }
}
