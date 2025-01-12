<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Verify the webhook secret
        $githubSecret = env('fartattou');
        $signature = $request->header('X-Hub-Signature-256');
        $payload = $request->getContent();

        $hash = hash_hmac('sha256', $payload, $githubSecret);
        if (!hash_equals("sha256=$hash", $signature)) {
            return response('Unauthorized', 401);
        }

        // Process the webhook payload
        $event = $request->header('X-GitHub-Event');
        $payload = $request->json()->all();

        // Handle the event (e.g., push, pull request, etc.)
        switch ($event) {
            case 'push':
                // Execute your deployment script
                // shell_exec('/var/www/html/AttendanceCA/deploy.sh');
                break;
            default:
                // Handle other events
                break;
        }

        return response('Webhook received', 200);
    }
}