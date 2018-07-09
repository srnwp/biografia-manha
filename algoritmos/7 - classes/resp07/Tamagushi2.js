class Tamagushi{
	constructor(nome, fome, saude, idade){ 
		this._nome= nome;
		this._fome= fome;
		this._saude= saude;
		this._idade= idade;
	}
	
	alterarNome(nome){
		this._nome= nome;
	}
	alterarFome(fome){
		this._fome= fome;
	}
	alterarSaude(saude){
		this._saude= saude;
	}
	alterarIdade(idade){
		this._idade= idade;
	}
	obterNome(novoNome){
		return this._nome;
	}
	obterFome(){
		return this._fome;
	}
	obterSaude(){
		return this._saude;
	}
	obterIdade(){
		return this._idade;
	}
	obterHumor(){
		let humor = this.obterFome() + this.obterSaude();
		if (humor < 10){
			return 1;
		} else if (humor<20){
			return 2;
		} else if (humor<30){
			return 3;
		}else if (humor<40){
			return 4;
		}else if (humor<50){
			return 5;
		}
	}


