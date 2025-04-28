<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Enums\RolesEnum;
use App\Enums\PermissionsEnum;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles
        $adminRole = Role::firstOrCreate(['name' => RolesEnum::Admin->value]);
        $vendorRole = Role::firstOrCreate(['name' => RolesEnum::Vendor->value]);
        $userRole = Role::firstOrCreate(['name' => RolesEnum::User->value]);

        // Create permissions
        foreach (PermissionsEnum::cases() as $permissionEnum) {
            Permission::firstOrCreate(['name' => $permissionEnum->value]);
        }

        // Assign permissions to roles
        $adminRole->syncPermissions([
            PermissionsEnum::ApproveVendors->value,
            PermissionsEnum::ApproveUsers->value,
            PermissionsEnum::BanUser->value,
            PermissionsEnum::DeleteUser->value,
            PermissionsEnum::DeleteVendor->value,
            PermissionsEnum::ApproveProducts->value,
            PermissionsEnum::DeleteProduct->value,
            PermissionsEnum::ViewReports->value,
        ]);

        $vendorRole->syncPermissions([
            PermissionsEnum::CreateProducts->value,
            PermissionsEnum::UpdateProducts->value,
            PermissionsEnum::DeleteOwnProduct->value,
            PermissionsEnum::ViewOwnProduct->value,
            PermissionsEnum::ViewOwnOrders->value,
            PermissionsEnum::RespondToReviews->value,
            PermissionsEnum::ManageStoreProfile->value,
            PermissionsEnum::SellProducts->value,
        ]);

        $userRole->syncPermissions([
            PermissionsEnum::BuyProducts->value,
            PermissionsEnum::BrowseProducts->value,
            PermissionsEnum::AddToCart->value,
            PermissionsEnum::ViewCart->value,
            PermissionsEnum::PlaceOrder->value,
            PermissionsEnum::WriteReviews->value,
            PermissionsEnum::UpdateProfile->value,
        ]);
    }
}

