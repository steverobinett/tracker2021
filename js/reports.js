function showTableHeader() {
    var termText = document.selectTerm.term.options[document.selectTerm.term.selectedIndex].text;
    var hiddenTerm = document.getElementById("term-hidden");
    hiddenTerm.value = termText;
}

document.getElementById("term").addEventListener("click", showTableHeader, false);

