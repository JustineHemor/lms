<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            'Member' => [
                'View Dashboard',
                'Request Loan',
                'Cancel Loan',
                'Renew Loan',
                'View Personal Loan Table',
            ],
            'Secretary' => [
                'Request Member Loan',
                'Renew Member Loan',
                'View Loan Table',
                'View Member Loan History',
            ],
            'Credit Committee' => [
                'Reject Loan',
                'Approve Loan',
                'View Loan Table',
                'View Member Loan History',
            ],
            'Manager' => [
                'Create Member',
                'Update Member',
                'Accept Payment',
            ],
        ];


        foreach ($array as $role => $permissions) {
            $Role = Role::query()->firstOrCreate([
                'name' => $role
            ]);

            foreach ($permissions as $permission) {
                $Permission = Permission::query()->firstOrCreate(['name' => $permission]);

                if (!$Role->hasPermissionTo($permission)) {
                    $Role->givePermissionTo($Permission);
                }
            }
        }
    }
}
