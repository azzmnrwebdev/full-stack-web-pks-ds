/**
 * Untuk mengakses nilai pada Object bisa dengan cara memanggil object nya lalu tanda titik (dot)
 * dan nama property/key nya. contohnya seperti berikut
 */
var motorcycle1 = {
  brand: "Honda",
  type: "CBR",
  price: 1000,
};
console.log(motorcycle1.brand); // "Honda"
console.log(motorcycle1.type); // "CBR"

/**
 * Cara lain untuk mengakses nilai, yaitu cara yang mirip dengan mengakses nilai suatu elemen pada Array,
 * menggunakan tanda kurung siku, dan di dalam kurung siku tersebut kita sebutkan nama property nya.
 */
console.log(motorcycle1["price"]);

/**
 * Tipe data Array technically adalah sebuah Object tetapi Array memiliki sifat khusus.
 * Array secara otomatis memberikan indeks yang analogi dengan key pada Object.
 * Coba kamu cek di console menggunakan typeof
 */
var array = [1, 2, 3];
console.log(typeof array); // object
