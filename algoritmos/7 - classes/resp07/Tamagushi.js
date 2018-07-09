class Tamagushi{
	constructor(nome, fome=5, saude=5, idade=0){ 
		this._nome= nome;
		this._fome= fome;
		this._saude= saude;
		this._idade= idade;
	}
	
	alterarNome(novoNome){
		this._nome= novoNome;
		return this._nome
	}
	
	alterarFome(){
		this._fome++;
		this._fome--;
		if (this._fome > 5){
			return 'Tamagushi com fome'
		}
		return 'Tamagushi ok';
	}
	alterarSaude(){
		this._saude++;
		this._saude--;
		if (this._saude < 5){
			return 'Tamagushi doente'
		}
		return 'Tamagushi ok';
	}
	alterarIdade(){
		this._idade++;
		this._idade--;
		return this._idade;
	}
	alterarHumor(){
		if (this._fome==0 && this._saude==10){
			return 'Tamagushi feliz';
		} else (2<= this._fome >0 || 10<this._saude>=8){
			return 'Tamagushi ok';
		} else (5<= this._fome >2 || 8<this._saude>=5){
			return 'Tamagushi bem';

