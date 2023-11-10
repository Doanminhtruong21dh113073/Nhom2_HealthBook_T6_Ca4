<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Checklogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
           if (Auth::check()) {
                // Lấy thông tin người dùng hiện tại
                $user = Auth::user();

                // Kiểm tra xem người dùng có phải là "vendor" hoặc "admin" hay không
                if ($user->role == 'doctor' || $user->role == 'admin') {
                    // Nếu là doctor hoặc admin, tiếp tục xử lý request
                    return $next($request);
                }
            }

        // Nếu không có quyền, bạn có thể xử lý ở đây, ví dụ: redirect hoặc trả về lỗi
        return redirect()->route('auth.login')->with('error', 'Bạn không có quyền truy cập trang này.');
    }

}