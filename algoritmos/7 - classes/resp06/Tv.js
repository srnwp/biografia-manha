class Tv{
	constructor(canal, volume){ 
		this._canal= canal;
		this._volume= volume;
			}
	aumentarVolume(){
		this._volume++;
		return this._volume;
	}
	diminuirVolume(){
		this._volume--;
		return this._volume;
	}
}
	
	

