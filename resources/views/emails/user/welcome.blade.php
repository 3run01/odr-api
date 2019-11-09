@component('mail::message')
# Olá {{$data['first_name']}}

<p>Obrigado por ter se registrado, segue abaixo os dados para acessar o seu painel.</p>

E-mail: <strong> {{$data['email']}} </strong><br />
Senha: <strong> {{$password}} </strong><br />

@component('mail::button', ['url' => env('APP_URL')])
Acessar Painel
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
