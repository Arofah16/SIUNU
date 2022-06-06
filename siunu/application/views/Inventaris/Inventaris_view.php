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
                        <a href="Inventaris/tambah"><button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
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
                                        <th>No</th>
                                        <th>ID Inventaris</th>
                                        <th>Nama Barang</th>
                                        <th>Status Barang</th>
                                        <th>Tanggal Barang</th>
                                        <th>Kondisi Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;foreach($inventaris_barang as $isi):?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $isi['kode_barang']."-".str_pad($isi['id_inventaris'], 4, "0", STR_PAD_LEFT). "-".$isi['kode_lokasi'];?>
                                        </td>
                                        <td><?= $isi['nama_barang'];?></td>
                                        <td><?= $isi['status_barang'];?></td>
                                        <td><?= $isi['tanggal_barang'];?></td>
                                        <td><?= $isi['kondisi_barang'];?></td>
                                        <td <?php if($this->session->userdata('level') == 'Petugas'){?>style="width:17%;"
                                            <?php }?>>

                                            <?php if($this->session->userdata('level') == 'Petugas'){?>
                                            <a href="<?= base_url('inventaris/edit_data/'.$isi['id_inventaris']);?>"><button
                                                    class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                            <a href="<?= base_url('inventaris/detail'.$isi['id_inventaris']);?>">
                                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i>
                                                    Detail</button></a>
                                            <a href="<?= base_url('inventaris/delete/'.$isi['id_inventaris']);?>"
                                                onclick="return confirm('Anda yakin data inventaris ini akan dihapus ?');">
                                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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