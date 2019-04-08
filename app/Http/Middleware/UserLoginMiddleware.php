<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;
class UserLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('customer')->check()  &&  Session('cart')!= null )
        {   
            return $next($request);
        }
        else
        {
            if(!Auth::guard('customer')->check())
               { alert('Vui lòng đăng nhập để thực hiện thanh toán');
                return redirect('dangnhap');}
            else
                alert('Vui lòng thêm sản phẩm vào giỏ hàng trước !!!');
            return redirect('cart');
        }        
    }
}
