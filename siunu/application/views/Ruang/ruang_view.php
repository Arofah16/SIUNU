<?php if(! defined('BASEPATH')) exit ('No direct script acess allowed') ;?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> Daftar Inventaris Barang
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard');?>"> <i class="fa fa-dashboard"></i>&nbsp; Beranda</a></li>
            <li class="active"><i class="fa fa-file-text"></i>&nbsp; Daftar Inventaris Barang </li>
        </ol>
    </section>
    <section class="content">
        <?php if (!empty($this->session->flashdata())) {echo $this->session->flashdata('pesan');}?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <a href="ruang/tambah"><button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                                Inventaris Barang
                            </button></a>
                    </div>

                    <!-- box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <br />
                            <table id="example1" class="table table-bordered table-striped table" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID Ruang</th>
                                        <th>Nama Ruang</th>
                                        <th>ID Lantai</th>
                                        <th>ID Gedung</th>
                                        <th>ID Kampus</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;foreach($ruang as $isi):?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $isi['nama_ruang'];?></td>
                                        <td><?= $isi['id_lantai'];?></td>
                                        <td><?= $isi['id_gedung'];?></td>
                                        <td><?= $isi['id_kampus'];?></td>
                                        <td <?php if($this->session->userdata('level') == 'Petugas'){?>style="width:17%;"
                                            <?php }?>>

                                            <?php if($this->session->userdata('level') == 'Petugas'){?>
                                            <a href="<?= base_url('barang/edit/'.$isi['id_ruang']);?>"><button
                                                    class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                            <a href="<?= base_url('barang/detail'.$isi['id_ruang']);?>">
                                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i>
                                                    Detail</button></a>
                                            <a href="<?= base_url('data/prosesbuku?buku_id='.$isi['id_ruang']);?>"
                                                onclick="return confirm('Anda yakin data inventaris ini akan dihapus ?');">
                                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                            <?php }else{?>
                                            <a href="<?= base_url('data/bukudetail/'.$isi['nama_barang']);?>">
                                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i>
                                                    Detail</button></a>
                                            <?php }?>
                                        </td>
                                    </tr>
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