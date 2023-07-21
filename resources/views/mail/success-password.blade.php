@extends('layouts.mail')


@section('content')

<table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
    <tbody>
        <tr>
            <td style="text-align:center;padding: 30px 30px 15px 30px;">
                <h2 style="font-size: 18px; color: #1ee0ac; font-weight: 600; margin: 0;">Mot de Passe modifié</h2>
            </td>
        </tr>
        <tr>
            <td style="text-align:center;padding: 0 30px 20px">
                <p style="margin-bottom: 10px;">Salut {{$user->name}},</p>
                <p>Vous mot de passe a été modifié avec succès</p>
            </td>
        </tr>
        <tr>
            <td style="text-align:center;padding: 0 30px 40px">
                <p style="margin: 0; font-size: 13px; line-height: 22px; color:#9ea8bb;">
                    {{ config('app.name') }}
                </p>
            </td>
        </tr>
    </tbody>
</table>
@endsection

