<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InitialAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->user('Minchin Cruz', 'minchin@mail.com', ['Manager'], '123qweasd');

        $this->user('Giovanni Leyva', 'giovanni@mail.com', ['Credit Committee'], '123qweasd');
        $this->user('Eren Yeager', 'eren@mail.com', ['Credit Committee'], '123qweasd');

        $this->user('Patrick Dastar', 'patrick@mail.com', ['Secretary'], '123qweasd');

        $this->user('Bob Dabilder', 'bob@mail.com', ['Member'], '123qweasd');
    }

    public function user(string $name, string $email, array $roles, ?string $password = null): User
    {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password ?? Str::random());
        $user->save();

        $user->assignRole($roles);

        return $user;
    }
}
