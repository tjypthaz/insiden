<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <strong>Pelapor</strong>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <strong>Verifikator Sub Komite Keselamatan Pasien</strong>
                    <input type="text" class="form-control" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body form-horizontal">
            <div class="col-md-12">
                <strong>Identitas pasien</strong>
                <hr>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-2">
                        <label>No RM</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label>Penanggung Biaya</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label>Jenis Insiden</label>
                    </div>
                    <div class="col-md-10">
                        <label class="radio-inline">
                            <input type="radio" name="optradio"> KNC
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="optradio"> KTC
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="optradio"> KTD
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="optradio"> Sentinel
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="optradio"> Resiko / KPC
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-2">
                        <label>Unit</label>
                    </div>
                    <div class="col-md-10">
                        <select name="" id="" class="form-control">
                            <option>Pilih Unit</option>
                            <option>Gawat Darurat</option>
                            <option>Rawat Inap</option>
                            <option>Rawat Jalan</option>
                            <option>Farmasi</option>
                            <option>Laboratorium</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label>Tanggal</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="<?=date('d F Y H:i:s')?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label>Band Insiden</label>
                    </div>
                    <div class="col-md-10">
                        <label class="radio-inline btn btn-primary">
                            <span class="text-primary">------</span>
                            <input type="radio" name="optradio">
                        </label>
                        <label class="radio-inline btn btn-success">
                            <span class="text-success">------</span>
                            <input type="radio" name="optradio">
                        </label>
                        <label class="radio-inline btn btn-warning">
                            <span class="text-warning">------</span>
                            <input type="radio" name="optradio">
                        </label>
                        <label class="radio-inline btn btn-danger">
                            <span class="text-danger">------</span>
                            <input type="radio" name="optradio">
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <textarea name="" id="" rows="2" class="form-control" placeholder="Kronologi Kejadian"></textarea>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body form-horizontal">
            <div class="col-md-12">
                <label>1. Identifikasi pasien</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Gelang Identitas Tidak Terpasang
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Lainnya
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Salah Menulis Identitas di Rekam Medis
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Tidak Menanyakan Identitas Nama / No. RM / Tanggal Lahir
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea name="" id="" rows="2" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <label>2. Kejadian Jatuh</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Form Screening Jatuh Tidak Diisi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Side Rail Tidak Terpasang
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Lainnya
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Keluarga / Pasien Tidak Diedukasi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            Pasien Menggunakan Obat Sedasi / Antidepresan, Obat :
                            <input type="text" class="form-control">
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea name="" id="" rows="2" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <label>3. Tranfusi</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Form Monitoring Tidak Terisi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Salah Identitas
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Incompability
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Lainnya
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Tidak Ada Inform Consent Tranfusi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            Salah Sediaan Darah
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            Penyakit Kronik / Fatal Akibat Tranfusi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            Reaksi Tranfusi
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea name="" id="" rows="2" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <label>4. Adverse Drug Event / Efek Samping Obat</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Obat Oral
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Ruam Kemerahan
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Phlebitis / Luka
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Perubahan Hemodinamik
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Lainnya
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Obat injeksi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            Mual / Muntah
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            Topikal
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            Kejadian Serius
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea name="" id="" rows="2" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <label>5. Medication Error / Kesalahan Pengobatan</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Salah Obat
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Salah Rute
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Salah Waktu Pemberian
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Lainnya
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Salah Identitas Pasien
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Salah Dosis
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            Salah Frekuensi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            Salah Dokumentasi
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea name="" id="" rows="2" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <label>6. Pasien Operasi</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Perbedaan Diagnosa Pre & Past Operasi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Belum Melakukan Site Marking Saat Induksi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Sign-In
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Sign-Out
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Lainnya
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Salah Site Marking
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Efek Samping Sedasi / Anestesi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            Salah Prosedur
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            Salah Pasien
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            Salah Lokasi
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea name="" id="" rows="2" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <label>7. Infeksi Yang Terkait Pelayanan Kesehatan</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            ILO ( Infeksi Luka Operasi )
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            ISK ( Infeksi Saluran Kemih )
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Lainnya
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            VAP ( Ventilator Associated Pneumonia )
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            IADP ( Infeksi Aliran Darah Primer )
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea name="" id="" rows="2" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <label>8. Kondisi Khusus</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Kematian Yang Tidak Diduga ( Termasuk Bunuh Diri )
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Kehilangan Permanen Fungsi Organ Tubuh
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Lainnya
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Penculikan Bayi / Anak
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Pemerkosaan / Kekejaman / Pembunuhan yang Terjadi di Rumah Sakit
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" value="">
                            Pasien Jiwa Melarikan Diri Dari Rumah Sakit
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea name="" id="" rows="2" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <label>9. Lainnya</label>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea name="" id="" rows="2" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <hr>
                <input type="submit" class="btn btn-primary" value="Kirim">
            </div>
        </div>
    </div>
</div>
