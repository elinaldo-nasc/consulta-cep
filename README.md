# Consulta CEP

Aplicação web para consulta de CEPs brasileiros com tema dark moderno.

## ✨ Funcionalidades

- ✅ Validação de CEP em tempo real
- ✅ Máscara automática (00000-000)
- ✅ Tema dark responsivo
- ✅ Tratamento robusto de erros
- ✅ Interface acessível
- ✅ Consumo da API ViaCEP

## 🛠️ Tecnologias

- **Backend**: PHP 7.4+
- **Frontend**: JavaScript ES6, CSS3
- **API**: ViaCEP
- **Design**: Tema dark moderno

## 📱 Responsividade

- ✅ Desktop
- ✅ Tablet
- ✅ Mobile

## 🎨 Características do Design

- Tema dark com gradientes
- Animações suaves
- Estados visuais (erro/sucesso)
- Interface minimalista
- Contraste otimizado para acessibilidade

## 🚀 Como Usar

1. Clone o repositório
2. Configure um servidor web (Apache/Nginx)
3. Acesse o arquivo `index.php`
4. Digite um CEP e veja o resultado!

## 📝 Exemplo de Uso

- Digite: `01310-100`
- Resultado: Endereço completo do CEP

## 🔧 Requisitos

- PHP 7.4 ou superior
- Servidor web (Apache/Nginx)
- Conexão com internet (para API ViaCEP)

## 📁 Estrutura do Projeto

```
consulta-cep/
├── index.php          # Interface principal
├── viacep.php         # Lógica de validação e API
├── style.css          # Estilos do tema dark
└── README.md          # Documentação
```

## 🎯 Validações Implementadas

### Frontend
- Máscara automática de CEP
- Validação em tempo real
- Feedback visual (cores verde/vermelha)
- Correção automática do backspace

### Backend
- Sanitização de entrada
- Validação de formato
- Detecção de CEPs inválidos (dígitos iguais)
- Tratamento de erros de rede
- Timeout de 10 segundos

## 🔍 Tipos de Erro

- **CEP Inválido**: Formato incorreto ou dígitos iguais
- **CEP não encontrado**: Formato correto mas inexistente
- **Erro na consulta**: Problema de rede/timeout

## 🎨 Cores do Tema Dark

- **Background**: Gradiente azul escuro
- **Formulário**: Azul acinzentado translúcido
- **Sucesso**: Verde esmeralda
- **Erro**: Vermelho vibrante
- **Texto**: Branco/cinza claro

## 📊 Status do Projeto

- ✅ Interface responsiva
- ✅ Validações robustas
- ✅ Tratamento de erros
- ✅ Tema dark moderno
- ✅ Acessibilidade
- ✅ Performance otimizada

## 🤝 Contribuições

Contribuições são bem-vindas! Sinta-se à vontade para:

- Reportar bugs
- Sugerir melhorias
- Enviar pull requests

## 📄 Licença

Este projeto está sob a licença MIT.

---

**Desenvolvido com ❤️ para facilitar a consulta de CEPs brasileiros**
