@component('mail::message')
# Aktifasi Mail Anda

Terimakasih telah melakukan registrasi, mohon aktifkan Akun anda

Klik Tombol Untuk melakukan aktivasi akun

@component('mail::button', ['url' => route('auth.activate',[
'token'=>$user->activation_token,
'email'=>$user->email
])]
)
Aktifasi
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
