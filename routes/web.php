<?php

use Wechat\Http\Controllers\WechatController;

Route::any('wechat', WechatController::class.'@index');
Route::get('wechat/notify', \Wechat\Http\Controllers\NotifyController::class . '@handler')->name('notify_handle');
