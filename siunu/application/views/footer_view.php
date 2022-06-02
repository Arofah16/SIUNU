<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="clearfix"></div>
<footer class="main-footer">
    <div id="mycredit"><strong> Copyright &copy; <?php echo date('Y');?> Sistem Informasi Inventaris UNU Yogyakarta
        </strong> All rights | Page rendered in <strong>{elapsed_time}</strong> seconds.
        <div class="pull-right">
            <span id="made_with"></span>
        </div>
    </div>
</footer>

<div id="logout"></div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets_style/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets_style/assets/bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets_style/assets/plugins/summernote/summernote-lite.js"></script>

<script>
$('#summernotehal').summernote({
    height: 150,
    tabsize: 1,
    direction: 'rtl',
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['view', ['fullscreen', 'help']],
        ['table', ['table']],
    ],
});
</script>
<!-- Select2 -->
<script src="<?php echo base_url();?>assets_style/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
$(function() {
    //Initialize Select2 Elements
    $('.select2').select2();
});
// Restricts input for each element in the set of matched elements to the given inputFilter.
(function($) {
    $.fn.inputFilter = function(inputFilter) {
        return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            }
        });
    };
}(jQuery));
// Install input filters.
$("#uintTextBox").inputFilter(function(value) {
    return /^\d*$/.test(value);
});
// Install input filters.
$("#uintTextBox2").inputFilter(function(value) {
    return /^\d*$/.test(value);
});
$("#uintTextBox3").inputFilter(function(value) {
    return /^\d*$/.test(value);
});
</script>
<script>
// notifikasi gagal di hide
//$("#notifikasi").hide();
var logingagal = function() {
    $("#notifikasi").fadeOut('slow');
};
setTimeout(logingagal, 4000);
</script>


<script type="text/javascript">
$(function() {
    $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });
});
</script>
<script>
$(document).ready(function() {
    $('#kampus').change(function() {
        var id_kampus = $('#kampus').val();
        if (id_kampus != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Lokasi/fetch_gedung",
                method: "POST",
                data: {
                    id: id_kampus
                },
                success: function(data) {
                    $('#gedung').html(data);
                    $('#lantai').html('<option value="">Select Lantai</option>');
                    $('#ruang').html('<option value="">Select Ruang</option>');
                    $('#sub_ruang').html('<option value="">Select Sub Ruang</option>');
                }
            });
        } else {
            $('#gedung').html('<option value="">Select Gedung</option>');
            $('#lantai').html('<option value="">Select Lantai</option>');
            $('#ruang').html('<option value="">Select Ruang</option>');
            $('#sub_ruang').html('<option value="">Select Sub Ruang</option>');
        }
    });

    $('#gedung').change(function() {
        var id_gedung = $('#gedung').val();
        if (id_gedung != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Lokasi/fetch_lantai",
                method: "POST",
                data: {
                    id: id_gedung
                },
                success: function(data) {
                    $('#lantai').html(data);
                    $('#ruang').html('<option value="">Select Ruang</option>');
                    $('#sub_ruang').html('<option value="">Select Sub Ruang</option>');
                }
            });
        } else {
            $('#lantai').html('<option value="">Select Lantai</option>');
            $('#ruang').html('<option value="">Select Ruang</option>');
            $('#sub_ruang').html('<option value="">Select Sub Ruang</option>');
        }
    });

    $('#lantai').change(function() {
        var id_lantai = $('#lantai').val();
        if (id_lantai != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Lokasi/fetch_ruang",
                method: "POST",
                data: {
                    id: id_lantai
                },
                success: function(data) {
                    $('#ruang').html(data);
                    $('#sub_ruang').html('<option value="">Select Sub Ruang</option>');
                }
            });
        } else {
            $('#ruang').html('<option value="">Select Ruang</option>');
            $('#sub_ruang').html('<option value="">Select Sub Ruang</option>');
        }
    });

    $('#ruang').change(function() {
        var id_ruang = $('#ruang').val();
        if (id_ruang != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Lokasi/fetch_sub_ruang",
                method: "POST",
                data: {
                    id: id_ruang
                },
                success: function(data) {
                    $('#sub_ruang').html(data);
                }
            });
        } else {
            $('#sub_ruang').html('<option value="">Select Sub Ruang</option>');
        }
    });



});
</script>

<!-- custom jQuery -->
<script src="<?php echo base_url();?>assets_style/assets/dist/js/custom.js"></script>

<!-- Logout Ajax -->
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets_style/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets_style/assets/dist/js/demo.js"></script>
<!-- PACE -->
<script src="<?php echo base_url();?>assets_style/assets/bower_components/PACE/pace.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets_style/assets/bower_components/datatables.net/js/jquery.dataTables.min.js">
</script>
<script
    src="<?php echo base_url();?>assets_style/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js">
</script>
<!-- bootstrap datepicker -->
<script
    src="<?php echo base_url();?>assets_style/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
</script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url();?>assets_style/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
</body>

</html>