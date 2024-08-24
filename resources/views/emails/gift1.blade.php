<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .header { background-color: #f4f4f4; padding: 20px; text-align: center; }
        .header a { text-decoration: none; color: #333; }
        .body { padding: 20px; }
        .button { display: inline-block; padding: 10px 20px; font-size: 16px; color: #fff; background-color: #007BFF; text-decoration: none; border-radius: 5px; }
        .footer { background-color: #f4f4f4; padding: 20px; text-align: center; font-size: 14px; color: #333; }
        .subcopy { font-size: 12px; color: #666; margin-top: 10px; }
        .subcopy a { color: #007BFF; text-decoration: none; }
        .subcopy a:hover { text-decoration: underline; }
    </style>
</head>
<body>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td class="header">
            <a href="{{ config('app.url') }}">{{ config('app.name') }}</a>
        </td>
    </tr>
    <tr>
        <td class="body">
            <h1 style="color: #009FB2"><b><i>Dear member,</i></b></h1>
            <p style="color: #009FB2">I’m <b>Richard</b>, manager of <a href="https://streamsilk.com/" style="color: #009FB2">StreamSilk.com</a>.</p>
            <p>I’m very happy to give you our <b style="color: #009FB2">Gift program</b> for new members. On your first withdrawal, you will receive an additional <b style="color: #009FB2">10% to 30%</b>.</p>
            <p>The bigger the amount, the bigger the gift. The program is valid for <b style="color: #009FB2">1 month</b> from the time you register your account.</p>
            <p>Please access the Report page To see your balance and make payout.</p>
            <a href="https://streamsilk.com/report?tab=date" class="button">Report page</a>
            <p>Let’s start uploading your videos and sharing them to make lots of money now!</p>
            <p>If you need any further support, please don’t hesitate to contact me!</p>
            <p style="color: #009FB2">Telegram: <a href="https://t.me/RichardSSilk" style="color: #009FB2">https://t.me/RichardSSilk</a><br>
                Skype: <a href="skype:live:.cid.62ed279799bfed31" style="color: #009FB2">live:.cid.62ed279799bfed31</a></p>
            <p style="color: #009FB2"><i>Regards,<br><b>Richard - StreamSilk</b></i></p>
        </td>
    </tr>
    <tr>
        <td class="subcopy">
            <p>If you’re having trouble clicking the "Report page" button, copy and paste the URL below into your web browser: <a href="https://streamsilk.com/report?tab=date">https://streamsilk.com/report</a></p>
        </td>
    </tr>
    <tr>
        <td class="footer">
            © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
        </td>
    </tr>
</table>
</body>
</html>
