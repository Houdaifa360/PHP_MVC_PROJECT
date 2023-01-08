<?php 

/** 
 * User: Houdaifa (tut: TheCodeHolic) 
 * Date : 03/01/2023
 * App: PHP MVC Framework
 *
*/

namespace app\models;
use ho_b7\phpmvc\Application;
use ho_b7\phpmvc\Model;

/**
 * Class ContactForm
 * 
 * @author houdaifa <boucena214@gmail.com>
 * @package app\models;
*/

class ContactForm extends Model
{
    public string $subject = '';
    public string $email = '';
    public string $body = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'subject' => [self::RULE_REQUIRED],
            'body' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Your Email',
            'subject' => 'Enter Your Subject',
            'body' => 'Your Message',
        ];
    }

    public function send()
    {
        return true;
    }

}