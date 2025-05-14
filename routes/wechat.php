<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WechatController;

Route::get('wechat/oauth', [WechatController::class, 'oauth']);
Route::get('wechat/jssdk', [WechatController::class, 'jssdk']);