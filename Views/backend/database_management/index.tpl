<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{link file="backend/_resources/css/bootstrap.min.css"}">
    <link rel="stylesheet" href="{link file="backend/_resources/css/bootstrap-theme-shopware.css"}">

    {block name="content/header_tags"}{/block}
</head>
<body role="document" style="padding-top: 80px">

<div class="container theme-showcase" role="main">
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="{$url}"></iframe>
    </div>
</div> <!-- /container -->

<script type="text/javascript" src="{link file="backend/base/frame/postmessage-api.js"}"></script>
<script type="text/javascript" src="{link file="backend/_resources/js/jquery-2.1.4.min.js"}"></script>
<script type="text/javascript" src="{link file="backend/_resources/js/bootstrap.min.js"}"></script>
{block name="content/javascript"}{/block}
</body>
</html>