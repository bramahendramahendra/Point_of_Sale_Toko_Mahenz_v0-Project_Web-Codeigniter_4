<div class="error-page">
    <h2 class="headline text-warning"> 400</h2>

    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i><?=$header?></h3>

       <?=$body?>

        <div class="input-group">
            <a href="<?= $button['link'] ?>" class="btn btn-tool btn-outline-primary btn-sm"><?=$button['text']?></a>
        </div>
    </div>
    <!-- /.error-content -->
</div>