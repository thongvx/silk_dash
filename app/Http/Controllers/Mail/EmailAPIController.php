<?php

namespace App\Http\Controllers\Mail;

use Mailtrap\Config;
use Mailtrap\Helper\ResponseHelper;
use Mailtrap\MailtrapClient;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Mailtrap\EmailHeader\CategoryHeader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Parsedown;
use Smtp\SmtpApiMailer;


class EmailAPIController extends Controller
{
    public function SendMailAPI()
    {

        $apiKey = '258decc57cd040423a9f025c16d2e628';
        $mailtrap = new MailtrapClient(new Config($apiKey));

        $markdownContent = View::make('emails.gift1', [
            'subcopy' => 'true',
        ])->render();

        $parsedown = new Parsedown();
        $htmlContent = $parsedown->text($markdownContent);

        $email = (new Email())
            ->from(new Address('mailtrap@demomailtrap.com', 'Mailtrap Test'))
            ->to(new Address("diemduong171@gmail.com"))
            ->subject('You are awesome!')
            ->html($htmlContent);

        $email->getHeaders()
            ->add(new CategoryHeader('Integration Test'));

        $response = $mailtrap->sending()->emails()->send($email);

        return response()->json($response);
//        $apiKey = 'bd92b12d70908d6cbc3285ddbe94de353abb252d345907883cffccbf44e1a0291b0a573bbee99be4cfaa39310b1238ef';
//        $smtp = new SmtpApiMailer($apiKey);
//
//        $smtp->setFrom('streamsilk.com@gmail.com', 'streamsilk');
//        $smtp->setTo([
//            'diemduong171@gmail.com',
//            'test@gmail.com'
//        ]);
//        $smtp->setSubject('Test subject for a test mail');
//
//        $smtp->setHeader([ 'List-Open'	=> '<https://www.google.com>' ]);
//        $smtp->setHeader([
//            'List-Unsubscribe'	=> '<https://www.google.com?source=email-client-unsubscribe-button>',
//            'List-Job'	=> 'n5643859y3t983y275934yx8732yjf874yj3324d873',
//        ]);
//
//        $smtp->setText('This is a test mail only');
//        $smtp->setHtml('<p>This is a test mail only</p>');
//
//
//        $resp = $smtp->sendMail();
//        return response()->json($resp);
    }

}

