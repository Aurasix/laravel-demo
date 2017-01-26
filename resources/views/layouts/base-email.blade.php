<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" type="image/ico" href="{{ asset('favicon.png') }}" />
    <title>@yield('title')</title>
    {!! Html::style('assets/css/email.css') !!}

    @yield('styles')

</head>

<body>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td height="97" align="center"><img src="{{ asset('assets/img/logo-2.png') }}" alt="" /></td>
    </tr>
    <tr>
        <td height="349" align="center" valign="top">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#fff" class="border">
                <tr>
                    <td class="pd-50" align="center">

                        @yield('content')

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0" style="margin-top: 25px;">
                <tr>
                    <td align="center">
                        <span>Catarxis Technologies ©2016. Todos los derechos reservados.</span>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

@yield('scripts')

</body>
</html>
