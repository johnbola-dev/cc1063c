<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule;
use Livewire\Component;

class StudentProfile extends Component
{

    #[Rule('required')]
    public $studentid;
    #[Rule('required')]
    public $lastname;
    #[Rule('required')]
    public $firstname;

    public $middlename;
    #[Rule('required')]
    public $sex;
    #[Rule('required')]
    public $program;

    public $updateStatus = false;
    public $updateID;

    public function insert()
    {
        $this->validate();

        DB::table('profiles')
            ->insert([
                'student_id' => $this->studentid,
                'lastname' => $this->lastname,
                'firstname' => $this->firstname,
                'middlename' => $this->middlename,
                'sex' => $this->sex,
                'program' => $this->program,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        $this->reset();
    }

    public function delete($id)
    {
        DB::table('profiles')
            ->delete($id);
    }

    public function update($id)
    {
        $this->updateStatus = true;
        $res = DB::table('profiles')
            ->find($id);
        $this->studentid = $res->student_id;
        $this->lastname = $res->lastname;
        $this->firstname = $res->firstname;
        $this->middlename = $res->middlename;
        $this->sex = $res->sex;
        $this->program = $res->program;
        $this->updateID = $res->id;
    }

    public function updateprofile()
    {
        DB::table('profiles')
            ->update([
                'student_id' => $this->studentid,
                'lastname' => $this->lastname,
                'firstname' => $this->firstname,
                'middlename' => $this->middlename,
                'sex' => $this->sex,
                'program' => $this->program
            ]);

        $this->reset();
    }
    public function render()
    {
        return view('livewire.student-profile')->with([
            'profiles' => DB::table('profiles')
                ->get()
        ]);
    }
}
