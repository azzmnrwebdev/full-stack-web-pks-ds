<?php

/**
 * membuat dua class hewan dan fight
 * yang tidak di instansiasi kedua
 * class tersebut menggunakan abstract class
 */

# parent class
abstract class Hewan // parent class
{
    # membuat property hewan
    public $nama, $darah = 50, $jumlahKaki, $keahlian;

    # membuat method getInfoHewan()
    public function getInfoHewan()
    {
        echo "Jenis Hewan = $this->nama <br>";
        echo "Jumlah Kaki = $this->jumlahKaki <br>";
        echo "Keahlian = $this->keahlian <br>";
        echo "Darah = $this->darah <br>";
        echo "Attack Power = $this->attackPower <br>";
        echo "Defence Power = $this->defencePower <br>";
    }

    public function atraksi()
    {
        echo "$this->nama sedang $this->keahlian <br>";
    }
}

# parent class
abstract class Fight extends Hewan
{
    # membuat property fight
    public $attackPower, $defencePower;

    public function serang($lawan)
    {
        echo "$this->nama sedang menyerang $lawan->nama<br>";
        $this->diserang($lawan);
    }

    public function diserang($lawan)
    {
        echo "$lawan->nama sedang diserang <br>";
        $lawan->darah -= ($this->attackPower / $lawan->defencePower);
    }

    public function sisaDarah()
    {
        echo "Sisa darah $this->nama = $this->darah <br>";
    }
}

# membuat class elang
class Elang extends Fight
{
    public function __construct()
    {
        $this->nama = "Elang";
        $this->jumlahKaki = 2;
        $this->keahlian = "terbang tinggi";
        $this->attackPower = 10;
        $this->defencePower = 5;
    }
}

# membuat class harimau
class Harimau extends Fight
{
    public function __construct()
    {
        $this->nama = "Harimau";
        $this->jumlahKaki = 4;
        $this->keahlian = "lari cepat";
        $this->attackPower = 7;
        $this->defencePower = 8;
    }
}


$elang = new Elang;
$harimau = new Harimau;

$elang->getInfoHewan();
echo "<br>";
$harimau->getInfoHewan();

echo "<hr>";

$elang->atraksi();
$harimau->atraksi();
echo "<br>";

$elang->serang($harimau);
echo "<br>";

$harimau->serang($elang);
echo "<br>";

$elang->sisaDarah();
$harimau->sisaDarah();
echo "<br>";
