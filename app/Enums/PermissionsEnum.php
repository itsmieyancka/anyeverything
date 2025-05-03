<?php

namespace App\Enums;

enum PermissionsEnum: string
{
    //admin-specific
    case ApproveVendors = 'ApproveVendors';
    case ApproveUsers = 'ApproveUsers';
    case BanUser = 'BanUser';
    case DeleteUser = 'DeleteUser';
    case DeleteVendor = 'DeleteVendor';
    case ApproveProducts = 'ApproveProducts';
    case DeleteProduct = 'DeleteProduct';
    case ViewReports = 'ViewReports';

    //vendor-specific
    case CreateProducts = 'CreateProducts';
    case UpdateProducts = 'UpdateProducts';
    case DeleteOwnProduct = 'DeleteOwnProduct';
    case ViewOwnProduct = 'ViewOwnProduct';
    case ViewOwnOrders = 'ViewOwnOrders';
    case RespondToReviews = 'RespondToReviews';
    case ManageStoreProfile = 'ManageStoreProfile';
    case SellProducts = 'SellProducts';

    //user-specific
    case BuyProducts = 'BuyProducts';
    case BrowseProducts = 'BrowseProducts';
    case AddToCart = 'AddToCart';
    case ViewCart = 'ViewCart';
    case PlaceOrder = 'PlaceOrder';
    case WriteReviews = 'WriteReviews';
    case UpdateProfile = 'UpdateProfile';
}
