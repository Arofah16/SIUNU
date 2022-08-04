<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-plus" style="color:green"> </i> Edit Barang
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
                        <?php echo form_open_multipart('barang/edit_aksi');?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="golongan">Golongan Barang </label>
                                    <select name="golongan" id="golongan" class="form-control">
                                        <?php foreach($golbar as $row):?>
                                        <option value="<?= $row['kode_golongan'] ?>"
                                            <?= $row['kode_golongan'] == $barang->kode_golongan ? 'selected' : '' ?>>
                                            <?= $row['nama_golongan'] ?> </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bidang">Bidang Barang </label>
                                    <select name="bidang" id="bidang" class="form-control">
                                        <?php foreach($bidang as $row):?>
                                        <option value="<?= $row['kode_bidang'] ?>"
                                            <?= $row['kode_bidang'] == $barang->kode_bidang ? 'selected' : '' ?>>
                                            <?= $row['nama_bidang'] ?> </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang"
                                        value="<?= $barang->nama_barang?>" required="required"
                                        placeholder="Contoh : Laptop">
                                </div>
                                <div class="pull-right">
                                    <input type="hidden" name="edit" value="<?= $barang->id_barang;?>">
                                    <button type="submit" class="btn btn-primary btn-md">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>