<h1 align="center">🚀 Ingressy API</h1>

<p align="center">
  API REST para gestão de eventos e venda de ingressos.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/status-em%20desenvolvimento-yellow" />
  <img src="https://img.shields.io/badge/backend-laravel-red" />
  <img src="https://img.shields.io/badge/database-postgresql-blue" />
  <img src="https://img.shields.io/badge/docker-ready-blue" />
</p>

<hr/>

<h2>📌 Sobre a API</h2>

<p>
A <strong>Ingressy API</strong> é responsável por toda a lógica de negócio da plataforma,
incluindo gerenciamento de usuários, eventos, pagamentos e validação de ingressos.
</p>

<ul>
  <li>Arquitetura REST</li>
  <li>Autenticação baseada em token</li>
  <li>Integração com gateway de pagamento</li>
  <li>Geração e validação de QR Code</li>
</ul>

<hr/>

<h2>🚀 Funcionalidades</h2>

<h3>👤 Usuários</h3>
<ul>
  <li>Cadastro e autenticação</li>
  <li>Perfis:
    <ul>
      <li>organizer</li>
      <li>customer</li>
      <li>staff (validador)</li>
      <li>admin</li>
    </ul>
  </li>
</ul>

<h3>🎫 Eventos</h3>
<ul>
  <li>CRUD completo</li>
  <li>Controle de capacidade</li>
  <li>Eventos ilimitados</li>
</ul>

<h3>💳 Pagamentos</h3>
<ul>
  <li>Integração com gateway (sandbox)</li>
  <li>Status:
    <ul>
      <li>pending</li>
      <li>approved</li>
      <li>refused</li>
      <li>refunded</li>
    </ul>
  </li>
  <li>Suporte a webhook</li>
</ul>

<h3>🎟️ Ingressos</h3>
<ul>
  <li>Gerados após pagamento aprovado</li>
  <li>QR Code único</li>
  <li>Status:
    <ul>
      <li>active</li>
      <li>cancelled</li>
      <li>used</li>
    </ul>
  </li>
</ul>

<h3>✅ Validação</h3>
<ul>
  <li>Validação via QR Code</li>
  <li>Restrição por evento</li>
  <li>Controle de reuso</li>
</ul>

<hr/>

<h2>🧱 Arquitetura</h2>

<pre>
Client (Frontend / Mobile)
        ↓
   Ingressy API
        ↓
   PostgreSQL
</pre>

<hr/>

<h2>🛠️ Stack Tecnológica</h2>

<ul>
  <li><strong>Framework:</strong> Laravel</li>
  <li><strong>ORM:</strong> Eloquent</li>
  <li><strong>Autenticação:</strong> JWT ou Sanctum</li>
  <li><strong>Banco:</strong> PostgreSQL</li>
  <li><strong>Containerização:</strong> Docker</li>
</ul>

<hr/>

<h2>📂 Estrutura Base</h2>

<pre>
app/
 ├── Models
 ├── Http
 │    ├── Controllers
 │    ├── Requests
 ├── Services
database/
 ├── migrations
routes/
 ├── api.php
</pre>

<hr/>

<h2>⚙️ Setup do Projeto</h2>

<h3>📦 Pré-requisitos</h3>
<ul>
  <li>Docker</li>
  <li>Docker Compose</li>
</ul>

<h3>🚀 Subir ambiente</h3>

<pre>
docker-compose up -d --build
</pre>

<h3>🔄 Rodar migrations</h3>

<pre>
docker exec -it ingressy_api php artisan migrate
</pre>

<h3>🔑 Gerar chave da aplicação</h3>

<pre>
docker exec -it ingressy_api php artisan key:generate
</pre>

<hr/>

<h2>🔐 Autenticação</h2>

<p>
A API utiliza autenticação baseada em token.
</p>

<ul>
  <li>JWT (recomendado)</li>
  <li>ou Laravel Sanctum</li>
</ul>

<hr/>

<h2>🔗 Principais Endpoints</h2>

<pre>
POST   /auth/register
POST   /auth/login

GET    /events
POST   /events
GET    /events/{id}

POST   /payments
POST   /webhook/payment

POST   /tickets/validate
</pre>

<hr/>

<h2>🧩 Modelo de Dados (Resumo)</h2>

<pre>
User
 ├── id
 ├── name
 ├── email
 ├── cpf
 └── profile_type

Event
 ├── id
 ├── name
 ├── location
 └── user_id

Payment
 ├── id
 ├── status
 ├── amount
 └── user_id

Ticket
 ├── id
 ├── status
 ├── qr_code
 └── payment_id

Gateway
 ├── id
 ├── user_id
 ├── provider
 └── environment
</pre>

<hr/>

<h2>⚠️ Observações Importantes</h2>

<ul>
  <li>Ingressos são gerados apenas após pagamento aprovado</li>
  <li>Validação é feita via QR Code único</li>
  <li>Webhooks atualizam status de pagamento automaticamente</li>
</ul>

<hr/>

<h2>👨‍💻 Autor</h2>

<p><strong>João Vitor Lima Lago Santos</strong></p>

<hr/>

<h2>📄 Licença</h2>

<p>Projeto acadêmico / MVP em evolução.</p>
