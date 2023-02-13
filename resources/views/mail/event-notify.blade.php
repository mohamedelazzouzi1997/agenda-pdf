<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">

<head>
    <title> Welcome to Coded Mails </title>
    <!--[if !mso]><!-- -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--<![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style type="text/css">
        #outlook a {
            padding: 0;
        }

        body {
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        p {
            display: block;
            margin: 13px 0;
        }
    </style>
    <!--[if mso]>
        <xml>
        <o:OfficeDocumentSettings>
          <o:AllowPNG/>
          <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
    <!--[if lte mso 11]>
        <style type="text/css">
          .mj-outlook-group-fix { width:100% !important; }
        </style>
        <![endif]-->
    <style type="text/css">
        @media only screen and (min-width:480px) {
            .mj-column-per-100 {
                width: 100% !important;
                max-width: 100%;
            }
        }
    </style>
    <style type="text/css">
        @media only screen and (max-width:480px) {
            table.mj-full-width-mobile {
                width: 100% !important;
            }

            td.mj-full-width-mobile {
                width: auto !important;
            }
        }
    </style>
    <style type="text/css">
        a,
        span,
        td,
        th {
            -webkit-font-smoothing: antialiased !important;
            -moz-osx-font-smoothing: grayscale !important;
        }
    </style>
</head>

<body style="background-color:#ffffff;">
    @php
        Carbon\Carbon::setLocale('fr');
    @endphp
    <div
        style="display:none;font-size:1px;color:#ffffff;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;">
        Preview - Welcome to Coded Mails </div>
    <div style="background-color:#ffffff;">
        <div style="margin:0px auto;max-width:600px;">
            <table role="presentation" style="width:100%;" cellspacing="0" cellpadding="0" border="0"
                align="center">
                <tbody>
                    <tr>
                        <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;text-align:center;">
                            <div class="mj-column-per-100 mj-outlook-group-fix"
                                style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                <table role="presentation" style="vertical-align:top;" width="100%" cellspacing="0"
                                    cellpadding="0" border="0">
                                    <tbody>
                                        <tr>
                                            <td style="font-size:0px;padding:10px 25px;word-break:break-word;"
                                                align="left">
                                                <div
                                                    style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#434245;">
                                                    <h1
                                                        style="margin: 0; font-size: 24px; line-height: normal; font-weight: bold;">
                                                        Vous avez un nouveau
                                                        <br /> Notification
                                                    </h1>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="margin:0px auto;max-width:600px;">
            <table role="presentation" style="width:100%;" cellspacing="0" cellpadding="0" border="0"
                align="center">
                <tbody>
                    <tr>
                        <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                            <div class="mj-column-per-100 mj-outlook-group-fix"
                                style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                <table role="presentation" style="vertical-align:top;" width="100%" cellspacing="0"
                                    cellpadding="0" border="0">
                                    <tbody>
                                        <tr>
                                            <td style="font-size:0px;padding:10px 25px;word-break:break-word;"
                                                align="left">
                                                <div
                                                    style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#434245;">
                                                    <p style="margin: 0;">Hi, {{ $user->name }}</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @foreach ($events as $event)
            @if ($event->status == 'Valide')
                <div
                    style="background:#D3FBD8;background-color:#D3FBD8;margin:0px auto;border-radius:4px;max-width:600px;margin-bottom:20px;">
                    <table role="presentation"
                        style="background:#D3FBD8;background-color:#D3FBD8;width:100%;border-radius:4px;"
                        cellspacing="0" cellpadding="0" border="0" align="center">
                        <tbody>
                            <tr>
                                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                                    <div class="mj-column-per-100 mj-outlook-group-fix"
                                        style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                        <table role="presentation" style="vertical-align:top;" width="100%"
                                            cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td style="font-size:0px;padding:10px 25px;word-break:break-word;"
                                                        align="left">
                                                        <div
                                                            style="text-align: center; font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:bold;line-height:24px;text-align:left;color:#7A0B1F;">
                                                            <h2
                                                                style="margin: 0;text-align: center; font-size: 24px; font-weight: bold; line-height: 24px;">
                                                                N'OUBLIEZ PAS <br> {{ $event->title }}</h2>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size:0px;padding:10px 25px;word-break:break-word;"
                                                        align="center">
                                                        <div
                                                            style="text-align: center; font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:bold;line-height:24px;text-align:left;color:#7A0B1F;">
                                                            <div style="text-align: center">
                                                                {{-- @if (Carbon\Carbon::parse($event->start)->subDays(2)->isSameDay())
                                                                    <p
                                                                        style="font-size:100px;text-align: center;margin:60px">
                                                                        &#128556;
                                                                    </p>
                                                                @else
                                                                @endif --}}
                                                                <p
                                                                    style="font-size:100px;text-align: center;margin:60px">
                                                                    &#128522;
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size:0px;padding:10px 25px;word-break:break-word;"
                                                        align="left">
                                                        <div
                                                            style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#7A0B1F;">
                                                            <p style="margin: 20px;text-align: center">
                                                                {{ $event->description }}</p>
                                                            <h5
                                                                style="text-align: center;margin: 0; font-size: 16px; font-weight: bold; line-height: 24px;color:black">
                                                                <span
                                                                    style="color:#7A0B1F;font-size:20px;font-weight:bold">DANS
                                                                    LA DATE:</span>
                                                                {{ Carbon\Carbon::parse($event->start)->format('F j-Y h:m') }}
                                                            </h5>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @else
                <div
                    style="background:#FFF0B5;background-color:#FFF0B5;margin:0px auto;border-radius:4px;max-width:600px;margin-bottom:20px;">
                    <table role="presentation"
                        style="background:#FFF0B5;background-color:#FFF0B5;width:100%;border-radius:4px;"
                        cellspacing="0" cellpadding="0" border="0" align="center">
                        <tbody>
                            <tr>
                                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                                    <div class="mj-column-per-100 mj-outlook-group-fix"
                                        style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                        <table role="presentation" style="vertical-align:top;" width="100%"
                                            cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td style="font-size:0px;padding:10px 25px;word-break:break-word;"
                                                        align="left">
                                                        <div
                                                            style="text-align: center; font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:bold;line-height:24px;text-align:left;color:#7A0B1F;">
                                                            <h2
                                                                style="margin: 0;text-align: center; font-size: 24px; font-weight: bold; line-height: 24px;">
                                                                N'OUBLIEZ PAS <br> {{ $event->title }}</h2>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size:0px;padding:10px 25px;word-break:break-word;"
                                                        align="center">
                                                        <div
                                                            style="text-align: center; font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:bold;line-height:24px;text-align:left;color:#7A0B1F;">
                                                            <div style="text-align: center">
                                                                @if (Carbon\Carbon::parse($event->start)->subDays(2)->isSameDay())
                                                                    <p
                                                                        style="font-size:100px;text-align: center;margin:60px">
                                                                        &#128556;
                                                                    </p>
                                                                @else
                                                                    <p
                                                                        style="font-size:100px;text-align: center;margin:60px">
                                                                        &#128522;
                                                                    </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size:0px;padding:10px 25px;word-break:break-word;"
                                                        align="left">
                                                        <div
                                                            style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#7A0B1F;">
                                                            <p style="margin: 20px;text-align: center">
                                                                {{ $event->description }} </p>
                                                        </div>
                                                        <h5
                                                            style="text-align: center;margin: 0; font-size: 16px; font-weight: bold; line-height: 24px;">
                                                            <span
                                                                style="color:#7A0B1F;font-size:20px;font-weight:bold">DANS
                                                                LA DATE:</span>
                                                            {{ Carbon\Carbon::parse($event->start)->format('F j-Y h:m') }}
                                                        </h5>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif
        @endforeach
    </div>


</body>

</html>
