<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BasicAuthenticate
{

        // ➀
    public const AUTH_USER_NAME = 'hoge';
    public const AUTH_PASSWORD = 'P@ssword';
    public const LDAP_ADDRESS = "ldap://127.0.0.1:1389";
    private function auth_ldap($username,$password){
        
        LOG::info("LdapAuthExcute:".$username);
        $ldapserver = self::LDAP_ADDRESS;
        $ldapconn = ldap_connect($ldapserver);
        $ldapbind = false;
        if (!$ldapconn) {
            $error = ldap_error($ldapconn);
            Log::error("Failed to connect to LDAP server: " . $error);
            die("Failed to connect to LDAP server: " . $error);
        }
        //接続開始
        $ldap_cn = "cn=".$username; //cn
        $ldap_pass = $password; // パスワード
        try{
            
            $ldapbind = ldap_bind($ldapconn,$ldap_cn,$ldap_pass);

        }catch(\Exception  $e){
            
            LOG::info("casc");
            report($e);

            return false;
        }

//        $ldapbind = ldap_bind($ldapconn,$ldap_cn,$ldap_pass);
        return $ldapbind;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        $user_id = "user_id";
        $isLoggedin = $request->session()->has($user_id) && $request->session()->get($user_id) == $request->getUser();
        LOG::info($request->session()->all());
        // 認証
        if ( false && (!$isLoggedin && !$this->auth_ldap($request->getUser(),$request->getPassword()))) {
            // ➂
            abort(401, headers: [
                header('WWW-Authenticate: Basic realm="Enter username and password."'),
                header('Content-Type: text/plain; charset=utf-8')
            ]);
        }
        $request->session()->put($user_id, $request->getUser());
        return $next($request);
    }
}
