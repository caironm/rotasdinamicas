<?php

class autoInclude {
	public $rote;
	public $rotes;
	public $path = "controller/";
		
	function __construct($rote) {
		if(empty($rote))
			$rote = "index";
		$this->rote = $rote;
		$this->rotes = explode("/", $this->rote);
		self::findRoute();
	}
	
	function findRoute() {
		if (is_dir($this->path.$this->rotes[0])) {
			if(count($this->rotes) > 1) {
				if (empty($this->rotes[1])) {
					echo $this->rotes[0]."/index";
				}
				elseif (file_exists($this->path.$this->rotes[0].'/'.$this->rotes[1].'.php')) {
					echo $this->rotes[0].'/'.$this->rotes[1];
				}
				else {
					echo "Rota não existe";
				}
			}
			else {
				if(file_exists($this->path.$this->rotes[0]."/index.php")) {
					echo $this->rotes[0]."/index";
				}
				else {
					echo "Rota não existe";
				}
			}
		} 
		else {
			if (file_exists($this->path.$this->rotes[0].".php")) {
				echo $this->rotes[0];
			}
			else {
				echo "Rota não existe";
			}
		}	
	}
		
}

$rote = "admin";
$path = new autoInclude($rote);