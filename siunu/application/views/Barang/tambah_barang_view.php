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
                        <?php echo form_open_multipart('barang/add');?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="golongan">Golongan Barang </label>
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
                                    <label for="bidang">Bidang Barang </label>
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
                                <div class="form-group">
                                    <label>Gambar Barang</label>
                                    <input type="file" name="gambar" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary btn-md">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
$(document).ready(function() {
    $('#golongan').change(function() {
        var id_golongan = $('#golongan').val();
        console.log('id_golongan');

        if (id_bidang != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Golongan/fetch_golongan",
                method: "POST",
                data: {
                    id_golongan: id_golongan
                },
                success: function(data) {
                    $('#golongan').html(data);
                    $('#bidang').html('<option value="">Select Bidang</option>');
                }
            });
        } else {
            $('#golongan').html('<option value="">Select Golongan</option>');
            $('#bidang').html('<option value="">Select Bidang</option>');
        }
    });
});
</script>