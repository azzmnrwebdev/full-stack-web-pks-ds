/**
 * Cara untuk mendeklarasi sebuah object yaitu dengan memberikan curly brackets ({})
 * lalu buat pasangan key: value di dalamnya. Jika ingin menambahkan pasangan key dan value
 * maka dipisah dengan tanda koma. contohnya:
 */
var object = {
  [key]: [value],
};

var car = {
  brand: "Ferrari",
  type: "Sports Car",
  price: 50000000,
  "horse power": 986,
};

/**
 * Jika diperhatikan pada contoh object car di atas terdapat key dengan nama "horse power"
 * yang penulisannya berbeda dengan key yang lain. Hal ini karena jika nama key dari
 * Object lebih dari satu kata atau dipisah dengan spasi kita bisa deklarasikan dengan memberikan tanda petik ("").
 *
 * Cara lainnya untuk membuat object adalah dengan mendeklarasikan terlebih dahulu variable
 * sebagai Object kosong lalu melakukan assign property dan valuenya ke varible tersebut. Contohnya sebagai berikut:
 */
var car2 = {};
// meng-assign key:value dari object car2
car2.brand = "Lamborghini";
car2.brand = "Sports Car";
car2.price = 100000000;

/**
 * Jika ingin memberikan nama key yang lebih dari satu kata dan dipisah dengan spasi maka
 * kita dapat menulis key nya dengan menggunakan tanda petik ("") di dalam kurung siku ([]).
 *
 * car2["horse power"] = 730
 *
 * Value yang kita assign pada object tidak terbatas hanya string atau
 * number saja tapi bisa juga Array, boolean, bahkan Object lagi di dalamnya.
 */
