var readBooksPromise = require("./promise.js");

var books = [
  { name: "LOTR", timeSpent: 3000 },
  { name: "Fidas", timeSpent: 2000 },
  { name: "Kalkulus", timeSpent: 4000 },
  { name: "komik", timeSpent: 1000 },
];

// Menjalankan function readBooksPromise
readBooksPromise(10000, books[0])
  .then((sisaWaktu) => {
    return readBooksPromise(sisaWaktu, books[1]);
  })
  .catch((error) => console.log(error))
  .then((sisaWaktu) => {
    return readBooksPromise(sisaWaktu, books[2]);
  })
  .catch((error) => console.log(error))
  .then((sisaWaktu) => {
    return readBooksPromise(sisaWaktu, books[3]);
  })
  .catch((error) => console.log(error));
