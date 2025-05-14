<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use EasyWeChat\OfficialAccount\Application;

class WechatController extends Controller
{
    protected $app;

    public function __construct()
    {
        $this->app = new Application([
            'app_id' => Config::get('wechat.app_id'),
            'secret' => Config::get('wechat.secret'),
            'token' => Config::get('wechat.token'),
            'aes_key' => Config::get('wechat.aes_key'),
        ]);
    }

    // 微信授权登录
    public function oauth(Request $request)
    {
        $oauth = $this->app->getOAuth();
        if (!$request->has('code')) {
            return $oauth->redirect(env('APP_URL').'/wechat/oauth');
        }
        $user = $oauth->userFromCode($request->get('code'));
        // 这里可以根据业务逻辑处理用户信息
        return response()->json(['user' => $user]);
    }

    // 获取JSSDK配置
    public function jssdk(Request $request)
    {
        $url = $request->input('url');
        $utils = $this->app->getUtils();
        $config = $utils->buildJsSdkConfig(
            url: $url, 
            jsApiList: [
                'onMenuShareTimeline',
                'onMenuShareAppMessage',
                'chooseImage',
                'uploadImage',
                'getLocation',
            ],
            openTagList: [], 
            debug: false, 
        );
        return response()->json(['config' => $config]);
    }
}