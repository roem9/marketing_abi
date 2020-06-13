        <div class="container">
            <div class="row">
                <?php if($materi):?>
                    <?php foreach ($materi as $materi) :?>
                        <div class="col-12 col-md-4 mb-3">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-info"><?= $materi['judul']?></li>
                                <li class="list-group-item d-flex justify-content-start">
                                    <?php if($title == 'Materi Marketing'):?>
                                        <a href="<?= base_url('marketing/videomaterimarketing/'.$materi['id_materi'])?>" class="btn btn-sm btn-danger mr-2"><i class="fa fa-video"></i> <span class="badge badge-info"><?= $materi['video']?></span></a>
                                        <a href="<?= base_url('marketing/ebookmaterimarketing/'.$materi['id_materi'])?>" class="btn btn-sm btn-success mr-2"><i class="fa fa-book"></i> <span class="badge badge-info"><?= $materi['buku']?></span></a>
                                    <?php else:?>
                                        <a href="<?= base_url('marketing/videomateriproduk/'.$materi['id_materi'])?>" class="btn btn-sm btn-danger mr-2"><i class="fa fa-video"></i> <span class="badge badge-info"><?= $materi['video']?></span></a>
                                        <a href="<?= base_url('marketing/ebookmateriproduk/'.$materi['id_materi'])?>" class="btn btn-sm btn-success mr-2"><i class="fa fa-book"></i> <span class="badge badge-info"><?= $materi['buku']?></span></a>
                                    <?php endif;?>
                                </li>
                            </ul>
                        </div>
                    <?php endforeach;?>
                <?php else:?>
                    <div class="col-12">
                        <div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning mr-1"></i>tidak ada materi</div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<div class="overlay"></div>