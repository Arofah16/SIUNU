<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-plus" style="color:green"> </i> Edit Data Inventaris
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Beranda</a></li>
            <li class="active"><i class="fa fa-plus"></i>&nbsp; Edit Inventaris Barang</li>
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
                        <?php echo form_open_multipart('inventaris/edit');?>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- memunculkan value di select box -->

                                <div class="form-group">
                                    <label for="barang">Nama Barang</label>
                                    <select class="form-control" name="id_barang">
                                        <?php foreach($barang as $isi):?>
                                        <option value="<?= $isi['id_barang']?>"
                                            <?= $isi['id_barang'] == $inventaris['id_barang'] ? 'selected' : ''?>>
                                            <?= $isi['nama_barang'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                    <label>Lokasi Barang</label>
                                    <select name="kampus" id="kampus" class="form-control">
                                        <?php foreach($kampus as $row):?>
                                        <option value="<?= $row['id_kampus']?>"
                                            <?= $row['id_kampus'] ==$inventaris['kode_lokasi'][0] ? 'selected': ''?>>
                                            <?= $row['nama_kampus']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> Nama Gedung</label>
                                    <select name="gedung" id="gedung" class="form-control">
                                        <?php foreach($gedung as $row):?>
                                        <option value="<?= $row['id_gedung']?>"
                                            <?= $row['id_gedung'] == $inventaris['kode_lokasi'][1].$inventaris['kode_lokasi'][2] ? 'selected': ''?>>
                                            <?= $row['nama_gedung']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> Nama Lantai</label>
                                    <select name="lantai" id="lantai" class="form-control">
                                        <?php foreach($lantai as $row):?>
                                        <option value="<?= $row['id_lantai']?>"
                                            <?= $row['id_lantai'] == $inventaris['kode_lokasi'][3] ? 'selected': ''?>>
                                            <?= $row['nama_lantai']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> Nama Ruang</label>
                                    <select name="ruang" id="ruang" class="form-control">
                                        <?php foreach($ruang as $row):?>
                                        <option value="<?= $row['id_ruang']?>"
                                            <?= $row['id_ruang'] == $inventaris['kode_lokasi'][4].$inventaris['kode_lokasi'][5] ? 'selected': ''?>>
                                            <?= $row['deskripsi']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> Nama Sub Ruang</label>
                                    <select name="sub_ruang" id="sub_ruang" class="form-control">
                                        <?php foreach($sub_ruang as $row):?>
                                        <option value="<?= $row['id_sub_ruang']?>">
                                            <?= $row['id_sub_ruang'] == $inventaris['kode_lokasi'][6] ? 'selected': ''?>
                                            <?= $row['nama_sub_ruang']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Status Barang</label>
                                    <select name="status_barang" class="form-control" required="required">
                                        <option value="hibah" <?=$status_barang=="hibah" ? "selected": "" ?>>Hibah
                                        </option>
                                        <option value="inventaris" <?=$status_barang=="inventaris" ? "selected": "" ?>>
                                            Milik Sendiri</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Barang</label>
                                    <input type="date" class="form-control" name="tanggal_barang"
                                        value="<?=$tanggal_barang?>" required="required">
                                </div>

                                <div class="form-group">
                                    <label>Kondisi Barang</label>
                                    <select name="kondisi_barang" class="form-control" required="required">
                                        <option value="baru" <?=$kondisi_barang=="baru" ? "selected": "" ?>>
                                            Baru</option>
                                        <option value="rusak" <?=$kondisi_barang=="rusak" ? "selected": "" ?>>Rusak
                                        </option>
                                        <option value="perbaikan" <?=$kondisi_barang=="perbaikan" ? "selected": "" ?>>
                                            Sedang
                                            Diperbaiki</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary btn-mr-6">Submit</button>
                            </form>
                            <!-- <?php echo form_close('inventaris');?> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>