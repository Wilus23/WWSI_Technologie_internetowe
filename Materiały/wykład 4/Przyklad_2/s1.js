function Baton(nazwa, cena) {
    this.cena = cena;
    this.nazwa = nazwa;
}
Baton.prototype.kup = function(ile) {
    return this.cena*ile;
}

Studencki.prototype = Object.create(baton.prototype);
