# Portaria - UP

PIB - CWB
Programa de controle da portaria dos Pré-Adoles
Ministério UP

Check-In com:
	- Nome Completo
	- Telefone
	- Leitura de Crachá com Cod de Barras ou (número e enter)
	
Check-Out com leitura de Crachá

## Instalação
1. Wamp 2.1 ou superior (ou Apache2+Php5+Myslq5)
2. Ativar servicos (apache e mysql)
3. Mysql
  * Criar Banco `portaria`
  * Criar Tabelas conforme script [banco_portaria.sql][]
4. Copiar conteúdo da pasta para C:\wamp\www\portaria (ou pasta destino do serviço http)
5. Acessar link no navegador http://127.0.0.1/portaria

TODO:
 - [ ] Desativar pessoas com cadastro mais antigo que 4 anos
 - [ ] Atualizar telefone
 - [ ] Checkout em lote
 - [X] Relatórios:
     - [X] Quantitativo (até 10h30) (depois das 10h30) e (depois das 18h)
     - [X] Diário qualitativo