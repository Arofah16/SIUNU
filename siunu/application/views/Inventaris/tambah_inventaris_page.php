<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-plus" style="color:green"> </i> Tambah Inventaris Barang
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Beranda</a></li>
            <li class="active"><i class="fa fa-plus"></i>&nbsp; Tambah Inventaris Barang</li>
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
                        <?php echo form_open_multipart('inventaris/tambah_aksi');?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <select name="id_barang" class="form-control" required="required">
                                        <option value="">--Pilih Barang--</option>
                                        <?php foreach ($barang as $isi) : ?>
                                        <option value="<?= $isi['id_barang'] ?>"
                                            <?=set_select('id_barang',$isi['id_barang'])?>>
                                            <?=$isi['nama_barang']?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi Barang</label>
                                    <select name="kampus" id="kampus" class="form-control">
                                        <option value="">Pilih Kampus</option>
                                        <?php
                                            foreach($kampus as $row)
                                            {
                                            echo '<option value="'.$row->id_kampus.'">'.$row->nama_kampus.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="gedung" id="gedung" class="form-control">
                                        <option value="">Pilih Gedung</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="lantai" id="lantai" class="form-control">
                                        <option value="">Pilih Lantai</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="ruang" id="ruang" class="form-control ">
                                        <option value="">Pilih Ruang</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="sub_ruang" id="sub_ruang" class="form-control ">
                                        <option value="">Pilih Sub-Ruang</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Status Barang</label>
                                    <select name="status_barang" class="form-control" required="required">
                                        <option value="hibah">Hibah</option>
                                        <option value="inventaris">Milik Sendiri</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Barang</label>
                                    <input type="date" class="form-control" name="tanggal_barang" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Kondisi Barang</label>
                                    <select name="kondisi_barang" class="form-control" required="required">
                                        <option value="baru">Baru</option>
                                        <option value="rusak">Rusak</option>
                                        <option value="perbaikan">Sedang Diperbaiki</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Gambar </label>
                                    <input type="file" name="gambar_inventaris" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary btn-mr-6">Simpan</button>
                            <!-- </form> -->
                            <!-- <a href="<?= base_url('barang');?>" class="btn btn-danger btn-md">Kembali</a> -->
                            <!-- <?php echo form_close('inventaris');?> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>