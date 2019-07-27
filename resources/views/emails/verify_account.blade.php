<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;margin: 0 auto !important;padding: 0 !important;height: 100% !important;width: 100% !important;">

<head style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <meta charset="utf-8" style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width" style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting" style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"></title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">

    <!-- The title tag shows in email notifications, like Android 4.4. -->

    <!-- CSS Reset : BEGIN -->
    <style style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            font-family: 'Roboto', sans-serif !important;
        }
        /* What it does: Stops email clients resizing small text. */
        
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        /* What it does: Centers email on Android 4.4 */
        
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }
        /* What it does: Stops Outlook from adding extra spacing to tables. */
        
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        /* What it does: Fixes webkit padding issue. */
        
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
        
        a {
            text-decoration: none;
        }
        /* What it does: Uses a better rendering method when resizing images in IE. */
        
        img {
            -ms-interpolation-mode: bicubic;
        }
        /* What it does: A work-around for email clients meddling in triggered links. */
        
        a[x-apple-data-detectors],
        /* iOS */
        
        .unstyle-auto-detected-links a,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
        /* What it does: Prevents Gmail from changing the text color in conversation threads. */
        
        .im {
            color: inherit !important;
        }
        /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
        
        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }
        /* If the above doesn't work, add a .g-img class to any image in question. */
        
        img.g-img + div {
            display: none !important;
        }
        /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
        /* Create one of these media queries for each additional viewport size you'd like to fix */
        /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
        
        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
            u ~ div .email-container {
                min-width: 320px !important;
            }
        }
        /* iPhone 6, 6S, 7, 8, and X */
        
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            u ~ div .email-container {
                min-width: 375px !important;
            }
        }
        /* iPhone 6+, 7+, and 8+ */
        
        @media only screen and (min-device-width: 414px) {
            u ~ div .email-container {
                min-width: 414px !important;
            }
        }
    </style>
    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
        
        .button-td-primary:hover,
        .button-a-primary:hover {
            background: #e91e63 !important;
            border-color: #e91e63 !important;
        }
        /* Media Queries */
        
        @media screen and (max-width: 600px) {
            .email-container {
                width: 100% !important;
                margin: auto !important;
            }
            /* What it does: Forces table cells into full-width rows. */
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }
            /* And center justify these ones. */
            .stack-column-center {
                text-align: center !important;
            }
            /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
            .center-on-narrow {
                text-align: center !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }
            table.center-on-narrow {
                display: inline-block !important;
            }
            /* What it does: Adjust typography on small screens to improve readability */
            .email-container p {
                font-size: 17px !important;
            }
        }
    </style>
    <!-- Progressive Enhancements : END -->

</head>
<!--
    The email background color (#222222) is defined in three places:
    1. body tag: for most email clients
    2. center tag: for Gmail and Inbox mobile apps and web versions of Gmail, GSuite, Inbox, Yahoo, AOL, Libero, Comcast, freenet, Mail.ru, Orange.fr
    3. mso conditional: For Windows 10 Mail
-->

<body width="100%" style="margin: 0 auto !important;padding: 0 !important;mso-line-height-rule: exactly;background-color: #F0F1F3;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;height: 100% !important;width: 100% !important;">
    <center style="width: 100%;background-color: #F0F1F3;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
        <div style="display: none;font-size: 1px;line-height: 1px;max-height: 0px;max-width: 0px;opacity: 0;overflow: hidden;mso-hide: all;font-family: 'Roboto', sans-serif;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"> Society winzard account Verify your email address To finish setting up your Society winzard account, we just need to make sure this email
        </div>

        <div style="display: none;font-size: 1px;line-height: 1px;max-height: 0px;max-width: 0px;opacity: 0;overflow: hidden;mso-hide: all;font-family: 'Roboto', sans-serif;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
            &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
        </div>

        <!-- Email Body : BEGIN -->
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="margin: auto;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;border-spacing: 0 !important;border-collapse: collapse !important;table-layout: fixed !important; margin-bottom: 20px !important;" class="email-container">
            <!-- Email Header : BEGIN -->
            <tr style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%; border-bottom: 3px solid #e91e63">
                <td style="padding: 20px 0;text-align: center;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;">
                    <img src="https://via.placeholder.com/200x50" width="200" height="50" alt="alt_text" border="0" style="height: auto;background: #000000;font-family: 'Roboto', sans-serif;font-size: 15px;line-height: 15px;color: #555555;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;-ms-interpolation-mode: bicubic;">
                </td>
            </tr>
            <!-- Email Header : END -->

            <tr style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                <td style="background-color: #ffffff;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;border-spacing: 0 !important;border-collapse: collapse !important;table-layout: fixed !important;margin: 0 auto !important;">
                        <tr style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                            <td style="padding: 20px;font-family: 'Roboto', sans-serif;font-size: 15px;line-height: 20px;color: #555555;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;">
                                <p style="margin-bottom: 10px">
                                    <b>Hello {{ ucwords($userDetails->full_name) }},</b>
                                </p>
                                @if(!empty($userDetails->rawPassword))
                                    <p>
                                        Welcome to society winzard, before we get started please confirm your email address by clicking below button and login with the provided email and password. 
                                    </p>
                                    <p style="margin: 0px;"><b>Email: </b> {{ $userDetails->email }}</p>
                                    <p style="margin: 5px 0px 0px 0px;"><b>Password: </b> {{ $userDetails->rawPassword }}</p>
                                @else
                                    <p>
                                        Welcome to society winzard, before we get started please confirm your email address. 
                                    </p>
                                @endif
                            </td>
                        </tr>

                        <tr style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                            <td style="padding: 0px 0px 20px 0px;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;">
                                <!-- Button : BEGIN -->
                                <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: auto;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;border-spacing: 0 !important;border-collapse: collapse !important;table-layout: fixed !important;">
                                    <tr style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                        <td class="button-td button-td-primary" style="border-radius: 4px;background: #222222;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;transition: all 100ms ease-in;mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;">
                                            <a class="button-a button-a-primary" href="{{ $verificationUrl }}" style="background: #e91e63;border: 1px solid #e91e63;font-family: 'Roboto', sans-serif;font-size: 15px;line-height: 15px;text-decoration: none;padding: 13px 17px;color: #ffffff;display: block;border-radius: 4px;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;transition: all 100ms ease-in;">
                                                Verify Email Address
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                                <!-- Button : END -->
                            </td>
                        </tr>

                        <tr>
                            <td style="padding: 0px 0px 20px 0px;font-family: 'Roboto', sans-serif;font-size: 15px;line-height: 20px;color: #555555;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;">
                                <hr style="width: 95%; background-color: #F0F1F3;">
                            </td>
                        </tr>

                        <tr style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                            <td style="padding: 0px 20px 20px 20px;font-family: 'Roboto', sans-serif;font-size: 15px;line-height: 20px;color: #555555;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;">
                                <p style="overflow-wrap: break-word; font-size: 12px; margin: 0px">
                                    If you’re having trouble clicking the "Verify Email Address" button, copy and paste the URL below into your web browser: <a href="{{ $verificationUrl }}">{{ $verificationUrl }}</a>
                                </p>
                            </td>
                        </tr>

                        <tr style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                            <td style="padding: 0px 20px 20px 20px;font-family: 'Roboto', sans-serif;font-size: 15px;line-height: 20px;color: #555555;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;">
                                <p>
                                    Thank You,<br>
                                    Team Society Winzard.
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <!-- Email Body : END -->
    </center>
</body>
</html>