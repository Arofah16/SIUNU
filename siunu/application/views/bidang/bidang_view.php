<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class=" fa fa-edit" style="color:green"></i> <?=$title_web;?>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url('dashboard');?>"> <i class="fa fa-dashboard"></i>&nbsp;Beranda</a>
            </li>
            <li class="active"> <i class="fa fa-file-text"></i> &nbsp; <?= $title_web?>
            </li>
        </ol>

    </section>
    <section class="content">
        <?php if(!empty ($this->session->flashdata())){echo $this->session->flashdata('pesan');}?>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped table" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Bidang</th>
                                                <th>Nama Bidang</th>
                                                <!-- <th>Aksi</th> -->
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no=1;foreach($bidang_barang->result_array() as $isi_bidang){?>
                                            <tr>
                                                <td><?= $no;?></td>
                                                <td><?= $isi_bidang['kode_golongan']. "-" . $isi_bidang['kode_bidang']?>
                                                </td>
                                                <td><?= $isi_bidang['nama_bidang'];?></td>
                                                <!-- <td style="width:20%;">
                                                    <a
                                                        href="<?= base_url('Bidang/index?id='.$isi_bidang['kode_bidang']);?>"><button
                                                            class="btn btn-success"><i
                                                                class="fa fa-edit"></i></button></a>
                                                    <a href="<?= base_url('Bidang/katproses?kat_id='.$isi_bidang['kode_bidang']);?>"
                                                        onclick="return confirm('Anda yakin Golongan ini akan dihapus ?');">
                                                        <button class="btn btn-danger"><i
                                                                class="fa fa-trash"></i></button></a>
                                                    <a
                                                        href="<?= base_url('Bidang/index?id='.$isi_bidang['kode_bidang']);?>"><button
                                                            class="btn btn-success"><i
                                                                class="fa fa-plus"></i></button></a>
                                                </td> -->
                                            </tr>
                                            <?php $no++;}?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>
</div>