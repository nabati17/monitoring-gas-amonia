<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

class NotificationController extends Controller
{
    public function sendPushNotification(Request $request)
    {
        $subscriptionData = $request->user()->notification_subscription;

        if (!$subscriptionData) {
            return response()->json(['error' => 'User not subscribed to notifications.'], 400);
        }

        $subscription = Subscription::create(json_decode($subscriptionData, true));
        $auth = [
            'VAPID' => [
                'subject' => 'mailto:asnaba93@gmail.com',
                'publicKey' => env('VAPID_PUBLIC_KEY'),
                'privateKey' => env('VAPID_PRIVATE_KEY'),
            ],
        ];

        $webPush = new WebPush($auth);
        $gasLevel = $request->input('gasLevel');
        $payload = [];

        if ($gasLevel === 'high') {
            $payload = json_encode(['title' => 'Peringatan Gas Amonia Tinggi', 'body' => 'Tingkat Gas Amonia tinggi! segera bersihkan kandang!', 'icon' => '../img/ayam.jpeg']);
        } elseif ($gasLevel === 'medium') {
            $payload = json_encode(['title' => 'Peringatan Gas Amonia Menengah', 'body' => 'Tingkat Gas Amonia hampir tinggi! segera bersihkan kandang!', 'icon' => '../img/ayam.jpeg']);
        } else {
            $payload = json_encode(['title' => 'Gas Amonia Aman', 'body' => 'Tingkat Gas Amonia aman.', 'icon' => '../img/public/assets/img/logo-ct.jpg']);
        }

        $webPush->queueNotification($subscription, $payload);

        foreach ($webPush->flush() as $report) {
            $endpoint = $report->getRequest()->getUri()->__toString();

            if ($report->isSuccess()) {
                echo "[v] Message sent successfully for subscription {$endpoint}.\n";
            } else {
                echo "[x] Message failed to sent for subscription {$endpoint}: {$report->getReason()}\n";
            }
        }

        return response()->json(['message' => 'Notification sent successfully.']);
    }

    public function saveSubscription(Request $request)
    {
        $subscription = json_encode($request->input('subscription'));
        $request->user()->update(['notification_subscription' => $subscription]);

        return response()->json(['message' => 'Subscription saved successfully.']);
    }
}
