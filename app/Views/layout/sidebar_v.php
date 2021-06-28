<?php if($group_name == 'SAdmin') :?>

<!-- partial Super Admin-->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/dashboard');?>">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#hsl-prodi" aria-expanded="false" aria-controls="hsl-prodi">
              <i class="mdi mdi-book-open  menu-icon"></i>
              <span class="menu-title">Hasil Survei</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="hsl-prodi">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/hasiltotal')?>">Hasil Survei</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/hasiltendik')?>">Hasil Tendik</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/hasilkmn')?>">A - KMN</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/hasilekw')?>">B - EKW</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/hasilinf')?>">C - INF</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/hasiltek')?>">D - TEK</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/hasiljmp')?>">E - JMP</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/hasilgzi')?>">F - GZI</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/hasiltib')?>">G - TIB</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/hasilikn')?>">H - IKN</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/hasiltnk')?>">I - TNK</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/hasilmab')?>">J - MAB</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/hasilmni')?>">K - MNI</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/hasilkim')?>">L - KIM</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/hasillnk')?>">M - LNK</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/hasilakn')?>">N - AKN</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/hasilpvt')?>">P - PVT</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/hasiltmp')?>">T - TMP</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/hasilppp')?>">W - PPP</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-chart-bar menu-icon"></i>
              <span class="menu-title">Olah Survei</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/pertanyaan')?>">Daftar Pertanyaan</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="</?php echo site_url('sadmin/daftarunit')?>">Daftar Unit Survei</a></li> -->
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/jadwal')?>">Jadwal Survei</a></li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">Data Admin</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/datadmin')?>">Daftar Admin</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/akademik')?>">Admin Akademik</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/sarpras')?>">Admin Sarana Prasarana</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/pelayanan')?>">Admin Pelayanan</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/lab')?>">Admin Laboratorium</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('sadmin/perpus')?>">Admin Perpustakaan</a></li>
              </ul>
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="</?php echo site_url('sadmin/unduh')?>">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">Unduh Hasil Survei</span>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- partial -->

<!--partial Admin 1-->
    <?php elseif($group_name == 'unit1'):?>
      <!-- partial Admin Unit-->
        <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
              <!-- <li class="nav-item">
                  <a class="nav-link" href="/">
                    <i class="mdi mdi-book-open menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                  </a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/');?>">
                  <i class="mdi mdi-book-open menu-icon"></i>
                  <span class="menu-title">Hasil Survei</span>
                </a>
              </li>
              <!-- <li class="nav-item">
                  <a class="nav-link" href="</?php echo site_url('admin/unduh1')?>">
                  <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                  <span class="menu-title">Unduh Hasil Survei</span>
                  </a>
              </li> -->
            </ul>
        </nav>
        <!-- partial -->
<!--partial Admin 2-->
      <?php elseif($group_name == 'unit2'):?>
      <!-- partial Admin Unit-->
        <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/');?>">
                <i class="mdi mdi-book-open menu-icon"></i>
                <span class="menu-title">Hasil Survei</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="</?php echo site_url('admin2/unduh2')?>">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Unduh Hasil Survei</span>
                </a>
            </li> -->
            </ul>
        </nav>
        <!-- partial -->

<!--partial Admin 3-->
        <?php elseif($group_name == 'unit3'):?>
      <!-- partial Admin Unit-->
        <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/');?>">
                <i class="mdi mdi-book-open menu-icon"></i>
                <span class="menu-title">Hasil Survei</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="</?php echo site_url('admin3/unduh3')?>">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Unduh Hasil Survei</span>
                </a>
            </li> -->
            </ul>
        </nav>
        <!-- partial -->

<!--partial Admin 4-->
  <?php elseif($group_name == 'unit4'):?>
      <!-- partial Admin Unit-->
        <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/');?>">
                <i class="mdi mdi-book-open menu-icon"></i>
                <span class="menu-title">Hasil Survei</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="</?php echo site_url('admin4/unduh4')?>">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Unduh Hasil Survei</span>
                </a>
            </li> -->
            </ul>
        </nav>
        <!-- partial -->

<!--partial Admin 4-->
<?php elseif($group_name == 'unit5'):?>
      <!-- partial Admin Unit-->
        <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/');?>">
                <i class="mdi mdi-book-open menu-icon"></i>
                <span class="menu-title">Hasil Survei</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="</?php echo site_url('admin5/unduh5')?>">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Unduh Hasil Survei</span>
                </a>
            </li> -->
            </ul>
        </nav>
        <!-- partial -->

<?php endif; ?>