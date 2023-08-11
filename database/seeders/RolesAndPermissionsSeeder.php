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
                'Renew Loan',
                'View Personal Loan Table',
            ],
            'Secretary' => [
                'View Dashboard',
                'Request Loan',
                'Request Member Loan',
                'Renew Loan',
                'Renew Member Loan',
                'View Personal Loan Table',
                'View Loan Table',
                'View Member Loan History',
            ],
            'Credit Committee' => [
                'View Dashboard',
                'Request Loan',
                'Renew Loan',
                'Cancel Loan',
                'Reject Loan',
                'Approve Loan',
                'View Personal Loan Table',
                'View Loan Table',
                'View Member Loan History',
            ],
            'Manager' => [
                'View Dashboard',
                'Request Loan',
                'Request Member Loan',
                'Renew Loan',
                'Renew Member Loan',
                'Create Member',
                'Update Member',
                'Accept Payment',
                'View Personal Loan Table',
                'View Loan Table',
                'View Member Loan History',
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
