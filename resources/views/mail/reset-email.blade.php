@extends('layouts.mail')


@section('content')
<table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
    <tbody>
        <tr>
            <td style="text-align:center;padding: 30px 30px 15px 30px;">
                <h2 style="font-size: 18px; color: #6576ff; font-weight: 600; margin: 0;">Modifier le mot de passe</h2>
            </td>
        </tr>
        <tr>
            <td style="text-align:center;padding: 0 30px 20px">
                <p style="margin-bottom: 10px;">Salut {{$user->name}}</p>
                <p style="margin-bottom: 25px;">Cliquez sur ce bouton pour modifier votre mot de passe.</p>

                <a {{$email = $user->email}} href="{{route('user.updatePassword', compact('email'))}}" style="background-color:#6576ff;border-radius:4px;color:#ffffff;display:inline-block;font-size:13px;font-weight:600;line-height:44px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 25px">Reset Password</a>
            </td>
        </tr>
        <tr>
            <td style="text-align:center;padding: 20px 30px 40px">
                <p style="margin: 0; font-size: 13px; line-height: 22px; color:#9ea8bb;">
                    Ce lien s'expire dans 5 minutes veillez cliquer sur le lien le plus rapidement possible. </p>
                <p>Si c'est pas vous qui a effectué cette action SVP contactez
                    <a href="mailto:malick.tall@univ-thies.sn?subject=Tentative%20de%20récuperation%20de%20compte%20par%20un%20intruit&body=Une%20action%20de%20récupération%20de%20compte%20a%20été%20éffectuée%20par%20un%20instruit.">
                         l'equipe du développement</a>.</p>

            </td>
        </tr>
    </tbody>
</table>
@endsection

