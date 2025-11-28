<?php  
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class CustomerComposer
{
    public function compose(View $view)
    {
        $customerAuth = Auth::guard('customer')->user();
        $view->with('customerAuth', $customerAuth);
    }
}

