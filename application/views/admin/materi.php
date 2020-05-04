<!-- modal detail -->
    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailTitle">Detail Materi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if($title == "Materi Marketing"):?>
                        <form action="<?= base_url()?>admin/edit_materi_marketing" method="post">
                    <?php else :?>
                        <form action="<?= base_url()?>admin/edit_materi_produk" method="post">
                    <?php endif;?>
                        <input type="hidden" name="id_materi" id="id_materi_edit">
                        <div class="form-group">
                            <label for="judul">Judul Materi</label>
                            <input type="text" name="judul" id="judul_edit" class="form-control form-control-sm">
                        </div>
                        <div class="d-flex justify-content-end">
                            <input type="submit" value="Edit Data" class="btn btn-sm btn-success" id="btnSubmitModalDetail">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- modal detail -->

<!-- modal add materi -->
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddTitle">Tambah Materi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if($title == "Materi Marketing"):?>
                        <form action="<?= base_url()?>admin/add_materi_marketing" method="post">
                    <?php else :?>
                        <form action="<?= base_url()?>admin/add_materi_produk" method="post">
                    <?php endif;?>
                        <div class="form-group">
                            <label for="judul">Judul Materi</label>
                            <input type="text" name="judul" id="judul" class="form-control form-control-sm">
                        </div>
                        <div class="d-flex justify-content-end">
                            <input type="submit" value="Tambah Materi" class="btn btn-sm btn-primary" id="btnSubmitModalAdd">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- modal add materi -->

        <div class="container">
            <?php if( $this->session->flashdata('pesan') ) : ?>
                <div class="row">
                    <div class="col-12">
                        <?=$this->session->flashdata('pesan')?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-12 col-md-4 mb-3">
                    <ul class="list-group">
                        <?php if($title == 'Materi Marketing'):?>
                            <li class="list-group-item list-group-item-info">Tambah Materi Marketing</li>
                            <li class="list-group-item"><a href="#modalAdd" data-toggle="modal" class="btn btn-sm btn-outline-success btn-block">Tambah Materi Marketing</a></li>
                        <?php else:?>
                            <li class="list-group-item list-group-item-info">Tambah Materi Produk</li>
                            <li class="list-group-item"><a href="#modalAdd" data-toggle="modal" class="btn btn-sm btn-outline-success btn-block">Tambah Materi Produk</a></li>
                        <?php endif;?>
                    </ul>
                </div>
                <?php foreach ($materi as $materi) :?>
                    <div class="col-12 col-md-4 mb-3">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-info"><?= $materi['judul']?></li>
                            <li class="list-group-item d-flex justify-content-start">
                                <?php if($title == 'Materi Marketing'):?>
                                    <a href="<?= base_url()?>admin/videomaterimarketing/<?= $materi['id_materi']?>" class="btn btn-sm btn-danger mr-2"><i class="fa fa-video"></i> <span class="badge badge-info"><?= $materi['video']?></span></a>
                                    <a href="<?= base_url()?>admin/ebookmaterimarketing/<?= $materi['id_materi']?>" class="btn btn-sm btn-success mr-2"><i class="fa fa-book"></i> <span class="badge badge-info"><?= $materi['ebook']?></span></a>
                                <?php else:?>
                                    <a href="<?= base_url()?>admin/videomateriproduk/<?= $materi['id_materi']?>" class="btn btn-sm btn-danger mr-2"><i class="fa fa-video"></i> <span class="badge badge-info"><?= $materi['video']?></span></a>
                                    <a href="<?= base_url()?>admin/ebookmateriproduk/<?= $materi['id_materi']?>" class="btn btn-sm btn-success mr-2"><i class="fa fa-book"></i> <span class="badge badge-info"><?= $materi['ebook']?></span></a>
                                <?php endif;?>
                                <a href="#modalDetail" data-toggle="modal" data-id="<?= $materi['id_materi']?>" class="btn btn-sm btn-secondary mr-2 text-light btnDetail">detail</a>
                            </li>
                        </ul>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>

<div class="overlay"></div>

<script>
    $(".btnDetail").click(function(){
        let id = $(this).data("id");
        <?php if($title == "Materi Marketing"):?>
            let url = "<?= base_url()?>admin/get_materi_marketing_by_id";
        <?php else:?>
            let url = "<?= base_url()?>admin/get_materi_produk_by_id";
        <?php endif;?>

        $.ajax({
            url: url,
            data: {id: id},
            async: true,
            method: "POST",
            dataType: "json",
            success: function(data){
                $("#judul_edit").val(data.judul);
                $("#id_materi_edit").val(data.id_materi);
            }
        })
    })

    $("#btnSubmitModalAdd").click(function(){
        var c = confirm("Yakin akan menambahkan materi?");
        return c;
    })

    $("#btnSubmitModalDetail").click(function(){
        var c = confirm("Yakin akan mengubah materi?");
        return c;
    })
</script>