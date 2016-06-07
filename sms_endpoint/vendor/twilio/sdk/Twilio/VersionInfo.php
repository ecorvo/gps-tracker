<?php


namespace Twilio;


class VersionInfo {
    const MAJOR = 5;
    const MINOR = 0;
    const PATCH = '0-RC4';

    public static function string() {
        return implode('.', array(self::MAJOR, self::MINOR, self::PATCH));
    }
}
