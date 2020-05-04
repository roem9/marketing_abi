        <div class="container">
            <?php if( $this->session->flashdata('pesan') ) : ?>
                <div class="row">
                    <div class="col-12">
                        <?=$this->session->flashdata('pesan')?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row" id="list-marketing">
                <?php if($marketing):?>
                    <?php foreach ($marketing as $marketing) :?>
                        <div class="col-12 col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between">
                                    <?= $marketing['nama']?>
                                    <?php if($marketing['status'] == "aktif"):?>
                                        <span><a href="<?= base_url()?>admin/edit_status_user/<?=$marketing['id_marketing']?>/nonaktif"><i class="fa fa-toggle-on text-success"></i></a></span>
                                    <?php else :?>
                                        <span><a href="<?= base_url()?>admin/edit_status_user/<?=$marketing['id_marketing']?>/aktif"><i class="fa fa-toggle-off text-secondary"></i></a></span>
                                    <?php endif;?>
                                </li>
                            </ul>
                        </div>
                    <?php endforeach;?>
                <?php else:?>
                    <div class="col-12">
                        <div class="alert alert-info"><i class="fa fa-info-circle text-info"></i> List Marketing kosong</div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<div class="overlay"></div>