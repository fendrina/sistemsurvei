<!--Panggil Tamplate pada folder layout-->
<?= $this->extend('layout/templateDashAdmin');?>
<!--end topbar-->

<!--start content-->
<?= $this->section('content');?>
    <!--start Dashboard Super Admin-->
    <?php if($group_name == 'SAdmin') : ?>
        <?= $this->include('SAdmin/dashSuperAdmin');?>
    <!--end Dashboard Admin-->

    <!--start Dashboard Admin 1-->
    <?php elseif($group_name == 'unit1') : ?>
        <?= $this->include('AdminPerUnit/dashUnitAdmin1');?>
    <!--end Dashboard Admin 1-->

    <!--start Dashboard Admin 2-->
    <?php elseif($group_name == 'unit2') : ?>
        <?= $this->include('AdminPerUnit/dashUnitAdmin2');?>
    <!--end Dashboard Admin-->

    <!--start Dashboard Admin 3-->
    <?php elseif($group_name == 'unit3') : ?>
        <?= $this->include('AdminPerUnit/dashUnitAdmin3');?>
    <!--end Dashboard Admin 3-->

    <!--start Dashboard Admin 4-->
    <?php elseif($group_name == 'unit4') : ?>
        <?= $this->include('AdminPerUnit/dashUnitAdmin4');?>
    <!--end Dashboard Admin-->

    <?php elseif($group_name == 'unit5') : ?>
        <?= $this->include('AdminPerUnit/dashUnitAdmin5');?>
    <!--end Dashboard Admin-->
    <?php endif;?>
<?= $this->endSection();?>
<!--end content-->