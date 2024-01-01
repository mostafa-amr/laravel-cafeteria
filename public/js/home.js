

let diplsy = document.getElementById("welcomCaftria");
let wordArr = [
  "laravel ",
  "Cafeteria! ",
  "Created by ",

  "Mostafa  ",

  ];

let wordCount = 0;
let charCount = 0;

updateline();

function updateline() {
    charCount++;
  diplsy.innerHTML = ` ${wordArr[wordCount].slice(0, charCount)}</h1>`;
 
  if (charCount == wordArr[wordCount].length) {
    charCount = 0;
    wordCount++;
  }
  if (wordCount == wordArr.length) {
   
    wordCount = 0;
  }

  setTimeout(updateline, 600);
}




