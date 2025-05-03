<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Enums\PermissionsEnum;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Loop through all permissions in the PermissionsEnum
        foreach (PermissionsEnum::cases() as $permission) {
            // First, create the permission if it doesn't exist
            $permissionModel = Permission::firstOrCreate(['name' => $permission->value]);

            // Now, assign the permissions to the respective roles
            if (in_array($permission->value, [
                PermissionsEnum::ApproveVendors->value,
                PermissionsEnum::ApproveUsers->value,
                PermissionsEnum::BanUser->value,
                PermissionsEnum::DeleteUser->value,
                PermissionsEnum::DeleteVendor->value,
                PermissionsEnum::ApproveProducts->value,
                PermissionsEnum::DeleteProduct->value,
                PermissionsEnum::ViewReports->value
            ])) {
                // These are admin permissions
                $adminRole = Role::firstOrCreate(['name' => 'admin']);
                $adminRole->givePermissionTo($permissionModel);
            } elseif (in_array($permission->value, [
                PermissionsEnum::CreateProducts->value,
                PermissionsEnum::UpdateProducts->value,
                PermissionsEnum::DeleteOwnProduct->value,
                PermissionsEnum::ViewOwnProduct->value,
                PermissionsEnum::ViewOwnOrders->value,
                PermissionsEnum::RespondToReviews->value,
                PermissionsEnum::ManageStoreProfile->value,
                PermissionsEnum::SellProducts->value
            ])) {
                // These are vendor permissions
                $vendorRole = Role::firstOrCreate(['name' => 'vendor']);
                $vendorRole->givePermissionTo($permissionModel);
            } elseif (in_array($permission->value, [
                PermissionsEnum::BuyProducts->value,
                PermissionsEnum::BrowseProducts->value,
                PermissionsEnum::AddToCart->value,
                PermissionsEnum::ViewCart->value,
                PermissionsEnum::PlaceOrder->value,
                PermissionsEnum::WriteReviews->value,
                PermissionsEnum::UpdateProfile->value
            ])) {
                // These are user permissions
                $userRole = Role::firstOrCreate(['name' => 'user']);
                $userRole->givePermissionTo($permissionModel);
            }
        }
    }
}
