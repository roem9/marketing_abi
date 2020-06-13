        <div class="container">
            <div class="row">
                <?php if($materi):?>
                    <?php foreach ($materi as $materi) :?>
                        <div class="col-12 col-md-4 mb-3">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-info"><?= $materi['judul']?></li>
                                <li class="list-group-item d-flex justify-content-start">
                                    <a href="#modalTelegram" data-toggle="modal" data-id="<?= $materi['id_materi']?>" class="btn btn-sm btn-info mr-2 modalTelegram">Telegram</a>
                                    <a href="#modalLanding" data-toggle="modal" data-id="<?= $materi['id_materi']?>" class="btn btn-sm btn-success mr-2 modalLanding">Landing Page</a>
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

<!-- modal telegram -->
    <div class="modal fade" id="modalTelegram" tabindex="-1" role="dialog" aria-labelledby="modalTelegramTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTelegramTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Link Telegram</label>
                        <textarea name="link" id="linkTelegram" class="form-control form-control-sm" readonly></textarea>
                    </div>
                    <a href="" id="link" class="btn btn-block btn-sm btn-primary">Kunjungi</a>
                </div>
            </div>
        </div>
    </div>
<!-- modal telegram -->

<!-- modal landing page -->
    <div class="modal fade" id="modalLanding" tabindex="-1" role="dialog" aria-labelledby="modalLandingTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLandingTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Link Landing Page</label>
                        <textarea name="link" id="linkLanding" class="form-control form-control-sm" readonly></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- modal landing page -->

<div class="overlay"></div>

<script>
    $(".modalTelegram").click(function(){
        let id = $(this).data("id");
        $.ajax({
            url: "<?= base_url()?>marketing/get_produk",
            data: {id: id},
            async: true,
            method: "POST",
            dataType: "json",
            success: function(data){
                $("#modalTelegramTitle").html(data.judul);
                $("#linkTelegram").val(data.telegram);
                $("#link").attr("href", data.telegram);
            }
        })
    })
    
    $(".modalLanding").click(function(){
        let id = $(this).data("id");
        $.ajax({
            url: "<?= base_url()?>marketing/get_produk",
            data: {id: id},
            async: true,
            method: "POST",
            dataType: "json",
            success: function(data){
                $("#modalLandingTitle").html(data.judul);
                $("#linkLanding").val(data.link + "/<?= $link?>");
            }
        })
    })
</script>