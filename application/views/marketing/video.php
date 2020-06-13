        <div class="container">
            <div class="row">
                <?php if($type == "Materi Marketing"):?>
                    <div class="col-4"><a href="<?= base_url()?>marketing/materimarketing" class="btn btn-success"><i class="fa fa-home"></i> Home</a></div>
                <?php else :?>
                    <div class="col-4"><a href="<?= base_url()?>marketing/materiproduk" class="btn btn-success"><i class="fa fa-home"></i> Home</a></div>
                <?php endif;?>
            </div>
            <div class="row mt-3">
                <?php if($video):?>
                    <?php foreach ($video as $video) :?>
                        <div class="col-12 col-md-4 mb-3">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-info"><?= $video['judul']?></li>
                                <li class="list-group-item">
                                    <div class="embed-responsive embed-responsive-1by1">
                                        <?= $video['video']?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-start">
                                    <?= $video['deskripsi']?>
                                </li>
                            </ul>
                        </div>
                    <?php endforeach;?>
                <?php else :?>
                    <div class="col-12">
                        <div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning mr-1"></i>tidak ada video</div>
                    </div>
                <?php endif;?>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="overlay"></div>
