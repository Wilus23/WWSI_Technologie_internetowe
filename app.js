<script>function validateForm() {
    var fname = document.forms["contactForm"]["fname"].value;
    var sname = document.forms["contactForm"]["sname"].value;
    var validate = document.forms["contactForm"]["validate"].value;

    if (fname == null || fname == "") {
        alert("Wypełnij nazwisko");
        return false;
    } else if (sname == null || sname == "") {
        alert("Wypełnij nazwisko");
        return false;
    } else if (validate != 6) {
        alert("Podaj poprawny wynik");
        return false;
    }
}</script>