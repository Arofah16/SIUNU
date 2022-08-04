<?php if(! defined('BASEPATH')) exit ('No direct script acess allowed') ;?>
<div class="content-wrapper">
    <section class="content-header">
        <!-- <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard');?>"> <i class="fa fa-dashboard"></i>&nbsp; Beranda</a></li>
            <li class="active"><i class="fa fa-file-text"></i>&nbsp; Detail Barang </li>
        </ol> -->
    </section>
    <section class="content">
        <?php if (!empty($this->session->flashdata())) {echo $this->session->flashdata('pesan');}?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3>Detail Data Barang</h3>
                    </div>
                    <Table class="table">
                        <tr>
                            <th>Nama Barang : </th>
                            <td><?php echo $detail->nama_barang?></td>
                        </tr>
                        <tr>
                            <th>Nama Golongan: </th>
                            <td><?php echo $detail->nama_golongan?></td>
                        </tr>
                        <tr>
                            <th>Nama Bidang : </th>
                            <td><?php echo $detail->nama_bidang?></td>
                        </tr>
                    </Table>
                </div>
                <a href="<?= base_url('Barang/index');?>"><button class="btn btn-success"><i></i>Kembali</button></a>
            </div>
        </div>
</div>
</section>

</div>