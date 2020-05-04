<!-- modal detail -->
    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailTitle">Detail Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if($type == "Materi Marketing"):?>
                        <form action="<?= base_url()?>admin/edit_video_materi_marketing" method="post">
                    <?php else :?>
                        <form action="<?= base_url()?>admin/edit_video_materi_produk" method="post">
                    <?php endif;?>
                        <input type="hidden" name="id_video" id="id_video_edit">
                        <div class="form-group">
                            <label for="judul">Judul Video</label>
                            <input type="text" name="judul" id="judul_edit" class="form-control form-control-sm" value="Langkah 1 Login Facebook Ads">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi_edit" rows="5" class="form-control form-control-sm"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="video">Link Video</label>
                            <textarea name="video" id="video_edit" rows="5" class="form-control form-control-sm"></textarea>
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
                    <h5 class="modal-title" id="modalAddTitle">Tambah Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if($type == "Materi Marketing"):?>
                        <form action="<?= base_url()?>admin/add_video_materi_marketing" method="post">
                    <?php else :?>
                        <form action="<?= base_url()?>admin/add_video_materi_produk" method="post">
                    <?php endif;?>
                        <input type="hidden" name="id_materi" value="<?= $id_materi?>">
                        <div class="form-group">
                            <label for="judul">Judul Video</label>
                            <input type="text" name="judul" id="judul_edit" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi_edit" rows="5" class="form-control form-control-sm"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="video">Link Video</label>
                            <textarea name="video" id="video_edit" rows="5" class="form-control form-control-sm"></textarea>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <input type="submit" value="Tambah Video" class="btn btn-sm btn-primary" id="btnSubmitModalAdd">
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
                        <?php if($type == 'Materi Marketing'):?>
                            <li class="list-group-item list-group-item-info">Tambah Video Marketing</li>
                            <li class="list-group-item"><a href="#modalAdd" data-toggle="modal" class="btn btn-sm btn-outline-success btn-block">Tambah Video Marketing</a></li>
                        <?php else:?>
                            <li class="list-group-item list-group-item-info">Tambah Video Produk</li>
                            <li class="list-group-item"><a href="#modalAdd" data-toggle="modal" class="btn btn-sm btn-outline-success btn-block">Tambah Video Produk</a></li>
                        <?php endif;?>
                    </ul>
                </div>
                <?php foreach ($video as $video) :?>
                    <div class="col-12 col-md-4 mb-3">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-info"><?= $video['judul']?></li>
                            <li class="list-group-item d-flex justify-content-start">
                                <?= $video['deskripsi']?>
                            </li>
                            <li class="list-group-item">
                            <div class="embed-responsive embed-responsive-1by1">
                                <?= $video['video']?>
                            </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-start">
                                <?php if($type == 'Materi Marketing'):?>
                                    <a href="<?= base_url()?>admin/delete_video_materi_marketing_by_id/<?= $video['id_video']?>" onclick="return confirm('Yakin akan menghapus video ini?')" class="btn btn-sm btn-danger mr-2">hapus</a>
                                <?php else:?>
                                    <a href="<?= base_url()?>admin/delete_video_materi_produk_by_id/<?= $video['id_video']?>" onclick="return confirm('Yakin akan menghapus video ini?')" class="btn btn-sm btn-danger mr-2">hapus</a>
                                <?php endif;?>
                                <a href="#modalDetail" data-id="<?= $video['id_video']?>" data-toggle="modal" class="btn btn-sm btn-secondary mr-2 text-light btnDetail">detail</a>
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
        <?php if($type == "Materi Marketing"):?>
            let url = "<?= base_url()?>admin/get_video_materi_marketing_by_id";
        <?php else:?>
            let url = "<?= base_url()?>admin/get_video_materi_produk_by_id";
        <?php endif;?>

        $.ajax({
            url: url,
            data: {id: id},
            async: true,
            method: "POST",
            dataType: "json",
            success: function(data){
                $("#id_video_edit").val(data.id_video);
                $("#judul_edit").val(data.judul);
                $("#deskripsi_edit").val(data.deskripsi);
                $("#video_edit").val(data.video);
            }
        })
    })

    // confirm
        $("#btnSubmitModalAdd").click(function(){
            var c = confirm("Yakin akan menambahkan video materi?");
            return c;
        })
        
        $("#btnSubmitModalDetail").click(function(){
            var c = confirm("Yakin akan mengubah video materi?");
            return c;
        })
    // confirm
</script>