<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        /* Prevent WebKit and Windows mobile changing default text sizes */
        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        /* Remove spacing between tables in Outlook 2007 and up */
        img {
            -ms-interpolation-mode: bicubic;
        }

        /* Allow smoother rendering of resized image in Internet Explorer */

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width: 525px) {

            /* ALLOWS FOR FLUID TABLES */
            .wrapper {
                width: 100% !important;
                max-width: 100% !important;
            }

            /* ADJUSTS LAYOUT OF LOGO IMAGE */
            .logo img {
                margin: 0 auto !important;
            }

            /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
            .mobile-hide {
                display: none !important;
            }

            .img-max {
                max-width: 100% !important;
                width: 100% !important;
                height: auto !important;
            }

            /* FULL-WIDTH TABLES */
            .responsive-table {
                width: 100% !important;
            }

            /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
            .padding {
                padding: 10px 5% 15px 5% !important;
            }

            .padding-meta {
                padding: 30px 5% 0px 5% !important;
                /*text-align: center;*/
            }

            .padding-copy {
                padding: 10px 5% 10px 5% !important;
                /*text-align: center;*/
            }

            .no-padding {
                padding: 0 !important;
            }

            .section-padding {
                padding: 50px 15px 50px 15px !important;
            }

            /* ADJUST BUTTONS ON MOBILE */
            .mobile-button-container {
                margin: 0 auto;
                width: 100% !important;
            }

            .mobile-button {
                padding: 15px !important;
                border: 0 !important;
                font-size: 16px !important;
                display: block !important;
            }

        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
</head>

<body style="margin: 0 !important; padding: 0 !important;">

    <!-- HEADER -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%">

        <tr bgcolor="#ffffff">
            <td align="center">
                <!--[if (gte mso 9)|(IE)]>
                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                        <tr>
                            <td align="center" valign="top" width="500">
                    <![endif]-->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;"
                    class="wrapper">
                    <tr>
                        <td align="left" valign="top" style="padding: 15px 0;" class="logo">

                            <img alt="Logo" src="{{ asset('/img/logo-dark.png') }}" width="200"
                                style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;"
                                border="0">

                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
            </td>
        </tr>
        <tr>
            <td bgcolor="#f1f1f1" align="center" style="padding: 40px 15px 40px 15px;" class="section-padding">
                <!--[if (gte mso 9)|(IE)]>
                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                        <tr>
                            <td align="center" valign="top" width="500">
                    <![endif]-->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;"
                    class="responsive-table">
                    <tr>
                        <td>
                            <!-- HERO IMAGE -->
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                {{-- <tr> --}}
                                {{-- <td class="padding" align="center"> --}}
                                {{-- <a href="http://litmus.com" target="_blank"><img src="https://placeimg.com/200/200/tech" width="500" height="400" border="0" alt="Insert alt text here" style="display: block; padding: 0; color: #666666; text-decoration: none; font-family: Helvetica, arial, sans-serif; font-size: 16px;" class="img-max"></a> --}}
                                {{-- </td> --}}
                                {{-- </tr> --}}
                                <tr>
                                    <td>
                                        <!-- COPY -->
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>

                                                <td align="left"
                                                    style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #333333;"
                                                    class="padding">@yield('subject', config('app.name'))</td>
                                            </tr>
                                            <tr>
                                                @yield('content')
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffffff" align="center" style="padding: 20px 0px;">
                <!--[if (gte mso 9)|(IE)]>
                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                        <tr>
                            <td align="center" valign="top" width="500">
                    <![endif]-->
                <!-- UNSUBSCRIBE COPY -->
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center"
                    style="max-width: 500px;" class="responsive-table">
                    <tr>
                        <td align="left"
                            style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">
                            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved

                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
            </td>
        </tr>
    </table>

</body>

</html>
