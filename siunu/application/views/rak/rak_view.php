<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> <?= $title_web;?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Beranda</a></li>
            <li class="active"><i class="fa fa-file-text"></i>&nbsp; <?= $title_web;?></li>
        </ol>
    </section>
    <section class="content">
        <?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <?php if(!empty($this->input->get('id'))){?>
                                <h4> Edit Ruang</h4>
                                <?php }else{?>
                                <h4> Tambah Ruang</h4>
                                <?php }?>
                            </div>

                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php if(!empty($this->input->get('id'))){?>
                                <form method="post" action="<?= base_url('data/rakproses');?>">
                                    <div class="form-group">
                                        <label for="">Nama Ruang</label>
                                        <input type="text" name="rak" value="<?=$rak->nama_rak;?>" id="rak"
                                            class="form-control" placeholder="Contoh : Ruang A.04">
                                        <label for="">Lokasi</label>
                                        <input type="text" name="lokasi" value="<?=$rak->lokasi;?>" id="lokasi"
                                            class="form-control" placeholder="Contoh : Jalan Sorosutan">

                                    </div>
                                    <br />
                                    <input type="hidden" name="edit" value="<?=$rak->id_ruang;?>">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit
                                        Ruang</button>
                                </form>
                                <?php }else{?>

                                <form method="post" action="<?= base_url('data/rakproses');?>">
                                    <!-- form tambah ruang -->
                                    <div class="form-group">
                                        <label for="">Kode Ruang</label>
                                        <input type="text" name="kode_ruang" id="rak" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Ruang</label>
                                        <input type="text" name="rak" id="rak" class="form-control"
                                            placeholder="Contoh : Ruang A.03">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Lokasi</label>
                                        <input type="text" name="lokasi" id="rak" class="form-control"
                                            placeholder="Contoh : jln Lowanu NO.47 Sorosutan Umbulharjo">
                                    </div>
                                    <br />
                                    <input type="hidden" name="tambah" value="tambah">
                                    <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah
                                        Ruang</button>
                                </form>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
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
                                                <th>Kode Ruang</th>
                                                <th>Nama Ruang</th>
                                                <th>Lokasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1;foreach($rakbuku->result_array() as $isi){?>
                                            <tr>
                                                <td><?= $no;?></td>
                                                <td><?= $isi['kode_ruang'];?></td>
                                                <td><?= $isi['nama_rak'];?></td>
                                                <td><?= $isi['lokasi'];?></td>
                                                <td style="width:20%;">
                                                    <a href="<?= base_url('data/rak?id='.$isi['id_ruang']);?>"><button
                                                            class="btn btn-success"><i
                                                                class="fa fa-edit"></i></button></a>
                                                    <a href="<?= base_url('data/rakproses?rak_id='.$isi['id_ruang']);?>"
                                                        onclick="return confirm('Anda yakin data ruang ini akan dihapus ?');">
                                                        <button class="btn btn-danger"><i
                                                                class="fa fa-trash"></i></button></a>
                                                </td>
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
        </div>
    </section>
</div>