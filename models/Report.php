<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "report".
 *
 * @property int $id
 * @property int|null $id_verifikasi
 * @property string|null $pelapor
 * @property string|null $norm
 * @property string|null $biaya
 * @property int|null $id_jenis 1:KNC,2:KTC,3:KTD,4:Sentinel,5:Resiko/KPC
 * @property int|null $id_unit
 * @property string|null $tanggal
 * @property int|null $id_band 1:biru,2:hijau,3:kuning,4:merah
 * @property string|null $kronologi
 * @property int|null $no1_1
 * @property int|null $no1_2
 * @property int|null $no1_3
 * @property int|null $no1_4
 * @property string|null $no1_5
 * @property int|null $no2_1
 * @property int|null $no2_2
 * @property int|null $no2_3
 * @property int|null $no2_4
 * @property int|null $no2_5
 * @property string|null $no2_6
 * @property string|null $no2_7
 * @property int|null $no3_1
 * @property int|null $no3_2
 * @property int|null $no3_3
 * @property int|null $no3_4
 * @property int|null $no3_5
 * @property int|null $no3_6
 * @property int|null $no3_7
 * @property int|null $no3_8
 * @property string|null $no3_9
 * @property int|null $no4_1
 * @property int|null $no4_2
 * @property int|null $no4_3
 * @property int|null $no4_4
 * @property int|null $no4_5
 * @property int|null $no4_6
 * @property int|null $no4_7
 * @property int|null $no4_8
 * @property int|null $no4_9
 * @property string|null $no4_10
 * @property int|null $no5_1
 * @property int|null $no5_2
 * @property int|null $no5_3
 * @property int|null $no5_4
 * @property int|null $no5_5
 * @property int|null $no5_6
 * @property int|null $no5_7
 * @property int|null $no5_8
 * @property string|null $no5_9
 * @property int|null $no6_1
 * @property int|null $no6_2
 * @property int|null $no6_3
 * @property int|null $no6_4
 * @property int|null $no6_5
 * @property int|null $no6_6
 * @property int|null $no6_7
 * @property int|null $no6_8
 * @property int|null $no6_9
 * @property int|null $no6_10
 * @property string|null $no6_11
 * @property int|null $no7_1
 * @property int|null $no7_2
 * @property int|null $no7_3
 * @property int|null $no7_4
 * @property int|null $no7_5
 * @property string|null $no7_6
 * @property int|null $no8_1
 * @property int|null $no8_2
 * @property int|null $no8_3
 * @property int|null $no8_4
 * @property int|null $no8_5
 * @property int|null $no8_6
 * @property string|null $no8_7
 * @property string|null $no9_1
 *
 * @property Unit $unit
 * @property Verifikasi $verifikasi
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_verifikasi', 'id_jenis', 'id_unit', 'id_band', 'no1_1', 'no1_2', 'no1_3', 'no1_4', 'no2_1', 'no2_2', 'no2_3', 'no2_4', 'no2_5', 'no3_1', 'no3_2', 'no3_3', 'no3_4', 'no3_5', 'no3_6', 'no3_7', 'no3_8', 'no4_1', 'no4_2', 'no4_3', 'no4_4', 'no4_5', 'no4_6', 'no4_7', 'no4_8', 'no4_9', 'no5_1', 'no5_2', 'no5_3', 'no5_4', 'no5_5', 'no5_6', 'no5_7', 'no5_8', 'no6_1', 'no6_2', 'no6_3', 'no6_4', 'no6_5', 'no6_6', 'no6_7', 'no6_8', 'no6_9', 'no6_10', 'no7_1', 'no7_2', 'no7_3', 'no7_4', 'no7_5', 'no8_1', 'no8_2', 'no8_3', 'no8_4', 'no8_5', 'no8_6'], 'integer'],
            [['tanggal'], 'safe'],
            [['kronologi'], 'string'],
            [['pelapor'], 'string', 'max' => 50],
            [['norm'], 'string', 'max' => 10],
            [['biaya'], 'string', 'max' => 20],
            [['no1_5', 'no2_7', 'no3_9', 'no4_10', 'no5_9', 'no6_11', 'no7_6', 'no8_7', 'no9_1'], 'string', 'max' => 100],
            [['no2_6'], 'string', 'max' => 25],
            [['id_unit'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['id_unit' => 'id']],
            [['id_verifikasi'], 'exist', 'skipOnError' => true, 'targetClass' => Verifikasi::className(), 'targetAttribute' => ['id_verifikasi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_verifikasi' => 'Nama Verifikator',
            'pelapor' => 'Pelapor',
            'norm' => 'Norm',
            'biaya' => 'Biaya',
            'id_jenis' => 'Jenis Insiden',
            'id_unit' => 'Unit',
            'tanggal' => 'Tanggal',
            'id_band' => 'Band Warna',
            'kronologi' => 'Kronologi',
            'no1_1' => 'No1 1',
            'no1_2' => 'No1 2',
            'no1_3' => 'No1 3',
            'no1_4' => 'No1 4',
            'no1_5' => 'No1 5',
            'no2_1' => 'No2 1',
            'no2_2' => 'No2 2',
            'no2_3' => 'No2 3',
            'no2_4' => 'No2 4',
            'no2_5' => 'No2 5',
            'no2_6' => 'No2 6',
            'no2_7' => 'No2 7',
            'no3_1' => 'No3 1',
            'no3_2' => 'No3 2',
            'no3_3' => 'No3 3',
            'no3_4' => 'No3 4',
            'no3_5' => 'No3 5',
            'no3_6' => 'No3 6',
            'no3_7' => 'No3 7',
            'no3_8' => 'No3 8',
            'no3_9' => 'No3 9',
            'no4_1' => 'No4 1',
            'no4_2' => 'No4 2',
            'no4_3' => 'No4 3',
            'no4_4' => 'No4 4',
            'no4_5' => 'No4 5',
            'no4_6' => 'No4 6',
            'no4_7' => 'No4 7',
            'no4_8' => 'No4 8',
            'no4_9' => 'No4 9',
            'no4_10' => 'No4 10',
            'no5_1' => 'No5 1',
            'no5_2' => 'No5 2',
            'no5_3' => 'No5 3',
            'no5_4' => 'No5 4',
            'no5_5' => 'No5 5',
            'no5_6' => 'No5 6',
            'no5_7' => 'No5 7',
            'no5_8' => 'No5 8',
            'no5_9' => 'No5 9',
            'no6_1' => 'No6 1',
            'no6_2' => 'No6 2',
            'no6_3' => 'No6 3',
            'no6_4' => 'No6 4',
            'no6_5' => 'No6 5',
            'no6_6' => 'No6 6',
            'no6_7' => 'No6 7',
            'no6_8' => 'No6 8',
            'no6_9' => 'No6 9',
            'no6_10' => 'No6 10',
            'no6_11' => 'No6 11',
            'no7_1' => 'No7 1',
            'no7_2' => 'No7 2',
            'no7_3' => 'No7 3',
            'no7_4' => 'No7 4',
            'no7_5' => 'No7 5',
            'no7_6' => 'No7 6',
            'no8_1' => 'No8 1',
            'no8_2' => 'No8 2',
            'no8_3' => 'No8 3',
            'no8_4' => 'No8 4',
            'no8_5' => 'No8 5',
            'no8_6' => 'No8 6',
            'no8_7' => 'No8 7',
            'no9_1' => 'No9 1',
        ];
    }

    // 1:KNC,2:KTC,3:KTD,4:Sentinel,5:Resiko/KPC
    // 1:biru,2:hijau,3:kuning,4:merah

    public static function getBand($id=null){
        $listBand = [
            1 => 'Biru',
            2 => 'Hijau',
            3 => 'Kuning',
            4 => 'Merah',
        ];
        if($id == null){
            return $listBand;
        }
        return $listBand[$id];
    }

    public static function getJenis($id=null){
        $listJenis =[
            1 => 'KNC',
            2 => 'KTC',
            3 => 'KTD',
            4 => 'Sentinel',
            5 => 'Resiko / KPC',
        ];
        if($id == null){
            return $listJenis;
        }
        return $listJenis[$id];
    }

    public static function getAkibat($id=null){
        $list =[
            1 => 'Kematian',
            2 => 'Cedera Irreversibel / Cedera Berat',
            3 => 'Cedera Reversibel / Cedera Sedang',
            4 => 'Cedera Ringan',
            5 => 'Tidak ada cedera',
        ];
        if($id == null){
            return $list;
        }
        return $list[$id];
    }

    public static function getSpesialis($id=null){
        $list =[
            1 => 'Penyakit Dalam dan Subspesialisasinya',
            2 => 'Anak dan Subspesialisasinya',
            3 => 'Bedah dan Subspesialisasinya',
            4 => 'Obstetri Gynekologi dan Subspesialisasinya',
            5 => 'THT dan Subspesialisasinya',
            6 => 'Mata dan Subspesialisasinya',
            7 => 'Saraf dan Subspesialisasinya',
            8 => 'Anastesi dan Subspesialisasinya',
            9 => 'Kulit & Kelamin dan Subspesialisasinya',
            10 => 'Jiwa dan Subspesialisasinya',
            11 => 'Gigi dan Subspesialisasinya',
        ];
        if($id == null){
            return $list;
        }
        return $list[$id];
    }

    /**
     * Gets query for [[Unit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(Unit::className(), ['id' => 'id_unit']);
    }

    /**
     * Gets query for [[Verifikasi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVerifikasi()
    {
        return $this->hasOne(Verifikasi::className(), ['id' => 'id_verifikasi']);
    }

    public function getInvestigasi()
    {
        return $this->hasOne(ReportInvestigasi::className(), ['id_report' => 'id']);
    }
}
