<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= $title ?></title>

        <!-- Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">


		<title><?= $title ?></title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<?= asset::stylesheets(array('bootstrap.css','skin-blue.css','AdminLTE2.css' , 'dashboard_style.css','font-awesome.min.css','waitMe.css'), 'assets/cache/cached-css-dashboardv2') ?>
		<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
		<?= $ajax->csrf(); ?>
	</head>
	<body class="skin-blue sidebar-mini">
		<?= $body ?>
		<?= asset::javascripts(array('jquery-2.1.1.min.js','bootstrap.min.js','phery.js','dScript.js','app.min.js','waitMe.js'), 'assets/cache/cached-js-dashboardv2') ?>
		<script type='text/javascript'>
			$('#files').on({
			'change':function(){
				phery.remote('test', null,  {'el': $(this)});
			},
			'phery:progress': function(e, progress){
				if (progress.lengthComputable){
					$('progress').val((progress.loaded / progress.total) * 100);
					}
				}
			});
		</script>
	</body>
</html>
