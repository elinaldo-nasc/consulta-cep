<?php

function getAddress () {

    if (isset($_POST['cep'])) {
        $cep = $_POST['cep'];
        $cep = filterCep($cep);

        if (isCep($cep)) {
            $address = getAddressViaCep($cep);
            
            // Verificar se houve erro na requisição
            if ($address === null) {
                $address = adressEmpty();
                $address->cep = 'Erro na consulta';
            }
            // Verificar se a API retornou erro
            else if (property_exists($address, 'erro')) {
                $address = adressEmpty();
                $address->cep = 'CEP não encontrado';
            }
        } else {
            $address = adressEmpty();
            $address->cep = 'CEP Inválido';
        }
    } else {
        $address = adressEmpty();
    }
    return $address;
}

function adressEmpty () {
     return (object) [
        'cep' => '',
        'logradouro' => '',
        'bairro' => '',
        'localidade' => '',
        'uf' => ''
    ];
}

function filterCep (String $cep):String {
    // Remove tudo exceto números
    $cep = preg_replace('/[^0-9]/', '', $cep);
    // Limita a 8 dígitos
    return substr($cep, 0, 8);
}

function isCep (String $cep):bool{
    // Verifica se tem exatamente 8 dígitos
    if (!preg_match('/^[0-9]{8}$/', $cep)) {
        return false;
    }
    
    // CEPs com todos dígitos iguais são inválidos (ex: 00000000, 11111111)
    if (preg_match('/^(\d)\1{7}$/', $cep)) {
        return false;
    }
    
    // CEPs com padrões conhecidamente inválidos
    $invalidPatterns = [
        '00000000', '11111111', '22222222', '33333333', '44444444',
        '55555555', '66666666', '77777777', '88888888', '99999999'
    ];
    
    if (in_array($cep, $invalidPatterns)) {
        return false;
    }
    
    return true;
}

function getAddressViaCep (String $cep) {
    $url = "https://viacep.com.br/ws/{$cep}/json/";
    
    // Configurar contexto com timeout
    $context = stream_context_create([
        'http' => [
            'timeout' => 10, // 10 segundos de timeout
            'method' => 'GET',
            'header' => 'User-Agent: CEP-Consumer/1.0'
        ]
    ]);
    
    try {
        $result = file_get_contents($url, false, $context);
        
        if ($result === false) {
            return null; // Falha na requisição
        }
        
        $data = json_decode($result);
        
        // Verificar se o JSON é válido
        if (json_last_error() !== JSON_ERROR_NONE) {
            return null; // JSON inválido
        }
        
        return $data;
        
    } catch (Exception $e) {
        return null; // Erro de exceção
    }
}

?>