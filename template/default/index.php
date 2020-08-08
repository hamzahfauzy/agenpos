<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $this->title ?></title>
    <link href="<?= asset('css/bootstrap.min.css') ?>" type="text/css" rel="stylesheet"/>
    <link href="<?= asset('css/font-awesome.min.css') ?>" type="text/css" rel="stylesheet"/>
    <link href="<?= asset('css/footer.css') ?>" type="text/css" rel="stylesheet"/>
    <?php foreach($this->css as $css): ?>
    <link href="<?= $css ?>" type="text/css" rel="stylesheet"/>
    <?php endforeach; ?>
    <style type="text/css">
    	html, body {
    		height: 100%;
    	}
        .bg {
            background:url(<?=asset('assets/agen.png')?>);
            background-size: 90px 20px;
            width: 100%;
            top: 0;
            left: 0;
            height:100%; 
            opacity: 0.2;
            position: fixed;
            padding: 0;
            margin: 0;
            z-index:0;
        }
    	.other-item {
    		display: none;
    	}
    	.other-item.active {
    		display: block;
    	}
        .btn.btn-primary {
            background-color: #d35400;
            border:#d35400;
        }
    </style>
</head>
<body>
<div class="bg"></div>
<?php require("layouts/header.php"); ?>
<?= $content; ?>
<?php if(session()->get('id')): ?>
<?php require("layouts/footer.php"); ?>
<?php endif ?>
<script src="<?= asset('js/jquery.min.js') ?>"></script>
<script src="<?= asset('js/bootstrap.min.js') ?>"></script>
<?php foreach($this->js as $js): ?>
<script src="<?= $js ?>"></script>
<?php endforeach; ?>
<script type="text/javascript">
function toggleActive(el)
{
	$(".other-item").removeClass("active")
	$("."+el).addClass("active")
}
// document.addEventListener("DOMContentLoaded", function(event) {
//     alert("For a good navigation, please put the page in full screen with the button 'change view'");
// });
</script>
</body>
</html>