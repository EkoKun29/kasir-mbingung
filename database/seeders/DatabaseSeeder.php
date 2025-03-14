<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /*
        * Make Role 
        */

        $admin_role = Role::create(['name' => 'admin']);
        $qc_role    = Role::create(['name' => 'qc']);
        $op_role    = Role::create(['name' => 'operator']);
        $audit_role = Role::create(['name' => 'audit']);

        /*
        * Make User and assign to role
        */

        $admin = User::create([
            'name'      => 'Admin',
            'email'     => 'adminmbingung@gmail.com',
            'password'  => Hash::make('123456'),
            'id_role' => '1',
        ]);

        $qc = User::create([
            'name'      => 'QC',
            'email'     => 'qcmbingung@gmail.com',
            'password'  => Hash::make('123456'),
            'id_role' => '2',
        ]);

        $op = User::create([
            'name'      => 'Operator',
            'email'     => 'operatormbingung@gmail.com',
            'password'  => Hash::make('123456'),
            'id_role' => '2',
        ]);

        $audit = User::create([
            'name'      => 'Audit',
            'email'     => 'auditmbingung@gmail.com',
            'password'  => Hash::make('123456'),
            'id_role' => '3',
        ]);

        $admin->assignRole($admin_role);
        $qc->assignRole($qc_role);
        $op->assignRole($op_role);
        $audit->assignRole($audit_role);
    }
}
