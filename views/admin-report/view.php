<?php

/* @var $this yii\web\View */

use app\models\Report;
use app\models\Verifikasi;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use yii2assets\printthis\PrintThis;

$this->title = 'View Report';

?>


<?php
$isUnit = Yii::$app->db->createCommand("
    select *
    from auth_assignment
    where user_id = :id and item_name = 'unit'
")->bindValue(':id',Yii::$app->user->id)->queryAll();

if(!$isUnit){
    echo PrintThis::widget([
        'htmlOptions' => [
            'id' => 'PrintThis',
            'btnClass' => 'btn btn-info',
            'btnId' => 'btnPrintThis',
            'btnText' => 'Print Form',
            'btnIcon' => 'glyphicon glyphicon-print'
        ],
        'options' => [
            'debug' => true,
            'importCSS' => true,
            'importStyle' => false,
            'loadCSS' => "@bower/bootstrap/dist/css/bootstrap.css",
            'pageTitle' => "",
            'removeInline' => false,
            'printDelay' => 333,
            'header' => null,
            'formValues' => true,
        ]
    ]);
}
?>
<div class="site-index" id="PrintThis">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    if(!$isUnit){
                        ?>
                        <strong>Pelapor</strong>
                        <input type="text" value="<?=$model->pelapor?>" readonly class="form-control" name="pelapor" placeholder="Nama Pelapor Akan Dirahasiakan" >
                        <?php
                    }
                    ?>
                </div>
                <div class="col-md-6">
                    <strong>Verifikator Sub Komite Keselamatan Pasien</strong>
                    <input type="text" class="form-control" value="<?=$model->verifikasi == null ? '-' : $model->verifikasi->verifikator->name?>" readonly>
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
                        <input type="text" value="<?=$model->norm?>" readonly class="form-control" name="norm">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label>Penanggung Biaya</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" value="<?=$model->biaya?>" readonly class="form-control" name="biaya">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label>Umur</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" disabled class="form-control" value="<?=$model->umur?>" placeholder="tahun" name="umur">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label>Jenis Kelamin</label>
                    </div>
                    <div class="col-md-10">
                        <label class="radio-inline">
                            <input type="radio" disabled name="jk" value="L" <?=$model->jk == 'L' ? 'checked' : ''?> > Laki - laki
                        </label>
                        <label class="radio-inline">
                            <input type="radio" disabled name="jk" value="P" <?=$model->jk == 'P' ? 'checked' : ''?> > Perempuan
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
                            <input type="radio" name="id_jenis" value="1" <?=$model->id_jenis == '1' ? 'checked' : ''?> disabled> KNC
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="id_jenis" value="2" <?=$model->id_jenis == '2' ? 'checked' : ''?> disabled> KTC
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="id_jenis" value="3" <?=$model->id_jenis == '3' ? 'checked' : ''?> disabled> KTD
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="id_jenis" value="4" <?=$model->id_jenis == '4' ? 'checked' : ''?> disabled> Sentinel
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="id_jenis" value="5" <?=$model->id_jenis == '5' ? 'checked' : ''?> disabled> Resiko / KPC
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label>Unit Kejadian</label>
                    </div>
                    <div class="col-md-10">
                        <?php
                        $listUnit = \app\models\Unit::getUnits();
                        echo Html::dropDownList('id_unit',$model->id_unit,$listUnit,[
                            'class' => 'form-control',
                            'readonly' => 'yes'
                        ]);
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label>Tgl Kejadian</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="tgl" class="form-control" value="<?= date('d F Y H:i:s',strtotime($model->tanggal))?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label>Band Insiden</label>
                    </div>
                    <div class="col-md-10">
                        <label class="radio-inline btn btn-primary">
                            <span class="text-primary">------</span>
                            <input type="radio" value="1" name="id_band" <?=$model->id_band == '1' ? 'checked' : ''?> disabled>
                        </label>
                        <label class="radio-inline btn btn-success">
                            <span class="text-success">------</span>
                            <input type="radio" value="2" name="id_band" <?=$model->id_band == '2' ? 'checked' : ''?> disabled>
                        </label>
                        <label class="radio-inline btn btn-warning">
                            <span class="text-warning">------</span>
                            <input type="radio" value="3" name="id_band" <?=$model->id_band == '3' ? 'checked' : ''?> disabled>
                        </label>
                        <label class="radio-inline btn btn-danger">
                            <span class="text-danger">------</span>
                            <input type="radio" value="4" name="id_band" <?=$model->id_band == '4' ? 'checked' : ''?> disabled>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <textarea name="kronologi" rows="3" class="form-control" placeholder="Kronologi Kejadian" disabled>
                    <?=$model->kronologi?>
                </textarea>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Orang Pertama Yang Melaporkan Insiden</label>
                    <input disabled value="<?=$model->pelapor_pertama?>" type="text" placeholder="Karyawan / Pasien / Keluarga Pasien / Pengunjung" class="form-control" name="pelapor_pertama">
                </div>
                <div class="form-group">
                    <label>Insiden Menyangkut Pasien</label>
                    <input disabled value="<?=$model->menyangkut_pasien?>" type="text" class="form-control" placeholder="Pasien Ranap / Rajal / IGD" name="menyangkut_pasien">
                </div>
                <div class="form-group">
                    <label>Insiden terjadi pada pasien : (sesuai kasus penyakit / spesialisasi)</label>
                    <?php
                    $listspec = Report::getSpesialis();
                    echo Html::dropDownList('penyakit',$model->penyakit,$listspec,['prompt' => 'Pilih', 'class' => 'form-control','disabled'=>'yes'])
                    ?>
                </div>
                <div class="form-group">
                    <label>Unit kerja penyebab</label>
                    <?php
                    echo Html::dropDownList('unit_penyebab',$model->unit_penyebab,$listUnit,['prompt' => 'Pilih', 'class' => 'form-control','disabled'=>'yes'])
                    ?>
                </div>
                <div class="form-group">
                    <label>Akibat Insiden Terhadap Pasien</label>
                    <?php
                    $listAkibat = Report::getAkibat();
                    echo Html::dropDownList('akibat',$model->akibat,$listAkibat,['prompt' => 'Pilih', 'class' => 'form-control','disabled'=>'yes'])
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tindakan yang dilakukan segera setelah kejadian, dan hasilnya</label>
                    <textarea disabled name="respon_insiden" cols="30" rows="2" class="form-control"><?=$model->respon_insiden?></textarea>
                </div>
                <div class="form-group">
                    <label>Tindakan dilakukan oleh, Tim: terdiri dari</label>
                    <input disabled value="<?=$model->tim?>" type="text" class="form-control" placeholder="Dokter / Perawat / Petugas Lainnya" name="tim">
                </div>
                <div class="form-group">
                    <label>Apakah kejadian yang sama pernah terjadi di Unit Kerja lain? Apabila ya, isi bagian dibawah ini.Kapan ? dan Langkah / tindakan apa yang telah diambil pada Unit kerja tersebut untuk mencegah terulangnya kejadian yang sama?</label>
                    <textarea disabled name="pernah_terjadi" cols="30" rows="2" class="form-control" placeholder="Ya / Tidak, ..."><?=$model->pernah_terjadi?></textarea>
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
                        <label class="checkbox-inline">
                            <input type="checkbox" name="1_1" value="1" <?=$model->no1_1 == '1' ? 'checked' : ''?> disabled>
                            Gelang Identitas Tidak Terpasang
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="1_3" value="1" <?=$model->no1_3 == '1' ? 'checked' : ''?> disabled>
                            Salah Menulis Identitas di Rekam Medis
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="1_4" value="1" <?=$model->no1_4 == '1' ? 'checked' : ''?> disabled>
                            Tidak Menanyakan Identitas Nama / No. RM / Tanggal Lahir
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="1_2" value="1" <?=$model->no1_2 == '1' ? 'checked' : ''?> disabled>
                            Lainnya
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea name="1_5" id="" rows="2" class="form-control" disabled>
                            <?=$model->no1_5?>
                        </textarea>
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
                        <label class="checkbox-inline">
                            <input type="checkbox" name="2_1" value="1" <?=$model->no2_1 == '1' ? 'checked' : ''?> disabled>
                            Form Screening Jatuh Tidak Diisi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="2_2" value="1" <?=$model->no2_2 == '1' ? 'checked' : ''?> disabled>
                            Side Rail Tidak Terpasang
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="2_4" value="1" <?=$model->no2_4 == '1' ? 'checked' : ''?> disabled>
                            Keluarga / Pasien Tidak Diedukasi
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="1" name="2_5" <?=$model->no2_5 == '1' ? 'checked' : ''?> disabled>
                            Pasien Menggunakan Obat Sedasi / Antidepresan, Obat :
                            <input type="text" class="form-control" name="2_6" <?=$model->no2_6?> >
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="2_3" value="1" <?=$model->no2_3 == '1' ? 'checked' : ''?> disabled>
                            Lainnya
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea  name="2_7" id="" rows="2" class="form-control" disabled>
                            <?=$model->no2_7?>
                        </textarea>
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
                        <label class="checkbox-inline">
                            <input type="checkbox" name="3_1" value="1" <?=$model->no3_1 == '1' ? 'checked' : ''?> disabled>
                            Form Monitoring Tidak Terisi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="3_2" value="1" <?=$model->no3_2 == '1' ? 'checked' : ''?> disabled>
                            Salah Identitas
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="3_3" value="1" <?=$model->no3_3 == '1' ? 'checked' : ''?> disabled>
                            Incompability
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="3_5" value="1" <?=$model->no3_5 == '1' ? 'checked' : ''?> disabled>
                            Tidak Ada Inform Consent Tranfusi
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="3_6" value="1" <?=$model->no3_6 == '1' ? 'checked' : ''?> disabled>
                            Salah Sediaan Darah
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="3_7" value="1" <?=$model->no3_7 == '1' ? 'checked' : ''?> disabled>
                            Penyakit Kronik / Fatal Akibat Tranfusi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="3_8" value="1" <?=$model->no3_8 == '1' ? 'checked' : ''?> disabled>
                            Reaksi Tranfusi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="3_4" value="1" <?=$model->no3_4 == '1' ? 'checked' : ''?> disabled>
                            Lainnya
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea name="3_9" id="" rows="2" class="form-control" disabled>
                            <?=$model->no3_9?>
                        </textarea>
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
                        <label class="checkbox-inline">
                            <input type="checkbox" name="4_1" value="1" <?=$model->no4_1 == '1' ? 'checked' : ''?> disabled>
                            Obat Oral
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="4_2" value="1" <?=$model->no4_2 == '1' ? 'checked' : ''?> disabled>
                            Ruam Kemerahan
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="4_3" value="1" <?=$model->no4_3 == '1' ? 'checked' : ''?> disabled>
                            Phlebitis / Luka
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="4_4" value="1" <?=$model->no4_4 == '1' ? 'checked' : ''?> disabled>
                            Perubahan Hemodinamik
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="4_6" value="1" <?=$model->no4_6 == '1' ? 'checked' : ''?> disabled>
                            Obat injeksi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="4_7" value="1" <?=$model->no4_7 == '1' ? 'checked' : ''?> disabled>
                            Mual / Muntah
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="4_8" value="1" <?=$model->no4_8 == '1' ? 'checked' : ''?> disabled>
                            Topikal
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="4_9" value="1" <?=$model->no4_9 == '1' ? 'checked' : ''?> disabled>
                            Kejadian Serius
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="4_5" value="1" <?=$model->no4_5 == '1' ? 'checked' : ''?> disabled>
                            Lainnya
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea name="4_10" id="" rows="2" class="form-control" disabled>
                            <?=$model->no4_10?>
                        </textarea>
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
                        <label class="checkbox-inline">
                            <input type="checkbox" name="5_1" value="1" <?=$model->no5_1 == '1' ? 'checked' : ''?> disabled>
                            Salah Obat
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="5_2" value="1" <?=$model->no5_2 == '1' ? 'checked' : ''?> disabled>
                            Salah Rute
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="5_3" value="1" <?=$model->no5_3 == '1' ? 'checked' : ''?> disabled>
                            Salah Waktu Pemberian
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="5_5" value="1" <?=$model->no5_5 == '1' ? 'checked' : ''?> disabled>
                            Salah Identitas Pasien
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="5_6" value="1" <?=$model->no5_6 == '1' ? 'checked' : ''?> disabled>
                            Salah Dosis
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="5_7" value="1" <?=$model->no5_7 == '1' ? 'checked' : ''?> disabled>
                            Salah Frekuensi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="5_8" value="1" <?=$model->no5_8 == '1' ? 'checked' : ''?> disabled>
                            Salah Dokumentasi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="5_4" value="1" <?=$model->no5_4 == '1' ? 'checked' : ''?> disabled>
                            Lainnya
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea name="5_9" id="" rows="2" class="form-control" disabled>
                            <?=$model->no5_9?>
                        </textarea>
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
                        <label class="checkbox-inline">
                            <input type="checkbox" name="6_1" value="1" <?=$model->no6_1 == '1' ? 'checked' : ''?> disabled>
                            Perbedaan Diagnosa Pre & Past Operasi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="6_2" value="1" <?=$model->no6_2 == '1' ? 'checked' : ''?> disabled>
                            Belum Melakukan Site Marking Saat Induksi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="6_3" value="1" <?=$model->no6_3 == '1' ? 'checked' : ''?> disabled>
                            Sign-In
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="6_4" value="1" <?=$model->no6_4 == '1' ? 'checked' : ''?> disabled>
                            Sign-Out
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="6_6" value="1" <?=$model->no6_6 == '1' ? 'checked' : ''?> disabled>
                            Salah Site Marking
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="6_7" value="1" <?=$model->no6_7 == '1' ? 'checked' : ''?> disabled>
                            Efek Samping Sedasi / Anestesi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="6_8" value="1" <?=$model->no6_8 == '1' ? 'checked' : ''?> disabled>
                            Salah Prosedur
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="6_9" value="1" <?=$model->no6_9 == '1' ? 'checked' : ''?> disabled>
                            Salah Pasien
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="6_10" value="1" <?=$model->no6_10 == '1' ? 'checked' : ''?> disabled>
                            Salah Lokasi
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="6_5" value="1" <?=$model->no6_5 == '1' ? 'checked' : ''?> disabled>
                            Lainnya
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea name="6_11" id="" rows="2" class="form-control" disabled>
                            <?=$model->no6_11?>
                        </textarea>
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
                        <label class="checkbox-inline">
                            <input type="checkbox" name="7_1" value="1" <?=$model->no7_1 == '1' ? 'checked' : ''?> disabled>
                            ILO ( Infeksi Luka Operasi )
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="7_2" value="1" <?=$model->no7_2 == '1' ? 'checked' : ''?> disabled>
                            ISK ( Infeksi Saluran Kemih )
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="7_4" value="1" <?=$model->no7_4 == '1' ? 'checked' : ''?> disabled>
                            VAP ( Ventilator Associated Pneumonia )
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="7_5" value="1" <?=$model->no7_5 == '1' ? 'checked' : ''?> disabled>
                            IADP ( Infeksi Aliran Darah Primer )
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="7_3" value="1" <?=$model->no7_3 == '1' ? 'checked' : ''?> disabled>
                            Lainnya
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea name="7_6" id="" rows="2" class="form-control" disabled>
                            <?=$model->no7_6?>
                        </textarea>
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
                        <label class="checkbox-inline">
                            <input type="checkbox" name="8_1" value="1" <?=$model->no8_1 == '1' ? 'checked' : ''?> disabled>
                            Kematian Yang Tidak Diduga ( Termasuk Bunuh Diri )
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="8_2" value="1" <?=$model->no8_2 == '1' ? 'checked' : ''?> disabled>
                            Kehilangan Permanen Fungsi Organ Tubuh
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="8_4" value="1" <?=$model->no8_4 == '1' ? 'checked' : ''?> disabled>
                            Penculikan Bayi / Anak
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="8_5" value="1" <?=$model->no8_5 == '1' ? 'checked' : ''?> disabled>
                            Pemerkosaan / Kekejaman / Pembunuhan yang Terjadi di Rumah Sakit
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="8_6" value="1" <?=$model->no8_6 == '1' ? 'checked' : ''?> disabled>
                            Pasien Jiwa Melarikan Diri Dari Rumah Sakit
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="8_3" value="1" <?=$model->no8_3 == '1' ? 'checked' : ''?> disabled>
                            Lainnya
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea name="8_7" id="" rows="2" class="form-control" disabled>
                            <?=$model->no8_7?>
                        </textarea>
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
                        <textarea name="9_1" id="" rows="2" class="form-control" disabled>
                            <?=$model->no9_1?>
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body form-horizontal">
            <div class="col-md-12">
                <strong>Verifikasi Insiden</strong>
                <hr>
            </div>
            <div class="col-md-12">
                <?php
                if($modelVerif->isNewRecord){
                    if(!$isUnit){
                        ?>
                        <div class="verifikasi-form">
                            <?php $form = ActiveForm::begin(); ?>
                            <?php
                            $listBand = Report::getBand();
                            $listJenis = Report::getJenis();
                            $listAktivasi = Verifikasi::getStatAktivasi();
                            $listInves = Verifikasi::getStatInvestigasi();
                            $listTindak = Verifikasi::getStatTindak();
                            ?>
                            <?= $form->field($modelVerif, 'id_band')->radioList($listBand) ?>

                            <?= $form->field($modelVerif, 'id_jenis')->radioList($listJenis) ?>

                            <?= $form->field($modelVerif, 'aktivasi')->radioList($listAktivasi) ?>

                            <?= $form->field($modelVerif, 'investigasi')->radioList($listInves) ?>

                            <?= $form->field($modelVerif, 'tindak_lanjut')->radioList($listTindak) ?>

                            <?= $form->field($modelVerif, 'kesimpulan')->textarea(['rows' => 2]) ?>

                            <div class="form-group">
                                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                        <?php
                    }
                }
                else{
                    ?>
                    <?= DetailView::widget([
                        'model' => $modelVerif,
                        'attributes' => [
                            [
                                'attribute' => 'id_verifikator',
                                'value' => function($modelVerif){
                                    return $modelVerif->verifikator->name;
                                },
                            ],
                            [
                                'attribute' => 'id_band',
                                'value' => function($modelVerif){
                                    return Report::getBand($modelVerif->id_band);
                                },
                            ],
                            [
                                'attribute' => 'id_jenis',
                                'value' => function($modelVerif){
                                    return Report::getJenis($modelVerif->id_jenis);
                                },
                            ],
                            [
                                'attribute' => 'aktivasi',
                                'value' => function($modelVerif){
                                    return Verifikasi::getStatAktivasi($modelVerif->aktivasi);
                                },
                            ],
                            [
                                'attribute' => 'investigasi',
                                'value' => function($modelVerif){
                                    return Verifikasi::getStatInvestigasi($modelVerif->investigasi);
                                },
                            ],
                            [
                                'attribute' => 'tindak_lanjut',
                                'value' => function($modelVerif){
                                    return Verifikasi::getStatTindak($modelVerif->tindak_lanjut);
                                },
                            ],
                            'kesimpulan:ntext',
                        ],
                    ]) ?>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
