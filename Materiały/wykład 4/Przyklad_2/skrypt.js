class Baton{
	constructor(nazwa, cena){
		this.nazwa=nazwa;
		this.cena=cena;
	}


class Batonik extends Baton {
	constructor(nazwa, rodzaj) {
		super(nazwa, cena);
		this.rodzaj = rodzaj;
	}
    jedzonko() {
		return "Mniam, mniam";
    }
}


