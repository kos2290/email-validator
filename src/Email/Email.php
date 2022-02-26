<?php

namespace KonstantinDmitrienko\EmailValidator\Email;

class Email
{
    /**
     * @var array
     */
    protected static array $hosts = [];

    /**
     * @param array $emails
     *
     * @return array
     */
    public static function validateEmails(array $emails): array
    {
        if (!$emails) {
            throw new \InvalidArgumentException('Error: Provided $emails must be an array.');
        }

        return array_values(array_filter($emails, static function ($email) {
            return self::validateEmail($email);
        }));
    }

    /**
     * @param string $email
     *
     * @return bool
     */
    public static function validateEmail(string $email): bool
    {
        if (!$email) {
            throw new \InvalidArgumentException('Error: Provided $email must be string');
        }

        return filter_var($email, FILTER_VALIDATE_EMAIL) && getmxrr(explode('@', $email)[1], self::$hosts);
    }
}
