// object bisa termasuk dalam tipe data yang berarti dapat di masukkan ke dalam array, seperti contoh di bawah ini
var mobil = [
  { merk: "BMW", warna: "merah", tipe: "sedan" },
  { merk: "toyota", warna: "hitam", tipe: "box" },
  { merk: "audi", warna: "biru", tipe: "sedan" },
];

/**
 * Array Iteration
 * array iteration merupakan method dalam array untuk melakukan perulangan data dari array,
 * method array iteration ada banyak tapi untuk basic kita hanya perlu menggunakan 3 method ini yaitu forEach(), map() dan filter()
 */

/**
 * .foreach()
 * foreach method untuk array berfungsi untuk perulangan data dari array, misal kita punya array seperti di bawah ini:
 */
var mobil = [
  { merk: "BMW", warna: "merah", tipe: "sedan" },
  { merk: "toyota", warna: "hitam", tipe: "box" },
  { merk: "audi", warna: "biru", tipe: "sedan" },
];

// lalu kita gunakan foreach seperti di bawah ini
mobil.forEach(function (item) {
  console.log("warna : " + item.warna);
});

/**
 * .map()
 * map method untuk array berfungsi untuk membuat array baru. misal dengan var mobil diatas kita buat kode seperti di bawah ini
 */
var arrayWarna = mobil.map(function (item) {
  return item.warna;
});

console.log(arrayWarna);

/**
 * .filter()
 * Filter method untuk array berfungsi untuk memnyaring data yang diinginkan. misal dengan var mobil diatas kita buat kode seperti di bawah ini
 */
var arrayMobilFilter = mobil.filter(function (item) {
  return item.tipe != "sedan";
});

console.log(arrayMobilFilter);
