<?php 
include_once ('viacep.php');
$address = getAddress();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta CEP - Dark Theme</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="." method="post" id="cepForm">
            <h1>Consulta de CEP</h1>
            <p>Digite o CEP para encontrar o endereço</p>
            
            <div class="input-group">
                <label for="cep">CEP *</label>
                <input 
                    type="text" 
                    id="cep" 
                    name="cep" 
                    value="<?php echo (strpos($address->cep, 'Inválido') !== false || strpos($address->cep, 'não encontrado') !== false || strpos($address->cep, 'Erro na consulta') !== false) ? '' : htmlspecialchars($address->cep) ?>" 
                    placeholder="00000-000" 
                    maxlength="9"
                    autocomplete="off"
                    required
                    aria-describedby="cep-help cep-error"
                    <?php echo (strpos($address->cep, 'Inválido') !== false || strpos($address->cep, 'não encontrado') !== false || strpos($address->cep, 'Erro na consulta') !== false) ? 'class="error"' : ''; ?>
                >
                <div id="cep-help" class="help-text">Digite apenas números</div>
                <div id="cep-error" class="error-text" role="alert">
                    <?php if (strpos($address->cep, 'Inválido') !== false): ?>
                        CEP inválido. Digite um CEP válido.
                    <?php elseif (strpos($address->cep, 'não encontrado') !== false): ?>
                        CEP não encontrado.
                    <?php elseif (strpos($address->cep, 'Erro na consulta') !== false): ?>
                        Erro na consulta. Tente novamente.
                    <?php endif; ?>
                </div>
            </div>
            
            <button type="submit" id="submitBtn">
                <span class="btn-text">Buscar CEP</span>
            </button>
            
            <div class="results">
                
                <div class="input-group">
                    <label for="logradouro">Logradouro</label>
                    <input 
                        type="text" 
                        id="logradouro" 
                        name="rua" 
                        value="<?php echo htmlspecialchars($address->logradouro) ?>" 
                        placeholder="Rua, Avenida, etc."
                        readonly
                        aria-label="Logradouro encontrado"
                    >
                </div>
                
                <div class="input-group">
                    <label for="bairro">Bairro</label>
                    <input 
                        type="text" 
                        id="bairro" 
                        name="bairro" 
                        value="<?php echo htmlspecialchars($address->bairro) ?>" 
                        placeholder="Bairro"
                        readonly
                        aria-label="Bairro encontrado"
                    >
                </div>
                
                <div class="input-group">
                    <label for="localidade">Cidade</label>
                    <input 
                        type="text" 
                        id="localidade" 
                        name="cidade" 
                        value="<?php echo htmlspecialchars($address->localidade) ?>" 
                        placeholder="Cidade"
                        readonly
                        aria-label="Cidade encontrada"
                    >
                </div>
                
                <div class="input-group">
                    <label for="uf">Estado</label>
                    <input 
                        type="text" 
                        id="uf" 
                        name="estado" 
                        value="<?php echo htmlspecialchars($address->uf) ?>" 
                        placeholder="UF"
                        readonly
                        aria-label="Estado encontrado"
                    >
                </div>
                
                <button type="button" id="clearBtn" class="secondary-btn">
                    Limpar Resultados
                </button>
            </div>
        </form>
    </div>
    
    <script>
        // Máscara de CEP
        document.getElementById('cep').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 5) {
                value = value.substring(0, 5) + '-' + value.substring(5, 8);
            }
            e.target.value = value;
            
            // Validação em tempo real
            validateCEP(value);
        });
        
        // Corrigir o problema do backspace no hífen
        document.getElementById('cep').addEventListener('keydown', function(e) {
            const cursorPosition = e.target.selectionStart;
            const value = e.target.value;
            
            // Se a tecla pressionada é backspace e o cursor está logo após o hífen
            if (e.key === 'Backspace' && cursorPosition === 6 && value.charAt(5) === '-') {
                // Remove o dígito antes do hífen também
                e.preventDefault();
                const newValue = value.substring(0, 4) + value.substring(6);
                e.target.value = newValue;
                
                // Posiciona o cursor após o 4º dígito
                setTimeout(() => {
                    e.target.setSelectionRange(4, 4);
                }, 0);
                
                // Valida o novo valor
                validateCEP(newValue);
            }
        });
        
        // Validação de CEP
        function validateCEP(cep) {
            const cleanCep = cep.replace(/\D/g, '');
            const errorText = document.getElementById('cep-error');
            const input = document.getElementById('cep');
            const helpText = document.getElementById('cep-help');
            
            if (cleanCep.length === 0) {
                input.classList.remove('error', 'success');
                errorText.textContent = '';
                helpText.textContent = 'Digite apenas números';
                return false;
            } else if (cleanCep.length === 8) {
                // Verificar se todos os dígitos são iguais
                if (cleanCep.match(/^(\d)\1{7}$/)) {
                    input.classList.remove('success');
                    input.classList.add('error');
                    errorText.textContent = 'CEP inválido (todos dígitos iguais)';
                    helpText.textContent = 'Digite apenas números';
                    return false;
                }
                
                input.classList.remove('error');
                input.classList.add('success');
                errorText.textContent = '';
                helpText.textContent = 'CEP válido ✓';
                return true;
            } else {
                input.classList.remove('success');
                if (cleanCep.length > 0) {
                    input.classList.add('error');
                    errorText.textContent = 'CEP deve ter 8 dígitos';
                    helpText.textContent = 'Digite apenas números';
                }
                return false;
            }
        }
        
        
        // Limpar resultados
        document.getElementById('clearBtn').addEventListener('click', function() {
            document.getElementById('cep').value = '';
            document.getElementById('logradouro').value = '';
            document.getElementById('bairro').value = '';
            document.getElementById('localidade').value = '';
            document.getElementById('uf').value = '';
            document.getElementById('cep').classList.remove('error', 'success');
            document.getElementById('cep-error').textContent = '';
            document.getElementById('cep-help').textContent = 'Digite apenas números';
            document.getElementById('cep').focus();
        });
        
        // Foco no campo CEP quando a página carrega
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('cep').focus();
        });
    </script>
</body>
</html>