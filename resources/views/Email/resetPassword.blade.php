@component('mail::message')
# Redefinição de senha do SIGHR

Soubemos que você perdeu sua senha do GitHub. Desculpe por isso!<br>

Mas não se preocupe! Você pode usar o seguinte botão para redefinir sua senha:

@component('mail::button', ['url' => '192.168.1.125/sigrh/public/api/change-password?token='.$token])
Redefinir de senha
@endcomponent

Se você não usar este link em 3 horas, ele irá expirar.

Obrigado,<br>
ConnectPlus
@endcomponent
