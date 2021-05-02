function showTableHeader() {
    var termText = document.selectTerm.term.options[document.selectTerm.term.selectedIndex].text;
    var hiddenTerm = document.getElementById("term-hidden");
    hiddenTerm.value = termText;
}

function showCourseHeader() {
    var courseText = document.selectCourse.prefix.options[document.selectCourse.prefix.selectedIndex].text + " " + document.selectCourse.num.options[document.selectCourse.num.selectedIndex].text;
    var hiddenCourse = document.getElementById("course-hidden");
    hiddenCourse.value = courseText;
}


