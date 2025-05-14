<?php
return [
    'app_id' => env('WECHAT_APP_ID', 'wx755bef2b03395095'),
    'secret' => env('WECHAT_SECRET', '9ee977e8fddc154d6b1fc5652d615e7c'),
    'token' => env('WECHAT_TOKEN', ''),
    'aes_key' => env('WECHAT_AES_KEY', ''),
    'mch_id' => env('WECHAT_MCH_ID', ''),
    'mch_key' => env('WECHAT_MCH_KEY', ''),
    'notify_url' => env('WECHAT_NOTIFY_URL', ''),
    'log' => [
        'level' => env('WECHAT_LOG_LEVEL', 'debug'),
        'file' => storage_path('logs/wechat.log'),
    ],
];