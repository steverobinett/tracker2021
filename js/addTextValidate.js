function ISBNValidate() {
    // makes sure ISBN is 10 or 13 characters
    var isbn = document.getElementById("isbnField");
    var errDiv = document.getElementById("isbnError");
    var form = document.getElementById("textDetailForm");
    if (isbn.value.length == 10 || isbn.value.length == 13) {
        var errDivs = document.getElementsByClassName("errorDiv");
        for (var x = 0; x <errDivs.length; x++) {
            errDivs[x].style.display = "none";
        }
        getTxtBook();
    }
    else {
        form.style.display = "none";
        errDiv.innerHTML = "Please enter ISBN in 10 or 13 character format."
        errDiv.style.display = "block";
        isbn.style.border = "solid red 2px";
    }
}


function textValidate() {
    //establishes requirements for title and author to not be empty
    var validSubmit = false;
    var validTitle = true;
    var validAuthor = true;
    var title = document.getElementById("titleField");
    var author = document.getElementById('authorField');
    var errTitle = document.getElementById("titleError");
    var errAuthor = document.getElementById("authorError");

    if (title.value == "" || title.value == null) {
        errTitle.innerHTML = "Please enter a title."
        errTitle.style.display = "block";
        title.style.border = "solid red 2px";
        validTitle = false;
    }
    else {
        errTitle.style.display = "none";
        title.style.border = "solid black 1px";
    }

    if (author.value == "" || author.value == null) {
        errAuthor.innerHTML = "Please enter an author."
        errAuthor.style.display = "block";
        author.style.border = "solid red 2px";  
        validAuthor = false;
    }
    else {
        errAuthor.style.display = "none";
        author.style.border = "solid black 1px";  
    }
    
    if (validTitle == true && validAuthor == true) {
        validSubmit = true;
    }
    return validSubmit;
}
