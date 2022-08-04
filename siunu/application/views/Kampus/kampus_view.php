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
                                                <th>ID Kampus</th>
                                                <th>Nama Kampus</th>
                                                <th>Alamat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1;foreach($kampus->result_array() as $isi){?>
                                            <tr>
                                                <td><?= $isi['id_kampus']?></td>
                                                <td><?= $isi['nama_kampus'];?></td>
                                                <td><?=$isi['alamat'];?></td>
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
</div>