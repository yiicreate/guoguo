<?php
/**
 * Created by IntelliJ IDEA.
 * User: LHC
 * Date: 2020/9/30
 * Time: 10:25
 */
return [
    'debug' =>env("APP_DEBUG",false),

    'comm' => [
        'user'=>'/static/user/',
        'export'=>'/static/export/',
    ],

    //权限
    'permissions'=>[
        'databus_user'=>1,//是否同步到设备
    ],

    //文件路径
    'upload' => [
        'import'=>'',
        'load'=>'',
    ]
];
