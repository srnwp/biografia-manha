class Retangulo{
	constructor(base, altura){ 
		this._base= base;
		this._altura=altura;
	}
	trocaLados(base, altura){
		this._base= base;
		this._altura=altura;
	}
	mostraLados(){
		return(this._base + ',' + this._altura);
	}
	calculaArea(){
		return this._base * this._altura;
	}
	calculaPerimetro(){
		return (this._base *2) + (this._altura*2);
	}
}