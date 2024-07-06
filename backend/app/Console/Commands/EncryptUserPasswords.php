<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EncryptUserPasswords extends Command
{
    protected $signature = 'encrypt:user-passwords';
    protected $description = 'Encrypt existing user passwords';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            if (!Hash::needsRehash($user->senha)) {
                $user->senha = Hash::make($user->senha);
                $user->save();
            }
        }

        $this->info('User passwords encrypted successfully!');
    }
}
