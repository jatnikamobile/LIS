<div class="row">
    <div class="col-sm-12 col-md-12">
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="col-sm-12">
                <div class="pull-right">
                    <button type="button" id="btn-histori" class="btn btn-success btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg-histori" style="width: 150px; height: 34px;">Histori Pasien</button>
                </div>
                <div class="col-sm-12 col-md-12">
                    <p><u>Status Pengobatan</u></p>
                    <form method="post" class="row" id="form-psn-bpjs">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right"> No Registrasi</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:transparent;">:</span>
                                        <input type="text" name="Regno" class="form-control input-sm" id="Regno" readonly value="<?= $regno ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Status Rujukan</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <div class="radio">
                                            <label>
                                                <input name="StatusRujuk" type="radio" class="ace" value="0"/>
                                                <span class="lbl">&nbsp; Non Rujukan</span>
                                            </label>
                                            <label>
                                                <input name="StatusRujuk" type="radio" class="ace" value="1" checked/>
                                                <span class="lbl">&nbsp; Faskes 1</span>
                                            </label>
                                            <label>
                                                <input name="StatusRujuk" type="radio" class="ace" value="2"/>
                                                <span class="lbl">&nbsp; Faskes 2(Rumah Sakit)</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="loading_home"></div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><hr></div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <p><u>Data Pasien</u></p>
                                <!-- Nomor RM -->
                                <form method="get">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right"> No Rekam Medis</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:transparent;">:</span>
                                        <input type="text" name="Medrec" id="Medrec"/>
                                        <button type="submit" class="btn btn-info btn-sm" id="btnCari" style="margin-left: 10px;">
                                            <i class="ace-icon fa fa-search"></i>Cari
                                        </button>
                                    </div>
                                </div>
                                </form>
                                <!-- Nama Pasien -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Nama Pasien</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:transparent;">:</span>
                                        <input type="text" name="Firstname" id="Firstname" class="form-control input-sm col-xs-10 col-sm-5"/>
                                    </div>
                                </div>
                                <!-- No Peserta BPJS -->
                                <form method="get" id="search_no_peserta">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right"> No Peserta BPJS</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <input type="text" name="noKartu" class="form-control input-sm" id="noKartu"/>
                                        <!-- Tgl Daftar -->
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">Tgl Daftar</span>
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <input type="date" name="TglDaftar" id="TglDaftar" class="form-control input-sm col-xs-6 col-sm-6" readonly/>
                                    </div>
                                </div>
                                </form>
                                <!-- Tanggal Daftar -->
                                <form method="get" id="search_nik">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">NIK KTP</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <input type="text" name="NoIden" class="form-control input-sm" id="NoIden"/>
                                        <!-- Tanggal Registrasi -->
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">Tgl Registrasi</span>
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <input type="date" name="Regdate" id="Regdate" class="form-control input-sm col-xs-6 col-sm-6" value="<?= date('Y-m-d') ?>"/>
                                    </div>
                                </div>
                                </form>
                                <!-- No Rujukan -->
                                <form method="get" id="search_noRujukan">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">No Rujukan</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <input type="text" name="NoRujuk" class="form-control input-sm" id="NoRujuk"/>
                                        <!-- Jam Registrasi -->
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">Jam Registrasi</span>
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <input type="time" name="Regtime" id="Regtime" class="form-control input-sm col-xs-6 col-sm-6" value="<?= date('H:i') ?>"/>
                                    </div>
                                </div>
                                </form>
                                <!-- No Surat Kontrol -->
                                <form method="get" id="search_nosurat">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">No Surat Kontrol</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <input type="text" name="NoSuratKontrol" class="form-control input-sm" id="NoSuratKontrol"/>
                                        <!-- Tanggal Registrasi -->
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">Tgl Rujukan</span>
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <input type="date" name="RegRujuk" id="RegRujuk" class="form-control input-sm col-xs-6 col-sm-6" value="<?= date('Y-m-d') ?>"/>
                                    </div>
                                </div>
                                </form>
                                <div class="form-group">
                                    <label class="col-md-3 control-label no-padding-right">Dokter Pengirim/DPJP</label>
                                    <div class="input-group col-md-9">
                                        <span class="input-group-addon" id="" style="border:none; background-color: transparent;">:</span>
                                        <select name="DokterPengirim" id="DokterPengirim" style="width:100%;" class="form-control input-sm select2" readonly="readonly">
                                            <!-- <option value="{{ isset($edit->KdDPJP) ? $edit->KdDPJP : '' }}">{{ isset($edit->KdDPJP : '-= Dokter Pengirim =-' }}</option> -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <p><u>Status Pasien</u></p>
                                <!-- Tanggal Lahir -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Tgl Lahir</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <input type="date" name="Bod" id="Bod" class="form-control input-sm col-xs-6 col-sm-6" />
                                        <!-- Input Umur -->
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">Umur (t/b/h)</span>
                                        <!-- Input Umur Tahun -->
                                        <input type="text" name="UmurThn" id="UmurThn" class="form-control input-sm col-xs-6 col-sm-3" readonly/>
                                        <!-- Input Umur Bulan -->
                                        <span class="input-group-addon no-border-right no-border-left" id="">/</span>
                                        <input type="text" name="UmurBln" id="UmurBln" class="form-control input-sm col-xs-6 col-sm-3" readonly/>
                                        <!-- Input Umur Hari -->
                                        <span class="input-group-addon no-border-right no-border-left" id="">/</span>
                                        <input type="text" name="UmurHari" id="UmurHari" class="form-control input-sm col-xs-6 col-sm-3" readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">No. Urut</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <input type="text" name="NomorUrut" id="NomorUrut" readonly="readonly">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">Kunjungan</span>
                                        <select type="text" name="Kunjungan" id="Kunjungan" style="width:100%;" class="form-control">
                                            <option value="">-= Kunjungan =-</option>
                                            <option value="Lama">Lama</option>
                                            <option value="Baru">Baru</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Jenis Kelmin -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Jenis Kelamin</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <div class="radio">
                                            <label>
                                                <input name="KdSex" type="radio" class="ace" value="L"/>
                                                <span class="lbl">&nbsp; Laki - Laki</span>
                                            </label>
                                            <label>
                                                <input name="KdSex" type="radio" class="ace" value="P"/>
                                                <span class="lbl">&nbsp; Perempuan</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Kategori Pasien -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Kategori Pasien</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <select type="text" name="KategoriPasien" id="Kategori" style="width:50%;" class="form-control select2 input-sm col-xs-6 col-sm-6">
                                            <?php foreach ($kategori as $key => $k):?>
                                                <option value="<?=$k->KdKategori?>"><?=$k->NmKategori?></option>
                                            <?php endforeach?>

                                            <!-- <option value="{{ isset($edit->Kategori) ? $edit->Kategori : '2' }}">{{ isset($edit->NmKategori : 'BPJS' }}</option> -->
                                        </select>
                                        <button type="button" id="btn-cari" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg-update-kategori" style="width: 170px; height: 34px; right: 0;">Update Kategori</button>
                                    </div>
                                </div>
                                <!-- No Telepon -->
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right">No Telepon</label>
                                        <div class="input-group col-sm-9">
                                            <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                            <input type="text" name="Notelp" id="Notelp" class="form-control input-sm col-xs-6 col-sm-6"/>
                                        </div>
                                    </div>
                                </div>
                                <!-- Jatah Kelas -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Jatah Kelas</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <select type="text" name="JatKelas" id="jatah_kelas" style="width:100%;" class="form-control input-sm col-xs-6 col-sm-6">
                                            <!-- @if(isset($edit))
                                            <option value="{{ $edit->NmKelas }}">Kelas {{ $edit->NmKelas }}</option>
                                            <option value="1">Kelas 1</option>
                                            <option value="2">Kelas 2</option>
                                            <option value="3">Kelas 3</option>
                                            @else -->
                                            <option value="">-= Kelas =-</option>
                                            <option value="1">Kelas 1</option>
                                            <option value="2">Kelas 2</option>
                                            <option value="3">Kelas 3</option>
                                            <!-- @endif -->
                                        </select>
                                        <input type="hidden" name="NmKelas" id="NmKelas">
                                    </div>
                                </div>
                                <!-- PISAT -->
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right">PISAT</label>
                                        <div class="input-group col-sm-9">
                                            <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                            <input type="text" name="pisat" id="pisat" class="form-control input-sm col-xs-6 col-sm-6" readonly/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><hr></div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <p><u>Status Pengobatan</u></p>
                                <!-- Tujuan Pelayanan -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Tujuan Pelayanan</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <select name="KdTuju" id="pengobatan" style="width:100%;" class="form-control input-sm select2 col-xs-6 col-sm-6" readonly="readonly">
                                            <option value="2">Rawat Jalan</option>
                                            <option value="PK">Penunjang Klinik</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Nama Poli / SMF -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Nama Poli / SMF</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <select name="KdPoli" id="poli" style="width:100%;" class="form-control input-sm select2 col-xs-6 col-sm-6">
                                            <!-- <option value="{{ isset($edit->KdPoli) ? $edit->KdPoli : '' }}">{{ isset($edit->NMPoli : '-= Poli =-' }}</option> -->
                                        </select>
                                        <input type="hidden" name="KdPoliBpjs">
                                    </div>
                                </div>
                                <!-- Poli Eksekutif -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Poli Eksekutif</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <div class="radio">
                                            <label>
                                                <input name="eksekutif" type="radio" class="ace" value="0" checked />
                                                <span class="lbl">&nbsp; Tidak</span>
                                            </label>
                                            <label>
                                                <input name="eksekutif" type="radio" class="ace" value="1"/>
                                                <span class="lbl">&nbsp; Ya</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Katarak -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Katarak</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <div class="radio">
                                            <label>
                                                <input name="Katarak" type="radio" class="ace" value="0" checked />
                                                <span class="lbl">&nbsp; Tidak</span>
                                            </label>
                                            <label>
                                                <input name="Katarak" type="radio" class="ace" value="1"/>
                                                <span class="lbl">&nbsp; Ya</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- COB -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">COB</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <div class="radio">
                                            <label>
                                                <input name="Cob" type="radio" class="ace" value="0" checked />
                                                <span class="lbl">&nbsp; Tidak</span>
                                            </label>
                                            <label>
                                                <input name="Cob" type="radio" class="ace" value="1"/>
                                                <span class="lbl">&nbsp; Ya</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Asal Rujukan -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Asal Rujukan</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <div class="radio">
                                            <label>
                                                <input name="Faskes" type="radio" class="ace" value="1" checked />
                                                <span class="lbl">&nbsp; Faskes 1</span>
                                            </label>
                                            <label>
                                                <input name="Faskes" type="radio" class="ace" value="2"/>
                                                <span class="lbl">&nbsp; Faskes 2</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- PPK -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">PPK</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <select name="Ppk" id="Ppk" style="width:100%;" class="form-control input-sm select2 col-xs-6 col-sm-6">
                                            <!-- <option value="{{ isset($edit->KdRujukan) ? $edit->KdRujukan : '' }}">{{ isset($edit->NmRujukan : '-= PPK =-' }}</option> -->
                                        </select>
                                        <input type="hidden" name="noPpk" id="noPpk">
                                    </div>
                                </div>
                                <!-- Penjamin -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Penjamin</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <select name="Penjamin" id="NMPenjamin" style="width:100%;" class="form-control input-sm select2 col-xs-6 col-sm-6" >
                                            <option value="">- Penjamin -</option>
                                            <option value="1">1. Jasa Raharja</option>
                                            <option value="2">2. BPJS Ketenagakerjaan</option>
                                            <option value="3">3. TASPEN</option>
                                            <option value="4">4. ASABRI</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
                                <p><u>Status Pembayaran</u></p>
                                <!-- Cara Bayar -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Cara Bayar</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <select type="text" name="KdCbayar" id="cara_bayar" style="width:100%;" class="form-control select2 input-sm col-xs-6 col-sm-6">
                                            <option value="02" selected="selected">BPJS</option>
                                            <option value="01">CASH</option>
											<option value="03">JAMINAN LAIN</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Peserta -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Peserta</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <input type="text" name="Peserta" id="Peserta" class="form-control input-sm col-xs-10 col-sm-5" readonly/>
                                        <input type="hidden" name="kodePeserta" id="kodePeserta" class="form-control input-sm col-xs-10 col-sm-5" readonly/>
                                    </div>
                                </div>
                                <!-- Status Peserta -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Status Peserta</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <input type="text" name="statusPeserta" id="statusPeserta" class="form-control input-sm col-xs-10 col-sm-5" readonly/>
                                    </div>
                                </div>
                                <!-- Dinsos -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Dinsos</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <input type="text" name="Dinsos" id="Dinsos" class="form-control input-sm col-xs-10 col-sm-5" readonly />
                                    </div>
                                </div>
                                <!-- No SKTM -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">No SKTM</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <input type="text" name="NoSktm" id="NoSktm" class="form-control input-sm col-xs-10 col-sm-5" readonly />
                                    </div>
                                </div>
                                <!-- Prolanis PRB -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Prolanis PRB</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <input type="text" name="Prolanis" id="Prolanis" class="form-control input-sm col-xs-10 col-sm-5" readonly />
                                    </div>
                                </div>
                                <!-- Diagnosa Awal -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Diagnosa Awal</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <select type="text" name="DiagAw" id="Diagnosa" style="width:100%;" class="form-control select2 input-sm col-xs-6 col-sm-6">
                                            <!-- @if(isset($edit) && isset($edit->KdICD)) -->
                                            <!-- <option value="{{ $edit->KdICD }}" selected="selected">{{ $edit->DIAGNOSA }}</option> -->
                                            <!-- @else -->
                                            <option value="">-= Diagnosa =-</option>
                                            <!-- @endif -->
                                        </select>
                                    </div>
                                </div>
                                <!-- Catatan -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Catatan</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <textarea class="form-control input-sm col-xs-10 col-sm-5" name="catatan" id="catatan">LABORATORIUM</textarea>
                                    </div>
                                </div>
                                <!-- No SEP -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">No SEP</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <input type="text" name="NoSep" id="NoSep" class="col-xs-6"/>
                                        <button type="button" class="btn btn-success" id="createsep" style="margin-left: 10px;">
                                            <i class="ace-icon fa fa-plus"></i>Create SEP
                                        </button>
                                    </div>
                                </div>
                                <!-- Notifikasi SEP -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Notifikasi SEP</label>
                                    <div class="input-group col-sm-9">
                                        <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                        <input type="text" name="NotifSep" id="NotifSep" class="form-control input-sm col-xs-10 col-sm-5"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><hr></div>
                        <input type="hidden" name="change_keyakinan" id="change_keyakinan">
                        <input type="hidden" name="regold" id="regold">
                        <button type="submit" name="submit" id="submit" class="btn btn-success">Simpan</button>
                        <button type="button" name="printsep" id="printsep" class="btn btn-primary"><i class="fa fa-print"></i> Print SEP</button>
                        <a href="" class="btn btn-warning"><i class="fa fa-check"></i> Baru</a>
                        <button type="button" name="printslip" id="printslip" class="btn btn-primary hidden"><i class="fa fa-print"></i> Print Slip</button>
                        <button type="button" name="printlabel" id="printlabel" class="btn btn-primary hidden"><i class="fa fa-print"></i> Print Label</button>
                        <button type="button" name="printkeyakinan" id="printkeyakinan" class="btn btn-primary hidden"><i class="fa fa-print"></i> Print Keyakinan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL CARI PASIEN -->
    <div class="modal fade bd-example-modal-lg-caripasien"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h5 class="modal-title" id="exampleModalLabel">Cari Data Pasien</h5>
                    </div><hr>
                    <form method="get" id="bd-example-modal-lg-caripasien">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right">Rekam Medis</label>
                                <div class="input-group col-sm-9">
                                    <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                    <input type="text" name="pa_Medrec" id="pa_Medrec" class="form-control input-sm col-xs-10 col-sm-5" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right">Phone</label>
                                <div class="input-group col-sm-9">
                                    <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                    <input type="text" name="pa_Phone" id="pa_Phone" class="form-control input-sm col-xs-10 col-sm-5" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right">Nama Pasien</label>
                                <div class="input-group col-sm-9">
                                    <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                    <input type="text" name="pa_Firstname" id="pa_Firstname" class="form-control input-sm col-xs-10 col-sm-5"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right">Alamat</label>
                                <div class="input-group col-sm-9">
                                    <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                    <input type="text" name="pa_Address" id="pa_Address" class="form-control input-sm col-xs-10 col-sm-5"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right">No BPJS</label>
                                <div class="input-group col-sm-9">
                                    <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                    <input type="text" name="pa_noPeserta" id="pa_noPeserta" class="form-control input-sm col-xs-10 col-sm-5"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right">Tanggal Lahir</label>
                                <div class="input-group col-sm-9">
                                    <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                    <input type="date" name="pa_Tgl_lahir" id="pa_Tgl_lahir" class="form-control input-sm col-xs-10 col-sm-5"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right">Tanggal Daftar</label>
                                <div class="input-group col-sm-9">
                                    <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                    <input type="date" name="date1" id="date1" style="width: 40%" />
                                    <span class="" id="" style="background-color:white; margin-right: 10px;">S/D</span>
                                    <input type="date" name="date2" id="date2" style="width: 40%" />
                                </div>
                            </div>
                        </div>
                        <div class="pull-right"><button type="submit" class="btn btn-info btn-sm" name="cari_pasien"><i class="fa fa-search"></i> Cari</button></div>
                    </form>
                </div>
                <div class="modal-body">
                    <div style="overflow:auto;" id="target_cari_pasien"></div>
                </div>
            </div>
        </div>
    </div><!-- MODAL CARI PASIEN -->
    <!-- HISTORI PASIEN -->
    <div class="modal fade bd-example-modal-lg-histori" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Histori Pasien <span id="nama-message"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div style="overflow:auto;" id="target_table">
                        <table class="table table-bordered" id="table-histori">
                            <thead>
                                <tr>
                                    <th>No Sep</th>
                                    <th>RI/RJ</th>
                                    <th>Poli</th>
                                    <th>Tgl SEP</th>
                                    <th>No Rujukan</th>
                                    <th>Diagnosa</th>
                                    <th>PPK Perujuk</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="11">Tidak ada data</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-loading" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal-loading">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="alert alert-info">Memuat Data.. <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Print -->
    <div class="modal fade" id="modalPrintSurat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Pasien</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="targetPrint"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
<!-- end Modal Print-->
    <!-- MODAL UPDATE KATEGORI -->
    <div class="modal fade bd-example-modal-lg-update-kategori" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <p><u>Data Pasien</u></p>
                        <div class="form-group">
                            <!-- No RM -->
                            <label class="col-sm-3 control-label no-padding-right">No Rekam Medis</label>
                            <div class="input-group col-sm-3">
                                <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                <input type="text" name="kat_NoRM" id="kat_NoRM" class="form-control input-sm col-xs-6 col-sm-6" readonly  value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Nama Pasien -->
                            <label class="col-sm-3 control-label no-padding-right">Nama Pasien</label>
                            <div class="input-group col-sm-9">
                                <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                <input type="text" name="kat_Firstname" id="kat_Firstname" class="form-control input-sm col-xs-6 col-sm-6" readonly placeholder="Nama Pasien" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Kategori Pasien -->
                            <label class="col-sm-3 control-label no-padding-right">Kategori Pasien</label>
                            <div class="input-group col-sm-3">
                                <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                <select type="text" name="kat_Kategori" id="kat_Kategori" style="width:100%;" class="form-control select2 input-sm col-xs-6 col-sm-6">
                                    <option value="">-= Kategori Pasien =-</option>
                                    <?php foreach ($kategori as $key => $k):?>
                                        <option value="<?=$k->KdKategori?>"><?=$k->NmKategori?></option>
                                    <?php endforeach?>
                                </select>
                                <input type="hidden" name="kat_nmKategori" id="kat_nmKategori">
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Group Unit -->
                            <label class="col-sm-3 control-label no-padding-right">Group Unit</label>
                            <div class="input-group col-sm-3">
                                <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                <select type="text" name="GroupUnit" id="GroupUnit" style="width:100%;" class="form-control select2 input-sm col-xs-6 col-sm-6">
                                    <option value="">-= GroupUnit =-</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Input Unit -->
                            <label class="col-sm-3 control-label no-padding-right">Unit</label>
                            <div class="input-group col-sm-9">
                                <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                <select name="Unit" id="Unit" style="width:100%;" class="form-control input-sm col-xs-6 col-sm-6 select2">
                                    <option value="">-= Unit =-</option>
                                    <optgroup id="optUnit"></optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- No Peserta/BPJS -->
                            <label class="col-sm-3 control-label no-padding-right">No Peserta/BPJS</label>
                            <div class="input-group col-sm-3">
                                <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
                                <input type="text" name="kat_NoPeserta" id="kat_NoPeserta" class="form-control input-sm col-xs-6 col-sm-6"/>
                            </div>
                        </div>
                        <input type="submit" name="submit" id="update_kategori" class="btn btn-success" value="Update" />
                    </form>
                </div>
            </div>
        </div>
    </div><!-- MODAL UPDATE KATEGORI -->
    <!-- MODAL PRINT -->
    <div class="modal fade" id="modalPrintSurat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Pasien</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="targetPrint"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
    <!-- MODAL PRINT -->
<script>
    $(document).ready(function(){
        if ($('#Regno').val() != '') {
            search_regno($('#Regno').val());
        }
    });

    $('#GroupUnit').select2({
        placeholder:'-= Group Unit =-',
        allowClear: true,
        ajax: {
            url:"<?=base_url('api/groupunit')?>",
            type:"POST",
            dataType: 'JSON',
            data: function(params) {
                return {
                    q: params.term,
                    offset: (params.page || 0) * 20,
                    kategori: $('#kat_Kategori').val()
                };
            },
            processResults: function(data, params) {
                return {
                    results: data.data.map(function(item){
                        item.id = item.GroupUnit;
                        item.text = item.GroupUnit;
                        return item;
                    }),
                    pagination: {
                        more: data.has_next
                    }
                }
            },
        },

        templateResult: function(item) {
            if(item.loading) {
                return item.text;
            }

            return `
                <p>
                    ${item.GroupUnit}
                </p>
            `;
        },
        escapeMarkup: function(markup) {
            return markup;
        },
        templateSelection: function(item) {
            return item.text;
        },
    });

    $('#Unit').select2({
        placeholder:'-= Unit =-',
        allowClear: true,
        ajax: {
            url:"<?=base_url('api/unit')?>",
            type:"POST",
            dataType: 'JSON',
            data: function(params) {
                return {
                    q: params.term,
                    offset: (params.page || 0) * 20,
                    groupunit: $('#GroupUnit').val()
                };
            },
            processResults: function(data, params) {
                return {
                    results: data.data.map(function(item){
                        item.id = item.NmUnit;
                        item.text = item.NmUnit;
                        return item;
                    }),
                    pagination: {
                        more: data.has_next
                    }
                }
            },
        },

        templateResult: function(item) {
            if(item.loading) {
                return item.text;
            }

            return `
                <p>
                    ${item.NmUnit}
                </p>
            `;
        },
        escapeMarkup: function(markup) {
            return markup;
        },
        templateSelection: function(item) {
            return item.text;
        },
    });

    $('#Diagnosa').select2({
        placeholder:'-= Diagnosa =-',
        allowClear: true,
        ajax: {
            url:"<?=base_url('api/icd10')?>",
            type:"POST",
            dataType: 'JSON',
            data: function(params) {
                return {
                    q: params.term,
                    offset: (params.page || 0) * 20
                };
            },
            processResults: function(data, params) {
                return {
                    results: data.data.map(function(item){
                        item.id = item.KDICD;
                        item.text = item.DIAGNOSA.trim();
                        return item;
                    }),
                    pagination: {
                        more: data.has_next
                    }
                }
            },
        },

        templateResult: function(item) {
            if(item.loading) {
                return item.text;
            }

            return `
                <p>
                    ${item.KDICD} - ${item.DIAGNOSA.trim()}
                </p>
            `;
        },
        escapeMarkup: function(markup) {
            return markup;
        },
        templateSelection: function(item) {
            return item.text;
        },
    });

    $('#poli').select2({
        ajax: {
            url:"<?=base_url('api/poli_tuju')?>",
            type:'post',
            dataType: 'json',
            data: function(params) {
                return {
                    q: params.term,
                    offset: (params.page || 0) * 20
                };
            },
            processResults: function(data, params) {
                return {
                    results: data.data.map(function(item){
                        item.id = item.KdPoli;
                        item.text = item.NMPoli;
                        return item;
                    }),
                    pagination: {
                        more: data.has_next
                    }
                }
            },
        },

        templateResult: function(item) {
            if(item.loading) {
                return item.text;
            }

            return `
                <p>
                   ${item.NMPoli}
                </p>
            `;
        },
        escapeMarkup: function(markup) {
            return markup;
        },
        templateSelection: function(item) {
            return item.text;
        },
    });

    $('#Dokter').select2({
        ajax: {
            url:"<?=base_url('api/dokter')?>",
            type:'post',
            dataType: 'json',
            data: function(params) {
                return {
                    q: params.term,
                    offset: (params.page || 0) * 20,
                    kdpoli:kdPoli
                };
            },
            processResults: function(data, params) {
                return {
                    results: data.data.map(function(item){
                        item.id = item.KdDoc;
                        item.text = item.NmDoc;
                        return item;
                    }),
                    pagination: {
                        more: data.has_next
                    }
                }
            },
        },

        templateResult: function(item) {
            if(item.loading) {
                return item.text;
            }

            return `
                <p>
                   ${item.NmDoc} - ${item.KdDPJP ? item.KdDPJP : ''} 
                </p>
            `;
        },
        escapeMarkup: function(markup) {
            return markup;
        },
        templateSelection: function(item) {
            return item.text;
        },
    });


    let kdPoli = '';
    $('#poli').on('select2:select', function(ev) {
        let data = ev.params.data;
        kdPoli = data.KdPoli;
        $('[name=KdPoliBpjs]').val(data.KdBPJS);
    });

    let KdDPJP = null;
    $('#DokterPengirim').on('select2:select', function(ev){
        KdDPJP = ev.params.data.KdDPJP;
    });

    let polirujukan = '';
    $('#DokterPengirim').select2({
        ajax: {
            url:"<?=base_url('api/dokter_pengirim')?>",
            type:'post',
            dataType: 'json',
            data: function(params) {
                return {
                    q: params.term,
                    offset: (params.page || 0) * 20
                };
            },
            processResults: function(data, params) {
                return {
                    results: data.data.map(function(item){
                        item.id = item.KdDoc;
                        item.text = item.NmDoc;
                        return item;
                    }),
                    pagination: {
                        more: data.has_next
                    }
                }
            },
        },

        templateResult: function(item) {
            if(item.loading) {
                return item.text;
            }

            return `
                <p>
                   ${item.NmDoc} - ${item.KdDPJP ? item.KdDPJP : ''} 
                </p>
            `;
        },
        escapeMarkup: function(markup) {
            return markup;
        },
        templateSelection: function(item) {
            return item.text;
        },
    });

    const select2Bpjs = {
        ajax: { dataType: 'json', },
        templateResult: function(item) { return item.loading ? item.text : `<p>${item.text}</p>`; },
        escapeMarkup: function(markup) { return markup; },
        templateSelection: function(item) { return item.text; },
    };

    function select2VClaimResponse(data, params, success) {

        if(!params.term) {
            return {
                results: [{text: 'Silahkan ketik dahulu', loading: true}],
                pagination: {more: false}
            };
        }
        if(!data || !data.metaData) {
            return {
                results: [{text: '[ERR] Tidak ada respon dari server', loading: true}],
                pagination: {more: false}
            };
        }

        if(data.metaData.code != 200) {
            return {
                results: [{text: data.metaData.message, loading: true}],
                pagination: {more: false}
            };
        }

        return success(data, params);
    }

    $('#Ppk').select2($.extend(true, select2Bpjs, {
        ajax: {
            url: "<?=base_url('bridgingvclaim/faskes')?>",
            data: function(params) {
                return $.extend(params, { faskes: $("input[name=Faskes]:checked").val() });
            },
            processResults: function(data, params) {
                return select2VClaimResponse(data, params, function(data, params) {
                    return {
                        results: data.response.faskes.map(function(item) {
                            return $.extend(item, {
                                id: item.kode,
                                text: item.nama,
                            });
                        }),
                        pagination: {more: false},
                    };
                });
            }
        }
    }));

    $('#Ppk').on("change",function(){ 
        text = $("#Ppk option:selected").text();
        $("#noPpk").val(text);
    });

    $('#btnShowList').on('click', function(ev) {
        ev.preventDefault();
        $.ajax({
            url:"<?= base_url('registrasi/list_pasien_penunjang_klinik')?>",
            type:'POST',
            data:{
                date1: $('#datelist1').val(),
                date2: $('#datelist2').val(),
                medrec: $('#search_medrec').val(),
            },
            beforeSend:function(){
                $('#halaman').html('<div class="alert alert-info">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
            },
            success:function(response){
                $('#halaman').html(response);
            }
        });
    });

    $('#search_medrec').keyup(function(ev) {
        ev.preventDefault();
        $('#btnShowList').click();
    });

    $('#search_no_peserta').submit(function(ev) {
        ev.preventDefault();
        let loading = $('.modal-loading');
        loading.modal('show');
        var getdata = $('input[name=StatusRujuk]:checked').val();
        if (getdata == '0') {
            if ($('#noKartu').val().length == 13) {
                $.ajax({
                    url:"<?=base_url('bridgingvclaim/get_peserta_kartu_bpjs')?>",
                    type:"get",
                    dataType:"json",
                    data:{
                        nopeserta: $('#noKartu').val(),
                    },
                    beforeSend(){
                        loading.modal('show');
                    },
                    success:function(response)
                    {
                        console.log(response);
                        if(response.data.response){
                            if (response.data.response.peserta.mr.noMR == null) {
                                alert("No Rekam Medik tidak ada!");
                                $('#Kunjungan').val('Baru');
                            } else {
                                $('#Medrec').val(response.data.response.peserta.mr.noMR);
                                $('#Notelp').val(response.data.response.peserta.mr.noTelepon);
                                $('#Kunjungan').val('Lama');
                                $('#kat_NoRM').val(response.data.response.peserta.mr.noMR);
                                $('#kat_Firstname').val(response.data.response.peserta.nama);
                            }
                            $('#Kategori').val(2);

                            $('#Firstname').val(response.data.response.peserta.nama);
                            $('#NoIden').val(response.data.response.peserta.nik);
                            $('#pisat').val(response.data.response.peserta.pisa);

                            $('#jatah_kelas').val(response.data.response.peserta.hakKelas.kode);

                            $('#TglDaftar').val(response.data.response.peserta.tglCetakKartu);

                            $('#Bod').val(response.data.response.peserta.tglLahir);

                            var $ppk = $("<option selected></option>").val(response.data.response.peserta.provUmum.kdProvider).text(response.data.response.peserta.provUmum.nmProvider);
                            $('#Ppk').append($ppk).trigger('change');
                            $('#noPpk').val(response.data.response.peserta.provUmum.nmProvider);

                            $('#statusPeserta').val(response.data.response.peserta.statusPeserta.keterangan);

                            $('#Peserta').val(response.data.response.peserta.jenisPeserta.keterangan);
                            $('#kodePeserta').val(response.data.response.peserta.jenisPeserta.kode);

                            if (response.data.response.peserta.sex != null) {
                                $("input[name=KdSex][value=" + response.data.response.peserta.sex.toUpperCase() + "]").attr('checked', 'checked');
                            }

                            $('#Dinsos').val(response.data.response.peserta.informasi.dinsos);
                            $('#NoSktm').val(response.data.response.peserta.informasi.noSKTM);
                            $('#Prolanis').val(response.data.response.peserta.informasi.prolanisPRB);
                            var $penjamin = $("<option selected></option>").val(response.data.response.peserta.cob.noAsuransi).text(response.data.response.peserta.cob.nmAsuransi);
                            $('#Penjamin').append($penjamin).trigger('change');
                            // Panggil histori
                            get_histori($('#noKartu').val());
                            sum_bod(response.data.response.peserta.tglLahir);
                        } else {
                            loading.modal('hide');
                            alert("Tidak ditemukan");
                        }
                    }
                })
            } else if($('#noKartu').val().length < 13) {
                loading.modal('hide');
                alert('No Kartu BPJS kurang dari 13 digit!');
            } else {
                loading.modal('hide');
                alert('No Kartu BPJS lebih dari 13 digit!');
            }
        } else if(getdata == '1') {
            if ($('#noKartu').val().length == 13) {
                $.ajax({
                    url:"<?=base_url('bridgingvclaim/get_rujukan_by_nomor_kartu_pcare')?>",
                    type:"get",
                    dataType:"json",
                    data:{
                        nopeserta: $('#noKartu').val(),
                    },
                    beforeSend(){
                        loading.modal('show');
                    },
                    success:function(response)
                    {
                        console.log(response);
                        if(response.data.response){
                            if (response.data.response.rujukan.peserta.mr.noMR == null) {
                                alert("No Rekam Medik tidak ada!");
                                $('#Kunjungan').val('Baru');
                            }else{
                                $('#Medrec').val(response.data.response.rujukan.peserta.mr.noMR);
                                // $('#btnCari').click();
                                $('#Notelp').val(response.data.response.rujukan.peserta.mr.noTelepon);
                                $('#Kunjungan').val('Lama');
                                $('#kat_NoRM').val(response.data.response.rujukan.peserta.mr.noMR);
                                $('#kat_Firstname').val(response.data.response.rujukan.peserta.nama);
                            }

                            $('#Kategori').val(2);

                            $('#Firstname').val(response.data.response.rujukan.peserta.nama);
                            $('#NoIden').val(response.data.response.rujukan.peserta.nik);
                            $('#pisat').val(response.data.response.rujukan.peserta.pisa);

                            // var $kelas = $("<option selected></option>").val(response.data.response.rujukan.peserta.hakKelas.kode).text(response.data.response.rujukan.peserta.hakKelas.keterangan);
                            $('#jatah_kelas').val(response.data.response.rujukan.peserta.hakKelas.kode);

                            $('#TglDaftar').val(response.data.response.rujukan.peserta.tglCetakKartu);
                            $('#RegRujuk').val(response.data.response.rujukan.tglKunjungan);

                            $('#Bod').val(response.data.response.rujukan.peserta.tglLahir);
                            sum_bod(response.data.response.rujukan.peserta.tglLahir);

                            var $ppk = $("<option selected></option>").val(response.data.response.rujukan.provPerujuk.kode).text(response.data.response.rujukan.provPerujuk.nama);
                            $('#Ppk').append($ppk).trigger('change');
                            $('#noPpk').val(response.data.response.rujukan.provPerujuk.nama);

                            $('#statusPeserta').val(response.data.response.rujukan.peserta.statusPeserta.keterangan);

                            $('#Peserta').val(response.data.response.rujukan.peserta.jenisPeserta.keterangan);
                            $('#kodePeserta').val(response.data.response.rujukan.peserta.jenisPeserta.kode);

                            if (response.data.response.rujukan.peserta.sex != null) {
                                $("input[name=KdSex][value=" + response.data.response.rujukan.peserta.sex.toUpperCase() + "]").attr('checked', 'checked');
                            }

                            if (response.data.response.asalFaskes != null) {
                                $("input[name=Faskes][value=" + response.data.response.asalFaskes + "]").attr('checked', 'checked');
                            }

                            var $pelayanan = $("<option selected></option>").val(response.data.response.rujukan.pelayanan.kode).text(response.data.response.rujukan.pelayanan.nama);
                            $('#pengobatan').append($pelayanan).trigger('change');

                            var $diagnosa = $("<option selected></option>").val(response.data.response.rujukan.diagnosa.kode).text(response.data.response.rujukan.diagnosa.nama);
                            $('#Diagnosa').append($diagnosa).trigger('change');

                            var $poli = $("<option selected></option>").val(response.data.poli_local['KDPoli']).text(response.data.poli_local['NMPoli']);
                            $('#poli').append($poli).trigger('change');
                            $('[name=KdPoliBpjs]').val(response.data.poli_local.KdBPJS);

                            $('#Dinsos').val(response.data.response.rujukan.peserta.informasi.dinsos);
                            $('#NoSktm').val(response.data.response.rujukan.peserta.informasi.noSKTM);
                            $('#Prolanis').val(response.data.response.rujukan.peserta.informasi.prolanisPRB);
                            $('#NoRujuk').val(response.data.response.rujukan.noKunjungan);
                            get_histori($('#noKartu').val());
                        } else {
                            loading.modal('hide');
                            alert("Tidak ditemukan");
                        }
                    }
                })
            } else if($('#noKartu').val().length < 13) {
                loading.modal('hide');
                alert('No Kartu BPJS kurang dari 13 digit!');
            } else {
                loading.modal('hide');
                alert('No Kartu BPJS lebih dari 13 digit!');
            }
        } else if(getdata == '2') {
            if ($('#noKartu').val().length == 13) {
                $.ajax({
                    url:"<?=base_url('bridgingvclaim/get_rujukan_by_nomor_kartu_rs')?>",
                    type:"get",
                    dataType:"json",
                    data:{
                        nopeserta: $('#noKartu').val(),
                    },
                    beforeSend(){
                        loading.modal('show');
                    },
                    success:function(response)
                    {
                        console.log(response);
                        if(response.data.response){
                            if (response.data.response.rujukan.peserta.mr.noMR == null) {
                                alert("No Rekam Medik tidak ada!");
                                $('#Kunjungan').val('Baru');
                            }else{
                                $('#Medrec').val(response.data.response.rujukan.peserta.mr.noMR);
                                // $('#btnCari').click();
                                $('#Notelp').val(response.data.response.rujukan.peserta.mr.noTelepon);
                                $('#Kunjungan').val('Lama');
                                $('#kat_NoRM').val(response.data.response.rujukan.peserta.mr.noMR);
                                $('#kat_Firstname').val(response.data.response.rujukan.peserta.nama);
                            }
                            $('#Kategori').val(2);

                            $('#Firstname').val(response.data.response.rujukan.peserta.nama);
                            $('#NoIden').val(response.data.response.rujukan.peserta.nik);
                            $('#pisat').val(response.data.response.rujukan.peserta.pisa);

                            // var $kelas = $("<option selected></option>").val(response.data.response.rujukan.peserta.hakKelas.kode).text(response.data.response.rujukan.peserta.hakKelas.keterangan);
                            // $('#jatah_kelas').append($kelas).trigger('change');
                            $('#jatah_kelas').val(response.data.response.rujukan.peserta.hakKelas.kode);

                            $('#TglDaftar').val(response.data.response.rujukan.peserta.tglCetakKartu);
                            $('#RegRujuk').val(response.data.response.rujukan.tglKunjungan);

                            $('#Bod').val(response.data.response.rujukan.peserta.tglLahir);
                            sum_bod(response.data.response.rujukan.peserta.tglLahir);

                            var $ppk = $("<option selected></option>").val(response.data.response.rujukan.provPerujuk.kode).text(response.data.response.rujukan.provPerujuk.nama);
                            $('#Ppk').append($ppk).trigger('change');
                            $('#noPpk').val(response.data.response.rujukan.provPerujuk.nama);

                            $('#statusPeserta').val(response.data.response.rujukan.peserta.statusPeserta.keterangan);

                            $('#Peserta').val(response.data.response.rujukan.peserta.jenisPeserta.keterangan);
                            $('#kodePeserta').val(response.data.response.rujukan.peserta.jenisPeserta.kode);

                            if (response.data.response.rujukan.peserta.sex != null) {
                                $("input[name=KdSex][value=" + response.data.response.rujukan.peserta.sex.toUpperCase() + "]").attr('checked', 'checked');
                            }

                            if (response.data.response.asalFaskes != null) {
                                $("input[name=Faskes][value=" + response.data.response.asalFaskes + "]").attr('checked', 'checked');
                            }

                            var $pelayanan = $("<option selected></option>").val(response.data.response.rujukan.pelayanan.kode).text(response.data.response.rujukan.pelayanan.nama);
                            $('#pengobatan').append($pelayanan).trigger('change');

                            var $diagnosa = $("<option selected></option>").val(response.data.response.rujukan.diagnosa.kode).text(response.data.response.rujukan.diagnosa.nama);
                            $('#Diagnosa').append($diagnosa).trigger('change');

                            var $poli = $("<option selected></option>").val(response.data.poli_local['KDPoli']).text(response.data.poli_local['NMPoli']);
                            $('#poli').append($poli).trigger('change');
                            $('[name=KdPoliBpjs]').val(response.data.poli_local.KdBPJS);

                            $('#Dinsos').val(response.data.response.rujukan.peserta.informasi.dinsos);
                            $('#NoSktm').val(response.data.response.rujukan.peserta.informasi.noSKTM);
                            $('#Prolanis').val(response.data.response.rujukan.peserta.informasi.prolanisPRB);
                            $('#NoRujuk').val(response.data.response.rujukan.noKunjungan);

                            // Panggil histori
                            get_histori($('#noKartu').val());
                        } else {
                            loading.modal('hide');
                            alert("Tidak ditemukan");
                        }
                    }
                })
            } else if($('#noKartu').val().length < 13) {
                loading.modal('hide');
                alert('No Kartu BPJS kurang dari 13 digit!');
            } else {
                loading.modal('hide');
                alert('No Kartu BPJS lebih dari 13 digit!');
            }
        }
        loading.modal('hide');
    });

    $('#search_nik').submit(function(ev) {
        ev.preventDefault();
        let loading = $('.modal-loading');
        loading.modal('show');
        if ($('#NoIden').val().length == 16) {
            $.ajax({
                url:"<?=base_url('bridgingvclaim/get_peserta_by_nik')?>",
                type:"get",
                dataType:"json",
                data:{
                    nik: $('#NoIden').val(),
                },
                beforeSend(){
                    loading.modal('show');
                },
                success:function(response)
                {
                    console.log(response);
                    if(response.data.response){
                        if (response.data.response.peserta.mr.noMR == null) {
                            alert("No Rekam Medik tidak ada!");
                            $('#Kunjungan').val('Baru');
                        }else{
                            $('#Medrec').val(response.data.response.peserta.mr.noMR);
                            // $('#btnCari').click();
                            $('#Notelp').val(response.data.response.peserta.mr.noTelepon);
                            $('#Kunjungan').val('Lama');
                            $('#kat_NoRM').val(response.data.response.peserta.mr.noMR);
                            $('#kat_Firstname').val(response.data.response.peserta.nama);
                        }

                        $('#Kategori').val(2);

                        $('#Firstname').val(response.data.response.peserta.nama);
                        $('#NoIden').val(response.data.response.peserta.nik);
                        $('#noKartu').val(response.data.response.peserta.noKartu);
                        $('#pisat').val(response.data.response.peserta.pisa);

                        $('#jatah_kelas').val(response.data.response.peserta.hakKelas.kode);

                        $('#TglDaftar').val(response.data.response.peserta.tglCetakKartu);

                        $('#Bod').val(response.data.response.peserta.tglLahir);
                        sum_bod(response.data.response.peserta.tglLahir);

                        var $ppk = $("<option selected></option>").val(response.data.response.peserta.provUmum.kdProvider).text(response.data.response.peserta.provUmum.nmProvider);
                        $('#Ppk').append($ppk).trigger('change');

                        $('#statusPeserta').val(response.data.response.peserta.statusPeserta.keterangan);

                        $('#Peserta').val(response.data.response.peserta.jenisPeserta.keterangan);

                        if (response.data.response.peserta.sex != null) {
                            $("input[name=KdSex][value=" + response.data.response.peserta.sex.toUpperCase() + "]").attr('checked', 'checked');
                        }
                        var $penjamin = $("<option selected></option>").val(response.data.response.peserta.cob.noAsuransi).text(response.data.response.peserta.cob.nmAsuransi);
                        $('#Penjamin').append($penjamin).trigger('change');

                        $('#Dinsos').val(response.data.response.peserta.informasi.dinsos);
                        $('#NoSktm').val(response.data.response.peserta.informasi.noSKTM);
                        $('#Prolanis').val(response.data.response.peserta.informasi.prolanisPRB);
                        // Panggil histori
                        get_histori(response.data.response.peserta.noKartu);
                        loading.modal('hide');
                    }else{
                        alert('Pasien tidak ada!');
                    }
                }
            })
        } else if($('#NoIden').val().length < 16) {
            loading.modal('hide');
            alert('Nik kurang dari 16 digit');
        } else {
            loading.modal('hide');
            alert('Nik lebih dari 16 digit');
        }
        loading.modal('hide');
    });

    $('#search_noRujukan').submit(function(ev) {
        ev.preventDefault();
        let loading = $('.modal-loading');
        loading.modal('show');
        var getdata = $('input[name=StatusRujuk]:checked').val();
        if (getdata == '1') {
            if ($('#NoRujuk').val().length == 19) {
                $.ajax({
                    url: "<?=base_url('bridgingvclaim/get_rujukan_by_faskes_pcare')?>",
                    type:"get",
                    dataType:"json",
                    data:{
                        noRujukan: $('#NoRujuk').val(),
                    },
                    beforeSend(){
                        loading.modal('show');
                    },
                    success:function(response)
                    {
                        console.log(response);
                        loading.modal('hide');
                        if(response.data.response){

                            if (response.data.response.rujukan.peserta.mr.noMR == null) {
                                alert("No Rekam Medik tidak ada!");
                                $('#Kunjungan').val('Baru');
                            }else{
                                $('#Medrec').val(response.data.response.rujukan.peserta.mr.noMR);
                                // $('#btnCari').click();
                                $('#Notelp').val(response.data.response.rujukan.peserta.mr.noTelepon);
                                $('#Kunjungan').val('Lama');
                                $('#kat_NoRM').val(response.data.response.rujukan.peserta.mr.noMR);
                                $('#kat_Firstname').val(response.data.response.rujukan.peserta.nama);
                            }

                            $('#Kategori').val(2);

                            $('#Firstname').val(response.data.response.rujukan.peserta.nama);
                            $('#NoIden').val(response.data.response.rujukan.peserta.nik);
                            $('#pisat').val(response.data.response.rujukan.peserta.pisa);
                            $('#noKartu').val(response.data.response.rujukan.peserta.noKartu);
                            $(`input[name=Faskes][value=${response.data.response.asalFaskes}]`).prop('checked', true);

                            $('#jatah_kelas').val(response.data.response.rujukan.peserta.hakKelas.kode);

                            $('#TglDaftar').val(response.data.response.rujukan.peserta.tglCetakKartu);

                            $('#Bod').val(response.data.response.rujukan.peserta.tglLahir);
                            sum_bod(response.data.response.rujukan.peserta.tglLahir);
                            $('#RegRujuk').val(response.data.response.rujukan.tglKunjungan);

                            var $ppk = $("<option selected></option>").val(response.data.response.rujukan.provPerujuk.kode).text(response.data.response.rujukan.provPerujuk.nama);
                            $('#Ppk').append($ppk).trigger('change');

                            $('#statusPeserta').val(response.data.response.rujukan.peserta.statusPeserta.keterangan);

                            $('#Peserta').val(response.data.response.rujukan.peserta.jenisPeserta.keterangan);

                            if (response.data.response.rujukan.peserta.sex != null) {
                                $("input[name=KdSex][value=" + response.data.response.rujukan.peserta.sex.toUpperCase() + "]").attr('checked', 'checked');
                            }

                            var $poli = $("<option selected></option>").val(response.data.poli_local.KDPoli).text(response.data.poli_local.NMPoli);
                            $('#poli').append($poli).trigger('change');
                            $('[name=KdPoliBpjs]').val(response.data.poli_local.KdBPJS);

                            $('#Dinsos').val(response.data.response.rujukan.peserta.informasi.dinsos);
                            $('#NoSktm').val(response.data.response.rujukan.peserta.informasi.noSKTM);
                            $('#Prolanis').val(response.data.response.rujukan.peserta.informasi.prolanisPRB);

                            var $diagnosa = $("<option selected></option>").val(response.data.response.rujukan.diagnosa.kode).text(response.data.response.rujukan.diagnosa.nama);
                            $('#Diagnosa').append($diagnosa).trigger('change');

                            var $pengobatan = $("<option selected></option>").val(response.data.response.rujukan.pelayanan.kode).text(response.data.response.rujukan.pelayanan.nama);
                            $('#pengobatan').append($pengobatan).trigger('change');
                            get_histori(response.data.response.rujukan.peserta.noKartu);
                        }else{
                            loading.modal('hide');
                            alert('Pasien tidak ada!');
                        }
                    }
                });
            } else if($('#NoRujuk').val().length < 19) {
                loading.modal('hide');
                alert('No Rujukan kurang dari 19 dikit');
            } else{
                loading.modal('hide');
                alert('Gagal');
            }
        } else if (getdata == '2') {
            if ($('#NoRujuk').val().length == 19) {
                $.ajax({
                    url: "<?=base_url('bridgingvclaim/get_rujukan_by_faskes_pcare')?>",
                    type:"get",
                    dataType:"json",
                    data:{
                        noRujukan: $('#NoRujuk').val(),
                        faskes: true,
                    },
                    beforeSend(){
                        loading.modal('show');
                    },
                    success:function(response)
                    {
                        loading.modal('hide');
                        console.log(response);
                        if(response.data.response){
                            if (response.data.response.rujukan.peserta.mr.noMR == null) {
                                alert("No Rekam Medik tidak ada!");
                                $('#Kunjungan').val('Baru');
                            }else{
                                $('#Medrec').val(response.data.response.rujukan.peserta.mr.noMR);
                                // $('#btnCari').click();
                                $('#Notelp').val(response.data.response.rujukan.peserta.mr.noTelepon);
                                $('#Kunjungan').val('Lama');
                                $('#kat_NoRM').val(response.data.response.rujukan.peserta.mr.noMR);
                                $('#kat_Firstname').val(response.data.response.rujukan.peserta.nama);
                            }
                            $('#Kategori').val(2);

                            $('#Firstname').val(response.data.response.rujukan.peserta.nama);
                            $('#NoIden').val(response.data.response.rujukan.peserta.nik);
                            $('#pisat').val(response.data.response.rujukan.peserta.pisa);
                            $('#noKartu').val(response.data.response.rujukan.peserta.noKartu);
                            $('#RegRujuk').val(response.data.response.rujukan.tglKunjungan);
                            $(`input[name=Faskes][value=${response.data.response.asalFaskes}]`).prop('checked', true);

                            $('#jatah_kelas').val(response.data.response.rujukan.peserta.hakKelas.kode);

                            $('#TglDaftar').val(response.data.response.rujukan.peserta.tglCetakKartu);
                            sum_bod(response.data.response.rujukan.peserta.tglLahir);

                            $('#Bod').val(response.data.response.rujukan.peserta.tglLahir);

                            var $ppk = $("<option selected></option>").val(response.data.response.rujukan.provPerujuk.kode).text(response.data.response.rujukan.provPerujuk.nama);
                            $('#Ppk').append($ppk).trigger('change');

                            $('#statusPeserta').val(response.data.response.rujukan.peserta.statusPeserta.keterangan);

                            $('#Peserta').val(response.data.response.rujukan.peserta.jenisPeserta.keterangan);

                            if (response.data.response.rujukan.peserta.sex != null) {
                                $("input[name=KdSex][value=" + response.data.response.rujukan.peserta.sex.toUpperCase() + "]").attr('checked', 'checked');
                            }

                            var $poli = $("<option selected></option>").val(response.data.poli_local.KDPoli).text(response.data.poli_local.NMPoli);
                            $('#poli').append($poli).trigger('change');
                            $('[name=KdPoliBpjs]').val(response.data.poli_local.KdBPJS);

                            polirujukan = response.data.response.rujukan.poliRujukan;
                            if (response.data.response.rujukan.poliRujukan.kode) {
                                $('#DokterPengirim').prop('readonly', false);
                            }

                            $('#Dinsos').val(response.data.response.rujukan.peserta.informasi.dinsos);
                            $('#NoSktm').val(response.data.response.rujukan.peserta.informasi.noSKTM);
                            $('#Prolanis').val(response.data.response.rujukan.peserta.informasi.prolanisPRB);

                            var $diagnosa = $("<option selected></option>").val(response.data.response.rujukan.diagnosa.kode).text(response.data.response.rujukan.diagnosa.nama);
                            $('#Diagnosa').append($diagnosa).trigger('change');

                            var $pengobatan = $("<option selected></option>").val(response.data.response.rujukan.pelayanan.kode).text(response.data.response.rujukan.pelayanan.nama);
                            $('#pengobatan').append($pengobatan).trigger('change');
                            get_histori(response.data.response.rujukan.peserta.noKartu);
                        }else{
                            loading.modal('hide');
                            alert('Pasien tidak ada!');
                        }
                    }
                });
            } else if($('#NoRujuk').val().length < 19) {
                loading.modal('hide');
                alert('No Rujukan kurang dari 19 dikit');
            } else{
                loading.modal('hide');
                alert('Gagal');
            }
        } else {
            alert('Pilih terlebih dahulu status rujukan');
        }
        loading.modal('hide');
    });

    $('#search_nosurat').submit(function(ev) {
        ev.preventDefault();
        let loading = $('.modal-loading');
        loading.modal('show');
        $.ajax({
            url:"{{ route('reg-bpjs-daftar.find-surat') }}",
            type:"get",
            dataType:"json",
            data:{
                nosurat: $('#NoSuratKontrol').val(),
            },
            success:function(response){
                console.log(response);
                $('#Medrec').val(response.Medrec);
                $('#Firstname').val(response.Firstname.toUpperCase());
                $('#Notelp').val(response.Phone);
                $('#Bod').val(response.Bod.substring(0,10));
                $('#TglDaftar').val(response.TglDaftar.substring(0,10));
                $('#NoIden').val(response.NoIden);
                $('#Sex').val(response.Sex);
                $('#UmurHari').val(response.UmurHr);
                $('#UmurBln').val(response.UmurBln);
                $('#UmurThn').val(response.UmurThn);
                $('#NoRujuk').val(response.NoRujukan);
                $('#RegRujuk').val(response.TanggalRujukan.substring(0,10));

                var $kategori = $("<option selected></option>").val(response.Kategori).text(response.NmKategori);
                $('#Kategori').append($kategori).trigger('change');

                // var $dokter = $("<option selected></option>").val(response.KdDoc).text(response.NmDoc);
                // $('#Dokter').append($dokter).trigger('change');

                var $poli = $("<option selected></option>").val(response.KdPoli).text(response.NMPoli);
                $('#poli').append($poli).trigger('change');

                if (response.KdSex != null) {
                    $("input[name=KdSex][value=" + response.KdSex.toUpperCase() + "]").attr('checked', 'checked');
                }

                // Masukan buat update kategori
                $('#kat_NoRM').val(response.Medrec);
                $('#kat_Firstname').val(response.Firstname);
                $('#kat_NoPeserta').val(response.AskesNo);
                var $ka_kategori = $("<option selected></option>").val(response.Kategori).text(response.NmKategori);
                $('#kat_Kategori').append($ka_kategori).trigger('change');

                var $groupUnit = $("<option selected></option>").val(response.GroupUnit).text(response.GroupUnit);
                $('#GroupUnit').append($groupUnit).trigger('change');

                var $unit = $("<option selected></option>").val(response.NmUnit).text(response.NmUnit);
                $('#Unit').append($unit).trigger('change');

                // Tambah Keyakinan
                $('#ke_NoRM').val(response.Medrec);
                $('#ke_Firstname').val(response.Firstname);
                $('input[name=pantang][value=' + response.phcek + ']').attr('checked', 'checked');
                $('#pantangNote').val(response.phnote);
                $('input[name=tindakan][value=' + response.ptcek + ']').attr('checked', 'checked');
                $('#tindakanNote').val(response.ptnote);
                $('input[name=makan][value=' + response.pmcek + ']').attr('checked', 'checked');
                $('#makanNote').val(response.pmnote);
                $('input[name=pantangPerawatan][value=' + response.ppcek + ']').attr('checked', 'checked');
                $('#pantangPerawatanNote').val(response.ppnote);
                $('#lain').val(response.lain);
                loading.modal('hide');
            }
        })
        loading.modal('hide');
    });

    $('#btnCari').on("click", function(ev){
        ev.preventDefault();
        let btn = $('#btnCari');
        let oldText = btn.html();
        btn.html('<i class="fa fa-spin fa-spinner"></i> ' + btn.text());
        btn.prop('disabled', true);
        $.ajax({
            url:"<?= base_url('registrasi/pasien_by_rm')?>",
            type:"post",
            dataType:"json",
            data:{
                medrec: $('#Medrec').val(),
            },
            error: function(response){
                btn.prop('disabled', false);
                btn.html(oldText);
                alert('Gagal menambahkan/server down, Silahkan coba lagi');
            },
            success:function(response)
            {
                console.log(response);
                if(response.status){
                    var today = new Date();
                    btn.prop('disabled', false);
                    btn.html(oldText);

                    $('#Firstname').val(response.data.Firstname.toUpperCase());
                    $('#Notelp').val(response.data.Phone);
                    $('#Bod').val(response.data.Bod.substring(0,10));
                    $('#TglDaftar').val(response.data.TglDaftar.substring(0,10));
                    $('#NoIden').val(response.data.NoIden);
                    $('#Sex').val(response.data.Sex);
                    $('#UmurHari').val(response.data.UmurHr);
                    $('#UmurBln').val(response.data.UmurBln);
                    $('#UmurThn').val(response.data.UmurThn);
                    $('#noKartu').val(response.data.AskesNo);
                    if (response.data.Kunjungan != '') {
                        $('#Kunjungan').val('Lama');
                    } else {
                        $('#Kunjungan').val('Baru');
                    }

                    var $kategori = $("<option selected></option>").val(response.data.Kategori).text(response.data.NmKategori);
                    $('#Kategori').append($kategori).trigger('change');

                    if (response.data.KdSex != null) {
                        $("input[name=KdSex][value=" + response.data.KdSex.toUpperCase() + "]").attr('checked', 'checked');
                    }

                    // Masukan buat update kategori
                    $('#kat_NoRM').val(response.data.Medrec);
                    $('#kat_Firstname').val(response.data.Firstname);
                    $('#kat_NoPeserta').val(response.data.AskesNo);
                    var $ka_kategori = $("<option selected></option>").val(response.data.Kategori).text(response.data.NmKategori);
                    $('#kat_Kategori').append($ka_kategori).trigger('change');

                    var $groupUnit = $("<option selected></option>").val(response.data.GroupUnit).text(response.data.GroupUnit);
                    $('#GroupUnit').append($groupUnit).trigger('change');

                    var $unit = $("<option selected></option>").val(response.data.NmUnit).text(response.data.NmUnit);
                    $('#Unit').append($unit).trigger('change');

                    // Tambah Keyakinan
                    $('#ke_NoRM').val(response.data.Medrec);
                    $('#ke_Firstname').val(response.data.Firstname);
                    $('input[name=pantang][value=' + response.data.phcek + ']').attr('checked', 'checked');
                    $('#pantangNote').val(response.data.phnote);
                    $('input[name=tindakan][value=' + response.data.ptcek + ']').attr('checked', 'checked');
                    $('#tindakanNote').val(response.data.ptnote);
                    $('input[name=makan][value=' + response.data.pmcek + ']').attr('checked', 'checked');
                    $('#makanNote').val(response.data.pmnote);
                    $('input[name=pantangPerawatan][value=' + response.data.ppcek + ']').attr('checked', 'checked');
                    $('#pantangPerawatanNote').val(response.data.ppnote);
                    $('#lain').val(response.data.lain);
                    // Menghitung umur
                    sum_bod(response.data.Bod.substring(0,10));
                }else{
                    btn.prop('disabled', false);
                    btn.html(oldText);
                    alert('Pasien tidak ada!');
                }
            }
        })
    });

    let janji = null;
    $('#Perjanjian').click(function() {
        janji = $('#Perjanjian').prop('checked');
    });

    $("#submit").on("click",function(e){
        e.preventDefault();
        let loading = $('.modal-loading');
        loading.modal('show');

        var h2 = $('#Regdate').val();

        if ($('#pengobatan').val() == '') {
            alert('Pilih Tujuan!');
        } else if($('#poli').val() == '') {
            alert('Pilih Poli!');
        } else if($('#Kategori').val() == '') {
            alert('Silahkan pilih kategori atau segera update kategori');
        } else if(($('input[name=KdSex]:checked').length) <= 0 ) {
            alert('Pilih jenis kelamin Pasien');
        }else{
            $.ajax({
                url:"<?=base_url('registrasi/post')?>",
                type:"post",
                dataType:"json",
                data:{
                    Regno: $('#Regno').val(),
                    Medrec: $('#Medrec').val(),
                    Firstname: $('#Firstname').val(),
                    Regdate: $('#Regdate').val(),
                    Regtime: $('#Regtime').val(),
                    KdCbayar: $('#cara_bayar').val(),
                    Penjamin: $('[name=Penjamin]').val(),
                    noKartu: $('#noKartu').val(),
                    KdTuju: $('#pengobatan').val(),
                    KdPoli: $('#poli').val(),
                    DocRS: $('#DokterPengirim').val(),
                    Kunjungan: $('#Kunjungan').val(),
                    UmurThn: $('#UmurThn').val(),
                    UmurBln: $('#UmurBln').val(),
                    UmurHari: $('#UmurHari').val(),
                    Bod: $('#Bod').val(),
                    NomorUrut: $('#NomorUrut').val(),
                    KategoriPasien: $('#Kategori').val(),
                    NoSep: $('#NoSep').val(),
                    DiagAw: $('#Diagnosa').val(),
                    KdSex: $('input[name=KdSex]:checked').val(),
                    pisat: $('#pisat').val(),
                    GroupUnit: $('#GroupUnit').val(),
                    Keterangan: $('#Keterangan').val(),
                    NoRujuk: $('#NoRujuk').val(),
                    RegRujuk: $('#RegRujuk').val(),
                    noPpk: $('#noPpk').val(),
                    Ppk: $('#Ppk').val(),
                    kodePeserta: $('#kodePeserta').val(),
                    Peserta: $('#Peserta').val(),
                    JatKelas: $('#jatah_kelas').val(),
                    NotifSep: $('#NotifSep').val(),
                    KasKe: $('input[name=KasKe]:checked').val(),
                    NoIden: $('#NoIden').val(),
                    statusPeserta: $('#statusPeserta').val(),
                    Faskes: $('input[name=Faskes]:checked').val(),
                    Notelp: $('#Notelp').val(),
                    Cob: $('input[name=Cob]:checked').val(),
                    Keyakinan: $('#change_keyakinan').val(),
                    Prolanis: $('#Prolanis').val(),
                    Perjanjian: janji,
                    asalRujukan: $('[name=Faskes]').val(),
                    KdDPJP: $('#DokterPengirim').val(),
                    kdrujuk: $('#NoRujuk').val(),
                    nokontrol: $('#NoSuratKontrol').val(),
                    idregold: $('[name=regold]').val(),
                    catatan: $('#catatan').val()
                },beforeSend(){
                    loading.modal('show');
                },error: function(response){
                    alert('Gagal menambahkan/server down, Silahkan coba lagi');
                    loading.modal('hide');
                },
                success:function(response)
                {
                    console.log(response);
                    
                    $('#Regno').val(response.Regno);
                    $('#NomorUrut').val(response.NomorUrut);
                    // alert('sedang dalam perbaikan 30mnt/ selain fisio terapi pasien masuk');
                    pesan = response.message + "\n" +
                            "Pasien " + response.Firstname + "\n" +
                            "Antrian aplikasi baru " + response.NomorUrut;
                    alert(pesan);
                    loading.modal('hide');
                    if (response.NoSep != '') {
                        search_sep(response.NoSep);
                    }
                }
            });
        }
        loading.modal('hide');
    });

    $('#printsep').on("click", function() {
        let loading = $('.modal-loading');
        loading.modal('show');
        if ($('#Regno').val() == '') {
            alert('Simpan terlebih dahulu');
            loading.modal('hide');
        }else if ($('#NoSep').val() == '') {
            alert('No SEP Kosong');
            loading.modal('hide');
        }else {
            $.ajax({
                url:"<?=base_url('registrasi/print_sep')?>",
                type:"get",
                dataType:"html",
                data:{
                    Regno: $('#Regno').val(),
                },
                beforeSend(){
                    loading.modal('show');
                },error: function(response){
                    alert('Gagal, Silahkan coba lagi');
                    loading.modal('hide');
                },
                success:function(data)
                {    
                    $('#modalPrintSurat').modal('show');
                    $('#targetPrint').html(data);
                    setTimeout(function () {
                        $('#targetPrint').printElement();
                    }, 1000);
                    // var w = window.open();
                    // w.document.write("<iframe width='100%' height='100%' src='data:application/pdf;base64, " + encodeURI(data)+"'></iframe>");
                    // $(w.document.body).html(data);
                    // window.open(data);
                    // w.html();
                }
            });
        }
        loading.modal('hide');
    });

    $('#createsep').on("click", function(){
        let btn = $('#createsep');
        let oldText = btn.html();
        btn.html('<i class="fa fa-spin fa-spinner"></i> ' + btn.text());
        btn.prop('disabled', true);
        let loading = $('.modal-loading');
        let nosurat = $('#NoSuratKontrol').val();
        loading.modal('show');
        if ($('#Medrec').val() == '') {
            alert('No Rekam Medis Kosong');
        } else if ($('#noKartu').val() == '') {
            alert('No Kartu Kosong');
        } else if(($('input[name=KdSex]:checked').length) <= 0 ) {
            alert('Silahkan pilih jenis kelamin');
        } else if($('#jatah_kelas').val() == '') {
            alert('Silahkan pilih jatah kelas');
        } else if($('#Notelp').val() == '') {
            alert('No Telepon kosong');
        } else {
            $.ajax({
                url: "<?=base_url('bridgingvclaim/create_sep')?>",
                type:"post",
                dataType:"json",
                data:{
                    noMR: $('#Medrec').val(),
                    noKartu: $('#noKartu').val(),
                    tglSep: $('#Regdate').val(),
                    ppkPelayanan: $('#Ppk').val(),
                    jnsPelayanan: $('#pengobatan').val(),
                    klsRawat: $('#jatah_kelas').val(),
                    asalRujukan: $('[name=Faskes]:checked').val(),
                    tglRujukan: $('#RegRujuk').val(),
                    noRujukan: $('#NoRujuk').val(),
                    ppkRujukan: $('#Ppk').val(),
                    catatan: $('#catatan').val(),
                    diagAwal: $('#Diagnosa').val(),
                    tujuan: $('#poli').val(),
                    eksekutif: $('#eksekutif').val(),
                    cob: $('[name=Cob]').val(),
                    katarak: $('[name=Katarak]').val(),
                    lakaLantas: $('[name=KasKe]:checked').val(),
                    penjamin: $('[name=Penjamin]').val(),
                    tglKejadian: $('#RegdKej').val(),
                    keterangan: $('#Keterangan').val(),
                    suplesi: $('[name=Suplesi]').val(),
                    noSepSuplesi: $('#NoSepSup').val(),
                    kdPropinsi: $('#Provinsi').val(),
                    kdKabupaten: $('#Kabupaten').val(),
                    kdKecamatan: $('#Kecamatan').val(),
                    noSurat: nosurat.substring(0, 6),
                    kodeDPJP: $('#DokterPengirim').val(),
                    noTelp: $('#Notelp').val(),
                },
                success:function(response)
                {
                    loading.modal('hide');
                    console.log(response);
                    if(response.metaData.code != '200'){
                        $('#NotifSep').val(response.metaData.message);
                        alert(response.metaData.message);
                    }else{
                        // Panggil histori
                        get_histori($('#noKartu').val());
                        alert(response.metaData.message);
                        $('#NoSep').val(response.response.sep.noSep);
                        $('#NotifSep').val(response.metaData.message);
                        $('#submit').click();
                    }
                }
            });
        }
        loading.modal('hide');
        btn.prop('disabled', false);
        btn.html(oldText);
    });

    $('#kat_Kategori').on("change",function(){
        text = $("#kat_Kategori option:selected").text();
        $("#kat_nmKategori").val(text);
    });

    $('#update_kategori').on("click", function(ev) {
        ev.preventDefault();
        if ($('#kat_NoRM').val() != '') {
            $.ajax({
                url:"<?=base_url('registrasi/change_kategori')?>",
                type:"post",
                dataType:"json",
                data:{
                    Medrec: $('#kat_NoRM').val(),
                    AskesNo: $('#kat_NoPeserta').val(),
                    GroupUnit: $('#GroupUnit').val(),
                    NmUnit: $('#Unit').val(),
                    Kategori: $('#kat_Kategori').val()
                }
            });
            alert('Berhasil diupdate');
            var $kat_kategori = $("<option selected></option>").val($('#kat_Kategori').val()).text($('#kat_nmKategori').val());
            $('#Kategori').append($kat_kategori).trigger('change');
            $('#noKartu').val($('#kat_NoPeserta').val());
            $('.bd-example-modal-lg-update-kategori').modal('hide');
        } else {
            alert('No Rekam Medic tidak boleh kosong');
        }
    });

    $('#printkeyakinan').on("click", function(ev) {
        ev.preventDefault();
        let loading = $('.modal-loading');
        loading.modal('show');
        if ($('#Medrec').val() != '') {
            $.ajax({
                url:"{{ route('keyakinan-print') }}",
                type:"get",
                dataType:"html",
                data:{
                    medrec: $('#Medrec').val(),
                },
                success: function(response)
                {
                    loading.modal('hide');
                    $('#modalPrintSurat').modal('show');
                    $('#targetPrint').html(response);
                    $('#targetPrint').printElement();
                    // var w = window.open();
                    // w.document.write("<iframe width='100%' height='100%' src='data:application/pdf;base64, " + encodeURI(response)+"'></iframe>");
                    // $(w.document.body).html(response);
                }
            });
        } else {
            alert('No Rekam Medis kosong!');
            loading.modal('hide');
        }
        loading.modal('hide');
    });

    $('#printslip').on("click", function(ev) {
        ev.preventDefault();
        let loading = $('.modal-loading');
        loading.modal('show');
        if ($('#Regno').val() != '') {
            $.ajax({
                url:"{{ route('file-status-keluar-slip') }}",
                type:"get",
                dataType:"html",
                data:{
                    noRegno: $('#Regno').val(),
                },
                success: function(response)
                {
                    loading.modal('hide');
                    var w = window.open();
                    // $(w.document.body).html(response);

                    // window.open(response);
                    w.document.write("<iframe width='100%' height='100%' src='data:application/pdf;base64, " + encodeURI(response)+"'></iframe>");
                    // $(w.document.body).html("<iframe src='data:application/pdf;base64, " + encodeURI(response)+"'></iframeresponse");
                }
            });
        } else {
            alert('No Registrasi kosong!');
            loading.modal('hide');
        }
        loading.modal('hide');
    });

    $('#printlabel').on("click", function(ev) {
        ev.preventDefault();
        let loading = $('.modal-loading');
        loading.modal('show');
        if ($('#Regno').val() != '') {
            $.ajax({
                url:"{{ route('file-status-keluar-label') }}",
                type:"get",
                dataType:"html",
                data:{
                    RegnoStatus: $('#Regno').val(),
                },
                success: function(response)
                {
                    $('#modalPrintSurat').modal('show');
                    $('#targetPrint').html(response);
                    setTimeout(function () {
                        $('#targetPrint').printElement();
                    }, 1000);
                }
            });
        } else {
            alert('No Registrasi kosong!');
            loading.modal('hide');
        }
        loading.modal('hide');
    });

    // Ngitung Umur
    $('#Bod').on("change",function(){
        var today = new Date();
        var bod = $('#Bod').val();
        var age = "";
        var month = Number(bod.substr(5,2));
        var day = Number(bod.substr(8,2));

        // Get Year
        age = today.getFullYear() - bod.substring(0,4);
        if (today.getMonth() < (month - 1)) {
            age--;
        }
        if (((month - 1) == today.getMonth()) && (today.getDate() < day)) {
            age--;
        }
        $('#UmurThn').val(age);

        // Get Month
        var calMonth = (today.getMonth()+1)-month;
        if ( calMonth < 0) {
            if (calMonth < 0) {
                var generateMonth = calMonth+12;
                $('#UmurBln').val(generateMonth);
            }else{
                $('#UmurBln').val(calMonth);
            }
        }else{
            // var valMonth = today.getMonth() - month;
            
            $('#UmurBln').val(calMonth);
        }

        // Get Day
        var callDay = today.getDate()-day;
        if ( callDay < 0) {
            if (callDay < 0) {
                var generateDay = callDay+30;
                $('#UmurHari').val(generateDay);
            }else{
                $('#UmurHari').val(callDay);
            }
        }else{
            // var valMonth = today.getMonth() - month;
            
            $('#UmurHari').val(callDay);
        }

    });

    function sum_bod(age) {
        var today = new Date();
        var bod = age;
        var age = "";
        var month = Number(bod.substr(5,2));
        var day = Number(bod.substr(8,2));

        // Get Year
        age = today.getFullYear() - bod.substring(0,4);
        if (today.getMonth() < (month - 1)) {
            age--;
        }
        if (((month - 1) == today.getMonth()) && (today.getDate() < day)) {
            age--;
        }
        $('#UmurThn').val(age);

        // Get Month
        var calMonth = (today.getMonth()+1)-month;
        if ( calMonth < 0) {
            if (calMonth < 0) {
                var generateMonth = calMonth+12;
                $('#UmurBln').val(generateMonth);
            }else{
                $('#UmurBln').val(calMonth);
            }
        }else{
            // var valMonth = today.getMonth() - month;
            
            $('#UmurBln').val(calMonth);
        }

        // Get Day
        var callDay = today.getDate()-day;
        if ( callDay < 0) {
            if (callDay < 0) {
                var generateDay = callDay+30;
                $('#UmurHari').val(generateDay);
            }else{
                $('#UmurHari').val(callDay);
            }
        }else{
            // var valMonth = today.getMonth() - month;
            
            $('#UmurHari').val(callDay);
        }
    }

    function get_histori(no_kartu_pasien) {
        // get histori peserta
        $.get('<?= base_url('bridgingvclaim/histrori_pasien')?>', {
            no_kartu: no_kartu_pasien,
            tanggal_mulai: '1990-01-01',
            tanggal_akhir: '2024-01-01',
        })
        .always(function() {
            
        })
        .fail(function() {
            alert('[ERR] Gagal mendapatkan data dari server');
        })
        .done(function(res) {
            if(!res || !res.metaData) {
                return alert('Tidak ada respon dari server');
            }
            else if(res.metaData.code != 200) {
                return alert('Histori: ' + res.metaData.message);
            }
            console.log(res);

            let data = res.response.histori;
            $('#table-histori tbody').html('');
            data.forEach(function(item) {
                $('#table-histori tbody').append(`
                    <tr>
                        <td>${item.noSep}</td>
                        <td>${item.jnsPelayanan == 1 ? 'Rawat Inap' : (item.jnsPelayanan == 2 ? 'Rawat Jalan' : '')}</td>
                        <td>${item.poli}</td>
                        <td>${item.tglSep}</td>
                        <td>${item.noRujukan}</td>
                        <td>${item.diagnosa}</td>
                        <td>${item.ppkPelayanan}</td>
                    </tr>
                    `);
            });
        });
    }

    function search_sep(nosep) {
        $.get('<?= base_url('bridgingvclaim/get_sep_pasien')?>', {
            nosep: nosep,
        })
        .always(function() {
            
        })
        .fail(function() {
            alert('[ERR] Gagal mendapatkan data dari server');
        })
        .done(function(res) {
            if(!res || !res.metaData) {
                return alert('Tidak ada respon dari server');
            } else if(res.metaData.code != 200) {
                return alert('Histori: ' + res.metaData.message);
            } else {
                console.log(res);

                $('#printsep').click();
            }

        });   
    }

    function search_regno(regno) {
        $.ajax({
            url:"<?= base_url('registrasi/search_regno')?>",
            type:"get",
            data:{
                regno: regno,
            },
            success: function(response)
            {
                console.log(response);
                $('#Kunjungan').val('Lama');
                $('#Medrec').val(response.data.Medrec);
                $('#Notelp').val(response.data.phone);
                $('#kat_NoRM').val(response.data.Medrec);
                $('#kat_Firstname').val(response.data.Firstname);
                $('#Kategori').val(response.data.Kategori);
                $('#Regdate').val(response.data.Regdate.substring(0,10));
                $('#NomorUrut').val(response.data.NomorUrut);

                $('#Firstname').val(response.data.Firstname);
                $('#NoIden').val(response.data.nikktp);
                $('#pisat').val(response.data.Pisat);
                $('#noKartu').val(response.data.NoPeserta);
                $('#RegRujuk').val(response.data.TglRujuk.substring(0,10));
                $(`input[name=Faskes][value=${response.data.AsalRujuk}]`).prop('checked', true);

                $('#jatah_kelas').val(response.data.NmKelas);

                $('#TglDaftar').val(response.data.TglDaftar.substring(0,10));

                $('#Bod').val(response.data.Bod.substring(0,10));
                sum_bod(response.data.Bod.substring(0,10));

                var $ppk = $("<option selected></option>").val(response.data.KdRujukan).text(response.data.NmRujukan);
                $('#Ppk').append($ppk).trigger('change');

                $('#statusPeserta').val(response.data.StatPeserta);

                $('#Peserta').val(response.data.NmRefPeserta);

                if (response.data.KdSex != null) {
                    $("input[name=KdSex][value=" + response.data.KdSex.toUpperCase() + "]").attr('checked', 'checked');
                }

                var $poli = $("<option selected></option>").val(response.data.KdPoli).text(response.data.NMPoli);
                $('#poli').append($poli).trigger('change');
                // $('[name=KdPoliBpjs]').val(response.data.poli_local.KdBPJS);

                $('#NoSuratKontrol').val(response.data.NoKontrol);
                var $dokterpengirim = $("<option selected></option>").val(response.data.KdDoc).text(response.data.NmDoc);
                $('#DokterPengirim').append($dokterpengirim).trigger('change');
                // polirujukan = response.data.response.rujukan.poliRujukan;
                // if (response.data.response.rujukan.poliRujukan.kode) {
                //     $('#DokterPengirim').prop('readonly', false);
                // }

                // $('#Dinsos').val(response.data.response.rujukan.peserta.informasi.dinsos);
                // $('#NoSktm').val(response.data.response.rujukan.peserta.informasi.noSKTM);
                $('#Prolanis').val(response.data.Prolanis);

                var $diagnosa = $("<option selected></option>").val(response.data.KdIcd).text(response.data.DIAGNOSA);
                $('#Diagnosa').append($diagnosa).trigger('change');
                $('#NoSep').val(response.data.NoSep);
                $('#catatan').val(response.data.Catatan);
                $('#NotifSep').val(response.data.NotifSep);
                $('#NoRujuk').val(response.data.NoRujuk);

                // var $pengobatan = $("<option selected></option>").val(response.data.response.rujukan.pelayanan.kode).text(response.data.response.rujukan.pelayanan.nama);
                // $('#pengobatan').append($pengobatan).trigger('change');
                get_histori(response.data.NoPeserta);
            }
        });
    }

</script>
