<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-plus" style="color:green"> </i> <?= $title_web;?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Beranda</a></li>
            <li class="active"><i class="fa fa-plus"></i>&nbsp; <?= $title_web;?></li>
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
                        <form action="<?php echo base_url('data/prosesbuku');?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                        <input type="text" class="form-control" name="barang_id"
                                            placeholder="Masukkan Kode barang">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="text" class="form-control" name="nama_barang"
                                            placeholder="Masukkan Nama Barang">
                                    </div>
                                    <div class="form-group">
                                        <label>Merk Barang</label>
                                        <input type="text" class="form-control" name="merk_barang"
                                            placeholder="Masukkan Merk Barang">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Barang</label>
                                        <input type="number" class="form-control" name="jumlah"
                                            placeholder="Masukkan Jumlah Barang">
                                    </div>
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <input type="text" class="form-control" name="satuan"
                                            placeholder="Masukkan Satuan Barang">
                                        <!-- <select class="form-control-select2" required="required" name="satuan" id="">
                                            <option value="">set 1</option>
                                            <option value="">unit</option>
                                            <option value="">pcs</option>
                                        </select> -->
                                    </div>
                                    <div class="form-group">
                                        <label>Status Barang</label>
                                        <input type="text" class="form-control" name="kondisi_barang"
                                            placeholder="Masukkan Status barang">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <input type="date" class="form-control" name="tanggal_masuk"
                                            placeholder="Tahun masuk">
                                    </div>
                                    <div class="form-group">
                                        <label>Kondisi Barang</label>
                                        <input type="text" class="form-control" name="kondisi_barang"
                                            placeholder="Masukkan Kondsi barang">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control select2" required="required" name="id_kategori">
                                            <option disabled selected value> -- Pilih Kategori -- </option>
                                            <?php foreach($kats as $isi){?>
                                            <option value="<?= $isi['nama_kategori'];?>"><?= $isi['nama_kategori'];?>
                                            </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Ruangan</label>
                                        <select name="id_ruang" class="form-control select2" required="required">
                                            <option disabled selected value> -- Pilih Ruangan -- </option>
                                            <?php foreach($rakbuku as $isi){?>
                                            <option value="<?= $isi['id_ruang'];?>"><?= $isi['nama_rak'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Gedung</label>
                                        <input type="text" class="form-control" name="penerima"
                                            placeholder="Nama Gedung">
                                    </div>

                                    <div class="form-group">
                                        <label>Sampul <small style="color:green">(gambar) * opsional</small></label>
                                        <input type="file" accept="image/*" name="gambar">
                                    </div>
                                    <div class="form-group">
                                        <label>Lampiran Buku <small style="color:green">(pdf) * opsional</small></label>
                                        <input type="file" accept="application/pdf" name="lampiran">
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan Lainnya</label>
                                        <textarea class="form-control" name="keterangan"
                                            style="height:120px"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <input type="hidden" name="tambah" value="tambah">
                                <button type="submit" class="btn btn-primary btn-md">Submit</button>
                        </form>
                        <a href="<?= base_url('data');?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>