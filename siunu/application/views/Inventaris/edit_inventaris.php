<div class="content-wrapper">
    <section class="content">
        <?php foreach ($inventaris as $isi)?>
        <form action=" <? echo base_url(). 'inventaris/edit'?>" method="post">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="hidden" name="id_inventaris" class="form-control"
                    value=" <?php echo $isi->id_inventaris?>">
                <input type="text" name="inventaris" class="form-control" value=" <?php echo $isi->nama_barang?>">
            </div>
        </form>
    </section>

</div>