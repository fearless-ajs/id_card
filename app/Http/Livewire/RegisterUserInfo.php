<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterUserInfo extends LiveNotify
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $role;
    public $employeeId;
    public $image;
    public $address;
//    public $password;
//    public $password_confirmation;

    protected array $rules = [
        'name'                  => 'required|string|max:255',
        'email'                 => 'required|email|max:255|unique:users,email',
        'phone'                 => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'role'                  => 'required|string|max:255',
        'employeeId'            => 'required|string|max:255|unique:users,employee_id',
        'image'                 => 'required|image|max:5000',
        'address'               => 'required|string|max:255',
//        'password'              => 'required|min:6',
//        'password_confirmation' => 'required_with:password|same:password',
    ];

    public function mount(){
        // generate employeeId
        $this->employeeId = $this->generateEmployeeId();
    }

    public function generateEmployeeId(): string
    {
        $randomNumber = random_int(1000, 9999);
        $employeeId = 'TVD'.$randomNumber;

        if (User::where('employee_id', $employeeId)->first()){
            return $this->generateEmployeeId();
        }

        return $employeeId;
    }

    public function updated($field){
        $this->validateOnly($field, $this->rules);
    }

    public function save(){
        $this->validate($this->rules);

        // save the image
        $user_image_name = $this->saveUserImage($this->image, 'users');

        User::create([
            'name'                  => $this->name,
            'email'                 => $this->email,
            'phone'                 => $this->phone,
            'role'                  => $this->role,
            'employee_id'           => $this->employeeId,
            'image'                 => $user_image_name,
            'address'               => $this->address,
//            'password'              => $this->password,
        ]);

        $this->reset();
        $this->employeeId = $this->generateEmployeeId();
        $this->alert('success', "Registration successful!");
    }

    public function render()
    {
        return view('livewire.register-user-info');
    }
}
