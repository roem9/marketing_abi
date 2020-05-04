<!-- modal detail -->
    <div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="modalEditUserTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditUserTitle">Detail Materi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url()?>marketing/edit_marketing_by_id" method="post">
                        <input type="hidden" name="id_marketing" id="id_marketing_edit">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama_edit" class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select name="jk" id="jk_edit" class="form-control form-control-sm" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No Handphone</label>
                            <input type="text" name="no_hp" id="no_hp_edit" class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tgl Lahir</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir_edit" class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap</label>
                            <textarea name="alamat" id="alamat_edit" rows="5" class="form-control form-control-sm" required></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <input type="submit" value="Edit Data" class="btn btn-sm btn-success" id="btnSubmitmodalEditUser">
                        </div>
                    </form>
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
                <div class="col-12 col-md-4 mb-3">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-info d-flex justify-content-between"><span><i class="fa fa-user-circle mr-3"></i> Profil</span> <a href="#modalEditUser" data-toggle="modal" data-id="<?= $user['id_marketing']?>" class="btnModalEditUser text-success">edit <i class="fa fa-pen"></i></a></li>
                        <li class="list-group-item"><i class="fa fa-user mr-2"></i><?= $user['nama']?></li>
                        <li class="list-group-item"><i class="fa fa-envelope mr-2"></i><?= $user['email']?></li>
                        <li class="list-group-item"><i class="fa fa-phone mr-2"></i><?= $user['no_hp']?></li>
                        <li class="list-group-item"><i class="fa fa-calendar mr-2"></i><?= date("d-M-Y", strtotime($user['tgl_lahir']))?></li>
                        <li class="list-group-item"><i class="fa fa-map-marker-alt mr-2"></i><?= $user['alamat']?></li>
                    </ul>
                </div>
                
                <div class="col-12 col-md-4 mb-3">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-info d-flex justify-content-between"><span><i class="fa fa-key mr-3"></i> Ganti Password</span></li>
                        <li class="list-group-item">
                            <form action="<?= base_url()?>marketing/edit_password" method="post">
                                <input type="hidden" name="id_marketing" value="<?= $user['id_marketing']?>">
                                <div class="form-group">
                                    <label for="password">Password Baru</label>
                                    <input type="password" name="password" id="password" class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <label for="password2">Konfirm Password</label>
                                    <input type="password" name="password2" id="password2" class="form-control form-control-sm" required>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <input type="submit" value="Ganti Password" class="btn btn-sm btn-primary" id="btnSubmitEditPassword">
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="overlay"></div>

<script>
    $(".btnModalEditUser").click(function(){
        let id = $(this).data("id");

        $.ajax({
            url: "<?= base_url()?>marketing/get_user_by_id",
            data: {id: id},
            async: true,
            method: "POST",
            dataType: "json",
            success: function(data){
                $("#id_marketing_edit").val(data.id_marketing);
                $("#nama_edit").val(data.nama);
                $("#no_hp_edit").val(data.no_hp);
                $("#tgl_lahir_edit").val(data.tgl_lahir);
                $("#alamat_edit").val(data.alamat);
                $("#jk_edit").val(data.jk);
            }
        })
    })

    $("#btnSubmitmodalEditUser").click(function(){
        var c = confirm("Yakin akan mengubah data?");
        return c;
    })

    $("#btnSubmitEditPassword").click(function(){
        if($("#password").val() == $("#password2").val()){
            var c = confirm("Yakin akan mengubah password?")
            return c;
        } else {
            alert("Password baru dan konfirm password harus sama");
        }
    })
</script>