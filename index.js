var readBooks = require("./callback.js");

var books = [
  { name: "LOTR", timeSpent: 3000 },
  { name: "Fidas", timeSpent: 2000 },
  { name: "Kalkulus", timeSpent: 4000 },
  { name: "komik", timeSpent: 1000 },
];

// Memanggil function readBooks
readBooks(10000, books[0], function (sisa1) {
  readBooks(sisa1, books[1], function (sisa2) {
    readBooks(sisa2, books[2], function (sisa3) {
      readBooks(sisa3, books[3], function (sisa4) {
        //selesai memanggil fungsi
      });
    });
  });
});
