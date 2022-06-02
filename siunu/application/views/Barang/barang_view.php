<?php if(! defined('BASEPATH')) exit ('No direct script acess allowed') ;?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> Daftar Data Barang
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard');?>"> <i class="fa fa-dashboard"></i>&nbsp; Beranda</a></li>
            <li class="active"><i class="fa fa-file-text"></i>&nbsp; Daftar Data Barang </li>
        </ol>
    </section>
    <section class="content">
        <?php if (!empty($this->session->flashdata())) {echo $this->session->flashdata('pesan');}?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <a href="barang/tambah"><button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data
                                Barang
                            </button></a>
                    </div>


                    <!-- box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <br />
                            <table id="example1" class="table table-bordered table-striped table" width="100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Barang</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;foreach($barang as $isi):?>
                                    <!-- <?php
                                            if ($isi['kondisi_barang'] == 1) {
                                                $kondisi_barang = "Baru";
                                            } else if ($isi['kondisi_barang'] == 2) {
                                                $kondisi_barang = "Rusak";
                                            } else {
                                                $kondisi_barang = "Second";
                                            }
                                        ?> -->
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $isi['kode_barang'];?></td>
                                        <td><?= $isi['nama_barang'];?></td>
                                        <td><?= $isi['jumlah_barang'];?></td>
                                        <td>
                                            <center>
                                                <img src="<?php echo base_url();?>assets_style/image/<?php echo $isi['gambar'];?>"
                                                    alt="#" class="img-responsive" style="height:auto;width:100px;" />
                                            </center>
                                        </td>
                                        <!-- <td><?= $isi['waktu_perolehan'];?></td> -->
                                        <td <?php if($this->session->userdata('level') == 'Petugas'){?>style="width:17%;"
                                            <?php }?>>
                                            <?php if($this->session->userdata('level') == 'Petugas'){?>
                                            <a href="<?= base_url('barang/edit/'.$isi['kode_barang']);?>"><button
                                                    class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                            <a href="<?= base_url('barang/detail'.$isi['kode_barang']);?>">
                                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i>
                                                    Detail</button></a>
                                            <a href="<?= base_url('data/prosesbuku?buku_id='.$isi['nama_barang']);?>"
                                                onclick="return confirm('Anda yakin Buku ini akan dihapus ?');">
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