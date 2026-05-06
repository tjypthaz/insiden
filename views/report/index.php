<?php

/* @var $this yii\web\View */

use app\models\Report;
use app\models\Unit;
use dosamigos\datetimepicker\DateTimePicker;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="row text-right">
    <label for=""><h2>RAHASIA</h2></label>
    </div>
    <form action="" method="post">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <strong>Pelapor</strong>
                        <input type="text" class="form-control" required name="pelapor" placeholder="Nama Pelapor Akan Dirahasiakan">
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
                            <input type="text" placeholder="00000000" class="form-control" name="norm" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Penanggung Biaya</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Pribadi / BPJS / Jaminan Lainnya" name="biaya" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Umur</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="tahun" name="umur">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Jenis Kelamin</label>
                        </div>
                        <div class="col-md-10">
                            <label class="radio-inline">
                                <input type="radio" name="jk" value="L" required> Laki - laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="jk" value="P"> Perempuan
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Jenis Insiden</label>
                        </div>
                        <div class="col-md-10">
                            <label class="radio-inline">
                                <input type="radio" name="id_jenis" value="1" required> KNC
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="id_jenis" value="2"> KTC
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="id_jenis" value="3"> KTD
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="id_jenis" value="4"> Sentinel
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="id_jenis" value="5"> Resiko / KPC
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Unit Kejadian</label>
                        </div>
                        <div class="col-md-10">
                            <?php
                            $listUnit = Unit::getUnits();
                            echo Html::dropDownList('id_unit',null,$listUnit,[
                                'class' => 'form-control',
                                'prompt' => 'Pilih Unit',
                                'required' => 'yes'
                            ])
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Tgl Kejadian</label>
                        </div>
                        <div class="col-md-10">
                            <?= DateTimePicker::widget([
                                'name' => 'tgl',
                                'size' => 'ms',
                                'clientOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy-mm-dd hh:ii',
                                    'todayBtn' => true
                                ]
                            ]);?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Band Insiden</label>
                        </div>
                        <div class="col-md-10">
                            <label class="radio-inline btn btn-primary">
                                <span class="text-primary">------</span>
                                <input type="radio" value="1" name="id_band" required>
                            </label>
                            <label class="radio-inline btn btn-success">
                                <span class="text-success">------</span>
                                <input type="radio" value="2" name="id_band">
                            </label>
                            <label class="radio-inline btn btn-warning">
                                <span class="text-warning">------</span>
                                <input type="radio" value="3" name="id_band">
                            </label>
                            <label class="radio-inline btn btn-danger">
                                <span class="text-danger">------</span>
                                <input type="radio" value="4" name="id_band">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <textarea name="kronologi" required rows="3" class="form-control" placeholder="Kronologi Kejadian"></textarea>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Orang Pertama Yang Melaporkan Insiden</label>
                        <input type="text" placeholder="Karyawan / Pasien / Keluarga Pasien / Pengunjung" class="form-control" name="pelapor_pertama">
                    </div>
                    <div class="form-group">
                        <label>Insiden Menyangkut Pasien</label>
                        <input type="text" class="form-control" placeholder="Pasien Ranap / Rajal / IGD" name="menyangkut_pasien">
                    </div>
                    <div class="form-group">
                        <label>Insiden terjadi pada pasien : (sesuai kasus penyakit / spesialisasi)</label>
                        <?php
                        $listspec = Report::getSpesialis();
                        echo Html::dropDownList('penyakit',null,$listspec,['prompt' => 'Pilih', 'class' => 'form-control'])
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Unit kerja penyebab</label>
                        <?php
                        echo Html::dropDownList('unit_penyebab',null,$listUnit,['prompt' => 'Pilih', 'class' => 'form-control'])
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Akibat Insiden Terhadap Pasien</label>
                        <?php
                        $listAkibat = Report::getAkibat();
                        echo Html::dropDownList('akibat',null,$listAkibat,['prompt' => 'Pilih', 'class' => 'form-control'])
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tindakan yang dilakukan segera setelah kejadian, dan hasilnya</label>
                        <textarea name="respon_insiden" cols="30" rows="2" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tindakan dilakukan oleh, Tim: terdiri dari</label>
                        <input type="text" class="form-control" placeholder="Dokter / Perawat / Petugas Lainnya" name="tim">
                    </div>
                    <div class="form-group">
                        <label>Apakah kejadian yang sama pernah terjadi di Unit Kerja lain? Apabila ya, isi bagian dibawah ini.Kapan ? dan Langkah / tindakan apa yang telah diambil pada Unit kerja tersebut untuk mencegah terulangnya kejadian yang sama?</label>
                        <textarea name="pernah_terjadi" cols="30" rows="2" class="form-control" placeholder="Ya / Tidak, ..."></textarea>
                    </div>
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
                            <label class="checkbox-inline"><input type="checkbox" name="1_1" value="1">
                                Gelang Identitas Tidak Terpasang
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="1_3" value="1">
                                Salah Menulis Identitas di Rekam Medis
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="1_4" value="1">
                                Tidak Menanyakan Identitas Nama / No. RM / Tanggal Lahir
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="1_2" value="1">
                                Lainnya
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea name="1_5" id="" rows="2" class="form-control"></textarea>
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
                            <label class="checkbox-inline"><input type="checkbox" name="2_1" value="1">
                                Form Screening Jatuh Tidak Diisi
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="2_2" value="1">
                                Side Rail Tidak Terpasang
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="2_4" value="1">
                                Keluarga / Pasien Tidak Diedukasi
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="1" name="2_5">
                                Pasien Menggunakan Obat Sedasi / Antidepresan, Obat :
                                <input type="text" class="form-control" name="2_6">
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="2_3" value="1">
                                Lainnya
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea  name="2_7" id="" rows="2" class="form-control"></textarea>
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
                            <label class="checkbox-inline"><input type="checkbox" name="3_1" value="1">
                                Form Monitoring Tidak Terisi
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="3_2" value="1">
                                Salah Identitas
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="3_3" value="1">
                                Incompability
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="3_5" value="1">
                                Tidak Ada Inform Consent Tranfusi
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="3_6" value="1">
                                Salah Sediaan Darah
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="3_7" value="1">
                                Penyakit Kronik / Fatal Akibat Tranfusi
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="3_8" value="1">
                                Reaksi Tranfusi
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="3_4" value="1">
                                Lainnya
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea name="3_9" id="" rows="2" class="form-control"></textarea>
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
                            <label class="checkbox-inline"><input type="checkbox" name="4_1" value="1">
                                Obat Oral
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="4_2" value="1">
                                Ruam Kemerahan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="4_3" value="1">
                                Phlebitis / Luka
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="4_4" value="1">
                                Perubahan Hemodinamik
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="4_6" value="1">
                                Obat injeksi
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="4_7" value="1">
                                Mual / Muntah
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="4_8" value="1">
                                Topikal
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="4_9" value="1">
                                Kejadian Serius
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="4_5" value="1">
                                Lainnya
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea name="4_10" id="" rows="2" class="form-control"></textarea>
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
                            <label class="checkbox-inline"><input type="checkbox" name="5_1" value="1">
                                Salah Obat
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="5_2" value="1">
                                Salah Rute
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="5_3" value="1">
                                Salah Waktu Pemberian
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="5_5" value="1">
                                Salah Identitas Pasien
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="5_6" value="1">
                                Salah Dosis
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="5_7" value="1">
                                Salah Frekuensi
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="5_8" value="1">
                                Salah Dokumentasi
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="5_4" value="1">
                                Lainnya
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea name="5_9" id="" rows="2" class="form-control"></textarea>
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
                            <label class="checkbox-inline"><input type="checkbox" name="6_1" value="1">
                                Perbedaan Diagnosa Pre & Past Operasi
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="6_2" value="1">
                                Belum Melakukan Site Marking Saat Induksi
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="6_3" value="1">
                                Sign-In
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="6_4" value="1">
                                Sign-Out
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="6_6" value="1">
                                Salah Site Marking
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="6_7" value="1">
                                Efek Samping Sedasi / Anestesi
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="6_8" value="1">
                                Salah Prosedur
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="6_9" value="1">
                                Salah Pasien
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="6_10" value="1">
                                Salah Lokasi
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="6_5" value="1">
                                Lainnya
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea name="6_11" id="" rows="2" class="form-control"></textarea>
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
                            <label class="checkbox-inline"><input type="checkbox" name="7_1" value="1">
                                ILO ( Infeksi Luka Operasi )
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="7_2" value="1">
                                ISK ( Infeksi Saluran Kemih )
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="7_4" value="1">
                                VAP ( Ventilator Associated Pneumonia )
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="7_5" value="1">
                                IADP ( Infeksi Aliran Darah Primer )
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="7_3" value="1">
                                Lainnya
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea name="7_6" id="" rows="2" class="form-control"></textarea>
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
                            <label class="checkbox-inline"><input type="checkbox" name="8_1" value="1">
                                Kematian Yang Tidak Diduga ( Termasuk Bunuh Diri )
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="8_2" value="1">
                                Kehilangan Permanen Fungsi Organ Tubuh
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="8_4" value="1">
                                Penculikan Bayi / Anak
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="8_5" value="1">
                                Pemerkosaan / Kekejaman / Pembunuhan yang Terjadi di Rumah Sakit
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="8_6" value="1">
                                Pasien Jiwa Melarikan Diri Dari Rumah Sakit
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="checkbox-inline"><input type="checkbox" name="8_3" value="1">
                                Lainnya
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea name="8_7" id="" rows="2" class="form-control"></textarea>
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
                            <textarea name="9_1" id="" rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <hr>
                    <input type="submit" class="btn btn-primary" value="Kirim">
                </div>
            </div>
        </div>
    </form>

</div>
