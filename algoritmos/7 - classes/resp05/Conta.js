class Conta{
	constructor(numConta, nomeCorr, saldo=0){ 
		this._numConta= numConta;
		this._nomeCorr= nomeCorr;
		this._saldo= saldo;
	}
	alterarNome(novoCorrentista){
		this._nomeCorr= novoCorrentista;
	}
	depositar(valor){
		if (valor>0) {
			this._saldo+= valor;
			return true;
		}
		return false;
	}
	sacar(valor){
		if (valor>0 && valor<=this._saldo) {
			this._saldo-= valor;
			return true;
		}
		return false;
	}
	transferir(valor, contaDestino){
		if (this.sacar(valor)){
			contaDestino.depositar(valor);
			return true;
		}
		return false;
	}
	toString(){
		return 'Conta{correntista: ' + this._nomeCorr + ' , numero: ' + this._numConta + ' , saldo: ' + this._saldo + '}';
	}
}
