# 📍 Consulta CEP

> Aplicação web moderna para consulta de CEPs brasileiros com tema dark elegante

![PHP](https://img.shields.io/badge/PHP-7.4+-777BB4?style=flat&logo=php&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?style=flat&logo=javascript&logoColor=black)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat&logo=css3&logoColor=white)
![ViaCEP](https://img.shields.io/badge/API-ViaCEP-green?style=flat)

## ✨ Funcionalidades

- 🎯 **Validação em tempo real** - Feedback instantâneo enquanto digita
- 🔢 **Máscara automática** - Formato 00000-000 aplicado automaticamente
- 🌙 **Tema dark moderno** - Interface elegante e confortável
- ⚡ **Tratamento robusto de erros** - 3 tipos de validação (formato, existência, rede)
- ♿ **Interface acessível** - Labels, ARIA, navegação por teclado
- 📱 **100% responsivo** - Funciona perfeitamente em qualquer dispositivo
- 🚫 **Prevenção de CEPs inválidos** - Detecta dígitos iguais (00000000, 11111111, etc.)

## 🛠️ Tecnologias

- **Backend**: PHP 7.4+ com validações robustas
- **Frontend**: JavaScript ES6, CSS3 moderno
- **API**: [ViaCEP](https://viacep.com.br/) - API oficial brasileira
- **Design**: Tema dark com gradientes e animações

## 📱 Compatibilidade

| Dispositivo | Status | Resolução |
|-------------|--------|-----------|
| 🖥️ Desktop | ✅ Otimizado | 1024px+ |
| 📱 Tablet | ✅ Responsivo | 768px - 1023px |
| 📱 Mobile | ✅ Responsivo | 320px - 767px |

## 🎨 Características do Design

- **Gradiente escuro** - Azul marinho com tons elegantes
- **Efeito vidro fosco** - Backdrop-filter para modernidade
- **Animações suaves** - Transições em 0.3s com easing
- **Estados visuais** - Verde (sucesso), vermelho (erro)
- **Contraste otimizado** - WCAG AA compliant
- **Tipografia moderna** - Segoe UI para melhor legibilidade

## 🚀 Instalação e Uso

### Pré-requisitos
- PHP 7.4 ou superior
- Servidor web (Apache/Nginx/XAMPP)
- Conexão com internet

### Instalação
```bash
# Clone o repositório
git clone https://github.com/seu-usuario/consulta-cep.git

# Navegue para o diretório
cd consulta-cep

# Configure o servidor web para apontar para este diretório
# Exemplo com XAMPP: copie para htdocs/
```

### Uso
1. Acesse `index.php` no seu navegador
2. Digite um CEP no formato 00000-000
3. Veja o endereço completo aparecer instantaneamente

## 📝 Exemplos de Uso

| CEP | Resultado |
|-----|-----------|
| `01310-100` | Av. Paulista, São Paulo |
| `20040-020` | Rua da Carioca, Rio de Janeiro |
| `40170-010` | Rua Chile, Salvador |

## 📁 Estrutura do Projeto

```
consulta-cep/
├── index.php          # Interface principal com HTML, CSS e JS
├── viacep.php         # Lógica de validação e consumo da API
├── style.css          # Estilos do tema dark responsivo
├── README.md          # Documentação completa
└── .gitignore         # Arquivos ignorados pelo Git
```

## 🎯 Sistema de Validações

### 🖥️ Frontend (JavaScript)
- **Máscara automática**: Formato 00000-000 aplicado em tempo real
- **Validação instantânea**: Feedback visual enquanto digita
- **Estados visuais**: Verde (válido), vermelho (inválido), normal (vazio)
- **Correção de UX**: Backspace funciona corretamente no hífen
- **Prevenção de spam**: Limitação de caracteres e formatação

### ⚙️ Backend (PHP)
- **Sanitização robusta**: Remove caracteres não numéricos e limita a 8 dígitos
- **Validação de formato**: Regex para padrão brasileiro
- **Detecção inteligente**: CEPs com dígitos iguais são rejeitados
- **Tratamento de rede**: Timeout de 10s e tratamento de falhas
- **Múltiplos erros**: 3 tipos distintos de mensagens de erro

## 🔍 Tipos de Erro e Feedback

| Tipo | Condição | Mensagem | Cor |
|------|----------|----------|-----|
| **Formato Inválido** | Dígitos insuficientes ou dígitos iguais | "CEP inválido. Digite um CEP válido." | 🔴 Vermelho |
| **Não Encontrado** | Formato correto mas CEP inexistente | "CEP não encontrado." | 🔴 Vermelho |
| **Erro de Rede** | Timeout ou falha na API | "Erro na consulta. Tente novamente." | 🔴 Vermelho |
| **Sucesso** | CEP válido e encontrado | "CEP válido ✓" | 🟢 Verde |

## 🎨 Paleta de Cores

```css
/* Background */
background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);

/* Formulário */
background: rgba(30, 41, 59, 0.95);

/* Estados */
--success: #00b894;
--error: #ff4757;
--text: #ffffff;
--placeholder: #64748b;
```

## 📊 Funcionalidades Implementadas

- ✅ **Interface responsiva** - Mobile-first design
- ✅ **Validações robustas** - Frontend e backend
- ✅ **Tratamento de erros** - 3 tipos distintos
- ✅ **Tema dark moderno** - Gradientes e efeitos
- ✅ **Acessibilidade** - ARIA, labels, navegação por teclado
- ✅ **Performance otimizada** - Carregamento rápido
- ✅ **UX aprimorada** - Feedback visual e animações

## 🚀 Como Contribuir

1. **Fork** o projeto
2. **Crie** uma branch para sua feature (`git checkout -b feature/nova-funcionalidade`)
3. **Commit** suas mudanças (`git commit -m 'Adiciona nova funcionalidade'`)
4. **Push** para a branch (`git push origin feature/nova-funcionalidade`)
5. **Abra** um Pull Request

### 🐛 Reportando Bugs
- Use o template de issue
- Inclua screenshots se possível
- Descreva os passos para reproduzir

### 💡 Sugerindo Melhorias
- Descreva a funcionalidade desejada
- Explique o benefício para os usuários
- Considere a compatibilidade com o design atual

## 📄 Licença

Este projeto está sob a licença **MIT**. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 🙏 Agradecimentos

- [ViaCEP](https://viacep.com.br/) - API gratuita e confiável
- Comunidade PHP e JavaScript
- Inspiração em designs modernos

---

<div align="center">

**Desenvolvido com ❤️ para facilitar a consulta de CEPs brasileiros**

⭐ Se este projeto foi útil, considere dar uma estrela!

</div>
