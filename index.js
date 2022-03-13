console.log("---------- Awal Mulai Mengerjakan ----------");

/**
 * Soal nomor 1
 * buatlah fungsi menggunakan arrow function luas dan keliling persegi panjang
 * dengan arrow function lalu gunakan let atau const di dalam soal ini.
 */
console.log("Jawaban Nomor 1");
const hitung = (panjang, lebar) => {
  console.log("Hasil luas persegi panjang adalah : " + panjang * lebar);
  console.log(
    "Hasil keliling persegi panjang adalah: " + 2 * (panjang + lebar)
  );
};

hitung(10, 5);

console.log("");

/**
 * Soal nomor 2
 * Ubahlah code di bawah ini ke dalam arrow function
 * dan object literal es6 yang lebih sederhana
 */
console.log("Jawaban Nomor 2");
const newFunction = (firstName, lastName) => {
  return {
    firstName,
    lastName,
    fullName() {
      console.log(firstName + " " + lastName);
    },
  };
};

newFunction("William", "Imoh").fullName();

console.log("");

/**
 * Soal nomor 3
 * Diberikan sebuah object sebagai berikut:
 *  const newObject = {
 *      firstName: "Muhammad",
 *      lastName: "Iqbal Mubarok",
 *      address: "Jalan Ranamanyar",
 *      hobby: "playing football",
 *  }
 *
 * dalam ES5 untuk mendapatkan semua nilai dari object tersebut kita harus tampung satu per satu:
 *  const firstName = newObject.firstName;
 *  const lastName = newObject.lastName;
 *  const address = newObject.address;
 *  const hobby = newObject.hobby;
 *
 * Gunakan metode destructuring dalam ES6 untuk mendapatkan semua nilai dalam object dengan lebih singkat (1 line saja)
 */
console.log("Jawaban Nomor 3");
const person = {
  firstName: "Muhammad",
  lastName: "Iqbal Mubarok",
  address: "Jalan Ranamanyar",
  hobby: "Playing Football",
};
const { firstName, lastName, address, hobby } = person;
console.log(firstName, lastName, address, hobby);

console.log("");

/**
 * Soal nomor 4
 * Kombinasikan dua array berikut menggunakan array spreading ES6
 */
console.log("Jawaban Nomor 4");

const west = ["Will", "Chris", "Sam", "Holly"];
const east = ["Gill", "Brian", "Noel", "Maggie"];
const combined = [...west, ...east];

console.log(combined);

console.log("");

/**
 * Soal nomor 5
 * sederhanakan string berikut agar menjadi lebih
 * sederhana menggunakan template literals ES6:
 */
console.log("Jawaban Nomor 5");
const planet = "earth";
const view = "glass";
console.log(
  `Lorem ${view} dolor sit amet, consectetur adipiscing alit, ${planet}`
);

console.log("---------- Selesai Sudah Mengerjakan ----------");
