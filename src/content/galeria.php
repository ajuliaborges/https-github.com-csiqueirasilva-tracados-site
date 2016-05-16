<?php
$path = 'galeria';
$files = scandir($path);
$prefix = filter_input(INPUT_GET, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
if ($prefix !== 'outros' && $prefix !== 'criacao' && $prefix !== 'fotos') {
    $prefix = 'criacao';
}
?>

<div id="galeria-header">
    <div class="<?php if ($prefix === 'criacao'): ?>galeria-selected<?php endif; ?>"><a href="content.php?page=galeria&content=criacao">+criação</a></div>
    <div class="<?php if ($prefix === 'fotos'): ?>galeria-selected<?php endif; ?>"><a href="content.php?page=galeria&content=fotos">+fotos</a></div>
    <div class="<?php if ($prefix === 'outros'): ?>galeria-selected<?php endif; ?>"><a href="content.php?page=galeria&content=outros">+outros</a></div>    
</div>

<div id="galeria-content">

    <ul id="galeria-imagens" style="display: none;">
        <?php for ($i = 0; $i < count($files); $i++): ?>
            <?php if (preg_match("/" . $prefix . ".+\.png/i", $files[$i])): ?>
                <li data-src="galeria/<?php echo $files[$i]; ?>" data-thumb="galeria/thumbnails/<?php echo $files[$i]; ?>">
                    <img src="galeria/<?php echo $files[$i]; ?>" />
                </li>
            <?php endif; ?>
        <?php endfor; ?>
    </ul>

</div>

<script>
    $(document).ready(function () {
        $('#galeria-imagens').lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            slideMargin: 0,
            thumbItem: 9,
            enableDrag: false,
            currentPagerPosition: 'middle',
            onSliderLoad: function (el) {
                el.lightGallery({
                    selector: '#galeria-imagens .lslide'
                });
            }
        }).show();
    });
</script>