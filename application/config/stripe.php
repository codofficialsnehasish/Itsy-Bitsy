<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Stripe API Configuration
| -------------------------------------------------------------------
|
| You will get the API keys from Developers panel of the Stripe account
| Login to Stripe account (https://dashboard.stripe.com/)
| and navigate to the Developers � API keys page
| Remember to switch to your live publishable and secret key in production!
|
|  stripe_api_key        	string   Your Stripe API Secret key.
|  stripe_publishable_key	string   Your Stripe API Publishable key.
|  stripe_currency   		string   Currency code.
*/
$config['stripe_api_key']         = 'sk_test_51KqK0hG1LfWm4xfxEQhkS9cIbA98QqVLimgAES0PmhxTYLXbsSSS8a4D1nccmgLPITMkU76HBi8KVlwn6OcAqVSg002MobG57N'; 
$config['stripe_publishable_key'] = 'pk_test_51KqK0hG1LfWm4xfxVDTK4LuArNvRbAxXIS8dN16kRFdVsUuORWYvnljFVDf25OPJ6A7Jv5FaTORrr74dbech3UXA00prye0Bdk'; 
$config['stripe_currency']        = 'aed';