function ISBNValidate() {
    // makes sure ISBN is 13 characters
    var isbnField = document.getElementById("isbnField");
    var isbn = document.getElementById("isbnField").value;
    while (isbn.includes("-") || isbn.includes(" ") || isbn.includes("  ")) {
        isbn = isbn.replace("-", "");
        isbn = isbn.replace(" ", "");
        isbn = isbn.replace("   ", "");
    }
    var re = new RegExp (/[a-zA-z]/);
    var errDiv = document.getElementById("isbnError");
    var form = document.getElementById("textDetailForm");
    var ISBNstring = document.getElementById("ISBNArray").value;
    var ISBNs = ISBNstring.split(' ');
    if(ISBNs.includes(isbn)) {
        form.style.display = "none";
        errDiv.innerHTML = "ISBN already registered";
        errDiv.style.display = "block";
        errDiv.style.color = "red";
        isbnField.style.border = "solid red 2px";
    }
    else if (isbn.length != 13) {
        form.style.display = "none";
        errDiv.innerHTML = "Please ensure your ISBN has 13 numbers."
        errDiv.style.display = "block";
        errDiv.style.color = "red";
        isbnField.style.border = "solid red 2px";
    }
    else if (re.test(isbn) == true) {
        form.style.display = "none";
        errDiv.innerHTML = "Incompatabile ISBN format."
        errDiv.style.display = "block";
        errDiv.style.color = "red";
        isbnField.style.border = "solid red 2px";
    }
    else {
        var errDivs = document.getElementsByClassName("errorDiv");
        for (var x = 0; x <errDivs.length; x++) {
            errDivs[x].style.display = "none";
            isbnField.style.border = "solid black 2px";
        }
        getTxtBook();
    }
}

// discontinued validation for textbook form requirements

// function textValidate() {
//     //establishes requirements for title and author to not be empty
//     var validSubmit = false;
//     var validTitle = true;
//     var validAuthor = true;
//     var title = document.getElementById("titleField");
//     var author = document.getElementById('authorField');
//     var errTitle = document.getElementById("titleError");
//     var errAuthor = document.getElementById("authorError");

//     if (title.value == "" || title.value == null) {
//         errTitle.innerHTML = "Please enter a title."
//         errTitle.style.display = "block";
//         title.style.border = "solid red 2px";
//         validTitle = false;
//     }
//     else {
//         errTitle.style.display = "none";
//         title.style.border = "solid black 1px";
//     }

//     if (author.value == "" || author.value == null) {
//         errAuthor.innerHTML = "Please enter an author."
//         errAuthor.style.display = "block";
//         author.style.border = "solid red 2px";  
//         validAuthor = false;
//     }
//     else {
//         errAuthor.style.display = "none";
//         author.style.border = "solid black 1px";  
//     }
    
//     if (validTitle == true && validAuthor == true) {
//         validSubmit = true;
//     }
//     return validSubmit;
// }
