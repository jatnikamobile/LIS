<div id="sidebar" class="sidebar h-sidebar navbar-collapse collapse">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>
<?php if($this->session->has_userdata('session_key')):?>
    <?php if ($this->session->userdata('grup') == 'LAB' && $this->session->userdata('o_level') == 1): ?>
        <ul class="nav nav-list">
            <li class="hover <?=isset($main_menu) && $main_menu == 'beranda'? 'active':''?>">
                <a href="<?=base_url('Beranda')?>">
                    <i class="menu-icon fa fa-home"></i><span class="menu-text"> Beranda </span>
                </a> <b class="arrow"></b>
            </li>
            <li class="hover <?=isset($main_menu) && $main_menu == 'hasillab'? 'active':''?>">
                <a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-bookmark"></i><span class="menu-text">Hasil Pemeriksaan</span><b class="arrow fa fa-angle-down"></b></a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="hover <?=isset($sub1) && $sub1 == 'sub-hasillab'? 'active':''?>">
                        <a href="<?=base_url('hasilPemeriksaan/index')?>"><i class="menu-icon fa fa-caret-right"></i> Hasil Pemeriksaan</a>
                        <b class="arrow"></b>
                    </li>
                    <li class="hover <?=isset($sub1) && $sub1 == 'sub-listhasil'? 'active':''?>">
                        <a href="<?=base_url('hasilPemeriksaan/list_hasil_pemeriksaan')?>"><i class="menu-icon fa fa-caret-right"></i> List Hasil Pemeriksaan</a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
        </ul><!-- /.nav-list -->
    <?php else: ?> 
        <ul class="nav nav-list">
            <li class="hover <?=isset($main_menu) && $main_menu == 'beranda'? 'active':''?>">
                <a href="<?=base_url('Beranda')?>">
                    <i class="menu-icon fa fa-home"></i><span class="menu-text"> Beranda </span>
                </a> <b class="arrow"></b>
            </li>
            <li class="hover <?=isset($main_menu) && $main_menu == 'registrasi'? 'active':''?>">
                <a href="<?=base_url('registrasi/index')?>">
                    <i class="menu-icon fa fa-list-ol"></i><span class="menu-text"> Registrasi Pasien </span>
                </a> <b class="arrow"></b>
            </li>
            <li class="hover <?=isset($main_menu) && $main_menu == 'listpasien'? 'active':''?>">
                <a href="<?=base_url('list_pasien')?>">
                    <i class="menu-icon fa fa-list-ol"></i><span class="menu-text"> List Pasien </span>
                </a> <b class="arrow"></b>
            </li>
            <li class="hover <?=isset($main_menu) && $main_menu == 'billinglab'? 'active':''?>">
                <a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-bookmark"></i><span class="menu-text">Billing Laboratorium</span><b class="arrow fa fa-angle-down"></b></a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="hover <?=isset($sub1) && $sub1 == 'sub-billinglab'? 'active':''?>">
                        <a href="<?=base_url('billing/baru')?>"><i class="menu-icon fa fa-caret-right"></i> Billing Laboratorium</a>
                        <b class="arrow"></b>
                    </li>
                    <li class="hover <?=isset($sub1) && $sub1 == 'sub-listlab'? 'active':''?>">
                        <a href="<?=base_url('billing')?>"><i class="menu-icon fa fa-caret-right"></i> List Billing Lab</a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
            <li class="hover <?=isset($main_menu) && $main_menu == 'listorder'? 'active':''?>">
                <a href="<?=base_url('list_order')?>">
                    <i class="menu-icon fa fa-list"></i><span class="menu-text"> List Order </span>
                </a> <b class="arrow"></b>
            </li>
            <li class="hover <?=isset($main_menu) && $main_menu == 'hasillab'? 'active':''?>">
                <a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-bookmark"></i><span class="menu-text">Hasil Pemeriksaan</span><b class="arrow fa fa-angle-down"></b></a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="hover <?=isset($sub1) && $sub1 == 'sub-hasillab'? 'active':''?>">
                        <a href="<?=base_url('hasilPemeriksaan/index')?>"><i class="menu-icon fa fa-caret-right"></i> Hasil Pemeriksaan</a>
                        <b class="arrow"></b>
                    </li>
                    <li class="hover <?=isset($sub1) && $sub1 == 'sub-listhasil'? 'active':''?>">
                        <a href="<?=base_url('hasilPemeriksaan/list_hasil_pemeriksaan')?>"><i class="menu-icon fa fa-caret-right"></i> List Hasil Pemeriksaan</a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
            <li class="hover <?=isset($main_menu) && $main_menu == 'historipasienlab'? 'active':''?>">
                <a href="<?=base_url('historipasienlab')?>">
                    <i class="menu-icon fa fa-user"></i><span class="menu-text"> History Pasien </span>
                </a> <b class="arrow"></b>
            </li>
            <li class="hover <?=isset($main_menu) && $main_menu == 'mastertarif'? 'active':''?>">
                <a href="<?=base_url('masterTarif/master_tarif')?>">
                    <i class="menu-icon fa fa-money"></i><span class="menu-text"> Master Tarif </span>
                </a> <b class="arrow"></b>
            </li>
            <li class="hover <?=isset($main_menu) && $main_menu == 'nilainormal' ? 'active':''?>">
                <a href="<?=base_url('masterTarif/index')?>">
                    <i class="menu-icon fa fa-leaf"></i><span class="menu-text"> Nilai Normal </span>
                </a> <b class="arrow"></b>
            </li>
        </ul><!-- /.nav-list -->
    <?php endif ?>
<?php endif;?>
</div>
