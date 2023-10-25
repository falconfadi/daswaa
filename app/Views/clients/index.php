<?= $this->extend('templates/admin') ?>

<?= $this->section('datatable-css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?=site_url('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
<link rel="stylesheet" href="<?=site_url('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')?>">
<link rel="stylesheet" href="<?=site_url('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')?>">
<style>
    #example1_filter{
        float: left !important;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php     if(session()->getFlashdata('status')){?>
    <div class="alert alert-success alert-dismissible" class="col-12">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> تنبيه!</h4>
        <?=session()->getFlashdata('status')?>
    </div>
<?php }   ?>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b><?=$title?></b></h3>
            <div class="col-lg-4  float-left">
                <div class="btn-group w-100">
                
                <div class="btn-group w-100">
                    <a class="btn btn-success col fileinput-button" href="<?=site_url('add-client')?>">
                        <i class="fas fa-plus"></i>
                        <span>إضافة مشترك </span>

                    </a>

                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>الاسم</th>
                    <th>الكنية</th>
                    <th>اسم الأب</th>
                    <th>الرقم الوطني</th>

                </tr>
                </thead>
                <tbody>
                <?php $i=0; foreach ($clients as $client){
                    ?>
                <tr>
                    <td><?=$client['first_name']?></td>
                    <td><?=   $client['last_name']   ?>            </td>
                    <td><?=$client['father_name']?></td>
                    <td><?=$client['national_id']?></td>
                    <td>

                        <a class="dropdown-item" href="#"><span class="badge bg-warning">تعديل</span></a>

                    </td>
                </tr>
                <?php $i++; }?>


                </tbody>
                <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<?= $this->endSection() ?>

<?= $this->section('datatable') ?>
<script src="<?= base_url('admin/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?= base_url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
<script src="<?= base_url('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
<script src="<?= base_url('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')?>"></script>
<script src="<?= base_url('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')?>"></script>
<script src="<?= base_url('admin/plugins/jszip/jszip.min.js')?>"></script>
<script src="<?= base_url('admin/plugins/pdfmake/pdfmake.min.js')?>"></script>
<script src="<?= base_url('admin/plugins/pdfmake/vfs_fonts.js')?>"></script>
<script src="<?= base_url('admin/plugins/datatables-buttons/js/buttons.html5.min.js')?>"></script>
<script src="<?= base_url('admin/plugins/datatables-buttons/js/buttons.print.min.js')?>"></script>
<script src="<?= base_url('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')?>"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

<?= $this->endSection() ?>


