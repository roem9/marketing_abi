<!-- modal detail -->
    <div class="modal fade" id="modalKonfirm" tabindex="-1" role="dialog" aria-labelledby="modalKonfirmTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKonfirmTitle">Detail Marketing</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control form-control-sm" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control form-control-sm" disabled>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No Handphone</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control form-control-sm" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tgl Lahir</label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control form-control-sm" readonly>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <textarea name="alamat" id="alamat" rows="5" class="form-control form-control-sm" readonly></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <form action="<?= base_url()?>admin/delete_user_by_id" class="mr-3" method="post">
                            <input type="hidden" name="id_marketing">
                            <input type="submit" value="Batalkan" class="btn btn-sm btn-danger" id="btnBatalkan">
                        </form>
                        <form action="<?= base_url()?>admin/konfirm_user" method="post">
                            <input type="hidden" name="id_marketing">
                            <input type="submit" value="Konfirmasi" class="btn btn-sm btn-primary" id="btnKonfirmasi">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- modal detail -->
        <div class="container">
            <?php if( $this->session->flashdata('pesan') ) : ?>
                <div class="row">
                    <div class="col-12">
                        <?=$this->session->flashdata('pesan')?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <?php if($marketing):?>
                    <?php foreach ($marketing as $marketing) :?>
                        <div class="col-12 col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between"><?= $marketing['nama']?> <span><a href="#modalKonfirm" data-id="<?= $marketing['id_marketing']?>" data-toggle="modal" class="modalKonfirm btn btn-sm btn-outline-success">konfirmasi</a></span></li>
                            </ul>
                        </div>
                    <?php endforeach;?>
                <?php else:?>
                    <div class="col-12">
                        <div class="alert alert-info"><i class="fa fa-info-circle text-info"></i> tidak ada yang akan dikonfirmasi</div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<div class="overlay"></div>

<script>
    $(".modalKonfirm").click(function(){
        let id = $(this).data("id");

        $.ajax({
            url: "<?= base_url()?>admin/get_marketing_by_id",
            dataType: "json",
            data: {id: id},
            method: "POST",
            async: true,
            success: function(data){
                $("input[name='id_marketing']").val(data.id_marketing);
                $("#nama").val(data.nama)
                $("#tgl_lahir").val(data.tgl_lahir)
                $("#jk").val(data.jk)
                $("#alamat").val(data.alamat)
                $("#no_hp").val(data.no_hp)
            }
        })
    })

    // confirm
        $("#btnBatalkan").click(function(){
            var c = confirm("Yakin akan membatalkan?");
            return c;
        })
        
        $("#btnKonfirmasi").click(function(){
            var c = confirm("Yakin akan mengkonfirmasi?");
            return c;
        })
    // confirm
</script>
