<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-plus" style="color:green"> </i> Tambah Barang
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Beranda</a></li>
            <li class="active"><i class="fa fa-plus"></i>&nbsp; Tambah Barang</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php echo form_open_multipart('barang/tambah');?>
                        <!-- <form action="<?php echo base_url('barang/add');?>" method="POST" enctype="multipart/form-data"> -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Golongan Barang </label>
                                    <select name="golongan" id="golongan" class="form-control">
                                        <option value="">Pilih golongan</option>
                                        <?php
                                            foreach($golbar as $row)
                                            {
                                                echo '<option value="'.$row['kode_golongan'].'">'.$row['nama_golongan'].'</option>';
                                            }
                                            ?>
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Bidang Barang </label>
                                    <select name="bidang" id="bidang" class="form-control">
                                        <option value="">Pilih Bidang</option>
                                        <?php
                                            foreach($bidang as $row)
                                            {
                                                echo '<option value="'.$row['kode_bidang'].'">'.$row['nama_bidang'].'</option>';
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" required="required"
                                        placeholder="Contoh : Laptop">
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Jumlah Barang</label>
                                    <input type="number" class="form-control" name="jumlah_barang" required="required">
                                </div>
                                <!-- <div class="form-group">
                                    <label>Merk Barang</label>
                                    <select name="merk_barang" class="form-control" required="required">
                                        <option value="">--Pilih Merk Barang--</option>
                                        <?php foreach ($merk as $merk) : ?>
                                        <option value="<?= $merk['kode_merk'] ?>"
                                            <?=set_select('merk_barang',$merk['kode_merk'])?>>
                                            <?=$merk['merk']?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div> -->
                                <!--   -->
                                <!-- <div class="form-group">
                                        <div class="form-group">
                                            <label>Jenis Barang</label>
                                            <select name="jenis_barang" class="form-control">
                                                <option value="">--Pilih Jenis Barang--</option>
                                                <?php foreach ($jenis_barangs as $jenis_barang) : ?>
                                                <option value="<?= $jenis_barang['kode_jenis_barang'] ?>"
                                                    <?=set_select('jenis_barang',$jenis_barang['kode_jenis_barang'])?>>
                                                    <?=$jenis_barang['nama_jenis_barang']?>
                                                </option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div> -->
                                <!-- <div class="form-group">
                                    <label>Kondisi Barang</label>
                                    <select name="kondisi_barang" class="form-control" required="required">
                                        <option value="1">Baru</option>
                                        <option value="2">Rusak</option>
                                        <option value="3">Second</option>
                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <label>Gambar Barang</label>
                                    <input type="file" name="gambar" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary btn-md">Submit</button>
                            </form>
                            <!-- <a href="<?= base_url('barang');?>" class="btn btn-danger btn-md">Kembali</a> -->
                            <?php echo form_close('barang');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>