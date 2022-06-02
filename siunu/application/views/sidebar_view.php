<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php
                    $d = $this->db->query("SELECT * FROM tbl_login WHERE id_login='$idbo'")->row();
                    if(!empty($d->foto || $d->foto != null)){?>
                <br />
                <img src="<?php echo base_url();?>assets_style/image/<?php echo $d->foto;?>" alt="#" c lass="user-image"
                    style="border:2px solid #fff;height:auto;width:100%;" />
                <?php }else{?>
                <img src="<?php echo base_url('assets_style/image/avatar-default.jpeg');?>" alt="#" c lass="user-image"
                    style="border:2px solid #fff;height:auto;width:100%;" />
                <?php }?>
            </div>
            <div class="pull-left info" style="margin-top: 5px;">
                <p><?php echo $d->nama;?></p>
                <p><?= $d->level;?>
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
            <br />
            <br />
            <br />
            <br />
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <?php if($this->session->userdata('level') == 'Petugas'){?>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if($this->uri->uri_string() == 'dashboard'){ echo 'active';}?>">
                <a href="<?php echo base_url('dashboard');?>">
                    <i class="fa fa-dashboard"></i> <span>Beranda</span>
                </a>
            </li>
            <li class="treeview <?php if($this->uri->uri_string() == 'data/kategori'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/rak'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/bukutambah'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/bukudetail/'.$this->uri->segment('3')){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/bukuedit/'.$this->uri->segment('3')){ echo 'active';}?>">
                <a href="#">
                    <i class="fa fa-pencil-square"></i>
                    <span>Data </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($this->uri->uri_string() == 'user'){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'user/tambah'){ echo 'active';}?>
                        <?php if($this->uri->uri_string()=='user/edit'.$this->uri->segment('3')){echo 'active';}?>">
                        <a href=" <?php echo base_url("user");?>" class="cursor">
                            <i class="fa fa-user"></i> <span>Data User</span>
                        </a>
                    </li>
                    <li class=" <?php if($this->uri->uri_string() == 'barang'){ echo 'active';}?>">
                        <?php if($this->uri->uri_string()=='barang/tambah'){echo 'active';}?>
                        <?php if ($this->uri->uri_string()== 'barang/add') {echo 'active';}?>
                        <a href="<?php echo base_url("barang");?>" class="cursor">
                            <span class="fa fa-cube"></span> Data Barang
                        </a>
                    </li>
                    <li class=" <?php if($this->uri->uri_string() == 'Golongan'){ echo 'active';}?>">
                        <a href="<?php echo base_url("Golongan");?>" class="cursor">
                            <span class="fa fa-list"></span> Data Golongan Barang
                        </a>
                    </li>
                    <li class=" <?php if($this->uri->uri_string() == 'Bidang'){ echo 'active';}?>">
                        <a href="<?php echo base_url("Bidang");?>" class="cursor">
                            <span class="fa fa-tasks"></span> Data Bidang Barang

                        </a>
                    </li>
                    <li class=" <?php if($this->uri->uri_string() == 'Inventaris'){ echo 'active';}?>">
                        <a href="<?php echo base_url("Inventaris");?>" class="cursor">
                            <span class="fa fa-database"></span> Data Inventaris Barang
                        </a>
                    </li>
                    <li class=" <?php if($this->uri->uri_string() == 'Ruang'){ echo 'active';}?>">
                        <a href="<?php echo base_url("Ruang");?>" class="cursor">
                            <span class="fa fa-home"></span> Data Ruang
                        </a>
                    </li>
                    <li class=" <?php if($this->uri->uri_string() == 'Kampus'){ echo 'active';}?>">
                        <a href="<?php echo base_url("Kampus");?>" class="cursor">
                            <span class="fa fa-university"></span> Data Kampus
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview <?php if($this->uri->uri_string() == 'data/kategori'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/rak'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/bukutambah'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/bukudetail/'.$this->uri->segment('3')){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/bukuedit/'.$this->uri->segment('3')){ echo 'active';}?>">


                <br>
                <br>
            <li class=" <?php if($this->uri->uri_string() == 'login/logout'){ echo 'active';}?>">
                <a href="<?php echo base_url("login/logout");?>" class="cursor">
                    <i class="fa fa-power-off"></i> <span>Log Out</span>
                </a </li>


                <!-- <li class="<?php if($this->uri->uri_string() == 'transaksi/denda'){ echo 'active';}?>">
                <a href="<?php echo base_url("transaksi/denda");?>" class="cursor">
                    <i class="fa fa-money"></i> <span>Denda</span>

                </a>
            </li>
            <?php }?>
            <?php if($this->session->userdata('level') == 'Anggota'){?>
            <li class="<?php if($this->uri->uri_string() == 'transaksi'){ echo 'active';}?>">
                <a href="<?php echo base_url("transaksi");?>" class="cursor">
                    <i class="fa fa-upload"></i> <span>Data Peminjaman </span>
                </a>
            </li>
            <li class="<?php if($this->uri->uri_string() == 'transaksi/kembali'){ echo 'active';}?>">
                <a href="<?php echo base_url("transaksi/kembali");?>" class="cursor">
                    <i class="fa fa-upload"></i> <span>Data Pengambilan</span>
                </a>
            </li>
            <li class="<?php if($this->uri->uri_string() == 'data'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/bukudetail/'.$this->uri->segment('3')){ echo 'active';}?>">
                <a href="<?php echo base_url("data");?>" class="cursor">
                    <i class="fa fa-search"></i> <span>Cari Buku</span>
                </a>
            </li>
            <li class="<?php if($this->uri->uri_string() == 'user/edit/'.$this->uri->segment('3')){ echo 'active';}?>">
                <a href="<?php echo base_url('user/edit/'.$this->session->userdata('ses_id'));?>" class="cursor">
                    <i class="fa fa-user"></i> <span>Data Anggota</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo base_url('user/detail/'.$this->session->userdata('ses_id'));?>" target="_blank"
                    class="cursor">
                    <i class="fa fa-print"></i> <span>Cetak kartu Anggota</span>
                </a>
            </li>
            <?php }?>
        </ul> -->
                <div class="clearfix"></div>
                <br />
                <br />
    </section>
</aside>