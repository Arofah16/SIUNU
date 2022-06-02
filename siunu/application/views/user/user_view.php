<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> Daftar Data User
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Beranda</a></li>
            <li class="active"><i class="fa fa-file-text"></i>&nbsp; Daftar Data User</li>
        </ol>
    </section>
    <section class="content">
        <?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <a href="user/tambah"><button class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah
                                Data User</button></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <br />
                            <table id="example1" class="table table-bordered table-striped table" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Foto</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;foreach($user as $isi):?>
                                    <?php if ($isi['id_login'] != $idbo) : ?>
                                    <tr>
                                        <td><?= ++$no;?></td>
                                        <td><?= $isi['nama'];?></td>
                                        <td><?= $isi['jenis_kelamin'];?></td>
                                        <td><?= $isi['user'];?></td>
                                        <td><?= $isi['pass'];?></td>
                                        <td><?= $isi['telepon'];?></td>
                                        <td><?= $isi['email'];?></td>
                                        <td>
                                            <center>
                                                <img src="<?php echo base_url();?>assets_style/image/<?php echo $isi['foto'];?>"
                                                    alt="#" class="img-responsive" style="height:auto;width:100px;" />
                                            </center>
                                        </td>
                                        <td><?= $isi['alamat'];?></td>
                                        <td><?= $isi['level'];?></td>
                                        <td style="width:20%;">
                                            <a href="<?= base_url('user/edit/'.$isi['id_login']);?>"><button
                                                    class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                            <a href="<?= base_url('user/del/'.$isi['id_login']);?>"
                                                onclick="return confirm('Anda yakin user akan dihapus ?');">
                                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                            <!-- <a href="<?= base_url('user/del/'.$isi['id_login']);?>"
                                                            onclick="return confirm('Anda yakin user akan dihapus ?');">
                                                            <button class="btn btn-primary"><i class="fa fa-eye"></i></button></a> -->
                                            <!-- <a href="<?= base_url('user/detail/'.$isi['id_login']);?>"
                                                            target="_blank"><button class="btn btn-primary">
                                                                <i class="fa fa-print"></i> Cetak Kartu</button></a> -->
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>