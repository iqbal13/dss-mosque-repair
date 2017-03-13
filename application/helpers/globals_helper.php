<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Application specific global variables
class Globals
{
    private static $authenticatedMemberId = null;
    private static $initialized = false;

    private static function initialize()
    {
        if (self::$initialized)
            return;

        self::$authenticatedMemberId = null;
        self::$initialized = true;
    }

    public static function setAuthenticatedMemeberId($memberId)
    {
        self::initialize();
        self::$authenticatedMemberId = $memberId;
    }


    public static function authenticatedMemeberId()
    {
        self::initialize();
        return self::$authenticatedMemberId;
    }
}