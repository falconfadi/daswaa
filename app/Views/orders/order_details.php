<?= $this->extend('templates/admin') ?>

<?= $this->section('select2-css') ?>
<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url('admin/plugins/select2/css/select2.min.css')?>">
<link rel="stylesheet" href="<?= base_url('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="col-md-12">
        <?php     if(session()->getFlashdata('status')){?>

            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                <?=session()->getFlashdata('status')?>
            </div>
        <?php }   ?>
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="<?=site_url('order/store')?>">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>نظامي\مخالفات</label>
                                <select class="form-control " style="width: 100%;" name="is_regular" id="is_regular" readonly>
                                    <?php if($is_regular==1){ ?>
                                    <option value="1" selected>نظامي</option>
                                    <?php }else{ ?>
                                    <option value="2" selected>مخالفات</option>
                                     <?php }?>
                                </select>
                            </div>
                        </div>
                        <?php if($is_regular==1){ ?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="customFile">تحميل سند ملكية</label>

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <?php }else{?>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="customFile">تحميل وكالة كاتب بالعدل مصدقة</label>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="customFile">تحميل تحميل تعهد خطي بالملكية</label>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="customFile">تحميل فاتورة مباه لأقرب مشترك</label>

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">إدخال</button>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('select2') ?>
<!-- Select2 -->
<script src="<?= base_url('admin/plugins/select2/js/select2.full.min.js')?>"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url('admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')?>"></script>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $('#is_regular').prop('disabled',true);
</script>
<?= $this->endSection() ?>

