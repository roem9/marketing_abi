        <div class="container">
            <div class="row">
                <?php if($type == "Materi Marketing"):?>
                    <div class="col-4"><a href="<?= base_url()?>marketing/materimarketing" class="btn btn-success"><i class="fa fa-home"></i> Home</a></div>
                <?php else :?>
                    <div class="col-4"><a href="<?= base_url()?>marketing/materiproduk" class="btn btn-success"><i class="fa fa-home"></i> Home</a></div>
                <?php endif;?>
            </div>
            <div class="row mt-3">
                <?php if($ebook):?>
                    <?php foreach ($ebook as $ebook) :?>
                        <div class="col-12 col-md-4 mb-3">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-info"><?= $ebook['judul']?></li>
                                <li class="list-group-item d-flex justify-content-start">
                                    <?= $ebook['deskripsi']?>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?= $ebook['ebook']?>" target="_blank"><img src="<?= base_url()?>assets/cover/<?= $ebook['cover']?>" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    <?php endforeach;?>
                <?php else:?>
                    <div class="col-12">
                        <div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning mr-1"></i>tidak ada ebook</div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<div class="overlay"></div>
