<?php $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS); ?>
<html>
	<head>
		<script src="lib/jquery/jquery.min.js"></script>
		<script src="lib/nanoscroller/jquery.nanoscroller.min.js"></script>

		<link href="lib/nanoscroller/jquery.nanoscroller.css" rel="stylesheet" />
		<link href="style.css" rel="stylesheet" />
	</head>
	<body>
		<div id="content-wrapper">
			<div id="top-wrapper">
				<a href="content.php?page=menu"><img alt="Pagina inicial" id="app-header-img" src="imgs/T.png" /></a>
			</div>
			<?php include('page-left.php'); ?>
			<?php if ($page === 'menu'): ?>
				<?php include('menu.php'); ?>
			<?php elseif ($page === 'sobre' || $page === 'galeria' || $page === 'servicos' || $page === 'contato'): ?>
				<div id="content-box-wrapper">
					<?php if ($page === 'servicos' || $page === 'contato'): ?>
						<?php include('page-right.php'); ?>
					<?php endif; ?>
					<div id="content-box-header" class="<?php echo $header_class; ?>">
						<?php echo $page === 'servicos' ? 'servi&ccedil;os' : $page; ?>
					</div>
					<div id="content-box" class="nano">
						<div class="nano-content">
							<?php if ($page === 'sobre'): ?>
								<?php include('content/sobre.php'); ?>
							<?php elseif ($page === 'servicos'): ?>
								<?php include('page-right.php'); ?>
								<?php include('content/servicos.php'); ?>
							<?php elseif ($page === 'galeria'): ?>
								<?php include('content/galeria.php'); ?>
							<?php else: /* contato */ ?>
								<?php include('page-right.php'); ?>
								<?php include('content/contato.php'); ?>
							<?php endif; ?>
						</div>
					</div>
			<?php endif; ?>
				<div id="footer-wrapper">
					<?php if ($page !== 'menu'): ?>
						<div class="<?php echo $back_class; ?> content-back-arrow">
							<a href="content.php?page=menu"><img src="<?php echo $back_image; ?>" class="back-arrow" /></a>
						</div>
					<?php endif; ?>
					<a href="http://www.facebook.com/"><img alt="facebook" class="social-icon <?php echo $facebook_src; ?>" /></a>
					<a href="http://www.pinterest.com/"><img alt="pinterest" class="social-icon <?php echo $pinterest_src; ?>" /></a>
					<a href="http://www.instagram.com/"><img alt="instagram" class="social-icon <?php echo $instagram_src; ?>" /></a>
				</div>
				<?php if ($page !== 'menu'): ?>
				</div>
				<script>
					$(document).ready(function () {
						$(".nano").nanoScroller();
					});
				</script>
			<?php endif; ?>
		</div>
	</body>
</html>