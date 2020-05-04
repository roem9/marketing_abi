<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-5 col-md-5">
            <div class="card o-hidden border-0 shadow-lg" >
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                <div class="col-lg-12">
                    <div class="p-3">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Form Pendaftaran</h1>
                    </div>
                        <?php if( $this->session->flashdata('pesan') ) : ?>
                            <div class="row">
                                <div class="col-12">
                                    <?=$this->session->flashdata('pesan')?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <form action="<?= base_url()?>login/add_user" method="post" id="form">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-info"><i class="fa fa-user-circle mr-3"></i>Profil</li>
                                <li class="list-group-item">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" name="nama" id="nama" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jk">Jenis Kelamin</label>
                                        <select name="jk" id="jk" class="form-control form-control-sm" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">No Handphone</label>
                                        <input type="text" name="no_hp" id="no_hp" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tgl Lahir</label>
                                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat Lengkap</label>
                                        <textarea name="alamat" id="alamat" rows="5" class="form-control form-control-sm" required></textarea>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-info"><i class="fa fa-key mr-3"></i> Akun</li>
                                <li class="list-group-item">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control form-control-sm" required>
                                    </div>
                                </li>
                            </ul>
                            <button type="submit" class="btn btn-block btn-primary" id="btnSubmitForm">Daftar</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            </div>

        </div>
    </div>
</div>