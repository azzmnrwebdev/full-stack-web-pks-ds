/**
 * Soal 1
 * ini jawaban soal nomor 1
 */
console.log("Jawaban dari soal nomer 1");

var daftarHewan = ["2. Komodo", "5. Buaya", "3. Cicak", "4. Ular", "1. Tokek"];

daftarHewan.sort();

daftarHewan.forEach(function (item) {
  console.log(item);
});

console.log(" ");

/**
 * Soal 2
 * ini jawaban soal nomor 2
 */
console.log("Jawaban dari soal nomer 2");

function introduce(data) {
  return `Nama saya ${data.name}, umur saya ${data.age} tahun, alamat saya di ${data.address}, dan saya punya hobby yaitu ${data.hobby}!`;
}

var data = {
  name: "John",
  age: 30,
  address: "Jalan Pelesiran",
  hobby: "Gaming",
};

var perkenalan = introduce(data);
console.log(perkenalan);

console.log(" ");

/**
 * Soal 3
 * ini jawaban soal nomor 3
 */
console.log("Jawaban dari soal nomer 3");

// membuat function hitung_huruf_vokal
function hitung_huruf_vokal(str) {
  // menemukan jumlah vokal
  const count = str.match(/[aeiou]/gi).length;

  // mengembalikan jumlah vokal
  return count;
}

var hitung_1 = hitung_huruf_vokal("Muhammad");

var hitung_2 = hitung_huruf_vokal("Iqbal");

console.log(hitung_1, hitung_2); // 3 2

console.log(" ");

/**
 * Soal 4
 * ini jawaban soal nomor 4
 */
console.log("Jawaban dari soal nomer 4");

function hitung(numbers) {
  return 2 + (numbers - 2) * 2;
  /**
   * cara bacanya seperti ini :
   * hitung yang ada di dalam kurung terlebih dahulu
   * baru dikali 2 dan ditambahkan 2
   *
   * contoh :
   * parameter 5 - 2 = 3,
   * 3 dikali 2 sama dengan 6,
   * 6 ditambah 2 menjadi 8
   * jadi hasil nya adalah '8'
   */
}

console.log(hitung(0)); // -2
console.log(hitung(1)); // 0
console.log(hitung(2)); // 2
console.log(hitung(3)); // 4
console.log(hitung(5)); // 8
