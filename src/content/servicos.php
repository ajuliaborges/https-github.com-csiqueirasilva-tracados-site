<div id="servicos-content">

	<?php $servicos_content_raw = filter_input(INPUT_GET, 'content', FILTER_SANITIZE_SPECIAL_CHARS); ?>
	<?php $servicos_content = ($servicos_content_raw === 'divulgacao') ? 'divulgacao' : 'criacao'; ?>

	<div id="servicos-header">
		<div class="<?php if ($servicos_content === 'criacao'): ?>servicos-selected<?php endif; ?>"><a href="content.php?page=servicos&content=criacao">+criação</a></div>
		<div class="<?php if ($servicos_content === 'divulgacao'): ?>servicos-selected<?php endif; ?>"><a href="content.php?page=servicos&content=divulgacao">+divulgação</a></div>
	</div>

	<?php if ($servicos_content === 'criacao'): ?>

		<div id="servicos-content-l">

			<div class="servicos-li"></div>
			<div class="servicos-description-r">
				<div class="servicos-content-header">WEBDESIGN</div>
				<div>criação do layout</div>
				<div>programação do site</div>
			</div>
			<div class="servicos-div"></div>

			<div class="servicos-li"></div>
			<div class="servicos-description-r">
				<div class="servicos-content-header">IDENTIDADE VISUAL</div>
				<div>desenvolvimento da marca</div>
				<div>cartão de visitas, envelopes, papel timbrado e outros</div>
			</div>
			<div class="servicos-div"></div>

			<div class="servicos-li"></div>
			<div class="servicos-description-r">
				<div class="servicos-content-header">EDITORAÇÃO</div>
				<div>diagramação</div>
				<div>capa</div>
			</div>
			<div class="servicos-div"></div>

			<div class="servicos-li"></div>
			<div class="servicos-description-r">
				<div class="servicos-content-header">FOTOGRAFIA</div>
				<div>gastronomia</div>
				<div>produtos/still</div>
				<div>(mini estúdio portátil)</div>
			</div>	
			<div class="servicos-div"></div>

			<div class="servicos-li"></div>
			<div class="servicos-description-r">
				<div class="servicos-content-header">ILUSTRAÇÃO</div>
				<div>personagens/mascotes</div>
				<div>estampas</div>
			</div>
			<div class="servicos-div"></div>

		</div>

	<?php else: ?>

		<div id="servicos-content-divulgacao">
			<div class="servicos-li"></div>
			<div class="servicos-description-r">
				<div>Folders, flyers, cartazes, convites, posters e outras artes para divulgação</div>
			</div>
			<div class="servicos-div"></div>

			<div class="servicos-li"></div>
			<div class="servicos-description-r">
				<div>Serviços de administração de redes sociais, com produção e edição de conteúdo</div>
			</div>
			<div class="servicos-div"></div>
		</div>

	<?php endif; ?>


</div>