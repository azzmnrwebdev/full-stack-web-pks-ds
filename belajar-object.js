/**
 * Object adalah kumpulan data tidak berurut yang berisikan pasangan property (key) dan value .
 * Jika kita ingat pada tipe data Array yang merupakan kumpulan data yang berurut sesuai indeks,
 * sedangkan Object mirip dengan Array tapi kini kita memberikan property atau key sendiri.
 * Property atau key pada Object itu dapat kita umpamakan indeks pada Array.
 * Bedanya indeks pada Array langsung diberikan secara otomatis mulai dari indeks 0 dst,
 * sedangkan property pada Object dapat kita namai sesuka kita.
 */

// Bandingkan kedua variable berikut:
var personArr = ["John", "Doe", "male", 27];
var personObj = {
  firstName: "John",
  lastName: "Doe",
  gender: "male",
  age: 27,
};

/**
 * contoh di atas kita ingin mendeklarasikan variable person dalam Array dan Object.
 * Jika pada Array kita mengakses nama depan dengan cara personArr[0],
 * sedangkan jika kita ingin mengakses nama depan pada
 * Object kita dapat melakukannya dengan personObj.firstName.
 * Keduanya memberikan value yang sama namun pemanggilan value
 * dengan cara Object lebih kita senangi karena kita bisa mendefinisikan
 * bahwa seseorang "Person" itu pasti memiliki nama depan (firstName), nama belakang (lastName), (gender), dan umur (age).
 */
var personArr = ["John", "Doe", "male", 27];
var personObj = {
  firstName: "John",
  lastName: "Doe",
  gender: "male",
  age: 27,
};

console.log(personArr[0]); // John
console.log(personObj.firstName); // John
