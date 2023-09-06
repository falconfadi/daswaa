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
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b><?=$title?></b></h3>
            <div class="col-lg-4  float-left">
                <div class="btn-group w-100">
                    <a class="btn btn-success col fileinput-button" href="<?=site_url('add-order')?>">
                        <i class="fas fa-plus"></i>
                        <span>إضافة طلب </span>

                    </a>

                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>المشترك</th>
                    <th>التاريخ</th>
                    <th>نظامي\مخالفات</th>
                    <th>تحكم</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0; foreach ($orders as $order){
                    ?>
                <tr>
                    <td><?=$order['id']?></td>
                    <td>   <?=$names[$i]?>                 </td>
                    <td><?=$order['created_at']?></td>
                    <td> <?=$order['is_regular']?></td>
                    <td>



                            <a class="dropdown-item" href="#"><span class="badge bg-warning">تعديل</span></a>
                            <a class="dropdown-item" href="#"><span class="badge bg-primary">تأكيد</span></a>



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


