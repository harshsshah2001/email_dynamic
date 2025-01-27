<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Config;

class EmailMiddleware
{
    public function handle($request, Closure $next)
    {
        // Retrieve email addresses from request or set default values
        $toEmail = $request->input('to_email', 'default@example.com');
        $fromEmail = $request->input('from_email', 'noreply@example.com');

        // Set the configuration for the mailer
        Config::set('mail.from.address', $fromEmail);
        Config::set('mail.from.name', 'Your App Name');

        // Store email addresses in the request for later use
        $request->attributes->set('to_email', $toEmail);

        return $next($request);
    }
}
