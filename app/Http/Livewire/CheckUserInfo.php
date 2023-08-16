<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class CheckUserInfo extends LiveNotify
{
    public $employeeId;

    public function check(){
        $this->validate([
            'employeeId'            => 'required|string|max:255',
        ]);

        $user = User::where('employee_id', $this->employeeId)->first();
        if (!$user){
           return $this->alert('error', 'Employee not found', 'Please try again');
        }

        $this->redirect(route('user-info', $this->employeeId));
    }
    public function render()
    {
        return view('livewire.check-user-info');
    }
}
