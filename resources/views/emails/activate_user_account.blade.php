@component('mail::message')
    #Merci de bien activer votre compte

@component('mail::panel')
    pour activer cotre compte
@endcomponent

@component('mail::button',['url'=>$url])
    cliquez ici
@endcomponent
Merci.
<br>
équipe{{ config("app.name")}}
@endcomponent