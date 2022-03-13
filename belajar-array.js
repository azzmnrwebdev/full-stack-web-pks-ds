// mencetak code js sederhana
var sayHello = "Hello World";
console.log(sayHello);

// Array
/**
 * index 0 = Coding
 * index 1 = Reading
 * index 2 = Game Online
 * index 3 = Music
 * dan seterusnya
 */
var hobby = ["Coding", "Reading", "Game Online", "Music"];

var random = ["Mobil", "Rumah", 3, "Motor", 0.3];

console.log(hobby.length);
console.log(random.length);

// menampilkan data array sesuai index
console.log(hobby[0]);
console.log(random[3]);

// menampilkan data array urutan ke terakhir
console.log(random[random.length - 1]);

// method pada array javascript
/**
 * push     : menambah 1 nilai ke array ke index paling belakang.
 * pop      : menghapus 1 nilai dari array index paling belakang.
 * unshift  : menambah 1 nilai ke array index paling depan (index 0).
 * shift    : menghapus 1 nilai dari array index paling depan (index 0).
 * join     : menggabungkan seluruh element array menjadi sebuah string dan mengambil parameter sebagai simbol penyambung antar elemen.
 * sort     : mengurutkan elemen di dalam array sesuai alphabet.
 * slice    : mengambil beberapa lapis data.
 * splice   : mengubah nilai array dengan menghapus dan/atau menambah nilai baru ke array.
 * split    : memecah string dan mengembalikan array sesuai dengan separator / pemisah yang didefinisikan.
 */

/**
 * PUSH
 * Push adalah metode array untuk menambahkan nilai di belakang elemen terakhir di array.
 * metode push menerima sebuah parameter yaitu nilai yang ingin kita tambahkan ke dalam array.
 */
hobby.push("Futsal", "Berenang"); // bisa menambahkan lebih dari 1 data
random.push("Pc Gaming");

console.log(hobby);
console.log(random);

/**
 * POP
 * Pop adalah kebalikan dari push yaitu menghapus nilai elemen paling terakhir dari sebuah array.
 * metode Pop tidak menerima parameter apapun sehingga metode pop hanya
 * bisa mengeluarkan satu elemen saja yaitu yang paling terakhir dari sebuah array.
 */
hobby.pop();
console.log(hobby);

/**
 * UNSHIFT
 * Unshift yaitu menambahkan nilai pada index ke-0 sehingga elemen-elemen sebelumnya bergeser.
 */
var numbers = [0, 1, 2, 3];
numbers.unshift(-1);
console.log(numbers);

/**
 * SHIFT
 * Shift kebalikan dari unshift yaitu menghapus nilai pada elemen terdepan dari sebuah array.
 * metode Shift tidak menerima parameter apapun.
 */
var numbers = [0, 1, 2, 3];
numbers.shift();
console.log(numbers);

/**
 * SHORT
 * Sort adalah metode untuk mengurutkan nilai pada array. Secara otomatis,
 * sort akan mengurutkan secara ascending (dari rendah ke tinggi) dan
 * diurutkan berdasarkan unicode dari karakter.
 * Urutan unicode artinya ada karakter yang secara nilai lebih besar
 * dibandingkan dengan karakter yang lainnya.
 * contohnya adalah karakter "b" akan lebih besar daripada "a",
 * karakter "c" lebih besar daripada karakter "b", dst.
 */
var animals = ["kera", "gajah", "musang"];
animals.sort();
console.log(animals);

/**
 * SLICE
 * slice adalah metode untuk mengambil irisan dari sebuah array.
 * Metode slice bisa menerima satu atau dua parameter.
 * Parameter pertama adalah nomer index pertama yang akan kita ambil sebagai irisan,
 * sedangkan parameter kedua adalah nomer index terakhir yang ingin kita ambil sebagai irisan.
 */
var angka = [0, 1, 2, 3];
var irisan1 = angka.slice(1, 3);
console.log(irisan1);
var irisan2 = angka.slice(0, 2);
console.log(irisan2);

// Jika parameter kedua tidak diisi maka secara otomatis slice akan mengiris array dari
// indeks di paramer pertama sampai ke indeks terakhir array tersebut.

var angka = [0, 1, 2, 3];
var irisan3 = angka.slice(2);
console.log(irisan3);

/**
 * Jika diperhatikan, metode slice tidak mengubah Array yang awal dan
 * hasil irisan array dapat kita tampung kembali ke variable yang baru.
 * Oleh karena itu metode Slice juga berfungsi untuk membuat salinan
 * atau "shallow copy" dari sebuah array. Cara membuat shallow copy dengan
 * metode slice yaitu dengan tanpa memberikan parameter apapun pada metode slice.
 */

var angka = [0, 1, 2, 3];
var salinAngka = angka.slice();

angka.pop();

console.log(salinAngka);

/**
 * SPLICE
 * Splice yaitu metode untuk menghapus dan/atau menambahkan nilai elemen pada array.
 * Metode splice bisa menerima parameter sebanyak dua atau lebih parameter. J
 * ika ingin menggunakan splice untuk menghapus elemen pada index tertentu maka digunakan 2 paramater.
 * Jika ingin menggunakan splice untuk menambahkan elemen pada index tertentu maka digunakan tiga parameter.
 *
 * array.splice([IndexMulai], [JumlahNilaiYangDihapus], [NilaiYangDitambahkan1], [NilaiYangDitambahkan2], ...);
 */
var fruits = ["banana", "orange", "grape"];
fruits.splice(1, 1, "watermelon");
console.log(fruits);

/**
 * Contoh di atas berarti kita mulai mengubah array fruits dari indeks no 1,
 * dan melakukan penghapusan nilai sebanyak 0 (yang berarti tidak menghapus apapun),
 * dan menambahkan nilai "watermelon" pada indeks tersebut.
 */

var fruits = ["banana", "orange", "grape"];
fruits.splice(0, 2);
console.log(fruits);

// Contoh di atas berarti kita mulai mengubah array fruits dari indeks ke-0 dan melakukan penghapusan data sebanyak 2 elemen.

/**
 * SPLIT
 * Metode split yaitu memecah sebuah string sehingga menjadi sebuah array.
 * Split menerima sebuah parameter berupa karakter yang menjadi separator untuk memecah string.
 */
var biodata = "name:john,doe";
var name = biodata.split(":");
console.log(name);

/**
 * JOIN
 * Metode join yaitu kebalikan dari split yaitu mengubah sebuah array
 * menjadi string dengan cara menggabungkan (join) seluruh elemen array
 * menjadi satu dengan sebuah karakter pemisah yang dikirim melalui parameter.
 * contohnya sebagai berikut:
 */
var title = ["my", "first", "experience", "as", "programmer"];
var slug = title.join("-");
console.log(slug); // "my-first-experience-as-programmer"
