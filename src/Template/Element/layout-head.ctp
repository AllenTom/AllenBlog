<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin index Examples</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="stylesheet" href="/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/css/amazeui.datatables.min.css"/>
    <link rel="stylesheet" href="/css/app.css">

</head>

<body>

<div class="am-g tpl-g">

    <!-- 头部 -->
    <?= $this->element('header_nav'); ?>
    <!-- 风格切换 -->
    <div class="tpl-skiner">
        <div class="tpl-skiner-toggle am-icon-cog">
        </div>
        <div class="tpl-skiner-content">
            <div class="tpl-skiner-content-title">
                选择主题
            </div>
            <div class="tpl-skiner-content-bar">
                <span class="skiner-color skiner-white" data-color="theme-white"></span>
                <span class="skiner-color skiner-black" data-color="theme-black"></span>
            </div>
        </div>
    </div>
    <!-- 侧边导航栏 -->
    <?= $this->element('sidebar'); ?>


    <!-- 内容区域 -->
    <div class="tpl-content-wrapper" style="margin-top: 75px">

        <div class="container-fluid am-cf"
             style="background-color: white;margin-left: 16px;margin-right: 16px;margin-top: 20px">
