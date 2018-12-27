<?php
/**
 * 作者: 距离
 * 日期: 2018/12/25
 * 时间: 17:27
 */

namespace Wechat\Middleware;


use Closure;
use Encore\Admin\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;

class WechatAuthMiddleware extends Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->guest() && !$this->shouldPassThrough($request)) {
            return redirect()->guest(admin_base_path('auth/login'));
        }

        return $next($request);
    }

    /**
     * Determine if the request has a URI that should pass through verification.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    protected function shouldPassThrough($request)
    {
        $excepts = [
            admin_base_path('auth/login'),
            admin_base_path('auth/logout'),
            admin_base_path('wechat/notify'),
        ];

        foreach ($excepts as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }

            if ($request->is($except)) {
                return true;
            }
        }

        return false;
    }
}