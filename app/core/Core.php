<?php
class Core{
    private $url;
    private $controller;
    private $method;
    private $params = array();

    public function __construct()
    {
        
    }

    // esta função trata a URL recebida
    // recebe o GET da pagina index trazendo a URL que o usuario quer acessar
    public function start($req){ 
        
        if($req['url']){
        //modifica onde tem a '/' barra e transforna num array
        // onde nesse array a posição 0 fica o controler a 1 o metodos e os demais são os parametros
            $this->url = explode('/',$req['url']);
        
        //pega a posicição 0 da url onde fica o controller, concatena com a palavra Controller e armazena na variavel
        // ucfirst deixa a primeira letra em maiúscula pq o nome do arquivo começa assim.
            $this->controller = ucfirst($this->url[0]).'Controller';
            array_shift($this->url); // apaga o primeiro elemento do array.

        //pega o metodo e atribui a variavel
            $this->method = $this->url[0];
            array_shift($this->url);

        //atribui todo o restante da url aos paramentros
            $this->params = $this->url;
        }else{
            // caso a url esteja vazia inicar o login como padrão
            $this->controller = 'LoginController';
            $this->method = 'index'; // metodo que vai chamar a view login
        }
        
        // instacia o controller chamando o metodo e passa os parametros
        call_user_func(array($this->controller, $this->method,$this->params));

        var_dump($this->controller, $this->method, $this->params);
    }
}