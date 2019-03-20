<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Dutaf | Installation</title>

		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	</head>
	<body>
	<!--START-- | Content |-->
	<div class="container">
		<div class="row d-flex justify-content-around my-3">
			<div class="col-lg-8 col-md-8 col-sm-12">
				<div class="card">
					<div class="card-header">
						Bienvenue
					</div>
					<div class="card-body">
						<blockquote class="blockquote mb-0">
							<p>Nous allons débuter l'installation de votre site Dutaf.</p>
							<footer class="blockquote-footer">L'équipe OliFiches</footer>
						</blockquote>
					</div>
				</div>
			</div>
		</div>
		<div class="row d-flex justify-content-around my-5 ">
			<div class="col-lg-8 col-md-8 col-sm-12">
				<div class="alert alert-warning" role="alert">
					<h4 class="alert-heading">Étapes</h4>
					<p>1. Extrayez les fichiers dans un dossier <a href="#" class="alert-link">dutaf</a> à la racine de votre <a href="#" class="alert-link">public_html</a>. Ce qui donne : <a href="#" class="alert-link">/home/etudiants/mmi17o17/public_html/dutaf</a>.</p>
					<p>2. Mettez les droits <a href="#" class="alert-link">777</a> au dossier <a href="#" class="alert-link">dutaf</a> ainsi qu'aux sous-dossiers / fichiers.</p>
					<p>3. Complétez le <a href="#" class="alert-link">formulaire</a> suivant, si vous avez besoin d'indication sur comment le remplir, <a href="#" class="alert-link">survolez</a> le texte au dessus du champs.</p>
					<hr>
					<p class="mb-0">Bonne chance ! :)</p>
				</div>
			</div>
		</div>
		<div class="row d-flex justify-content-around my-5">
			<div class="col-lg-8 col-md-8 col-sm-12">
				<form action="index.php" method="post">
					<div class="form-group">
						<label for="DB_USER" data-toggle="tooltip" data-placement="right" title="Inscrivez ici votre identifiant MMI qui sert à vous connecter au FTP et à votre base de donnée.">Identifiant (MMI)</label>
						<input type="text" class="form-control" id="DB_HOST" placeholder="mmi17o17" name="db_user">
					</div>
					<div class="form-group">
						<label for="DB_PASS" data-toggle="tooltip" data-placement="right" title="Inscrivez ici votre mot de passe MMI (4 caractères) qui sert à vous connecter au FTP et à votre base de donnée.">Mot de Passe (MMI)</label>
						<input type="password" class="form-control" id="DB_HOST" placeholder="****" name="db_pass">
					</div>
					<div class="form-group">
						<label for="HT_USER" data-toggle="tooltip" data-placement="right" title="Inscrivez ici l'identifiant que vous souhaitez utiliser pour accéder à la partie 'Privée' du site Dutaf.">Identifiant (.htaccess)</label>
						<input type="text" class="form-control" id="HT_USER" placeholder="lebgdu10" name="ht_user">
					</div>
					<div class="form-group">
						<label for="HT_PASS" data-toggle="tooltip" data-placement="right" title="Inscrivez ici le mot de passe que vous souhaitez utiliser pour accéder à la partie 'Privée' du site Dutaf.">Mot de Passe (.htaccess)</label>
						<input type="password" class="form-control" id="HT_PASS" placeholder="******" name="ht_pass">
					</div>
					<button class="btn btn-primary btn-block">Générer mon Dutaf</button>
				</form>
			</div>
		</div>
		<div class="row d-flex justify-content-around">
			<div class="col-12 text-center">
				<h2>N'hésite pas à recommander mes compétences sur <a href="https://www.linkedin.com/in/olivier-wysocinski/">linked<i class="fab fa-linkedin"></i></a> ! ;)</h2>
			</div>
		</div>
	</div>
	<!--END-- | Content | -->
	<?php /*
		if (isset($_POST['db_user'])) {
			// DEFINE VAR
			$db_user = $_POST['db_user'];
			$db_name = 'base'.$db_user;
			$db_pass = $_POST['db_pass'];
			$ht_user = $_POST['ht_user'];
			$ht_pass = crypt($_POST['ht_pass']);
			$htp_root = 'AuthUserFile /home/etudiants/'.$db_user.'/public_html/dutaf/admin/htpasswd';

			// HTACCESS 
			
			$yop = $htp_root."\r\n".'AuthGroupFile /dev/null
AuthName "Acces securise Dutaf"
AuthType Basic
<LIMIT GET POST>
Require valid-user
</LIMIT>';
			file_put_contents(__DIR__.'/admin/.htaccess', $yop);
			$htp = 'sgbdr:$apr1$ra/iTYt.$vhTxsDexBSCv7NN2h8ABO.'."\r\n".$ht_user.':'.$ht_pass;
			file_put_contents(__DIR__.'/admin/htpasswd', $htp);

			// DB ACCESS

			$li = '<?php
	define(\'DB_HOST\', \'localhost\');
	define(\'DB_NAME\', \'base'.$db_user.'\');
	define(\'DB_USER\', \''.$db_user.'\');
	define(\'DB_PASS\', \''.$db_pass.'\');

	$db = new PDO(\'mysql:host=\' . DB_HOST . \';dbname=\' . DB_NAME, DB_USER, DB_PASS);
?>';
			file_put_contents(__DIR__.'/inc/db_ac.php', $li);

			// DB UPLOAD

			$bdd = new PDO('mysql:host=localhost;dbname=base' . $db_user, $db_user, $db_pass);
			$da = file_get_contents(__DIR__.'/sql/dutaf_articles.sql');
			$df = file_get_contents(__DIR__.'/sql/dutaf_fournisseurs.sql');
			$daq = $bdd->exec($da);
			$dfq = $bdd->exec($df);

			// FINAL STEP
			
			unlink(__DIR__.'/sql/dutaf_articles.sql');
			unlink(__DIR__.'/sql/dutaf_fournisseurs.sql');
			rmdir('sql');
			rename('f.index.html', 'index.html');
			unlink('index.php');
			header('Location: index.html');

		}*/
	?>

	<!--START-- | Script Sources | -->
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>
	<!--END-- | Script Sources | -->
	</body>
</html>